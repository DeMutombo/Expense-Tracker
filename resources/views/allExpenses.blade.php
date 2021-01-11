@extends('layouts.layout')
@section('content')
<div>
    <h3> All Expenses list</h3>
    <table> 
        <thead>
            <th>Expense name</th>
            <th>Expense amount</th>
            <th>Expense Description</th>
            <th>Date Used</th>

            </thead> 
                <tbody>
                    @foreach ( $allExpenses as $expense)
                    <tr>        
                        <td>{{ $expense->transaction_name  }}</td>
                        <td>{{ $expense->transaction_amount }}</td>
                        <td>{{ $expense->transaction_description }}</td>
                        <td>{{ $expense->transaction_date }}</td>
                    </tr>
                @endforeach            
    
            </tbody>
    </table>
    <br>
<a href="/home"> Home</a>
    <hr>
</div>
@endsection