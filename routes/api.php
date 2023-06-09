<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// TODO: refactor naming
Route::get('transactions', [\App\Http\Controllers\TransactionController::class, 'transactions']);
Route::post('transaction', [\App\Http\Controllers\TransactionController::class, 'add']);
Route::get('quotes', [\App\Http\Controllers\TransactionController::class, 'getQuotes']);
