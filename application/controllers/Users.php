<?php defined('BASEPATH') OR exit('No direct scrupt access allowed');

/**
 * Users Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Users extends MY_Controller
{
    /**
     * Authencated user data.
     *
     * @var array $user
     */
    public $user = [];

    /**
     * Users constrcutor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
}
