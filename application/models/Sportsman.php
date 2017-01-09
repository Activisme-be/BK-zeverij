<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['name_full', 'name_abbr', 'color'];

    /**
     * Disable / Enable timestamps
     *
     * @var bool
     */
    public $timestamps = false;
}
