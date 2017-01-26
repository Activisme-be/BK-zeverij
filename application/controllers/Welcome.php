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
    public $user        = []; /** @var array  $user         The authencated user data                 **/
    public $permissions = []; /** @var array  $permissions  The permissions for the authencated user  **/
    public $abilities   = []; /** @var array  $abilities    The abilities for the given user.         **/

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

        $this->user        = $this->session->userdata('authencated_user');
        $this->permissions = $this->session->userdata('authencated_permissions');
        $this->abilities   = $this->session->userdata('authencated_abilities');
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

        return $this->blade->render('welcome', $data);
	}
}
