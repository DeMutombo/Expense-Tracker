<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transactions;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function index()
    { // $total_expese = DB::table('expenses')->select('expense_amount')->get();
        // $total_expese = DB::table('expenses')->value(DB::raw('SUM(expense_amount)'));
        // $total_income = DB::table('incomes')->value(DB::raw('SUM(income_amount)'));
        // $miniStatement = Transactions::All();
        $data = Http::get('https://api.adviceslip.com/advice')->body();
        $miniStatement = DB::table('transactions')->orderBy('id', 'desc')->limit(5)->get();

        $allIncome = Transactions::where('transaction_type_id', 1)->value(DB::raw('SUM(transaction_amount)'));
        $allExpense = Transactions::where('transaction_type_id', 2)->value(DB::raw('SUM(transaction_amount)'));
        $balance = $allIncome - $allExpense;
        return view('index')
            ->with('totalExpense', $allExpense)
            ->with('miniStatement', $miniStatement)
            ->with('allIncome', $allIncome)
            ->with('remainingBalance', $balance)->with('quoteApi', $data);
    }
}
