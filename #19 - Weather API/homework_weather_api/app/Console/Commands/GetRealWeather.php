<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchroonize real life weather with our application using the Open API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $data = json_decode(Http::get(env('API_URL').'/v1/forecast.json',[
            'Content-Type' => 'application/json',
            'key'          => env('API_KEY'),
            'q'            => $this->argument('city'),
            'aqi'          => 'no',
            'days'         => 14
        ])->body(),true);

        !key_exists('error',$data)?$this->output->info(json_encode($data)):$this->output->error($data['error']['message']);

    }
}
