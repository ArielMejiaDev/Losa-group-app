<?php namespace App\Http\Controllers\Repositories;

use Spatie\GoogleCalendar\Event;
use App\Http\Controllers\Formatters\EventsFormatter;
use App\Http\Controllers\Validators\GoogleEventValidator;
use Carbon\Carbon;

class GoogleCalendarEventsRepository
{

    protected $formatter;
    protected $validator;

    public function __construct(EventsFormatter $formatter, GoogleEventValidator $validator)
    {
        $this->formatter = $formatter;
        $this->validator = $validator;
    }

    /**
     * Get a collection of Google Events objects
     *
     * @param string $calendar_id
     * @return \Illuminate\Support\Collection $customCollection
     */
    public function getEvents($calendar_id)
    {

        $googleEvents = collect(Event::get(null, null, [], $calendar_id));
        $customCollection = collect();

        foreach ($googleEvents as $googleEvent) {

            $duration = $this->formatter->getEventDuration($googleEvent);
            
            if ($duration > 1) {

                if ($this->dateTimeIsNull($googleEvent)) {
                    $duration = $duration - 1;
                }

                for ($i=0; $i <= $duration; $i++) {
                    $customItemCollection = $this->createMultipleEvent($googleEvent, $i);
                    $customCollection->push(collect($customItemCollection));
                }

            }else {
                $customItemCollection = $this->createEvent($googleEvent);
                $customCollection->push(collect($customItemCollection));
            }

        }

        return $customCollection;

    }

    /**
     * Add event to array
     *
     * @return array
     */
    public function createEvent($googleEvent)
    {
        $customItemCollection = [];
        $eventArray = [];
        $customItemCollection['date']                   =   $this->formatter->prettyDateKey($googleEvent->start);
        $eventArray['id']            =   $googleEvent->id;
        $eventArray['etag']          =   $this->formatter->prettyEtag($googleEvent->etag);
        $eventArray['dateStart']     =   $this->formatter->prettyDate($googleEvent->start);
        $eventArray['timeStart']     =   $this->formatter->prettyStartTime($googleEvent->start);
        $eventArray['dateEnd']       =   $this->formatter->prettyDate($googleEvent->end);
        $eventArray['timeEnd']       =   $this->formatter->prettyEndTime($googleEvent->end);
        $customItemCollection['event'][] = $eventArray;
        return $customItemCollection;
    }

    /**
     * Generate a event from a chain of multiple events to be added in a loop
     *
     * @return array
     */
    public function createMultipleEvent($googleEvent, $i = 1)
    {
        $customItemCollection = [];
        $eventArray = [];
        $customItemCollection['date']                   =   substr(Carbon::createFromFormat('Y-m-d', $this->formatter->prettyDateKey($googleEvent->start))->addDays($i)->toDateTimeString(), 0, 10);
        $eventArray['id']            =   $googleEvent->id;
        $eventArray['etag']          =   $this->formatter->prettyEtag($googleEvent->etag);
        $eventArray['dateStart']     =   $this->formatter->prettyDate($googleEvent->start);
        $eventArray['timeStart']     =   $this->formatter->prettyStartTime($googleEvent->start);
        $eventArray['dateEnd']       =   $this->formatter->prettyDate($googleEvent->end);
        $eventArray['timeEnd']       =   $this->formatter->prettyEndTime($googleEvent->end);
        $customItemCollection['event'][] = $eventArray;
        return $customItemCollection;
    }

    // THIS GOES IN VALIDATOR NOT HERE
    /**
     * Get Google event
     *
     * @return boolean
     */
    public function dateTimeIsNull($googleEvent)
    {
        return $googleEvent->start->dateTime === null;
    }

    /**
     * Get all ids from model
     * 
     * @return array
     */
    public function getTotalEventsFrom($model)
    {
        $collection = $model->pluck('calendar_id', 'name');
        $names = collect();
        $values = collect();
        $collection->each(function($id, $name) use($names, $values){
            $names->push( $name );
            $values->push( Event::get(null, null, [], $id)->count() );
        });
        return ['names' => $names, 'values' => $values];
    }

}