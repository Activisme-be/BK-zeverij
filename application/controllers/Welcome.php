<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Userdata when the user is authencated.
     *
     * @var array
     */
    public $user = [];

    /**
     * Welcome constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('session');
    }

    /**
     *
     */
	public function index()
	{
        $data['title']     = 'Index';
        $data['sportsmen'] = Sportsmen::count();
        $data['teams']     = Teams::count();

        return $this->blade->render('welcome', $data);
	}
}
