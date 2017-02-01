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
	protected $fillable = ['creator_id', 'module', 'category', 'description'];

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

	/**
	 * Get the creator information for the category.
	 *
	 * @return Collection|BelongsTo relation
	 */
	public function creator()
	{
		return $this->belongsTo('Authencate', 'creator_id');
	}

	/**
	 * Get all the question for aa specific category.
	 *
	 * @return Collection|BelongsToMay relationship
	 */
	public function questions()
	{
		return $this->belongsToMany('Tickets', 'pivot_helpdesk_category', 'category_id', 'ticket_id')
			->withTimestamps();
	}
}
