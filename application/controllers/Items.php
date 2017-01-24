<?php defined('BASEPATH') OR exit('No Direct script access allowed');

/**
 * Item Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Items extends MY_Controller
{
    /**
     * Authencated userdata
     *
     * @var array
     */
    public $user = [];

    /**
     * Items constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session', 'form_validation', 'pagination']);
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
        return ['admin_auth|except:create,vote', 'auth|only:create,vote'];
    }


    /**
     * Index method for the items.
     *
     * @see    GET|HEAD: http://www.domain.tld/item
     * @return Blade view
     */
    public function index()
    {
        $term  = $this->security->xss_clean($this->input->get('term')); // NOTE: Check if this can be deleted.
        $query = new Points;
        $page  = ($this->security->xss_clean(3)) ? $this->security->xss_clean($this->uri->segment(3)) : 0;

        $this->pagination->initialize($this->paginationConfig(base_url('items/search/'), $query->count(), 25, 3));

        $data['title']   = 'Wansmakelijke punten';
        $data['items']   = $query->skip($page)->take(25)->get();
        $data['links']   = $this->pagination->create_links();

        return $this->blade->render('items/index', $data);
    }

    /**
     * Search for a specific item.
     *
     * @see    GET|HEAD: http://www.domain.tld/items/search
     * @return Blade view
     */
    public function search()
    {
        $term  = $this->security->xss_clean($this->input->get('term'));
        $query = Points::where('point', 'LIKE', '%' . $term . '%');
        $page  = ($this->security->xss_clean(3)) ? $this->security->xss_clean($this->uri->segment(3)) : 0;

        $this->pagination->initialize($this->paginationConfig(base_url('items/search/'), $query->count(), 25, 3));

        $data['title']   = 'Wansmakelijke punten';
        $data['items']   = $query->skip($page)->take(25)->get();
        $data['links']   = $this->pagination->create_links();

        return $this->blade->render('items/index', $data);
    }

    /**
     * Vote on an item.
     *
     * @see    GET|HEAD: http://www.domain.tld/items/vote/{sportsMenId}/{itemId}
     * @return Response | Redirect
     */
    public function vote()
    {
        $sportsMenId = $this->security->xss_clean($this->uri->segment(3));
        $itemId      = $this->security->xss_clean($this->uri->segment(4));

        if (Sportsmen::find($sportsMenId)->points()->attach($itemId, ['user_id' => $this->user['id']])) { // The vote is registered
            $this->session->flashdata('class', 'alert alert-success');
            $this->session->flashdata('message', 'Uw stem is successvol verwerkt.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Create a new item in the database.
     *
     * @see     POST: http://www.domain.tld/items/create
     * @return  Response | Redirect
     */
    public function create()
    {
        // FIXME: Implement creator_id fill in.

        $this->form_validation->set_rules('media', 'Media url', 'trim|required');
        $this->form_validation->set_rules('item_name', 'Naam punt', 'trim|required');
        $this->form_validation->set_rules('sportsmen_id', 'Politici id', 'trim|required|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() == false) { // Form validation fails
            // var_dump(validation_errors()); // Only for debugging propose.
            // die();                         // Only for debugging propose.

            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden het item niet toevoegen.');

            return redirect($_SERVER['HTTP_REFERER']);
        }

        // The validation passes so we can move on to our controller logic.

        $sportsmenId = $this->security->xss_clean($this->input->post('sportsmen_id'));

        // Inputs
        $input['media_url']     = $this->input->post('media');
        $input['point']         = $this->input->post('item_name');
        $input['description']   = $this->input->post('description');
        $input['sportsmen_id']  = $sportsmenId;
        $input['status']        = 0;

        // MySQL Handlings.
        $MySQL['insert']   = Points::create($this->security->xss_clean($input));
        $MySQL['relation'] = Sportsmen::find($sportsmenId)->items()->attach($MySQL['insert']->id);

        // Output handling
        if ($MySQL['insert'] && $MySQL['relation']) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw punt is opgeslagen en zal spoedig beoordeeld worden door een admin.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Confirm a item so people can start voting on it.
     *
     * @see     GET|HEAD: http://www.domain.tld/items/confirm
     * @return  Response | Redirect
     */
    public function status()
    {
        $item         = Points::find($this->security->xss_clean($this->uri->segment(4)));
        $item->status = $this->security->xss_clean($this->uri->segment(3)); // Set the recored to 'published'.

        if ($item->save()) { // The item is updated.
            $this->session->flashdata('class', 'alert alert-info');
            $this->session->flashdata('message', 'Het wansmakelijk puntje is goedgekeurd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
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

        $config['page_query_string']    = TRUE;
        // $config['use_page_numbers']  = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open']        = '<ul style="margin-top: -10px; margin-bottom: -10px;" class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul><!--pagination-->';
        $config['first_link']           = '&laquo; First';
        $config['first_tag_open']       = '<li class="prev page">';
        $config['first_tag_close']      = '</li>';
        $config['last_link']            = 'Last &raquo;';
        $config['last_tag_open']        = '<li class="next page">';
        $config['last_tag_close']       = '</li>';
        $config['next_link']            = 'Next &rarr;';
        $config['next_tag_open']        = '<li class="next page">';
        $config['next_tag_close']       = '</li>';
        $config['prev_link']            = '&larr; Previous';
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

    /**
     * Delete a item. - This also delete the points and related data.
     *
     * @see
     * @return
     */
    public function delete()
    {
        // $MySQL['item']    = Points::find($this->security->xss_clean($this->uri->segment(3)));
        // $MySQL['delete']  = $MySQL['item']->delete();
        // $MySQL['ranking'] = $MySQL['item']
        // $MySQL['point']   =

        // if ($MySQL['delete'] && $MySQL['ranking'] && $MySQL['point']) { // Item is deleted
        //
        // }
    }
}
