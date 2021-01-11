<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class ExpenseController extends Controller
{
    public function index()
    {   // $allExpenses = Expense::all();
        $allExpenses = Transactions::where('transaction_type_id', 2)->get();

        return view('allExpenses', ['allExpenses' => $allExpenses]);
    }
}
