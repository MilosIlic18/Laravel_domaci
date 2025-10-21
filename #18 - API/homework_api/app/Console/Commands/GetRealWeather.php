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
    protected $signature = 'weather:get-real';

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
        /*$data = json_decode(Http::get('https://reqres.in/api/users?page=2')->body(),true);
        dd($data['data'][0]['email']);*/

        $data = json_decode(Http::get('http://api.weatherapi.com/v1/current.json',[
            'Content-Type' => 'application/json',
            'key'          => env('API_KEY'),
            'q'            => 'auto:ip'
        ])->body(),true);
        //Prikaz trenutne lokacije u odnosu na IP adresu
        dd($data['location']);
    }
}
