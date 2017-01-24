<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model; 

/**
 * Comment report model. 
 * 
 * @author    Tim Joosten	<Topairy@gmail.com>
 * @copyright Activisme-BE	<info@activisme.be>
 * @license   MIT license	
 * @since     2017
 * @package   BK-wansmaak
 */ 
class Reports extends Model 
{
	/**
	 * Set the database table used. 
	 * 
	 * @return string
	 */
	protected $table = 'reactions_reports'; 

	/**
	 * Set mass-assign fields. 
	 * 
	 * @return array
	 */
	protected $fillable = ['user_id', 'reason'];

	 /**
	  * Enable / Disable the timestamps. 
	  * 
	  * @return bool
	  */
	 public $timestamps = true; 

	 /**
	  * Report a reaction relation. 
	  * 
	  * @return belongsToMany relationship. 
	  */
	 public function reportReaction() 
	 {
	 	return $this->belongsToMany('Comments', 'pivot_reaction_report', 'report_id', 'comment_id')
	 		->withTimestamps();
	 }

}
