<?php

namespace App\Http\Controllers;

use App\Note;

class NotesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}