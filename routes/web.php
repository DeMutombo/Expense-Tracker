<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\fullStatementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [TransactionsController::class, 'index']);
Route::get('/income', [IncomeController::class, 'index']);
Route::get('/expenses', [ExpenseController::class, 'index']);
Route::get('/fullStatement', [fullStatementController::class, 'index']);
Route::post('/home', [TransactionsController::class, 'store']);
