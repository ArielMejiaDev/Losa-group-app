<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {

    return [
        'name'                  =>     '---',
        'address'               =>     '---',
        'parking'               =>     '---',
        'rooms'                 =>     '---',
        'beds'                  =>     '---',
        'maintenance_person'    =>     '---',
        'maintenance_phone'     =>     '---',
        'reception_phone'       =>     '---',
        'maps_link'             =>     'https://goo.gl/maps/hRswdge8CB1U32Kp7',
        'wifi_network'          =>     '---',
        'wifi_password'         =>     '---',
        'image'                 =>     '---',
        'info_phone'            =>     '---',
        'calendar_id'           =>     '9omoscnnso013ga53q89n4mtuk@group.calendar.google.com',
    ];
});
