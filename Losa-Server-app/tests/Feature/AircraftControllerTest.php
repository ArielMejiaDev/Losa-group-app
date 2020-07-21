<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Validators\GoogleEventValidator;
use App\Http\Controllers\Formatters\EventsFormatter;
use App\Http\Controllers\Providers\GoogleCalendarEventsProvider;

class AircraftControllerTest extends TestCase
{
    /**
     * It tests Aircraft list API
     * 
     * @return void
     */
    public function test_aircraft_list_api_endpoint()
    {
        $aircraft = $this->createAircraft();
        $expectedOutput = [
            "id" => $aircraft->id,
            "type" => $aircraft->type,
            "passengers" => $aircraft->passengers,
            "plates" => $aircraft->plates,
            "calendar_id" => $aircraft->calendar_id,
            "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', $aircraft->updated_at)->format('Y-m-d H:i:s'),
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $aircraft->created_at)->format('Y-m-d H:i:s'),
        ];
        $this->get('/api/v1/aircrafts', $this->headers)->assertJson([$expectedOutput]);
    }

    /**
     * It tests Aircraft event list API
     * 
     * @return void
     */
    public function test_aircraft_event_list_api()
    {
        $aircraft = $this->createAircraft(['calendar_id' => env('GOOGLE_CALENDAR_ID')]);
        $this->createGoogleEvent();
        $fetchedEvent = $this->getGoogleEventObject($this->getGoogleEventId());
        $validator = new GoogleEventValidator;
        $formatter = new EventsFormatter($validator);
        $provider = new GoogleCalendarEventsProvider($formatter, $validator);
        $prettyFormattedEvent = $provider->createEvent($fetchedEvent);
        $this->get("/api/v1/aircrafts/events/{$aircraft->id}", $this->headers)->assertStatus(200)->assertJson([$prettyFormattedEvent]);
        $this->deleteGoogleEvent($fetchedEvent->id);
    }

}
