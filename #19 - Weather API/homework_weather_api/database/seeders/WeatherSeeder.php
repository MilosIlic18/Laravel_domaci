<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Cities;
use App\Models\Weather;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = Cities::all();
        $this->command->getOutput()->progressStart(count($cities));
          $faker = Factory::create();
        foreach($cities as $city){
            Weather::create(['cities_id'=>$city->id,'temperature'=>$faker->numberBetween(-30,40)]);            
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
