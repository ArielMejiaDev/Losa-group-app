<?php namespace App\Http\Controllers;

use App\Property;
use App\Http\Controllers\Repositories\GoogleCalendarEventsRepository;

class PropertyApiController extends Controller
{
    protected $calendarRepository;

    public function __construct(GoogleCalendarEventsRepository $repository)
    {
        $this->calendarRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Property::all() );
        return $this->repository->getPropertyList();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $calendarId = $property->calendar_id;
        $calendarEvents = $this->calendarRepository->getEvents($calendarId);
        return response()->json($calendarEvents, 200);
    }

}
