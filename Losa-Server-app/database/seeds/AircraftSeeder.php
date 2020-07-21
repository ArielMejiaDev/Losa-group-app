<?php

use Illuminate\Database\Seeder;
use App\Aircraft;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aircraft::class)->create([
            'name' => 'Avion Hyundai 2009'
        ]);
        factory(Aircraft::class)->create([
            'name' => 'Avioneta BMW 2018'
        ]);
        factory(Aircraft::class)->create([
            'name' => 'Helicoptero Range Rover 2016'
        ]);
        factory(Aircraft::class)->create([
            'name' => 'Helicoptero Mercedez Benz 2019'
        ]);
        factory(Aircraft::class)->create([
            'name' => 'Avioneta XYW 2015'
        ]);
    }
}
