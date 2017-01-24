<?php defined ('BASEPATH') or exit('No dirct script access allowed"'); 

use Illuminate\Database\Eloquent\Model;

/**
 * Abilities Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Abilities extends Model 
{
	/** 
	 * Set the database table. 
	 * 
	 * @return string
	 */ 
	protected $table = 'abilities';

	/**
     * Set the database connection. 
     * 
     * @return string
     */
    protected $connection = 'utility';

	/**
	 * Enable / Disable timestamps 
	 * 
	 * @return bool
	 */
	public $timestamps = true;

	/**
	 * Mass-assign fields 
	 * 
	 * @return array 
	 */ 
	protected $fillable = ['name', 'description']; 
}
