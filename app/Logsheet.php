<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logsheet extends Model
{
 	protected $primaryKey = 'logsheet_id';
    public $table = 'logsheets';
    public $timestamp = false;
}
