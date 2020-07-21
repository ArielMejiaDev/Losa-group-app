<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * It tests a User cant go to API routes
     * 
     * @return void
     */
    public function testUsersCantGoToApiAllPropertiesRoute()
    {

        $user = $this->createUser();
        $response = $this->actingAs($user)->get('/api/v1/properties');
        $response->assertJson([
            'errors' => 'Forbidden resource'
        ]);

    }

    /**
     * It tests a User dcant go to Property events API route
     * 
     * @return void
     */
    public function testUsersCantGoToApiAllPropertyEventsRoute()
    {
        
        $user = $this->createUser();
        $propertyId = 1;
        $response = $this->actingAs($user)->get("/api/v1/properties/events/{$propertyId}");
        $response->assertJson([
            'errors' => 'Forbidden resource'
        ]);

    }

    /**
     * It tests a User cant go to API route
     * 
     * @return void
     */
    public function testUsersCantGoToApiAllAircraftsRoute()
    {
        
        $user = $this->createUser();
        $this->be($user);
        $response = $this->actingAs($user)->get('/api/v1/aircrafts');
        $response->assertJson([
            'errors' => 'Forbidden resource'
        ]);

    }

    /**
     * It tests a User dcant go to Aircrafts events API route
     * 
     * @return void
     */
    public function testUsersCantGoToApiAllAircraftEventsRoute()
    {
        
        $user = $this->createUser();
        $aircraftId = 1;
        $response = $this->actingAs($user)->get("/api/v1/properties/events/{$aircraftId}");
        $response->assertJson([
            'errors' => 'Forbidden resource'
        ]);

    }

    /**
     * It tests a User cant go to DEBUG routes
     * 
     * @return void
     */
    public function testUsersCantGoToApiDebugPropertiesRoute()
    {
        $user = $this->createUser();
        $response = $this->actingAs($user)->get('/debug/properties');
        $response->assertNotFound();
    }

    /**
     * It tests a User cant go to DEBUG routes
     * 
     * @return void
     */
    public function testUsersCantGoToApiDebugAircraftRoute()
    {

        $user = $this->createUser();
        $this->be($user);
        $response = $this->actingAs($user)->get('/debug/aircrafts');
        $response->assertNotFound();
        
    }

}
