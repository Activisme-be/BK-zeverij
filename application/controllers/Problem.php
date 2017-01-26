<?php defined('BASEPATH') or exit('No direct script access allowed'); 

/**
 * Ranking Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license   MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Problem extends MY_Controller 
{
	/** 
	 * Authencated user data. 
	 * 
	 * @return array
	 */
	public $user = []; 

	/**
	 * Problem constructor 
	 * 
	 * @return void 
	 */
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->library(['blade', 'session', 'form_validation']);
		$this->load->helper(['url']); 

		$this->user = $this->session->userdata('authencated_user');
	}

	/** 
	 * Get the index view for the problem reporting module. 
	 * 
	 * @see 	GET|HEAD: http://www.domain.tld/problem 
	 * @return 	Blade view 
	 */
	public function index()
	{
		$data['title'] = 'Meld een probleem';
		return $this->blade->render('problem/index', $data);
	}

	/** 
	 * Store the ticket to the database. 
	 * 
	 * @see 	GET|HEAD: http://www.doamin.tld/problem/store
	 * @return 	Response|Redirect 
	 */
	public function store() 
	{
		$this->form_validation->set_rules('title', 'Probleem titel', 'trim|required'); 
		$this->form_validation->set_rules('description', 'Probleem beschrijving', 'trim|required'); 

		if ($this->form_validation->run() === false) { // Form validation fails. 
			$data['title'] = 'Meld een probleem';
			return $this->blade->render('problem/index', $data);  
		}

		//> No validation errors found. 
		$input['title'] 		= $this->security->xss_clean($this->input->post('title')); 
		$input['description']	= $this->security->xss_clean($this->input->post('description')); 

		if (Tickets::create($input)) { // The ticket has been inserted into the db. 
			$this->session->set_flashdata('class', 'alert alert-success'); 
			$this->session->set_flashdata('status', 'Success');
			$this->session->set_flashdata('message', 'Bedank voor het melden. We kijken er snel naar!');
		}

		return redirect($_SERVER['HTTP_REFERER']); 
	}
}
