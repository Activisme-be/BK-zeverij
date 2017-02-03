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

        $MySQL['update']           = Authencate::find($this->user['id']);
        $MYSQL['update']->name     = $input['name'];
        $MySQL['update']->email    = $input['email'];
        $MySQL['update']->username = $input['username'];

        if (! empty($this->input->post('password'))) { // The password is filled in.
            $MySQL['update']->password = $this->security->xss_clean($this->input->post('pasword'));
        }

        //> Start avatar upload.
        if (! empty($_FILES['picture']['name'])) { // The post field avatar is not empty
            $config['upload_path']   = 'assets/avatars';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '5000';
            $config['max_width']     = '1907';
            $config['max_height']    = '1280';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (! $this->upload->do_upload('picture')) { // The image isn't uploaded.
                 return $this->upload->display_errors();
            } else {
                $data['finfo']     = $this->upload->data();
                $data['thumbnail'] = $data['finfo']['raw_name'] . '_thumb' . $data['finfo']['file_ext'];

                $this->deleteAvatar($MySQL['update']->avatar_name);
                $this->createThumbail($data['finfo']['file_name']);

                // Set avatar to the database.
                $MySQL['update']->avatar      = base_url('assets/avatars/' . $data['thumbnail']);
                $MySQL['update']->avatar_name = $data['thumbnail'];
                $MySQL['update']->save();

                // You can view content of the $finfo with the code block below.
                // echo '<pre>';
                // print_r($sata['finfo']);
                // echo '</pre>';
            }
        }
        //> END avatar upload.

        if ($MySQL['update']->save()) { // Update -> Success
            $user = Authencate::where('email', $MySQL['update']->email)->with(['permissions'])->get();

            if ((int) count($user->permissions) > 0) {
                $permissions = [];

                foreach ($user->permissions as $permission) {                   // Set every permission role to a key,
                    array_push($permissions, $permission->role);  // Push every key invidual to the permissions array.
                }

                $this->session->set_userdata('authencated_user', [
                    'id'       => $MySQL['update']->id,
                    'name'     => $input['name'],
                    'email'    => $input['email'],
                    'username' => $input['username'],
                    'roles'    => $permissions
                ]);
            }

            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('name', 'Je account instelingen zijn successvol aangepast');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * [INTERNAL]: Create a thumbnail for the uploaded avatar.
     *
     * @param  string  $avatarName  The name for the uploaded avatar.
     * @return void
     */
    public function createThumbail($avatarName)
    {
        $config['image_library']   = 'gd2';
        $config['source_image']    = './assets/avatars/' . $avatarName;
        $config['create_thumb']    = true;
        $config['maintain_ration'] = true;
        $config['width']           = 64;
        $config['height']          = 64;

        $this->load->library('image_lib', $config);

        if (! $this->image_lib->resize()) { // The image cannot be resize.
            return $this->image_lib->display_errors();
        } else {
            unlink($config['source_image']);
        }
    }

    /**
     * [INTERNAL]: Upload the previous avatar.
     *
     * - If the user want a new avatar to upload. This function will be triggered.
     *
     * @param  string  $avatarName  The avatar name from the user.
     * @return void
     */
    public function deleteAvatar($avatarName)
    {
        if (! unlink('./assets/avatars/' . $avatarName)) {
            log_message('ERROR', $avatarName . ': Could not delete the previous avatar from the user.');
        }
    }
}
