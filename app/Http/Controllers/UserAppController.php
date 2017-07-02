<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAppController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Show the application dashboard.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-app', ['user' => $this->user]);
    }
}
