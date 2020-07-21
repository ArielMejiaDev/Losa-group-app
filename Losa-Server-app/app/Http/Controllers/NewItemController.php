<?php

namespace App\Http\Controllers;

use App\NewItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Repositories\GnewsRepository;
use App\Http\Controllers\Validators\GnewsItemValidator;

class NewItemController extends Controller
{

    
    protected $gNewsRepository;

    public function __construct(GnewsRepository $gNewsrepository)
    {
        $this->gNewsRepository = $gNewsrepository;
    }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        $news = $this->gNewsRepository->getNews($topic, 5);
        return response()->json($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewItem  $newItem
     * @return \Illuminate\Http\Response
     */
    public function edit(NewItem $newItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewItem  $newItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewItem $newItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewItem  $newItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewItem $newItem)
    {
        //
    }
}
