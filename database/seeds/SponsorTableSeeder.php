<?php

use App\Sponsor;
use App\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $sponsorsList = [
            'silver'=>[
                'price' => 2.99,
                'duration' => 24
            ],
            'gold'=>[
                'price' => 5.99,
                'duration' => 72
            ],
            'platinum'=>[
                'price' => 9.99,
                'duration' => 144
            ]
        ];    

        foreach($sponsorsList as $key => $sponsor) {
            $sponsorObject = new Sponsor();
            $sponsorObject->name = $key;
            $sponsorObject->price = $sponsor['price'];
            $sponsorObject->duration = $sponsor['duration'];
            
            $sponsorObject->save();
            
        }
        for ($i = 0; $i < 20; $i++){
            $apartmentId = rand(1,20);
            $sponsorId = rand(1,3);
            $apartment = Apartment::find($apartmentId);
            $apartment->sponsor()->attach($sponsorId,['method' => $faker->creditCardType(), 
            'currency' => '€',
            'status' => $faker->numberBetween(0,1),
            'started_on' => $faker->dateTime(),
            'end_on' => $faker->dateTime]); 
        } 
    }
}
