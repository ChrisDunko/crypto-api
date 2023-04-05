<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function add(Request $request) {
        $post = file_get_contents('php://input');
        $postObject = json_decode($post);

        $transaction = new Transaction();
        $transaction->date = $postObject->date;
        $transaction->currency = $postObject->currency;
        $transaction->quantity = $postObject->quantity;
        $transaction->price = $postObject->price;
        return $transaction->save();
    }

    public function transactions() {
        $this->getQuotes("BTC");

        $transactions = Transaction::getTransactions();
        // TODO: foreach for collections...
//        foreach ($transactions as $transaction) {
//            $transaction->currently = Quote::getCurrent($transaction->currency);
//        }
        return response(json_encode($transactions), 200);
    }

    public function getQuotes() {
        $eth = Quote::getCurrent('ETH');
        $btc = Quote::getCurrent('BTC');
        $xrp = Quote::getCurrent('XRP');

        return response($btc, 200);
    }
}
