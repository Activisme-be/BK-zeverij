<?php

class AdminAuthMiddleware {

    protected $controller;
    protected $ci;
    public $roles = array();

    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;

        $this->ci->load->library(['session']);
        $this->ci->load->helper(['url']);
    }

    public function run()
    {
        $session = $this->ci->session->userdata('authencated_user');

        if ($session && ! in_array('admin', $session['roles'])) {
            return redirect('/error/404');
        }
    }
}
