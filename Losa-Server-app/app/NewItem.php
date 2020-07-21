<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'published_at',
    ];
}
