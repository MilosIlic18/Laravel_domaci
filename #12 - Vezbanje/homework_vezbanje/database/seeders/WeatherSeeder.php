<?php

namespace Database\Seeders;

use App\Models\CityTemperature;
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
        $weather = [
            "New York" => 22,
            "Los Angeles" => 28,
            "Chicago" => 18,
            "Miami" => 30,
            "Seattle" => 16
        ];
        foreach($weather as $city=>$temperature){
            $cityTemperature = CityTemperature::where('city',$city)->first();
            if($cityTemperature)
                continue;
            CityTemperature::create(['city'=>$city,'temperature'=>$temperature]);
        }
    }
}
