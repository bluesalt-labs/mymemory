<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('auth:api');
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
