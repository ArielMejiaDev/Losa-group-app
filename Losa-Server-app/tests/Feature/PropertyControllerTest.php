<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Validators\GoogleEventValidator;
use App\Http\Controllers\Formatters\EventsFormatter;
use App\Http\Controllers\Providers\GoogleCalendarEventsProvider;

class PropertyControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * It tests a user logged go to admin/properties and see created properties
     * 
     * @return void
     */
    public function test_logged_users_can_view_properties()
    {
        $property = $this->createProperty();
        $user = $this->createUser();
        $this->be($user);
        $this->actingAs($user)->get('/admin/properties')->assertStatus(200)->assertSee($property->name);
    }

    /**
     * It tests a user logged go to admin/properties and if no props in DB see advice
     * 
     * @return void
     */
    public function test_logged_users_can_view_advice_if_property_table_is_empty()
    {
        $user = $this->createUser();
        $this->be($user);
        $this->actingAs($user)->get('/admin/properties')->assertStatus(200)->assertSee('No hay propiedades disponibles');
    }

    /* -------------------------------- API TEST -------------------------------- */

    /**
     * It tests a property list API
     * 
     * @return void
     */
    public function test_properties_list_api_endpoint()
    {
        $property = $this->createProperty();
        $this->get('/api/v1/properties', $this->headers)->assertStatus(200)->assertJson([
            [
                "id" => $property->id,
                "name" => $property->name,
                "address" => $property->address,
                "parking" => $property->parking,
                "rooms" => $property->rooms,
                "beds" => $property->beds,
                "maintenancePerson" => $property->maintenancePerson,
                "maintenancePhone" => $property->maintenancePhone,
                "mapsLink" => $property->mapsLink,
                "wifiNetwork" => $property->wifiNetwork,
                "wifiPassword" => $property->wifiPassword,
                "imageUrlRelative" => $property->imageUrlRelative,
                "imageUrlAbsolute" => $property->imageUrlAbsolute,
                "infoPhone" => $property->infoPhone,
                "receptionPhone" => $property->receptionPhone,
                "calendarId" => $property->calendarId,
                "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', $property->updated_at, 'America/Guatemala')->format('Y-m-d H:i:s'),
                "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $property->created_at)->format('Y-m-d H:i:s'),
            ]
        ]);
    }

    /**
     * It tests a property event in API
     * 
     * @return void
     */
    public function test_properties_event_list_api_endpoint()
    {
        $property = $this->createProperty(['calendarId' => env('GOOGLE_CALENDAR_ID')]);

        $this->createGoogleEvent();
        $fetchedEvent = $this->getGoogleEventObject($this->getGoogleEventId());
        $validator = new GoogleEventValidator;
        $formatter = new EventsFormatter($validator);
        $provider = new GoogleCalendarEventsProvider($formatter, $validator);
        $prettyFormattedEvent = $provider->createEvent($fetchedEvent);
        $this->get("/api/v1/properties/events/{$property->id}", $this->headers)->assertStatus(200)->assertJson([$prettyFormattedEvent]);
        $this->deleteGoogleEvent($fetchedEvent->id);
    }

    //TODO ADD A CALENDAR FOR TESTS AND THIS CALENDAR NEED TO BE SHARED WITH ME AND GET THE CALENDAR ID AND CHANGE IT IN ENV FILE

}
