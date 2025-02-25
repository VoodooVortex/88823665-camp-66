<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    function index()
    {
        return view('login');
    }

    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();

        if ($user != null && Hash::check($req->password, $user->password)) {
            $req->session()->put('user', $user);
            return redirect('/users');
        } else {
            $req->session()->flash('error', 'กรุณาตรวจสอบข้อมูลอีกครั้ง');
            return redirect('/login');
        }
    }
}
