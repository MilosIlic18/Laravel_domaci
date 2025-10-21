<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ForecastStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = Cities::all();
        $this->command->getOutput()->progressStart(count($cities)*30);
          $faker = Factory::create();
        foreach($cities as $city){
            for($i=0;$i<30;$i++){
                if($i === 0){
                    $weatherType = $faker->randomElement(Forecast::WEATHERS);
                    $temperature = match ($weatherType) {
                        'cloudy' => $faker->numberBetween(-30, 15),
                        'rainy'  => $faker->numberBetween(-10, 40),
                        'snowy'  => $faker->numberBetween(-30, 1),
                        default  => $faker->numberBetween(-30, 40),
                    };
                    $date = Carbon::now();
                }
                else{
                
                    $randNum = $faker->numberBetween(-5,5);
                    $temperature = $randNum>=0 ?$city->forecasts[count($city->forecasts)-1]->temperature + $randNum: $city->forecasts[count($city->forecasts)-1]->temperature - $randNum;
                    $weatherType = match (true) {
                        $temperature < -10                             => $faker->randomElement(['snowy','sunny','cloudy']),
                        $temperature >= -10 && $temperature <= 1       => $faker->randomElement(['snowy','sunny','cloudy','rainy']),
                        $temperature >= 1   && $temperature <= 15      => $faker->randomElement(['sunny','cloudy','rainy']),
                        default => $faker->randomElement(['sunny','rainy']),
                    };

                    $date = $date->modify('+1 day');
                }

                
                Forecast::create([
                    'cities_id'=>$city->id,
                    'temperature'=>$temperature,
                    'weather_type'=>$weatherType,
                    'probability'=>$weatherType==="sunny"?NULL:$faker->numberBetween(1,100),
                    'date'=> $date->format('Y-m-d H:i:s')
                ]);

                $this->command->getOutput()->progressAdvance();
            }
        }
        $this->command->getOutput()->progressFinish();
    }
}
