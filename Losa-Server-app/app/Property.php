<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SqlServerGetDateFormat, SearchableTrait, SoftDeletes;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'properties.name' => 10,
            // 'properties.address' => 9,
            // 'properties.parking' => 8,
            // 'properties.rooms' => 8,
            // 'properties.beds' => 8,
            'properties.maintenance_person' => 9,
            // 'properties.wifi_network' => 6,
        ]
    ];

    protected $table = 'properties';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 
        'address', 
        'parking', 
        'rooms', 
        'beds', 
        'maintenance_person', 
        'maintenance_phone', 
        'reception_phone',
        'maps_link',
        'wifi_network', 
        'wifi_password', 
        'image',
        'info_phone',
        'calendar_id'
    ];
    
    public function schedules()
    {
        return $this->hasMany(PropertySchedule::class);
    }

}
