<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++){

            $userObject = new User();
            $userObject->name = $faker->word(); 
            $userObject->email = $faker->safeEmail(); 
            $userObject->password = $faker->sha256(); 
            $userObject->surname = $faker->word(); 
            $userObject->img = $faker->imageUrl(); 
            $userObject->date_of_birth = $faker->dateTime(); 
            $userObject->save();
         }
    }
}
