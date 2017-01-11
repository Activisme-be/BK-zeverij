<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Class applications
 */
class Permissions extends Eloquent
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'permissions';
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['role', 'description'];
    /**
     * Disable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;
}
