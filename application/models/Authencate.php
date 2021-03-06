<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes; 

    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'users';
    
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        return $this->belongsToMany('Points', 'activisme_be_activisme_zeverij.pivot_ranking', 'sportsmen_id', 'creator_id')
            ->withTimestamps();
    }
}
