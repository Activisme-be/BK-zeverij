<?php defined('BASEPATH') or exit('no direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Tickets Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Tickets extends Model
{
	/**
	 * Enable / Disable timestamps.
	 *
	 * @return bool
	 */
	public $timestamps = true;

	/**
	 * Set the database table.
	 *
	 * @return string
	 */
	protected $table = 'tickets';

	/**
	 * Mass-assign fields.
	 *
	 * @return array
	 */
	protected $fillable = ['title', 'description', 'publish', 'creator_id', 'category', 'status'];
}
