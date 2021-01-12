@extends('layouts.layout')
@section('content')    

    <div class=" border border-black sm:container md:container lg:container mx-auto block bg-gray-100 p-8">
      <div class="transaction mx-auto">
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

        <div class="">
           <h1 class="text-3xl">Expense tracker</h1> {{-- $quoteApi --}} 
           
           <div class=" flex justify-center">
               <div class="total-income text-2xl  py-6 px-8 bg-purple-600 bg-opacity-75 ">
                   <div class=" flex space-x-4">
                       <div class="income flex-1"> <h3 class="space-y-4 ">INCOME - R {{ $allIncome }}</h3></div>
                   </div>
                   
                   <span class="text-xs text-gray-300 hover:text-white "><a href="/income">view all income</a></span>
               </div>
               <div class=" align-middle `text-2xl py-6 px-8 bg-red-500 bg-opacity-75 ">                  
                       <div class="text-white inline-block  ">Balance {{ $remainingBalance }} </div>
               </div>
             
                <div class="ml-4 total-expenses text-2xl  py-6 px-8 bg-purple-600 bg-opacity-75 ">
                    <h3>EXPENSES - R <span>{{ $totalExpense }}</span></h3>
                    <span class="text-xs text-gray-300 hover:text-white"><a href="/expenses">view all expenses</a></span>
                </div>
            </div>
               
        </div>        
        <hr>
        {{ session('messg') }}
        <hr>
        <br>
        <form action="/home" method="POST">
            @csrf   
          <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 md:gap-6">
              <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                  <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="transaction_name" class="block text-sm font-medium text-gray-700">Transaction Name</label>
                          <input type="text" name="transaction_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500  border py-2 pl-3 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md">
                        </div>
          
                        <div class="col-span-6 sm:col-span-3">
                          <label for="transaction_amount" class="block text-sm font-medium text-gray-700">Transaction Amount</label>
                          <input type="text" name="transaction_amount" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500  border py-2 pl-3 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md">
                        </div>          
                        <div class="col-span-6 sm:col-span-3">
                          <label for="country" class="block text-sm font-medium text-gray-700">Transaction Type</label>
                          <select id="country" name="transaction_type" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                            <option value="1">Income</option>
                            <option value="2">Expense</option>
                          </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Transaction description
                            </label>
                            <div class="mt-1">
                              <textarea id="about" name="transaction_description" rows="3" class="shadow-sm focus:ring-indigo-500 py-2 pl-3 focus:border-indigo-500 mt-1 block w-full sm:text-base border-gray-300 rounded-md" placeholder="Bought shoes in maraba"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                              Brief description of the transaction.
                            </p>
                          </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                      <button type="submit" name="save_transacction" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Transaction
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br>
        </form>  
       
          <hr>
        <h3>Mini Statement</h3><span>5 Recent transaction</span>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction name</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction amout</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction Type</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction description</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction date</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ( $miniStatement as $statement )            
                      <tr>
                          <td class="px-6 py-4 whitespace-nowrap "> {{ $statement->transaction_name }}</td>
                          <td class="px-6 py-4 whitespace-nowrap "> @if ($statement->transaction_type_id == 2)
                              -
                          @endif R {{ $statement->transaction_amount }} </td>
                          <td class="px-6 py-4 whitespace-nowrap "> 
                              @if ($statement->transaction_type_id > 1)
                              Expense 
                              @else Income
                              @endif 
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap "> {{ $statement->transaction_description }}</td>
                          <td class="px-6 py-4 whitespace-nowrap "> {{ $statement->transaction_date }}</td>
                      </tr>
                      @endforeach
        
                    <!-- More items... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <br><br>
            <a href="/fullStatement">View full Statement</a>
          
        </div>
       
  </div>
@endsection