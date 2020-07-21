<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSearched extends Model
{
    protected $fillable = ['summary', 'name', 'timeStart', 'timeEnd'];
}
