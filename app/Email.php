<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $primaryKey = 'email_id';
    public $table = 'emails';
    public $timestamp = false;
}
