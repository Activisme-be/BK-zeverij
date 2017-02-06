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
	protected $fillable = ['title', 'description', 'publish', 'creator_id', 'status'];

	/**
	 * Get the creator data for a ticket.
	 *
	 * @return Collection|BelongsTo relation.
	 */
	public function creator()
	{
		return $this->belongsTo('Authencate', 'creator_id');
	}

	/**
	 * Get the category for a ticket.
	 *
	 * @return Collection|BelongsToMany relation
	 */
	public function category()
	{
		return $this->belongsToMany('NewsCategories', 'pivot_helpdesk_category', 'ticket_id', 'category_id')
			->withTimestamps();
	}

    /**
     * Get the comments for a ticket.
     *
     * @return Collection|BelongsToMany relation
     */
    public function comments()
    {
        // TODO: Implement the table to the erd.
        
        return $this->belongsToMany('Comments', 'pivot_reactions', 'ticket_id', 'comment_id')
            ->withPivot('creator_id')
            ->withTimestamps();
    }
}
