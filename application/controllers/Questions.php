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
        $data['title']   = 'Vragen';
        $data['all']     = Reports::count(); // Count all records. 

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
        $data['title'] = 'Stel een niewe vraag.';
        return $this->blade->render('helpdesk/questions/create', $data);
    }

    /**
     * Show a specific question.
     *
     * @see
     * @return
     */
    public function show()
    {
        $data['title']      = '';
        $data['question']   = ''; 
        return $this->blade->render('', $data);
    }

    /**
     * Store the question in the database.
     *
     * @see    POST: http://www.domain.tld/questions/store
     * @return Redirect|Response
     */
    public function store()
    {
        if ($this->validation->run() === false) { // Validation fails
            $data['title'] = '';
            return $this->blade->render('', $data);
        }

        // Move on with the logic. Because there are no validation errors found.
        $category = $this->security->xss_clean($this->input->post('category'));

        $input['title']         = $this->security->xss_clean($this->input->post('title')); 
        $input['description']   = $this->security->xss_clean($this->input->post('description'));

        // Database queries. 
        $MySQL['create']   = Reports::create($input); 
        $MySQL['relation'] = Reports::find($MySQL['create']->id)->category()->attach($category);

        if ($MySQL['create']) { // The question has been inserted. 
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw vraag zal zo snel mogelijk gehandeld worden');
        }
    }

   
    /**
     * Determine the status for a question. 
     *
     * @see 
     * @return 
     */
    public function status() 
    {
        $questionId = $this->security->xss_clean($this->uri->segment(3));
        $statusId   = $this->security->xss_clean($this->uri->segment(4));

         
    }

    /**
     * Delete a ticket out off the application. 
     * 
     * @see    GET|HEAD:
     * @return Redirect|Response
     */
    public function destroy()
    {
        $questionId = $this->security->xss_clean($this->uri->segment(3));

        if (Reports::find($questionId)->delete()) {
            $this->session->set_flashdata('class', 'alert alert-sucess');
            $this->session->set_flashdata('message', 'De vraag is verwijderd.');
        }

        return redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
