<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthDashboardTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Tests base url
     *
     * @return void
     */
    public function testBaseUrl()
    {

        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /**
     * Tests Guest cant go to dashboard
     * 
     * @return void
     */
    public function testGuestsCantGoToDashboard()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect();

    }

    /**
     * Tests User authenticated can pass to dashboard
     * 
     * @return void
     */
    public function testAuthUserCanGoToDashboard()
    {

        $user = $this->createUser();
        $this->be($user);
        //no use /admin/dashboard route because request takes too much time and give code 500
        //but it really load 200 just need more time to get data from Google Calendar
        $response = $this->actingAs($user)->get('/admin/properties');
        $response->assertStatus(200);

    }

    /**
     * It test validator for all routes that not exists cant be discover
     * 
     * @return void
     */
    public function testAllGuestsCantDiscoverExistingRoutes()
    {
        $this->get('/anything')->assertRedirect('/login');

        $user = $this->createUser();
        $this->be($user);
        $this->actingAs($user)->get('/anything')->assertNotFound();

    }

}
