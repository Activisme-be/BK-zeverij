<?php defined('BASEPATH') or exit('No direct script access allowed'); 

use Illuminate\Database\Eloquent\Model; 

/**
 * Sessions Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Sessions extends Model 
{
	/** 
	 * Set the database table 
	 * 
	 * @return string
	 */
	protected $table = 'sessions';

	/** 
	 * Enable or disable timestamps. 
	 * 
	 * @return bool
	 */ 
	public $timestamps = false; 

	/**
	 * mass-assign fields
	 * 
	 * @var array
	 */
	protected $fillable = ['ip_address', 'timestamp', 'data']; 
}
