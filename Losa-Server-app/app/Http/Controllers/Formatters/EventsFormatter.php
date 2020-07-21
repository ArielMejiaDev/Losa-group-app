<?php namespace App\Http\Controllers\Formatters;

use Carbon\Carbon;
use App\Http\Controllers\Validators\GoogleEventValidator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EventsFormatter
{
    protected $validator;

    public function __construct(GoogleEventValidator $validator)
    {
        $this->validator = $validator;
    }

    /* ----------------------- METHODS USED IN REFACTORING ---------------------- */

    public function setDateForApi($date)
    {
        if (strlen($date) > 10) {
            $date = substr($date, 0, 10);
        }
        return $date;
    }

    public function prettyPrintDate($date)
    {
        $date = strlen($date) > 10 ? $this->setDateForApi($date) : $date;
        return str_replace('-', '·', $this->setDateForLatinAmerica($date));
    }

    public function prettyPrintDateTime($date)
    {
        $date = substr($date, 11);
        return substr($date, 0, 8);
    }

    public function prettyEtag($etag)
    {
        return str_replace('"', "", $etag);
    }

    public function prettyDateKey($dateObject)
    {
        return $dateObject->date !== null ? $this->setDateForApi($dateObject->date) : $this->setDateForApi($dateObject->dateTime);
    }

    public function prettyDate($dateObject)
    {
        return $dateObject->date !== null ? $this->prettyPrintDate($dateObject->date) : $this->prettyPrintDate($dateObject->dateTime);
    }

    public function prettyStartTime($dateObject)
    {
        return $dateObject->dateTime !== null ? 'De: ' . $this->prettyDate($dateObject) . ' a las: ' . $this->prettyPrintDateTime($dateObject->dateTime) : $this->validator->throwError('noDateTime');
    }

    public function prettyEndTime($dateObject)
    {
        return $dateObject->dateTime !== null ? ' a: ' . $this->prettyDate($dateObject) . ' a las: ' . $this->prettyPrintDateTime($dateObject->dateTime) : '';
    }

    public function setDateForLatinAmerica($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
    }

    public function getEventDuration($googleEvent)
    {
        if ($googleEvent->end->date !== null) {
            return Carbon::parse( $googleEvent->start->date )->diff( Carbon::parse( $googleEvent->end->date ) )->days;
            //return Carbon::createFromFormat( 'Y-m-d', $googleEvent->start->date )->diff( Carbon::createFromFormat( 'Y-m-d', $googleEvent->end->date ) )->days;
        }
        return Carbon::parse( $googleEvent->start->dateTime )->diff( Carbon::parse( $googleEvent->end->dateTime ) )->days;
        //return Carbon::createFromFormat( 'Y-m-d', $googleEvent->start->dateTime )->diff( Carbon::createFromFormat( 'Y-m-d', $googleEvent->end->dateTime ) )->days;
    }

    /* --------------------- END METHODS USED IN REFACTORING -------------------- */

    /* ----------------------- FOR SEARCH BY DATES FEATURE ---------------------- */

    /**
     * create a carbon instance form date string
     *
     * @param string $date
     * @return Carbon
     */
    public function createDateFromString($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * format data to return start and end time of an event
     *
     * @param string $date
     * @return mixed-CarbonInstance/string
     */
    public function getDateFormattedToSearchByDates($date)
    {
        return $date == null ? 'Todo el dia' :
            Carbon::createFromFormat('Y-m-d', substr($date, 0, 10))
            ->isoFormat('Do MMMM YYYY'). ' a las '. substr($date, 11, 5);
    }

    /* --------------------- END FOR SEARCH BY DATES FEATURE -------------------- */

    /**
     * Make a eloquent pagination object with a collection
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Support\Collection $collection
     *
     * @return \App\Http\Controllers\Formatters\LengthAwarePaginator
     */
    public function makeCustomPagination(Request $request, Collection $collection, $resultsPerPage = 5)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage * $resultsPerPage) - $resultsPerPage, $resultsPerPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($collection), $resultsPerPage);
        return $paginatedItems->setPath($request->url());
    }

}
