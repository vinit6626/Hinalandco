<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminReg extends Model
{
    
    protected $primaryKey = 'id';
    public $table = 'admins';
    public $timestamp = false;
}
