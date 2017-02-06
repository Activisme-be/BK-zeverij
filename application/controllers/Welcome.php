<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Welcome extends MY_Controller
{
    /**
     * Userdata when the user is authencated.
     *
     * @var array
     */
    public $user = [];

    /**
     * Welcome constructor
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
     * The application index method.
     *
     * @see     GET|HEAD: http://www.domain.tld
     * @return  Blade view.
     */
	public function index()
	{
        $data['title']     = 'Index';
        $data['sportsmen'] = Sportsmen::count();
        $data['teams']     = Teams::count();
        $data['news']      = Articles::take(3)->get();

        return $this->blade->render('welcome', $data);
	}
}
