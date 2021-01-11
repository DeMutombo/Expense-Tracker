<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fullStatementController extends Controller
{
    public function index()
    {
        return view('fullStatement');
    }
}
