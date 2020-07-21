<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'              => 'Ariel Salvador',
            'email'             => 'ariel@buildawow.com',
            'password'          => bcrypt(12345678),
            "contact_id"        => "---",
            "dpi"               => "---",
            "licencia_conducir" => "---",
            "visa"              => "---",
            "pasaporte"         => "---",
            "seguro_vida"       => "---",
            "seguro_medico"     => "---",
            "tipo_sangre"       => "---",
            "contacto_losa"     => "---",
            "celular"           => "---",
            'role'              => 'admin'
        ]);

        factory(User::class)->create([
            'name'              => 'Christian Saravia',
            'email'             => 'christian@buildawow.com',
            'password'          => bcrypt(12345678),
            "contact_id"        => "---",
            "dpi"               => "---",
            "licencia_conducir" => "---",
            "visa"              => "---",
            "pasaporte"         => "---",
            "seguro_vida"       => "---",
            "seguro_medico"     => "---",
            "tipo_sangre"       => "---",
            "contacto_losa"     => "---",
            "celular"           => "---"
        ]);
        factory(User::class)->create([
            "name"              => "User Demo",
            "email"             => "app@losagroup.co",
            "password"          => bcrypt("Losa2018"),
            'role'              => 'admin',
            "contact_id"        => "---",
            "dpi"               => "---",
            "licencia_conducir" => "---",
            "visa"              => "---",
            "pasaporte"         => "---",
            "seguro_vida"       => "---",
            "seguro_medico"     => "---",
            "tipo_sangre"       => "---",
            "contacto_losa"     => "---",
            "celular"           => "---"
        ]);
    }
}
