<?php

use App\View;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;



class ViewsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++){

            $ViewObject = new View();
            $ViewObject->ip = $faker->localIpv4();  
            $ViewObject->last_access = $faker->dateTime();
            $ViewObject->apartment_id = $faker->numberBetween(1,30);
            $ViewObject->save();
         }
    }
}
