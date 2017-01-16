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
    /**
     * Authencated user data.
     *
     * @return array $user
     */
    public $user = [];

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
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == false) { // Validation fails.
            $data['title'] = 'Account configuratie';
            return $this->blade->render('auth/settings', $data);
        }

        // Validation passes so continu with our logic.

        $MySQL['update'] = Authencate::find($this->user['id']);

        if ($MySQL['update']->save()) { // Update -> Success
            $this->session->set_flashdata('class', '');
            $this->session->set_flashdata('name', '');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
