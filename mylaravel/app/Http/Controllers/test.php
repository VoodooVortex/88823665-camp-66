<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Psy\VarDumper\Dumper;

class test extends Controller
{
    //
    public function index()
    {
        //Display Form
        return view('text');
    }

    public function display()
    {
        $users = User::all();
        return view('textDisplay', ['user' => $users]);
    }

    public function delete(Request $req)
    {
        $users = User::find($req->id);
        $users->delete();
        return redirect('/display-test');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('edit_test', ['user' => $users]);
    }

    public function edit_action(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->save();
        return redirect('/display-test');
    }

    public function add(Request $req)
    {
        $data = new User();
        $data->name = $req->namepk;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->save();

        return redirect('/display-test');
    }
}
