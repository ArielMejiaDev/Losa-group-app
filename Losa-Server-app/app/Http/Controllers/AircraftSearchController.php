<?php

namespace App\Http\Controllers;

use App\Aircraft;
use App\Http\Controllers\Searchable\Searchable;
use Illuminate\Http\Request;

class AircraftSearchController extends Controller
{

    /**
     * It returs the results from users search paginated
     * 
     * @param string $needle
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function show(Request $request)
    {
        $query = Searchable::query();
        $aircrafts = Aircraft::search($query)->paginate(10);
        return view('aircrafts.search', compact('aircrafts', 'query'));
    }

}
