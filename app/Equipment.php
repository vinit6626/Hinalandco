<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
	protected $primaryKey = 'equipment_id';
    public $table = 'equipments';
    public $timestamp = false;
}
