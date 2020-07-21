<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\NewItem;
use Faker\Generator as Faker;

$factory->define(NewItem::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10, false),
        'description' => $faker->text(35, false),
        'published_at' => $faker->dateTime,
        'source' => $faker->text(10, false)
    ];
});
