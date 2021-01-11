<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class fullStatementController extends Controller
{
    public function index()
    {
        $allTransaction = Transactions::all();
        return view('fullStatement')->with('allTransaction', $allTransaction);
    }
}
