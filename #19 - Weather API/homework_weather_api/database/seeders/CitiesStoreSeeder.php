<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Cities;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $amount = 100;
        $this->command->getOutput()->progressStart($amount);
        $faker = Factory::create();
        for($i=0;$i<$amount;$i++){
            Cities::create([
                'name'      =>  $faker->city(),
            ]);
            $this->command->getOutput()->progressAdvance();
            
        }
        $this->command->getOutput()->progressFinish();
    }
}
