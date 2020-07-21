<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Searchable\Searchable;
use App\Property;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $query = Searchable::query();
        $results = Property::search($query)->paginate(2);
        return view('properties.search', compact('results', 'query'));
    }

}
