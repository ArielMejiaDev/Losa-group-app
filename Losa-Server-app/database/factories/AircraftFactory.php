<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Aircraft;
use Faker\Generator as Faker;

$factory->define(Aircraft::class, function (Faker $faker) {
    $aircraftsType = ['Avion', 'Avioneta', 'Helicoptero'];
    return [
        'name' => $aircraftsType[rand(0, 2)],
        'passengers' => $faker->numberBetween(4, 30),
        'plates' => $faker->text(10, false),
        'image' => asset('images/airplane.jpg'),
        'calendar_id' => '9omoscnnso013ga53q89n4mtuk@group.calendar.google.com'
    ];
});
