<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class IncomeController extends Controller
{
    public function index()
    {
        // $allIncome = Income::all();
        $allTransaction = Transactions::where('transaction_type_id', 1)->get();

        return view('allIncome', ['allTransaction' => $allTransaction]);
    }
}
