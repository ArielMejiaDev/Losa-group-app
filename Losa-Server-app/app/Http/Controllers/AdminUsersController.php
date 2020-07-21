<?php

namespace App\Http\Controllers;

use App\Jobs\SendAdminRoleInvitationEmailJob;
use App\Mail\InviteMail;
use App\User;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminUsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '=', 'admin')->paginate(10);
        return view('admin-users.index', compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin-users.create', compact('users') );
    }

    /**
     * Store a newly created resource in storage, Sends an email to envite a user to be an admin and then other controller process the invitation role change
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( ['email' => 'required|email'] );
        $user = User::whereEmail( $request->email )->firstOrFail();
        $user->update([
            'role' => 'pending'
        ]);
        SendAdminRoleInvitationEmailJob::dispatch($user);
        return redirect()->route('users.index')->with('status', __('Invitation Sent'). '!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
