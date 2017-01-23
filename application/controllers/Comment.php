<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * Comment Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Comment extends MY_Controller 
{
	/**
     * Authencated user data.
     *
     * @var array $user
     */
    public $user = [];

	/** 
	 * Comment constructor
	 * 
	 * @return void
	 */ 
	public function __construct() 
	{
		parent::__construct();
		$this->load->library(['blade', 'form_validation', 'session']);
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
        return ['auth'];
    }                   

	/**
	 * Store a new comment in the database. 
	 * 
	 * @see 	GET|HEAD:	http://www.domain.tld/comment/store/{articleId}
	 * @return 	Response | Response
	 */
	public function store()
	{
		$this->form_validation->set_rules('comment', 'Reactie', 'trim|required'); 

		if ($this->form_validation->run() === false) { // Validation fails.
			return redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		// No validation errors found. So we can move on with out logic. 
		$articleId = $this->security->xss_clean($this->uri->segment(3));

		$input['user_id'] = $this->security->xss_clean($this->user['id']); 
		$input['comment'] = $this->security->xss_clean($this->input->post('comment'));

		//> MySQL DB Handlings. 
		$MySQL['comment']  = Comments::create($input); 
		$MySQL['relation'] = Comments::find($MySQL['comment']->id)->reactions()->attach($articleId); 

		if ($MySQL['comment'] && $MySQL['relation']) { // Relation and reaction inserted. 
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'De reactie is toegevoegd.'); 
		}

		return redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	/** 
	 * Report a comment that breaks our policy. 
	 * 
	 * @see 	POST: http://www.domain.tld/comment/report
	 * @return  Response|Redirect
	 */
	public function report() 
	{
		$this->form_validation->set_rules('id', 'Reactie ID', 'trim|required');
		$this->form_validation->set_rules('reason', 'rede', 'trim|required');

		if ($this->form_validation->run() === false) { // Form validation fails. 
			return redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		// No validation errors found so move on with our logic; 
		$input['user_id'] = $this->security->xss_clean($this->user['id']); 
		$input['reason']  = $this->security->xss_clean($this->input->post('reason'));

		$reactionId = $this->security->xss_clean($this->input->post('id'));

		$MySQL['create']   = Report::create($input); 
		$MySQL['relation'] = Report::find($MySQL['create']->id)->reaction()->attach($reactionId); 

		if ($MySQL['create'] && $MySQL['relation']) { // Create and relation OK
			$this->session->set_flashdata('class', 'alert alert-success'); 
			$this->session->set_flashdata('message', 'U hebt de reactie successvol gerapporteerd');
		}

		return redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	/** 
	 * [INTERNAL]: This function get a specific reaction. 
	 * 
	 * - This is needed for reporting a comment.
	 * 
	 * @see 	GET|HEAD: http://www.domain.tld/comment/show/{id}
	 * @return 	JSON|RESPONSE
	 */
	public function show()
	{
		$commentId = $this->security->xss_clean($this->uri->segment(3));
		echo json_encode(Comments::find($commentId));
	}
}
