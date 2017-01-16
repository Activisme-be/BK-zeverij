<?php

class AuthMiddleware {

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
        if (! $this->ci->session->userdata('authencated_user')) {
            return redirect(base_url('auth/login'));
        }
    }
}
