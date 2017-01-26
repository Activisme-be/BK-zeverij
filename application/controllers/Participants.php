<?php defined('BASEPATH') OR exit('No direct script accesss allowed');

/**
 * Participants Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Participants extends MY_Controller
{
    public $user        = [];  /** @var array Userdata when the user is authencated. **/
    public $permissions = [];  /** @var array The permissions for the authencated user. **/
    public $abilities   = [];  /** @var array The abilities for the given user. **/
    public $relations   = [];  /** @var array The database relations **/

    /**
     * Sportsmen constructor.
     *
     * @return void
     */
     public function __construct()
     {
         parent::__construct();
         $this->load->library(['blade', 'session']);
         $this->load->helper(['url']);

         $this->user        = $this->session->userdata('authencated_user');
         $this->permissions = $this->session->userdata('permissions');
         $this->abilities   = $this->session->userdata('abilities');
         $this->relations   = ['union', 'items', 'points'];
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
        $paramId = $this->security->xss_clean($this->uri->segment(3));

        $data['human'] = Sportsmen::withCount($this->relations)->find($paramId);
        $data['title'] = $data['human']->union->name_abbr . ': ' . $data['human']->Name;

        return $this->blade->render('sportsmen/show', $data);
    }
}
