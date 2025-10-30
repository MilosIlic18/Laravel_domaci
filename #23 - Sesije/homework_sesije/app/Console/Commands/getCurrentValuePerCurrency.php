<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use Illuminate\Console\Command;
use App\Services\ExchangeRateService;

class getCurrentValuePerCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:get-current-value-per-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        foreach(ExchangeRate::AVAILABLE_CURRENCIES as $currency){
            $exists = ExchangeRate::getCurrencyForToday($currency);
            if(!$exists){
                ExchangeRate::create([
                    'currency'  =>  $currency,
                    'value'     =>  ExchangeRateService::getCurrentValuePerCurrency($currency)['exchange_middle']
                ]);
            }
        }
            
    }
}
