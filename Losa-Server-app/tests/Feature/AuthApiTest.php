<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;
use App\User;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test user auth with API.
     *
     * @return void
     */
    public function testApiAuth()
    {
        $contactid = $this->createContactInCrm();

        $provider = new CrmProvider;
        $provider->syncAllContacts();

        $user = User::where('email', '=', $this->mockUserData['emailaddress1'])->first();

        $response = $this->withHeaders($this->headers)->json('POST', $this->loginUrl, [
            'email'     =>  $user->email,
	        'password'  =>  $this->mockUserData['password']
        ]);

        $response->assertStatus(200)->assertJson([
            'authenticated' => true,
            'data' => [
                'id' => $user->id, 
            ]
        ]);

        $this->deleteContactFromCrm($contactid);
    }
    
}
