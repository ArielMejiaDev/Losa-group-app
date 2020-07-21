<?php

namespace App\Http\Controllers;

use App\Aircraft;
use App\Http\Requests\AircraftRequest;
use App\Jobs\DeleteImageJob;
use App\Jobs\StoreAircraftJob;
use App\Jobs\StoreImageJob;
use Symfony\Component\HttpFoundation\Request;

class AircraftController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aircrafts = Aircraft::paginate(10);
        return view('aircrafts.index', compact('aircrafts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aircraft = new Aircraft();
        return view('aircrafts.create', compact('aircraft') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->has('image')) {
            $aircraft = Aircraft::create($request->all());
            
            StoreImageJob::dispatchNow($request, $aircraft);

            return redirect()->route('aircrafts.index')->with('status', __('Aircraft Created'). '!' );
        }

        return back()->withErrors( __('Image Required') )->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function show(Aircraft $aircraft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Aircraft $aircraft)
    {
        return view('aircrafts.edit', ['aircraft' => $aircraft] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aircraft $aircraft)
    {
        if ($request->has('image')) DeleteImageJob::dispatch( $aircraft->image );

        $aircraft->update( $request->all() );

        if ($request->has('image')) {

            StoreImageJob::dispatchNow($request, $aircraft);

        }

        return redirect()->route('aircrafts.index')->with('status', __('Aircraft Updated') .'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aircraft $aircraft)
    {
        $aircraft->delete();
        return redirect()->route('aircrafts.index')->with('status', __('Aircraft Deleted') . '!' );
    }

}
