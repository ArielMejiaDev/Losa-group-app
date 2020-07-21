<?php namespace App\Http\Controllers;

use App\GeneralContact;
use Illuminate\Http\Request;

class ContactoLosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralContact  $contactoLosa
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $contacts = GeneralContact::all();
        return $contacts; 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralContact  $contactoLosa
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactoLosa $contactoLosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralContact  $contactoLosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactoLosa $contactoLosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralContact  $contactoLosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactoLosa $contactoLosa)
    {
        //
    }
}
