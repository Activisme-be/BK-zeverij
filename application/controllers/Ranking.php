<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller
{
    /**
     * Authencation user data.
     *
     * @var array
     */
    public $user = [];

    /**
     * Ranking constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('authencated_user');
    }

    /**
     * Show the ranking.
     *
     * @see    GET|HEAD: http://www.domain.tld/ranking
     * @return Blade View
     */
    public function index()
    {
        $data['title']    = 'Ranking';
        $data['humans']   = Sportsmen::with('union')->get();
        $data['unions']   = Teams::all();
        $data['position'] = 1;

        return $this->blade->render('ranking/index', $data);
    }
}
