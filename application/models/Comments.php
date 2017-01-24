<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Comments Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Comments extends Model 
{
	/** 
	 * Set the database table used. 
	 * 
	 * @return string
	 */ 
	protected $table = 'news_comments'; 

	/** 
	 * Set mass-assign fields.
	 * 
	 * @return array
	 */
	protected $fillable = ['user_id', 'comment']; 

	/** 
	 * Enable / Disable timestamps. 
	 * 
	 * @return bool 
	 */ 
	public $timestamps = true; 

	/**
     * Get the comments for a news article.
     *
     * @return belongsToMany relationship.
     */
    public function reactions()
    {
    	return $this->belongsToMany('Articles', 'pivot_comments', 'comment_id', 'post_id')
        	->withTimestamps();
    }

    /**
     * Get al the reports for a reaction. 
     * 
     * @return belongsToMany relationship.
     */
    public function reports() 
    {
    	return $this->belongsToMany('Reports', 'pivot_reaction_report', 'comment_id', 'report_id')
	 		->withTimestamps();
    }
}
