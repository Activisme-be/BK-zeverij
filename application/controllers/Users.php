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
        return ['admin_auth'];
    }

    public function updatePermissions()
    {

    }

    public function index()
    {

    }

    public function search()
    {

    }

    public function status()
    {

    }

    public function paginationConfig()
    {

    }
}
