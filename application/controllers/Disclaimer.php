<?php defined('BASEPATH') OR exit('No Direct script access allowed');

/**
 * Disclaimer Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Disclaimer extends MY_Controller
{
    public $user        = []; /** @var array  $user         The authencated user data                 **/
    public $permissions = []; /** @var array  $permissions  The permissions for the authencated user  **/
    public $abilities   = []; /** @var array  $abilities    The abilities for the given user.         **/

    /**
     * Disclaimer Controller Construcot
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
        return [];
    }

    /**
     * Show the disclaimer to the users.
     *
     * @see
     * @return
     */
    public function index()
    {
        $data['title'] = 'Disclaimer';
        return $this->blade->render('disclaimer/index', $data);
    }
}
