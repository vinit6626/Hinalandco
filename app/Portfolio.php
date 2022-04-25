<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $primaryKey = 'portfolio_id';
    public $table = 'portfolios';
    public $timestamp = false;
}
