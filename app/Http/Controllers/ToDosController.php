<?php

namespace App\Http\Controllers;

use App\ToDo;

class ToDosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}