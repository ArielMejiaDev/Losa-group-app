<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralContact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'celular', 'email'
    ];
}
