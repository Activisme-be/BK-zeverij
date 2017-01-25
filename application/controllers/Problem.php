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
}
