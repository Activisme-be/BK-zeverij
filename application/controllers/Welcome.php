<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Welcome constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade']);
        $this->load->helper(['url']);
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
