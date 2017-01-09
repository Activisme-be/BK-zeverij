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
     * @see    GET|HEAD: http://www.domain.tld/sportsmen
     * @return Blade view
     */
    public function index()
    {
        $data['data']  = Sportsmen::with('union')->get();
        $data['title'] = 'Onze Topsporters';

        return $this->blade->render('sportsmen/index', $data);
    }
}
