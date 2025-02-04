<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    function edit($id)
    {
        $users = User::find($id);
        return view('user.edit', ['users' => $users]);
    }

    function edit_action(Request $req)
    {
        $muser = User::find($req->id);
        $muser->name = $req->input('name');
        $muser->email = $req->email;
        $muser->password = $req->password;
        $muser->save();
        return redirect('/user');
    }

    function delete_user(Request $req)
    {
        $muser = User::find($req->id);
        $muser->delete();
        return redirect('/user');
    }
}
