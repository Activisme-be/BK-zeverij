<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Points Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Points extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'points';

    /**
     * Mass-assign array.
     *
     * @var array
     */
    protected $fillable = ['point', 'status', 'media_url', 'description'];

    /**
     * Enable / Disable Timestamps
     *
     * @return bool
     */
    public $timestamps = false;
}
