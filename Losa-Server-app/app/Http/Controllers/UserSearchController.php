<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Searchable\Searchable;
use App\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
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
        $users = User::search($query)->paginate(10);
        return view('users.search', compact('users', 'query'));
    }

}
