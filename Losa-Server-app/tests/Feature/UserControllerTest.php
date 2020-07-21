<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;
use App\User;

class UserControllerTest extends TestCase
{
    /**
     * Tests a users index availability
     *
     * @return void
     */
    public function testUsersIndexAvailability()
    {
        $user = $this->createUser();
        $this->be($user);
        $this->actingAs($user)->get('/admin/users')->assertStatus(200);
    }

    /**
     * Tests a single sync
     * 
     * @return void
     */
    public function testUsersSyncWithCrm()
    {
        $contact = $this->createContactInCrm();
        $provider = new CrmProvider;
        $provider->syncAllContacts();
        $user = User::where('email', '=', $this->mockUserData['emailaddress1'])->first();

        $this->get("/api/v1/profile/$user->id", $this->headers)->assertJson([
            'name' => $this->mockUserData['firstname'] . ' ' . $this->mockUserData['lastname'] 
        ]);
        $this->deleteContactFromCrm($contact);
    }

}
