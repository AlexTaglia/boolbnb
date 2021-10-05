<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessagesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++){

            $MessageObject = new Message();
            $MessageObject->text = $faker->paragraph(3,true);  
            $MessageObject->sender_name = $faker->firstName();  
            $MessageObject->email = $faker->safeEmail();
            $MessageObject->apartment_id = $faker->numberBetween(1,30);
            $MessageObject->save();
         }
    }
    
}
