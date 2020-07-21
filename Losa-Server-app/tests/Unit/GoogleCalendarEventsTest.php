<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Providers\GoogleCalendarEventsProvider;
use App\Http\Controllers\Formatters\EventsFormatter;
use App\Http\Controllers\Validators\GoogleEventValidator;

class GoogleCalendarEventsTest extends TestCase
{
    /**
     * It test calendar id exists in env file
     * 
     * @return void
     */
    public function test_calendar_id_exists_in_env_file()
    {
        $result = (env('GOOGLE_CALENDAR_ID')) ? true : false ;
        $this->assertTrue($result);
    }

    /**
     * It tests account credentials json file exists
     * 
     * @return void
     */
    public function test_google_account_credentials_json_file_exists()
    {
        $file = 'google-calendar/service-account-credentials.json';
        $this->assertTrue(Storage::exists($file));
    }

    /**
     * It tests a Google event can be fetch
     * 
     * @return void
     */
    public function test_google_event_can_be_fetch()
    {
        $this->createGoogleEvent();
        $fetchedEvent = $this->getGoogleEventObject($this->getGoogleEventId());
        $this->assertEquals('A new event', $fetchedEvent->summary);
        $this->deleteGoogleEvent($fetchedEvent->id);
    }

    /**
     * It tests google calendar event get correct format
     * 
     * @return void
     */
    public function test_google_event_can_get_pretty_format()
    {
        $this->createGoogleEvent();
        $fetchedEvent = $this->getGoogleEventObject($this->getGoogleEventId());
        $validator = new GoogleEventValidator;
        $formatter = new EventsFormatter($validator);
        $provider = new GoogleCalendarEventsProvider($formatter, $validator);
        $prettyFormattedEvent = $provider->createEvent($fetchedEvent);
        $expectedOutput = [
            "date" => $formatter->prettyDateKey($fetchedEvent->start),
            "event" => [
                [
                    "id" => $fetchedEvent->id,
                    "etag" => $formatter->prettyEtag($fetchedEvent->etag),
                    "dateStart" => $formatter->prettyDate($fetchedEvent->start),
                    "timeStart" => $formatter->prettyStartTime($fetchedEvent->start),
                    "dateEnd" => $formatter->prettyDate($fetchedEvent->end),
                    "timeEnd" => $formatter->prettyEndTime($fetchedEvent->end),
                ]
            ]
        ];
        $this->assertEquals($expectedOutput, $prettyFormattedEvent);
        $this->deleteGoogleEvent($fetchedEvent->id);
    }

}
