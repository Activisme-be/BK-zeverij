<?php defined('BASEPATH') OR exit('No direct script accesss allowed');

class Participants extends CI_Controller
{
    /**
     * Sportsmen constructor.
     */
     public function __construct()
     {
         parent::__construct();
         $this->load->library(['blade']);
         $this->load->helper(['url']);
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
        return $this->blade->render('sportmen/show', $data);
    }
}
