<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExchangeRateService;

class getCurrentValuePerValute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:get-current-value-per-valute {valute}';

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


        dd(ExchangeRateService::getCurrentValuePerValute($this->argument('valute')));
    }
}
