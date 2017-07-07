<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;


class UserAppController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('auth');
        /*
        var_dump(Auth::user());
        echo "<hr />";
        if (Auth::check()) {
            var_dump(Auth::user());
            die;
        } else {
            var_dump(array(
                'id' => null
            ));
        }
        */

    }

    /**
     *
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user-app', ['user' => $this->user]);
    }
}
