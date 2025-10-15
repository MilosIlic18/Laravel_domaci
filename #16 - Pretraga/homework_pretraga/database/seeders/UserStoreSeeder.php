<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $name     = $this->command->getOutput()->ask("Unesite vase ime");
        $email    = $this->command->getOutput()->ask("Unesite vas email");
        $role     = $this->command->getOutput()->ask("Unesite vase ulogu","user");
        $password = $this->command->getOutput()->ask("Unesite vasu lozinku");

        
        if(!$name){
            $this->command->getOutput()->error("Niste uneli ime");
            return;
        }
        if(!$email){
            $this->command->getOutput()->error("Niste uneli email");
            return;
        }
        if(!$password){
            $this->command->getOutput()->error("Niste uneli lozinku");
            return;
        }
        
        $user = User::where('email',$email)->first();
        if($user){
            $this->command->getOutput()->info("Email je zauzet, ne moze se uneti korisnik");
            return;
        }
        User::create([
            'name'      =>  $name,
            'email'     =>  $email,
            'role'      =>  $role,
            'password'  =>  bcrypt($password) 
         ]);
        $this->command->getOutput()->info("Uspesno kreiran korisnik");        
    }
}
