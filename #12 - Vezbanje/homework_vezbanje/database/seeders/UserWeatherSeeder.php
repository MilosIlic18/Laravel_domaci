<?php

namespace Database\Seeders;

use App\Models\CityTemperature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $city = $this->command->getOutput()->ask("Unesite naziv grad");
        if(!$city){
            $this->command->getOutput()->error("Niste uneli naziv grada");
            return;
        }
        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");
        if(!$temperature){
            $this->command->getOutput()->error("Niste uneli temperaturu");
            return;
        }
        $quest = CityTemperature::where('city',$city)->first();
        if($quest){
            $this->command->getOutput()->info("Ne moze se uneti taj podatak");
            return;
        }
        CityTemperature::create(['city'=>$city,'temperature'=>$temperature]);
        $this->command->getOutput()->info("Uspesno ste uneli novi grad $city sa temperaturom od $temperature stepeni");    
    }
}
