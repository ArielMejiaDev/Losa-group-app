<?php namespace App\Http\Controllers;

use App\Aircraft;
use App\Http\Controllers\Repositories\GoogleCalendarEventsRepository;

class AircraftApiController extends Controller
{
    protected $calendarRepository;

    public function __construct(GoogleCalendarEventsRepository $provider)
    {
        $this->calendarRepository = $provider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Aircraft::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aircraft $aircraft)
    {
        $calendar_id = $aircraft->calendar_id;
        return $this->calendarRepository->getEvents($calendar_id);
    }

}
