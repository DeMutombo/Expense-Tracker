<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transactions;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function index()
    {
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

    public function store()
    {
        $transaction = new Transactions();

        $transaction->transaction_name = request('transaction_name');
        $transaction->transaction_amount = request('transaction_amount');
        $transaction->transaction_type_id = request('transaction_type');
        $transaction->transaction_description = request('transaction_description');
        $transaction->transaction_date = date('Y-m-d H:i:s');

        // error_log($transaction);
        $transaction->save();
        return redirect('/home')->with('alert', 'Thank you, your transaction was recorded successfully!!');
    }
}
