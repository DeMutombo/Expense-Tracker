@extends('layouts.layout')
@section('content')
<h3> All Transactions </h3>
{{-- {{ $allTransaction }} --}}

<table>
    <thead>
        <thead>
            <th>ID</th>
            <th>Transaction name</th>
            <th>Transaction Amount</th>
            <th>Transaction type</th>
            <th>Transaction Description</th>
            <th>Transaction Date</th>
        </thead>
        <tbody>
            @foreach ($allTransaction as $transaction )

            <tr><td>{{ $transaction->id }}</td>
                <td>{{ $transaction->transaction_name }}</td>
                
                <td>@if ($transaction->transaction_type_id == 1)
                 R {{ $transaction->transaction_amount }}
                @else 
                - R {{ $transaction->transaction_amount }}
                @endif</td>
                <td>{{ $transaction->transaction_name }}</td>
                <td>{{ $transaction->transaction_description}}</td>
                <td>{{ $transaction->transaction_date}}</td>
            </tr>
    
@endforeach
            
        </tbody>
    </thead>
</table>
<a href="/home"> Home</a>
@endsection