<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Account management Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Account extends MY_Controller
{
    public $user        = []; /** @var array  $user         The authencated user data                 **/
    public $permissions = []; /** @var array  $permissions  The permissions for the authencated user  **/
    public $abilities   = []; /** @var array  $abilities    The abilities for the given user.         **/

    /**
     * Account constrcutor.
     *
     * @return void.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'blade']);
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
     * Show the form for updating the user settings.
     *
     * @see    GET|HEAD: http://www.domain.tld/account/settings
     * @return Blade view
     */
    public function settings()
    {
        $data['title'] = 'Account configuratie';
        return $this->blade->render('auth/settings', $data);
    }

    /**
     * Update the user settings.
     *
     * @see    POST: http://www.domain.tld/account/update
     * @return Response | Redirect
     */
    public function update()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');

        if (! empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Wachtwoord', 'trim|min_length[6]|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Wachtwoord confirmaties', 'trim');
        }

        if ($this->form_validation->run() == false) { // Validation fails.
            // var_dump(validation_errors());   // For debugging proposes.
            // die();                           // For debugging proposes.

            $data['title'] = 'Account configuratie';
            return $this->blade->render('auth/settings', $data);
        }

        // Validation passes so continu with our logic.

        $input['name']     = $this->security->xss_clean($this->input->post('name'));
        $input['email']    = $this->security->xss_clean($this->input->post('email'));
        $input['username'] = $this->security->xss_clean($this->input->post('username'));

        var_dump($this->user);

        $MySQL['update']           = Authencate::find($this->user['id']);
        $MYSQL['update']->name     = $input['name'];
        $MySQL['update']->email    = $input['email'];
        $MySQL['update']->username = $input['username'];

        if (! empty($this->input->post('password'))) { // The password is filled in.
            $MySQL['update']->password = $this->security->xss_clean($this->input->post('pasword'));
        }

        if ($MySQL['update']->save()) { // Update -> Success
            $permissions = [];

            foreach (Authencate::where('email', $MySQL['update']->email)->permissions as $permission) { // Set every permission role to a key,
                array_push($permissions, $permission->role);                                            // Push every key invidual to the permissions array.
            }

            $this->session->set_userdata('authencated_user', [
                'id'       => $MySQL['update']->id,
                'name'     => $input['name'],
                'email'    => $input['email'],
                'username' => $input['username'],
                'roles'    => $permissions
            ]);

            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('name', 'Je account instelingen zijn successvol aangepast');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
