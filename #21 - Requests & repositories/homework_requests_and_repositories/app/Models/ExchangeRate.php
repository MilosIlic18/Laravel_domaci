<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    //
    const TABLE = 'exchange_rates';
    const CURRENCY_EUR ='eur';
    CONST CURRENCY_RUB = 'rub';
    const CURRENCY_USD ='usd';

    const AVAILABLE_CURRENCIES =[self::CURRENCY_EUR,self::CURRENCY_USD,self::CURRENCY_RUB];

    protected $table = self::TABLE;
    protected $fillable =[
        "currency",
        "value"
    ];

    static function getCurrencyForToday($currency){
        return self::where('currency',$currency)->whereDate('created_at',Carbon::today())->first();
    }
}
