<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * News categories Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class NewsCategories extends Model 
{
	/**
	 * Set the database table name. 
	 * 
	 * @var string
	 */
	protected $table = 'categories'; 

	/**
	 * Set the mass-assign fields. 
	 * 
	 * @var array
	 */
	protected $fillable = ['creator_id', 'category', 'description'];

	/**
	 * Enable or disable timestamps. 
	 * 
	 * @return bool
	 */
	public $timestamps = true; 

	/**
	 * Get tha articles for a specific label. 
	 * 
	 * @return Collection|BelongsToMany relationship.
	 */ 
	public function articles() 
	{
		return $this->BelongsToMany('Articles', 'pivot_news_categories', 'category_id', 'news_id')
			->withTimestamps();
	}
}
