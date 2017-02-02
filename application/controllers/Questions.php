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
    // FIXME: Rename the Tickets model to Question.

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
        $data['all']     = Tickets::count(); // Count all records.

        return $this->blade->render('helpdesk/questions/index', $data);
    }

    /**
     * The control management view for a question.
     *
     * @see    GET|HEAD: http://www.doamin.tld/questions/backend
     * @return Blade view
     */
    public function backend()
    {
        $data['title']      = 'Helpdesk controle paneel.';
        $data['questions']  = Tickets::with('category')->get();
        $data['categories'] = NewsCategories::with(['creator', 'questions'])->where('module', 'helpdesk')->get();

        return $this->blade->render('helpdesk/questions/backend', $data);
    }

    /**
     * Insert view for a new user question.
     *
     * @see    GET|HEAD: http://www.domain.tld/create
     * @return Blade view.
     */
    public function create()
    {
        $data['title']      = 'Stel een niewe vraag.';
        $data['categories'] = NewsCategories::where('module', 'helpdesk')->get();
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
        $questionId = $this->security->xss_clean($this->uri->segment(3));

        $data['question']   = Tickets::find($quetionId);
        $data['title']      = $data['question']->title;

        return $this->blade->render('helpdesk/questions/show', $data);
    }

    /**
     * Store the question in the database.
     *
     * @see    POST: http://www.domain.tld/questions/store
     * @return Redirect|Response
     */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('description', 'Vraag beschrijving', 'trim|required');
        $this->form_validation->set_rules('category', 'Categorie', 'trim|required');
        $this->form_validation->set_rules('publish', 'Publiek', 'trim|required');
        $this->form_validation->set_rules('agreement', 'Voorwaarden', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation fails
            $data['title']      = 'Stel een niewe vraag.';
            $data['categories'] = NewsCategories::where('module', 'helpdesk')->get();

            return $this->blade->render('helpdesk/questions/create', $data);
        }

        // Move on with the logic. Because there are no validation errors found.
        $category = $this->security->xss_clean($this->input->post('category'));

        $input['title']         = $this->security->xss_clean($this->input->post('title'));
        $input['description']   = $this->security->xss_clean($this->input->post('description'));
        $input['publish']       = $this->security->xss_clean($this->input->post('publish'));
        $input['creator_id']    = $this->user['id'];
        $input['status']        = 'Open';

        // Database queries.
        // TODO: Set belongsTo relation for category

        $MySQL['create']   = Tickets::create($input);
        $MySQL['relation'] = Tickets::find($MySQL['create']->id)->category()->attach($category);

        if ($MySQL['create']) { // The question has been inserted.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw vraag zal zo snel mogelijk gehandeld worden');
        }
    }


    /**
     * Determine the status for a question.
     *
     * @see    GET|HEAD:
     * @return Redirect|Response
     */
    public function status()
    {
        $questionId = $this->security->xss_clean($this->uri->segment(3));
        $statusId   = $this->security->xss_clean($this->uri->segment(4));

        $MySQL['find'] = Tickets::find($questionId);

        if ((int) $statusId === 1) {
            $MySQL['find']->update(['status' => 'Open']);
            $message = 'Het ticket is geopend.';
        } elseif ((int) $statusId === 0) {
            $MySQL['find']->update(['status' => 'Closed']);
            $message = 'Het ticket is gesloten';
        }

        // Flash sessions and redirect
        $this->session->set_flashdata('class', 'alert alert-success');
        $this->session->set_flashdata('message', $message);

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Get all the public questions.
     *
     * @see
     * @return Blade view.
     */
    public function visible()
    {
        // TODO: Set pagination.

        $data['title']     = 'Publieke vragen.';
        $data['questions'] = Tickets::all();

        return $this->blade->render('helpdesk/questions/list-questions', $data);
    }

    /**
     * Get all the questions for the authencated user.
     *
     * @see
     * @return Blade view
     */
    public function user()
    {
        // TODO: Set pagination.

        $data['title']     = 'Mijn vragen';
        $data['questions'] = Tickets::where('creator_id', $this->user['id'])->get();

        return $this->blade->render('helpdesk/questions/list-questions', $data);
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

        if (Tickets::find($questionId)->delete()) {
            $this->session->set_flashdata('class', 'alert alert-sucess');
            $this->session->set_flashdata('message', 'De vraag is verwijderd.');
        }

        return redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    /**
     * [INTERNAL]: The class for the pagination config.
     *
     * @return array $config
     */
    public function paginationConfig()
    {
        return $config;
    }
}
