<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Questions Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Questions extends MY_Controller
{
    /**
     * Questions constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'form_validation', 'session']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('authencated_user');
        $this->permissions = $this->session->userdata('authencated_permissions');
        $this->abilities   = $this->session->userdata('authencated_abilities');
    }

    /**
     * Get the index view for the questions module.
     *
     * @see    GET|HEAD: http://www.domain.tld/questions
     * @return Blade view.
     */
    public function index()
    {
        $data['title']     = 'Vragen';
        $data['questions'] = Reports::all();

        return $this->blade->render('helpdesk/questions/index', $data);
    }

    /**
     * Insert view for a new user question.
     *
     * @see    GET|HEAD: http://www.domain.tld/create
     * @return Blade view.
     */
    public function create()
    {
        return $this->blade->render('helpdesk/questions/create', $data);
    }

    /**
     *
     *
     */
    public function show()
    {
    }

    /**
     * Store the question in the database.

     * @see    POST: http://www.domain.tld/questions/store
     * @return Redirect|Response
     */
    public function store()
    {
        //
    }
}
