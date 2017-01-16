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
    /**
     * Authencated userdata.
     *
     * @var array $user
     */
    public $user = [];

    /**
     * Disclaimer Controller Construcot
     *
     * @return void
     */
    public function __construct()
    {
        parent::__constrcut();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('authencated_user');
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
        return $this->blade->render('dislaimer/index', $data);
    }
}
