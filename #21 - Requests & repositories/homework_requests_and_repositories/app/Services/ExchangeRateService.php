<?php


namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ExchangeRateService{
    public static function getCurrentValuePerCurrency($currency){
        return json_decode(Http::get('https://kurs.resenje.org/api/v1/currencies/'.$currency.'/rates/'.Carbon::now()->format('Y-m-d')),true);
    }
}