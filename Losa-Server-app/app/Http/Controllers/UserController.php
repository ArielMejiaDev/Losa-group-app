<?php

namespace App\Http\Controllers;

use App\GeneralContact;
use App\Http\Controllers\Providers\CrmProvider;
use App\Http\Controllers\Repositories\CrmRepository;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        $user->update(['crm_status' => 'pending']);
        
        return redirect()->route('users.index')->with('status', __('User Created').'!');
    }

    /**
     * Show Property object properties to load in form
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the object in DB
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(UserRequest $request, User $user)
    {
        $generalContact = (new GeneralContact)->whereName($user->name)->first();
        if (!is_null($generalContact)) {
            $generalContact->update([
                'name'      =>  $request->name,
                'celular'   =>  $request->celular
            ]);   
        }
        $request->request->add(['crm_status' => 'pending']);
        $user->update($request->all());
        return redirect()->route('users.index')->with('status', __('User Updated').'!');
    }

    /**
     * Delete a property with softDelete
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', __('User Deleted') . '!');
    }
    
}
