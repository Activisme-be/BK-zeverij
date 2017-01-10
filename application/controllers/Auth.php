<?php defined('BASEPATH') OR exit('direct script access not allowed.');

class Auth extends CI_Controller
{
    /**
     * Authencated user data.
     *
     * @var array
     */
    public $user = [];

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade', 'form_validation']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('authencated_user');
    }

    /**
     * Login view for the user.
     *
     * @see    http://www.domain.tld/auth/login
     * @return Blade view
     */
    public function login()
    {
        $data['title'] = 'Login';
        return $this->blade->render('auth/login', $data);
    }

    /**
     * [INTERNAL]: Check the given user data against the database.
     *
     * @see     // It's just an internal function. No hyperlink needed.
     * @return
     */
    public function check_database()
    {

    }

    /**
     * Register view for the user.
     *
     * @see    http://www.domain.tld/auth/register
     * @return Blade view
     */
    public function register()
    {
        $data['title'] = 'Registreer';
        return $this->blade->render('auth/register', $data);
    }

    /**
     * Register a new user to the system.
     *
     * @see    http://www.domain.tld/auth/store
     * @return Response | Redirect
     */
    public function store()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('password', 'Wachtwoord', 'trim|min_length[6]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Wachtwoord confirmaties', 'trim');

        if ($this->form_validation->run() === false) { // Form validation fails
            // validation_errors(); // For debugging propose
            // die();               // For debugging propose

            $data['title'] = 'Registreer';
            return $this->blade->render('auth/register', $data);
        }

        // Validation passes. So move on with the logic.

        $input['username'] = $this->input->post('username');
        $input['name']     = $this->input->post('name');
        $input['email']    = $this->input->post('email');
        $input['password'] = $this->input->post('password');

        if (Authencation::create($input)) { // User is created.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw account is aangemaakt');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
