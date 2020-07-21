<?php

use Illuminate\Database\Seeder;
use App\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Property::class)->create([
            'name'                  => 'Apartamento 1025',
            'address'               => '151 Crandon Blvd., Key Biscayne, Fl. 33149 Apto 1025, Emerald Bay',
            'parking'               => 'J17 , J19',
            'maintenance_person'    => 'Orly',
            'maintenance_phone'     => '+17862177427',
            'reception_phone'       => '+13053615733',
            'wifi_password'         => 'IGBOSCH1931',
            'image'      => 'miami.jpg',
        ]);

        factory(Property::class)->create([
            'name'                  => 'Apartamento 623',
            'address'               => '151 Crandon Blvd., Key Biscayne, Fl. 33149 Apto 623, Emerald Bay',
            'parking'               => 'C83 y F59',
            'maintenance_person'    => 'Orly',
            'maintenance_phone'     => '+17862177427',
            'reception_phone'       => '+13053615733',
            'wifi_password'         => 'IGBOSCH1931',
            'image'      => 'miami.jpg',
        ]);

        factory(Property::class)->create([
            'name'                  => 'Apartamento 2302',
            'address'               => '1409 Post Oak Blvd, apt 2301, Houston TX 77056, United States',
            'parking'               => '70 Y 71',
            'maintenance_person'    => 'Patricia ($100 por visita)',
            'maintenance_phone'     => '+18324343150',
            'reception_phone'       => '+17133419852',
            'wifi_password'         => 'IGBOSCH1931',
            'image'      => 'houston.jpg',
        ]);

        factory(Property::class)->create([
            'name'                  => 'Casa Río Dulce',
            'address'               => '---',
            'parking'               => '---',
            'maintenance_person'    => '---',
            'maintenance_phone'     => '---',
            'reception_phone'       => '---',
            'wifi_password'         => '---',
            'image'                 => 'riodulce.jpg',
        ]);

        factory(Property::class)->create([
            'name'                  => 'Casa Antigua Guatemala',
            'address'               => '1 calle oriente, Calle Alameda Santa Rosa, número 28, Antigua Guatemala',
            'parking'               => '---',
            'maintenance_person'    => '---',
            'maintenance_phone'     => '+17832-0757',
            'reception_phone'       => '---',
            'wifi_password'         => 'IGBOSCH1931',
            'image'                 => 'antigua.jpg',
        ]);

    }
}
