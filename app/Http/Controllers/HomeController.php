<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');//GitUI: rename for testing merge conflict.
    }
}
