<?php defined('BASEPATH') OR exit('No direct script accesss allowed');

class Participants extends CI_Controller
{
    /**
     * Userdata when the user is authencated.
     *
     * @var array
     */
    public $user = [];

    /**
     * Sportsmen constructor.
     */
     public function __construct()
     {
         parent::__construct();
         $this->load->library(['blade', 'session']);
         $this->load->helper(['url']);

         $this->user = $this->session->userdata('session');
     }

    /**
     * Sportsmen index.
     *
     * @see    GET|HEAD: http://www.domain.tld/participants
     * @return Blade view
     */
    public function index()
    {
        $data['data']  = Sportsmen::with('union')->get();
        $data['title'] = 'Onze Topsporters';

        return $this->blade->render('sportsmen/index', $data);
    }

    /**
     * Show a specific sportsmen.
     *
     * @see    GET|HEAD: http://www.domain.tld/participants/show/
     * @return Blade view.
     */
    public function show()
    {
        $paramId = $this->uri->segment(3);

        $data['human'] = Sportsmen::with('union')->find($paramId);
        $data['title'] = $data['human']->union->name_abbr . ': ' . $data['human']->Name;

        return $this->blade->render('sportmen/show', $data);
    }
}
