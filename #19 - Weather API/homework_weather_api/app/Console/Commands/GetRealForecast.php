<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real-forecast {city}';

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
        $cityName = $this->argument('city');
        $dataSet = json_decode(Http::get(env('API_URL').'/v1/forecast.json',[
            'Content-Type' => 'application/json',
            'key'          => env('API_KEY'),
            'q'            => $cityName,
            'aqi'          => 'no',
            'days'         => 24
        ])->body(),true);
        
        if(key_exists('error',$dataSet)){
            return;
        }
        if(strlen($cityName)<4){
            return;
        }
        $city = Cities::where('name',$cityName)->first();
            
        if($city===null){
            $city = Cities::create(['name'=>$cityName]);
        }
        
        if($city->todayForecast!==null){ 
            return;
        }

        foreach($dataSet['forecast']['forecastday'] as $forecast){
            Forecast::create([
                'cities_id'     =>  $city->id,
                'temperature'   =>  $forecast['day']['avgtemp_c'],
                'weather_type'  =>  $forecast['day']['condition']['text'],
                'probability'   =>  $forecast['day']['daily_chance_of_rain'],
                'date'          =>  Carbon::parse($forecast['date'])->format('Y-m-d H:i:s')
            ]);
        }

        
        
    }
}
