<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function add(Request $request) {
//        $validated = $request->validate([
//            'date' => 'required',
//            'currency' => 'ETH'|'BTC'|'XRP',
//            'quantity' => 'required',
//            'price' => 'required',
//        ]);
        return response('hmm...', 200);
        dd('hmm');
        $post = file_get_contents('php://input');
        $postObject = json_decode($post);


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
