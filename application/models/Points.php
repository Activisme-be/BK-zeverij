<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Points Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Points extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'points';

    /**
     * Mass-assign array.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'sportsmen_id', 'point', 'status', 'media_url', 'description'];

    /**
     * Enable / Disable Timestamps
     *
     * @return bool
     */
    public $timestamps = true;

    /**
     * Item -> sportsmen id. relation.
     *
     * @return belongTo relation.
     */
    public function govMember()
    {
        return $this->belongsTo('Sportsmen', 'sportsmen_id')
            ->withTimestamps();
    }

    /**
     * Item -> creator id relation.
     *
     * @return belongsTo relation.
     */
    public function creator()
    {
        return $this->belongsTo('Authencate', 'creator_id')
            ->withTimestamps();
    }
}
