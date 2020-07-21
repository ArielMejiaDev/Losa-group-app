<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;
use App\User;

class UserCredentialsValidatorTest extends TestCase
{
    use RefreshDatabase; 
    /**
     * It tests a user credential get the correct user and password
     * @test
     * 
     * @return void
     */
    public function test_user_credentials_get_correct_user_data()
    {
        $provider = new CrmProvider;
        $contact = $this->createContactInCrm();

        $provider = new CrmProvider;
        $provider->syncAllContacts();
        $user = User::where('email', '=', $this->mockUserData['emailaddress1'])->first();

        $this->json('POST', $this->loginUrl, [
            'email' => $this->mockUserData['emailaddress1'],
            'password' => 'legadof@miliar'
        ], $this->headers)->assertJson([
            'authenticated' => true,
            'data' => [
                'id' => $user->id,
            ]
        ]);

        $this->deleteContactFromCrm($contact);
    }

    /**
     * It tests user crendential cannot get user and password from fake data
     * 
     * @return void
     */
    public function test_user_credentials_cannot_get_data_from_fake_try()
    {
        $this->json('POST', $this->loginUrl, [
            'email' => 'johndoe@mail.com',
            'password' => 'userPassword'
        ], $this->headers)->assertJson([
            'authenticated' => false,
            'errors' => ['password' => 'Credenciales invalidas']
        ]);
    }

}
