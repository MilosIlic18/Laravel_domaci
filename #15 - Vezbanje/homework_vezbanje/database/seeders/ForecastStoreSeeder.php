<?php

namespace Database\Seeders;

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
        $this->command->getOutput()->progressStart(count($cities)*5);
          $faker = Factory::create();
        foreach($cities as $city){
            for($i=0;$i<5;$i++){
                if($i === 0){
                    $weatherType = $faker->randomElement(Forecast::WEATHERS);
                    $temperature = match ($weatherType) {
                        'cloudy' => $faker->numberBetween(-30, 15),
                        'rainy'  => $faker->numberBetween(-10, 40),
                        'snowy'  => $faker->numberBetween(-30, 1),
                        default  => $faker->numberBetween(-30, 40),
                    };
                }
                else{
                    /**
                     *  Temperaturu racunam tako sto izvadim poslednji element iz niza city forcasts sto mi omogucuje relacija
                     *  generisem nasumican broj tipa integer od -5 do 5
                     *  
                     *  Konacnu temperaturu dobijam u zavisnosti da li je nasumican broj manji ili veci od nule
                     * 
                     *  ako je manji izvadim temperaturu iz poslednjeg elementa i oduzmem sa generisanim brojem
                     *  ako je veci izvadim temperaturu iz poslednjeg elementa i saberem sa generisanim brojem
                     *  
                     *  Tip prognoze dobijam tako sto izracunatu vrednost temperature provucem kroz match metodu
                     */
                    $randNum = $faker->numberBetween(-5,5);
                    $temperature = $randNum>=0 ?$city->forecasts[count($city->forecasts)-1]->temperature + $randNum: $city->forecasts[count($city->forecasts)-1]->temperature - $randNum;
                    $weatherType = match ($temperature) {
                        $temperature <= 15    => 'cloudy',
                        $temperature <= 1     => 'snowy',
                        $temperature >= -10   => 'rainy',
                        default => 'sunny',
                    };
                }
                
                Forecast::create([
                    'cities_id'=>$city->id,
                    'temperature'=>$temperature,
                    'weather_type'=>$weatherType,
                    'probability'=>$weatherType==="sunny"?NULL:$faker->numberBetween(1,100),
                    'date'=>$faker->dateTimeBetween('now', '+30 days')->format('Y-m-d H:i:s')
                ]);

                $this->command->getOutput()->progressAdvance();
            }
        }
        $this->command->getOutput()->progressFinish();
    }
}
