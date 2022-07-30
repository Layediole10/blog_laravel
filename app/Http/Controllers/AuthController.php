<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){

        return view('login');
    }

    public function login(Request $request){

        $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        // $credentials['activate']= true;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'activate' => 1])) {

            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        return "Error of connection";
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate(); 
        return redirect()->intended('/login');

    }
}
