<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Chat;
use Laravel\User;
use Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        $users = User::all();
        return view('home', compact('users'))->withFriends($friends);
    }
}