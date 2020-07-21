<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertySchedule extends Model
{

    use SqlServerGetDateFormat;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
