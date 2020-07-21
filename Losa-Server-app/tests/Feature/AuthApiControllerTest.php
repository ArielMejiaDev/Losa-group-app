<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthApiControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * It test a register user with credentials can authenticate to API.
     *
     * @return void
     */
    public function test_user_registered_can_authenticated_with_api()
    {
        $user = $this->createUser([
            'password' => bcrypt('userPassword')
        ]);

        $response = $this->withHeaders($this->headers)
        ->json('POST', $this->loginUrl, [
            'email'     => $user->email,
            'password'  => 'userPassword'
        ]);

        $response->assertJson([
            'authenticated' => true
        ]);

    }

    /**
     * It test a guest cannot get authenticated to API
     * 
     * @return void
     */
    public function test_guests_cannot_authenticated_with_api()
    {
        $this->json('POST', $this->loginUrl, [], $this->headers)
        ->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email'     => ['El campo correo electrónico es obligatorio.'],
                'password'  => ['El campo contraseña es obligatorio.']
            ]
        ]);
    }


}
