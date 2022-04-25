<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use DB;
use Validator;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void 
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function login_form()
    {
        return view('login.login');
    }
    public function checklogin(Request $request)
    {
        $user = array("email"=>$request->email,"password"=>$request->password);

        if(Auth::attempt($user))
        {
            return redirect()->intended('dash');
        }
        else
        {
            return redirect('loginuser')->with('error','Plz enter valid email and password');
        }
    }
    public function getprofile()
    {
        return view('dashboard.dashboard');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('loginuser');
    }
}

