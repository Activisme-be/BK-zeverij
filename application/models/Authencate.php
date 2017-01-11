<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Authencate extends Model
{
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
    protected $fillable = ['username', 'password', 'blocked', 'email', 'name'];

    /**
     * Disable / Enable timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Permissions data relation for the user.
     *
     * @return array|collection
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', 'pivot_login_permissions', 'permissions_id', 'login_id');
    }
}
