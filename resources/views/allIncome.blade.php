@extends('layouts.layout')
@section('content')
<div class="income-expense ">
    <h3> Income statement </h3>
    {{-- <p>Income for December 2020 - </p>
    <p>Income for November 2020 - </p>
    <p>Income for January 2020 - </p> --}}
    <table> 
        <thead>
            <th>Income name</th>
            <th>Income amount</th>
            <th>Income Description</th>
            <th>Date Received</th>

            </thead> 
            <tbody>
                @foreach ( $allTransaction as $transaction)
                <tr>        
                <td> {{ $transaction->transaction_name }} </td>
                <td> R {{ $transaction->transaction_amount }} </td>
                <td> {{ $transaction->transaction_description}} </td>
                <td> {{ $transaction->transaction_date}} </td>
            </tr>
            @endforeach            
    
    </tbody>
</table>
</div>
<br>
<a href="/home"> Home</a>
@endsection