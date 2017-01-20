<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Sportsment Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Sportsmen extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'gov_members';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['Name', 'Function', 'Union_id', 'Documentation'];

    /**
     * Disable / Enable timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relationship for connecting the sportmen t(o his team.
     *
     * @return belongsTo relationship.
     */
    public function union()
    {
        return $this->belongsTo('Teams', 'Union_id');
    }

    /**
     *
     *
     * @return  BelongsToMany relationship
     */
    public function items()
    {
        return $this->belongsToMany('Points', 'pivot_items', 'sportsmen_id', 'item_id')
            ->withPivot('creator_id')
            ->withTimestamps();
    }

    /**
     * Relation for the score mechanics
     *
     * @return  BelongsToMany relationship
     */
    public function points()
    {
        return $this->belongsToMany('Points', 'pivot_ranking', 'sportsmen_id', 'item_id')
            ->withPivot('user_id')
            ->withTimestamps();
    }
}
