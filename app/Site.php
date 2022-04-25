<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $primaryKey = 'site_id';
    public $table = 'sites';
    public $timestamp = false;
}
