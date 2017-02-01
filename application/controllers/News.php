<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * News Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class News extends MY_Controller
{
    /**
     * AUthencated user data.
     *
     * @return arry $user
     */
    public $user = [];

    /**
     * News constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade','cimarkdown','session', 'form_validation', 'pagination']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('authencated_user');
    }

    /**
     * Middleware instance
     *
     * only create if you want to use, not compulsory.
     * or return parent::middleware(); if you want to keep.
     * or return empty array() and no middleware will run.
     *
     * @return array
     */
    protected function middleware()
    {
        // Return the list of middlewares you want to be applied,
        // Here is list of some valid options
        //
        // admin_auth                    // As used below, simplest, will be applied to all
        // someother|except:index,list   // This will be only applied to posts()
        // yet_another_one|only:index    // This will be only applied to index()
        //
        return ['admin_auth|only:backend,store,edit,update,delete'];
    }

    /**
     * Get the front-end for the news items.
     *
     * @see    GET|HEAD:    http://www.domain.tld/news
     * @return blade view.
     */
    public function index()
    {
        $authorInfo = function ($query) { $query->withTrashed(); };

        // Needed data for the pagination.
        $query = Articles::with(['comments', 'author' => $authorInfo, 'categories']);
        $page  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->pagination->initialize($this->paginationConfig(base_url('news/index'), $query->count(), 4, 3));

        $data['title']      = 'Nieuws';
        $data['news']       = $query->skip($page)->take(4)->get();
        $data['categories'] = NewsCategories::where('module', 'news')->get();
        $data['links']      = $this->pagination->create_links();

        return $this->blade->render('news/index', $data);
    }

    /**
     * Get the backend for the news articles.
     *
     * @see     GET|HEAD:   http://www.domain.tld/news/backend
     * @return  Blade view
     */
    public function backend()
    {
        $authorInfo = function ($query) { $query->withTrashed(); };

        // FIXME: Set pagination for articles.
        // FIXME: Set pagination for categories.

        $data['title']      = 'Nieuws berichten';
        $data['news']       = Articles::with(['comments', 'author' => $authorInfo, 'categories'])->get();
        $data['categories'] = NewsCategories::where('module', 'news')->get();

        return $this->blade->render('news/backend', $data);
    }

    /**
     * Show a specific news item.
     *
     * @see    GET|HEAD:    http://www.domain.tld/news/show/{id}
     * @return Blade view
     */
    public function show()
    {
        $authorInfo = function ($query) { $query->withTrashed(); };

        $postId             = $this->security->xss_clean($this->uri->segment(3));
        $data['article']    = Articles::with(['comments', 'author' => $authorInfo, 'categories'])->find($postId);

        $comments = $data['article']->comments(); // Query Builder object.
        $page     = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //> PAGINATION CONFIG
        $config['base_url']     = base_url('news/show/' . $data['article']->id);
        $config['total_rows']   = $data['article']->comments()->count();
        $config['per_page']     = 4;
        $config['uri_segement'] = 4;
        $config['num_links']    = round($config['total_rows'] / $config['per_page']);

        $config['page_query_string']    = true;
        //$config['use_page_numbers']  = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open']        = '<ul style="margin-top: -12px; margin-bottom: 3px;" class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul><!--pagination-->';
        $config['first_link']           = '&laquo; First';
        $config['first_tag_open']       = '<li class="prev page">';
        $config['first_tag_close']      = '</li>';
        $config['last_link']            = 'Last &raquo;';
        $config['last_tag_open']        = '<li class="next page">';
        $config['last_tag_close']       = '</li>';
        $config['next_link']            = 'Volgende &rarr;';
        $config['next_tag_open']        = '<li class="next page">';
        $config['next_tag_close']       = '</li>';
        $config['prev_link']            = '&larr; Vorige';
        $config['prev_tag_open']        = '<li class="prev page">';
        $config['prev_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li class="page">';
        $config['num_tag_close']        = '</li>';
        // $config['display_pages']     = FALSE;
        //
        $config['anchor_class']         = 'follow_link';
        //> END PAGINATION CONFIG

        $this->pagination->initialize($config);

        $data['categories']    = NewsCategories::where('module', 'news')->where('module', 'news')->get();
        $data['comments']      = $comments->skip($this->input->get('page'))->take(4)->get();
        $data['title']         = $data['article']->heading;
        $data['comments_link'] = $this->pagination->create_links();

        //var_dump(count($comments));
        // var_dump($data['article']->comments->count());
        //die();

        return $this->blade->render('news/show', $data);
    }

    /**
     * Search for a specific news message.
     *
     * @see    GET|HEAD:    http://www.domain.tld/search
     * @return Blade view.
     */
    public function search()
    {
        $this->form_validation->set_rules('term', 'Zoek term', 'trim|required');

        $data['title']      = 'nieuws management';
        $data['categories'] = NewsCategories::all();

        if ($this->form_validation->run() === false) { // Validation fails.
            $data['news'] = Articles::with(['comments', 'author', 'categories'])->get();
            return $this->blade->render('news/backend', 'refresh');
        }

        // No validation errors. So we can move on with our controller logic.

        $data['term'] = $this->security->xss_clean($this->input->post('term')); // Controller only used. Not in the pages.
        $data['news'] = Articles::with(['comments', 'author', 'categories'])->where('heading', 'LIKE', '%' . $data['term'] . '%')->get();
        return $this->blade->render('news/backend', $data);
    }

    /**
     * Store a new article in the database.
     *
     * @see    POST:    http://www.domain.tld/news/store
     * @return Response | Redirect
     */
    public function store()
    {
        // FIXME: Set method to upload a image (260x180)
        // FIXME: Set markdown support on tehe message

        $this->form_validation->set_rules('heading', 'Titel nieuwsbericht', 'trim|required');
        $this->form_validation->set_rules('description', 'Nieuwsbericht', 'trim|required');

        if ($this->form_validation->run() == false) { // Validation fails.
            // var_dump(validation_errors());         // For debugging proposes
            // die();                                 // For debugging proposes

            $data['title'] = 'Nieuws management';
            $data['news']       = Articles::with(['comments', 'author', 'categories'])->get();
            $data['categories'] = NewsCategories::all();
            return $this->blade->render('news/backend', $data);
        }

        // No validation errors found. SO move on with the logic.

        //> Input's
        $input['creator_id']  = $this->user['id'];
        $input['message']     = $this->input->post('description');
        $input['heading']     = $this->input->post('heading');
        $input['categories']  = $this->input->post('category');

        //> DB handlings
        $MySQL['create']   = Articles::create($this->security->xss_clean($input));

        if (! is_null($input['categories'])) { // They are categories set
            $MYSQL['categories'] = Articles::find($MySQL['create']->id)->categories()->sync($input['categories']);
        }

        $this->session->set_flashdata('class', 'alert alert-success');
        $this->session->set_flashdata('message', 'The article has been saved');

        return redirect(base_url('news/backend'), 'refresh');
    }

    /**
     * Update view for some article in the database.
     *
     * @see    GET|HEAD:    http://www.domain.tld/edit/{id}
     * @return Blade view
     */
    public function edit()
    {
        $articleId = $this->security->xss_clean($this->uri->segment(3));

        $data['article'] = Articles::with(['comments', 'author', 'categories'])->find($articleId);
        $data['title']   = $data['article']->heading;

        return $this->blade->render('', $data);
    }

    /**
     * Update a news article in the database.
     *
     * @see
     * @return Response | Redirect
     */
    public function update()
    {
        $this->form_validation->set_rules('heading', 'Titel nieuwsbericht', 'trim|required');
        $this->form_validation->set_rules('description', 'Nieuwsbericht', 'trim|required');

        if ($this->form_validation->run() == false) { // Validation errors.
            $data['title'] = 'Nieuws';

            return $this->blade->render('news/index', $data);
        }

        // No validation errors found. So move on with the logic.

        return redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    /**
     * Delete a new article in the database.
     *
     * @see    GET|HEAD:    http://www.domain.tld
     * @return Response | Redirect
     */
    public function delete()
    {
        $authorRel = function ($query) { $query->withTrashed(); };

        $param['id']      = $this->security->xss_clean($this->uri->segment(3));
        $MySQL['article'] = Articles::with(['comments', 'author', 'categories'])->find($param['id']);

        if ((int) count($MySQL['article']) === 1) { // Record is found

            if ((int) count($MySQL['article']->comments) > 0) {         // There are comments on the article.
                foreach ($MySQL['article']->comments as $comment) {     // Remove all the comments in the database.
                    Comments::destroy($comment->id);                    // Remove the comment with teh given id.
                }
            }

            $MySQL['article']->comments()->sync([]);    // Disconnect the comments from the article.
            $MySQL['article']->categories()->sync([]);  // Disconnect the categories form the article.
            $MySQL['article']->delete();                // Delete the article out off the database.

            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The article has been deleted');
        }

        return redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    /**
     * Pagination config
     *
     * @param  string   $baseUrl     The base url for the page.
     * @param  int      $totalRows   The amount off rows of the query.
     * @param  int      $perPage     Amount of data rows per page.
     * @param  int      $segment     The URI segment.
     * @return array    $config
     */
    public function paginationConfig($baseUrl, $totalRows, $perPage, $segment)
    {
        $config['base_url']     = $baseUrl;
        $config['total_rows']   = $totalRows;
        $config['per_page']     = $perPage;
        $config['uri_segement'] = $segment;
        $config['num_links']    = round($config['total_rows'] / $config['per_page']);

        $config['page_query_string']    = false;
        //$config['use_page_numbers']  = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open']        = '<ul class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul><!--pagination-->';
        $config['first_link']           = '&laquo; First';
        $config['first_tag_open']       = '<li class="prev page">';
        $config['first_tag_close']      = '</li>';
        $config['last_link']            = 'Last &raquo;';
        $config['last_tag_open']        = '<li class="next page">';
        $config['last_tag_close']       = '</li>';
        $config['next_link']            = 'Volgende &rarr;';
        $config['next_tag_open']        = '<li class="next page">';
        $config['next_tag_close']       = '</li>';
        $config['prev_link']            = '&larr; Vorige';
        $config['prev_tag_open']        = '<li class="prev page">';
        $config['prev_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li class="page">';
        $config['num_tag_close']        = '</li>';
        // $config['display_pages']     = FALSE;
        //
        $config['anchor_class']         = 'follow_link';

        return $config;
    }
}
