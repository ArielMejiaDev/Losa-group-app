<?php

namespace App\Http\Controllers;

use App\Aircraft;
use App\User;
use App\Property;
use App\Charts\EventsChart;
use App\Http\Controllers\Repositories\GoogleCalendarEventsRepository;

class DashboardController extends Controller
{
    protected $calendarEventsRepository;

    public $solidColors = [
        "rgba(255, 99, 132, 1.0)",
        "rgba(22,160,133, 1.0)",
        "rgba(255, 205, 86, 1.0)",
        "rgba(51,105,232, 1.0)",
        "rgba(244,67,54, 1.0)",
        "rgba(34,198,246, 1.0)",
        "rgba(153, 102, 255, 1.0)",
        "rgba(255, 159, 64, 1.0)",
        "rgba(233,30,99, 1.0)",
        "rgba(205,220,57, 1.0)"
    ];

    public $transparentColors = [
        "rgba(255, 99, 132, 0.2)",
        "rgba(22,160,133, 0.2)",
        "rgba(255, 205, 86, 0.2)",
        "rgba(51,105,232, 0.2)",
        "rgba(244,67,54, 0.2)",
        "rgba(34,198,246, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(255, 159, 64, 0.2)",
        "rgba(233,30,99, 0.2)",
        "rgba(205,220,57, 0.2)"

    ];

    public function __construct(GoogleCalendarEventsRepository $calendarEventsRepository)
    {
        $this->calendarEventsRepository = $calendarEventsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::count();
        $properties = Property::count();
        $aircrafts = Aircraft::count();

        $propertyEvents = $this->calendarEventsRepository->getTotalEventsFrom( new Property );
        $propertyNames = $propertyEvents['names'];
        $propertyValues = $propertyEvents['values'];
        $totalEvents = $propertyEvents['values']->sum();

        $propertiesChart = new EventsChart;
        $propertiesChart->minimalist(true);
        $propertiesChart->labels( $propertyNames );
        $propertiesChart->dataset('Propiedades', 'doughnut', $propertyValues )->color($this->solidColors)->backgroundcolor($this->solidColors);

        $aircraftsEvents = $this->calendarEventsRepository->getTotalEventsFrom( new Aircraft );
        $aircraftsNames = $aircraftsEvents['names'];
        $aircraftsValues = $aircraftsEvents['values'];

        $airplaneEvents = new EventsChart;
        $airplaneEvents->minimalist(true);
        $airplaneEvents->labels( $aircraftsNames );
        $airplaneEvents->dataset('Propiedades', 'bar', $aircraftsValues )->color($this->solidColors)->backgroundcolor($this->transparentColors)->fill(false);

        return view('dashboard.index', compact('users', 'properties', 'aircrafts', 'totalEvents', 'propertiesChart', 'airplaneEvents'));
    }
    



}
