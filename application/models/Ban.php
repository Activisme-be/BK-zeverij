<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Banned accounts Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Ban extends Model
{
    /**
     * Database table.
     *
     * @var string
     */
    protected $table = 'ban_reasons';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['reason'];

    /**
     * Enable or disable timestamps.
     *
     * @var bool
     */
    public $timestamps = true;
}
