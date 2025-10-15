<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->getOutput()->ask("Koliko korisnika zelite da napravite?",3);
        $password = $this->command->getOutput()->ask("Koja sifra treba biti?","123456");
        $this->command->getOutput()->progressStart($amount);
        $faker = Factory::create();
        for($i=0;$i<$amount;$i++){
            $email = $faker->email;
            $user = User::where('email',$email)->first();
            if($user){
                $this->command->getOutput()->info("Ne moze se uneti taj podatak");
                return;
            }
            User::create([
                'name'      =>  $faker->name,
                'email'     =>  $email,
                'role'      =>  $faker->randomElement(['admin','user']),
                'password'  =>  bcrypt($password)
            ]);
            $this->command->getOutput()->progressAdvance();
            
        }
        $this->command->getOutput()->progressFinish();
    }
}
