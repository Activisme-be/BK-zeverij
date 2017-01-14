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
     * The database relations.
     *
     * @var array
     */
     public $relations = [];

    /**
     * Sportsmen constructor.
     */
     public function __construct()
     {
         parent::__construct();
         $this->load->library(['blade', 'session']);
         $this->load->helper(['url']);

         $this->user        = $this->session->userdata('session');
         $this->relations   = ['union', 'items', 'points'];
     }

    /**
     * Sportsmen index.
     *
     * @see    GET|HEAD: http://www.domain.tld/participants
     * @return Blade view
     */
    public function index()
    {
        $data['data']  = Sportsmen::with($this->relations)->get();
        $data['title'] = 'Onze Topsporters';

        return $this->blade->render('sportsmen/index', $data);
    }

    /**
     * Show a specific sportsmen.
     *
     * @see    GET|HEAD: http://www.domain.tld/participants/show/{id}
     * @return Blade view.
     */
    public function show()
    {
        $paramId = $this->uri->segment(3);

        $data['human'] = Sportsmen::with($this->relations)->find($paramId);
        $data['title'] = $data['human']->union->name_abbr . ': ' . $data['human']->Name;

        return $this->blade->render('sportsmen/show', $data);
    }
}
