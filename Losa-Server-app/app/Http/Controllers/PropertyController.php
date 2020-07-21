<?php namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Formatters\EventsFormatter;
use App\Http\Requests\PropertyRequest;
use App\Jobs\DeleteImageJob;
use App\Jobs\StoreImageJob;
use App\Jobs\StorePropertyJob;

class PropertyController extends Controller
{
    protected $formatter;

    public function __construct(EventsFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(5);
        return view('properties.index', compact('properties'));
    }

    /**
     * load Property create form
     *
     * @return void
     */
    public function create()
    {
        return view('properties.create', ['property' => new Property]);
    }

    /**
     * Store a Property object in DB
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if ($request->has('image')) {

            $property = Property::create($request->all());

            StoreImageJob::dispatchNow($request, $property);

            return redirect()->route('properties.index')->with('status', __('Property Created') . '!');

        }

        return back()->withInput()->withErrors( __('Image Required') );
        
    }

    /**
     * Show Property object properties to load in form
     *
     * @param Property $property
     * @return void
     */
    public function edit(Property $property)
    {
        return view('properties.edit')->with('property', $property);
    }

    /**
     * Update the object in DB
     *
     * @param Request $request
     * @param Property $property
     * @return void
     */
    public function update(Request $request, Property $property)
    {
        if ($request->has('image')) DeleteImageJob::dispatch($property->image);
        
        $property->update($request->all());

        if ($request->has('image')) {

            StoreImageJob::dispatchNow($request, $property);

        }
        
        return redirect()->route('properties.index')->with('status', __('Property Updated') . '!');
    }


    /**
     * Delete a property with softDelete
     *
     * @param Property $property
     * @return void
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('status', __('Property Deleted') . '!');
    }

}
