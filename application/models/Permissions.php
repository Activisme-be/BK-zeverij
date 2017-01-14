<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Permissions Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Permissions extends Eloquent
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'permissions';
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['role', 'description'];
    /**
     * Disable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;
}
