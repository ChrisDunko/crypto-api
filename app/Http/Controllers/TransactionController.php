<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function add(Request $request) {
        // TODO: enum for valid currencies
        $validated = $request->validate([
            'date' => 'required',
            'currency' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $transaction = new Transaction();
        $transaction->date = $request->input('date');
        $transaction->currency = $request->input('currency');
        $transaction->quantity = $request->input('quantity');
        $transaction->price = $request->input('price');
        return $transaction->save();
    }

    public function transactions() {
        $transactions = Transaction::getTransactions();
        return response(json_encode($transactions), 200);
    }
}
