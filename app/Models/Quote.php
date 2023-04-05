<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public static function getCurrent($currency) {
        $quote = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=". $currency ."&tsyms=CHF");
        $quoteObject = json_decode($quote);
        dd($quoteObject->CHF);
    }
}
