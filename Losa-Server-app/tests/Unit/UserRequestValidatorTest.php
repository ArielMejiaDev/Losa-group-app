<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRequestValidatorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test User validator form request without password for API
     * 
     * @return void
     */
    public function test_user_request_validator_without_password_from_api_auth_controller()
    {
        $user = $this->createUser([
            'email' => 'usermail.com',
            'password' => bcrypt('userPassword') 
        ]);
        $data = ['email' => $user->email, 'password' => ''];
        $result = $this->json('POST', $this->loginUrl, $data, $this->headers);
        $result->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'password'  => ['El campo contraseña es obligatorio.']
            ]
        ]);
    }
    /**
     * Test User validator form request with no long enough password for API
     * 
     * @return void
     */
    public function test_user_request_validator_no_long_enough_password_from_api_auth_controller()
    {
        $user = $this->createUser([
            'email' => 'usermail.com',
            'password' => bcrypt('userPassword') 
        ]);
        $data = ['email' => $user->email, 'password' => '123'];
        $result = $this->json('POST', $this->loginUrl, $data, $this->headers);
        $result->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'password'  => ['La contraseña debe contener más de 6 caracteres']
            ]
        ]);
    }
    /**
     * Test User validator form request without email password for API
     * 
     * @return void
     */
    public function test_user_request_validator_without_email_from_api_auth_controller()
    {
        $user = $this->createUser([
            'email' => 'usermail.com',
            'password' => bcrypt('userPassword') 
        ]);
        $data = ['email' => '', 'password' => $user->password];
        $result = $this->json('POST', $this->loginUrl, $data, $this->headers);
        $result->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email'  => ['El campo correo electrónico es obligatorio.']
            ]
        ]);
    }
    /**
     * Test User validator form request without correct email format password for API
     * 
     * @return void
     */
    public function test_user_request_validator_without_correct_email_format_from_api_auth_controller()
    {
        $user = $this->createUser([
            'email' => 'user@mail.com',
            'password' => bcrypt('userPassword') 
        ]);
        $data = ['email' => 'usermail.com', 'password' => $user->password];
        $result = $this->json('POST', $this->loginUrl, $data, $this->headers);
        $result->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email'  => ['correo electrónico no es un correo válido']
            ]
        ]);
    }


}
