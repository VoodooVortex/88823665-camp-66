<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class YokController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('yok', ['pk' => $users]);
    }

    public function add(Request $req)
    {
        $data = new User();
        $data->name = $req->namepk;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->save();

        return redirect('/yok');
    }

    public function delete(Request $req)
    {
        $users = User::find($req->id);
        $users->delete();
        return redirect('/yok');
    }
}
