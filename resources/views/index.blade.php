@extends('layouts.layout')
@section('content')    

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-23">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="d-flex justify-content-center align-items-center">
           <h1>Expense tracker</h1> {{-- $quoteApi --}} 
           <div class="income-expense d-flex flex-row bd-highlight mb-3 ">
               <div class="total-income">
                   <h3>INCOME - R {{ $allIncome }} / Remaining {{ $remainingBalance }} </h3><span class=""><a href="/income">view all income</a></span>
            </div>
             
            <div class="total-expenses"><h3>EXPENSES - R <span>{{ $totalExpense }}</span></h3>
                <span class=""><a href="/expenses">view all expenses</a></span>
            </div>
               
        </div>        
        <hr>
        {{ session('messg') }}
        <h3> Add a transaction</h3>
        <form action="/home" method="POST">
            @csrf
            <label for="transaction_name">Transaction Name </label>
            <input type="text" name="transaction_name" placeholder="Name the trasaction"><br>
            <label for="transaction_amount"> Transaction Amount</label>
            <input type="decimal" name="transaction_amount" placeholder="Enter amount"><br>
            <label for="transaction_type">Transaction Type</label>
            <select name="transaction_type">
                <option value="1">Income</option>
                <option value="2">Expense</option>
            </select><br>
            <label for="transaction_description"> Transaction description</label><br>
            <textarea name="transaction_description" id="" cols="30" rows="3"></textarea>
            <br>
            <br>
            <input name="save_transacction" type="submit" value="Save Transaction">
            <br>
        </form>
        <hr>
        <h3>Mini Statement</h3><span>recent transaction</span>
        
        <table>
            <thead>
            <th>Transaction name</th>
            <th>Transaction amout</th>
            <th>Transaction Type</th>
            <th>Transaction description</th>
            <th>Transaction date</th>
        </thead>
        <tbody>
            @foreach ( $miniStatement as $statement )            
            <tr>
                <td>{{ $statement->transaction_name }}</td>
                <td>@if ($statement->transaction_type_id == 2)
                    -
                @endif R {{ $statement->transaction_amount }} </td>
                <td>
                    @if ($statement->transaction_type_id > 1)
                    Expense 
                    @else Income
                    @endif 
                </td>
                <td>{{ $statement->transaction_description }}</td>
                <td>{{ $statement->transaction_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
        <a href="/fullStatement">View full Statement</a>
        </div>
    </div>
@endsection