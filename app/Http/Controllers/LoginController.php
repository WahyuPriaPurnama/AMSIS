<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function processLogin(Request $request)
    {
        $username = $request->validate([
            'username' => 'required'
        ]);
        $validUsername = ['admin', 'hrd'];
        if (in_array($request->username, $validUsername)) {
            session(['username' => $request->username]);
            return redirect()->route('employees.index');
        } else {
            return back()->withInput()->with('alert', 'username tidak valid');
        }
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('login')->with('alert', 'logout berhasil');
    }
}
