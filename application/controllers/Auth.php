<?php defined('BASEPATH') OR exit('direct script access not allowed.');

/**
 * Authencation Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Auth extends MY_Controller
{
    /**
     * Authencated user data.
     *
     * @var array
     */
    public $user = [];

    /**
     * Auth constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade', 'email', 'form_validation']);
        $this->load->helper(['url', 'string']);

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
     * Verify the given credentials.
     *
     * @see     http://www.domain.tld/auth/login
     * @return  Blade view | Redirect
     */
    public function verify()
    {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

            if ($this->form_validation->run() === false) { // Validation fails
                // printf(validation_errors());     // For debugging propose
                // die();                           // For debugging propose

                $data['title'] = 'Login';
                return $this->blade->render('auth/login', $data);
            }

            return redirect(base_url());
    }

    /**
     * [INTERNAL]: Check the given user data against the database.
     *
     * @see     // It's just an internal function. No hyperlink needed.
     * @param   string $password the user given password.
     * @return  bool
     */
    public function check_database($password)
    {
        $input['email'] = $this->security->xss_clean($this->input->post('email'));
        $MySQL['user']  = Authencate::where('email', $input['email'])
            ->with('permissions')
            ->where('blocked', 'N')
            ->where('password', md5($password));
        if ($MySQL['user']->count()) { // User is found and the password match
            $authencation = []; // Empty authencated session array.
            $permissions  = []; // Empty permission array.

            // Build up the session array.
            foreach ($MySQL['user']->get() as $user) { // Define the data to the session array.
                foreach ($user->permissions as $permission) { // Set every permission role to a key,
                    array_push($permissions, $perm->role);    // Push every key invidual to the permissions array.
                }

                $authencation['id']         = $user->id;
                $authencation['name']       = $user->name;
                $authencation['email']      = $user->email;
                $authencation['username']   = $user->username;
                $authencation['roles']      = $permissions;
            }

            $this->session->set_userdata('authencated_user', $authencation);
            return true;

        } else { // User is not found or the password doesnt match
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wrong credentials given.');

            // FIXME: Need to check if th validation line is needed.
            $this->form_validation->set_message('check_database', 'Wrong credentials given.');

            return false;
        }
    }

    /**
     * Reset a user password
     *
     * @see    POST: http://www.domain/auth/reset
     * @return Response | Redirect
     */
    public function reset()
    {
        $input['email'] = $this->security->xss_clean($this->input->post('email'));
        $MySQL['user']  = Authencate::where('email', '=', $input['email']);

        if ($MySQL['user']->count() === 1) { // User is found.
            $password['pass'] = random_string('alnum', 16);

            $MySQL['update'] = Authencate::find($MySQL['user']->first()->id);
            $MySQL['update']->password = md5($password['pass']);

            if ($MySQL['update']->save()) {
                // Config mail.
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = "mailout.one.com";
                $config['smtp_user'] = "mailing@activisme.be";
                $config['smtp_pass'] = "ikbeneenwachtwoord";
                $config['smtp_port'] = "25";
                // $config['smtp_crypto'] = 'tls';
                $config['authencation'] = 'true';


                $this->email->initialize($config); // Init the config.

                // Send email.
                $this->email->from('mailing@activisme.be', 'Activisme-Be');
                $this->email->to($input['email']);
                $this->email->subject('Reset wachtwoord - Activisme-Be');
                $this->email->message($this->blade->render('email/reset', $password));
                $this->email->set_mailtype('html');

                if (@$this->email->send()) { // Mail is send.
                    // printf('Email is sent'); // For debugging propose.
                    // die();                   // For debugging propose.

                    // $this->email->clear(); // Clear the email batch in the sys.
                    // $this->session->set_flashdata('email', 'De email is verzonden.');
                } else { // The email isn't send.
                    // echo $this->email->print_debugger();   // For debuging propose.
                    // die();                          // For debugging propose.
                    $this->email->clear(); // Clear the email batch in the sys.

                    // Send output.
                    $this->session->set_flashdata('class', 'alert alert-success');
                    $this->session->set_flashdata('message', 'Er is een email verzonden met je nieuwe wachtwoord.');
                }
            }
        } else { // There is no user found.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Wij konden de aanvraag niet verwerken');
        }

        return redirect($_SERVER['HTTP_REFERER']);
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
        $input['password'] = md5($this->input->post('password'));
        $input['blocked']  = 'N';

        if (Authencate::create($this->security->xss_clean($input))) { // User is created.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw account is aangemaakt');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Log the user out.
     *
     * @see     GET|HEAD: http://www.domain.tld/auth/logout
     * @return  Response | Redirect
     */
    public function logout()
    {
        $this->session->unset_userdata('authencated_user');

        if ($this->session->sess_destroy()) { // The user is logged out.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'U bent nu uitgelogd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
