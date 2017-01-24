<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Authencation Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Authencate extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Set the database connection. 
     * 
     * @return string
     */
    protected $connection = 'utility';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['ban_id', 'username', 'password', 'blocked', 'email', 'name'];

    /**
     * Disable / Enable timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Permissions data relation for the user.
     *
     * @return array|collection
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', 'login_permissions', 'login_id', 'permissions_id')
            ->withTimestamps();
    }

    /**
     * Abiltiess data relation for the user.
     *
     * @return array|collection
     */
    public function abilities()
    {
        return $this->belongsToMany('Abilities', 'login_abilities', 'login_id', 'ability_id')
            ->withTimeStamps();
    }

    public function ban()
    {
        return $this->belongsTo('Ban', 'ban_id');
    }

    public function items()
    {
        return $this->belongsToMany('Points', 'pivot_ranking', 'sportsmen_id', 'creator_id')
            ->withTimestamps();
    }
}
