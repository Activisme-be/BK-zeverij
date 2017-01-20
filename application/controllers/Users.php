<?php defined('BASEPATH') OR exit('No direct scrupt access allowed');

/**
 * Users Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Users extends MY_Controller
{
    /**
     * Authencated user data.
     *
     * @var array $user
     */
    public $user = [];

    /**
     * Users constrcutor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'blade', 'session', 'pagination']);
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
        return ['admin_auth'];
    }

    public function updatePermissions()
    {

    }

    /**
     * Display the panel for the user management.
     *
     * @see    GET|HEAD:    http://www.domain.tld/users
     * @return Blade view
     */
    public function index()
    {
        $query = Authencate::with('permissions');
        $page  = ($this->security->xss_clean(3)) ? $this->security->xss_clean($this->uri->segment(3)) : 0;

        $this->pagination->initialize($this->paginationConfig(base_url('users'), $query->count(), 25, 3));

        $data['title'] = 'User management panel.';
        $data['users'] = $query->skip($page)->take(25)->get();
        $data['links'] = $this->pagination->create_links();

        return $this->blade->render('users/index', $data);
    }

    /**
     * Search for a specific user in the platform.
     *
     * @see    POST:    http://www.domain.tld/users/search
     * @return Blade view.
     */
    public function search()
    {
        $term  = $this->security->xss_clean($this->input->post('term'));
        $query = Authencate::with('permissions')->where('email', 'LIKE', '%'. $term .'%');
        $page  = ($this->security->xss_clean(3)) ? $this->security->xss_clean($this->uri->segment(3)) : 0;

        $this->pagination->initialize($this->paginationConfig(base_url('users/search'), $query->count(), 25, 3));

        $data['title'] = 'User management panel.';
        $data['users'] = $query->skip($page)->take(25)->get();
        $data['links'] = $this->pagination->create_links();

        return $this->blade->render('users/index', $data);
    }

    /**
     * Get The user handlings.
     *
     * @see    GET|HEAD: http://www.domain/tld/
     * @return Blade view
     */
    public function handlings()
    {
        $userId = $this->security->xss_clean($this->uri->segment(3));
        $data['user']  = Authencate::find($userId);
        $data['title'] = $data['user']->name;

        return $this->blade->render('users/handlings');
    }

    /**
     * Block the user in the system.
     *
     * @see    GET|HEAD:    http://www.domain.tld/users/block/{id}
     * @return Response | Redirect
     */
    public function block()
    {
        $this->form_validation->set_rules('reason', 'Reden', 'trim|required');

        if ($this->form_validation->run() == false) { // Validation fails.
            $data['title'] = 'User management panel.';
            return $this->blade->render('users/index', $data);
        }

        // No validation errors so we can move on with our logic.
        $input['user_id'] = $this->security->xss_clean($this->uri->segment(3));
        $input['reason']  = $this->security->xss_clean($this->input->post('reason'));

        $MySQL['reason']  = Ban::create(['reason' => $input['reason']]);
        $MySQL['blocked'] = Authencate::find($input['user_id'])->update(['blocked' => 'Y', 'ban_id' => $MySQL['reason']->id]);

        if ($MySQL['blocked'] && $MySQL['reason']) { // User is blocked now.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The user has been blocked');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Enable that the user can logged in again.
     *
     * @see    GET|HEAD:    http://www.domain.tld/users/unblock
     * @return Response | Redirect
     */
    public function unblock()
    {
        $user = Authencate::find($this->user['id']);
        $user->blocked = 'Y';

        if ($user->save()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The user is terug actief.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * [INTERNAL]: Pagination config
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
}
