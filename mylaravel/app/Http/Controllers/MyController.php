<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function myFunction(Request $req)
    {
        $data['multiplier'] = $req->input('numbers');

        return view('myview', $data);
    }
}
