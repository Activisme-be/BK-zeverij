<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Notifications Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Notify extends Model
{
	/**
	 * Set the database table name.
	 *
	 * @var string
	 */
	protected $table = 'notifications';

	/**
	 * Set the mass-assign fields.
	 *
	 * @var array
	 */
	protected $fillable = ['creator_id', 'deliver_id', 'is_read', 'message', 'sub_message', 'link'];

	/**
	 * Enable or disable timestamps.
	 *
	 * @return bool
	 */
	public $timestamps = true;

    /**
     * Get creator information.
     *
     * @return Collection|BelongsTo relation.
     */
    public function creator()
    {
        return $this->belongsTo('Authencate', 'creator_id');
    }
}
