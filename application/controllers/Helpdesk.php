<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Helpdesk Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license   MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Helpdesk extends MY_Controller
{
	public $user        = []; /** @var array  $user         The authencated user data                 **/
    public $permissions = []; /** @var array  $permissions  The permissions for the authencated user  **/
    public $abilities   = []; /** @var array  $abilities    The abilities for the given user.         **/

	/**
	 * Problem constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['blade', 'session', 'form_validation']);
		$this->load->helper(['url']);

		$this->user        = $this->session->userdata('authencated_user');
        $this->permissions = $this->session->userdata('authencated_permissions');
        $this->abilities   = $this->session->userdata('authencated_abilities');
	}

	/**
	 * Get the index view for the problem reporting module.
	 *
	 * @see 	GET|HEAD: http://www.domain.tld/problem
	 * @return 	Blade view
	 */
	public function index()
	{
		$data['title'] = 'Helpdesk';
		return $this->blade->render('helpdesk/index', $data);
	}

    /**
     * Get the action rules for this system.
     *
     * @see    GET|HEAD: http://www.domain.tld/helpdesk/rules
     * @return Blade View
     */
	public function rules()
	{
        $data['title'] = 'Regels van deze actie';
        return $this->blade->render('', $data);
	}

    /**
     * Show the application documentation.
     *
     * @see    GET|HEAD: http://www.domain.tld/helpdesk/docs
     * @return Blade view
     */
	public function docs()
    {
        $data['title'] = 'Documentatie';
        return $this->blade->render('', $data);
    }
}
