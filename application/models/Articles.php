<?php defined('BASEPATH') OR exit('no direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Post (news) Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Articles extends Model
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'new_items';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'heading', 'message'];

    /**
     * Enable / Disable timestamps
     *
     * @var bool
     */
   	public $timestamps = true;

   	/**
   	 * Get the creator information about a blog post.
   	 *
   	 * @return to belongsTo relationship.
   	 */
   	public function author()
   	{
   		return $this->belongsTo('Authencate', 'creator_id');
   	}

    public function categories() 
    {
      return $this->belongsToMany('NewsCategories', 'pivot_nems_categories', 'post_id', 'category_id')
        ->withTimestamps();
    }

    /**
     * Get the comments for a news article.
     *
     * @return belongsToMany relationship.
     */
    public function comments()
    {
      return $this->belongsToMany('Comments', 'pivot_comments', 'post_id', 'comment_id')
        ->withTimestamps();
    }
}
