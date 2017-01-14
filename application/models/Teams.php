<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Teams Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Teams extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'gov_unions';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name_full', 'name_abbr', 'color', 'label'];

    /**
     * Disable / Enable timestamps
     *
     * @var bool
     */
    public $timestamps = false;
}
