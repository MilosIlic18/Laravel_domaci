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
                Forecast::create([
                    'cities_id'=>$city->id,
                    'temperature'=>$faker->numberBetween(-30,40),
                    'date'=>$faker->dateTimeBetween('now', '+5 days')->format('Y-m-d H:i:s')
                ]);
                $this->command->getOutput()->progressAdvance();
            }
        }
        $this->command->getOutput()->progressFinish();
    }
}
