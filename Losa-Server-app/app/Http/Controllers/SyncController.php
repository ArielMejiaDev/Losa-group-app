<?php namespace App\Http\Controllers;

use App\Events\SyncEvent;
use App\Http\Controllers\Repositories\CrmRepository;
use App\Jobs\FillGeneralContactTableJob;

class SyncController extends Controller
{
    protected $CrmRepository;

    public function __construct(CrmRepository $repository)
    {
        $this->CrmRepository = $repository;
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sync.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        event( new SyncEvent() );
        //FillGeneralContactTableJob::dispatch();
        return redirect()->route('sync.index')->with('status', __('We will notify you by email at the end of sync process') );
    }

}
