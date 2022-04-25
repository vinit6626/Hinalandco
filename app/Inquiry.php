<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $primaryKey = 'inquiry_id';
    public $table = 'inquirys';
    public $timestamp = false;
}
