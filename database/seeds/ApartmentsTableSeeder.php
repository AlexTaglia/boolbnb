<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++){

            $apartmentObject = new Apartment();
            $apartmentObject->title = $faker->sentence(5);  
            $apartmentObject->n_beedroom = $faker->numberBetween(1,10);  
            $apartmentObject->n_beds = $faker->numberBetween(1,10);
            $apartmentObject->n_bathrooms = $faker->numberBetween(1,5);
            $apartmentObject->square_meters = $faker->numberBetween(10,100);;
            $apartmentObject->address = $faker->words(5, true);
            $apartmentObject->lat = $faker->latitude($min = -90, $max = 90);
            $apartmentObject->long = $faker->longitude($min = -180, $max = 180);
            $apartmentObject->img = $faker->imageUrl(640, 480, 'casa', true);
            $apartmentObject->visible = $faker->numberBetween(0,1);
            $apartmentObject->price_per_night = $faker->randomFloat(2, 20, 300);
            $apartmentObject->user_id = $faker->numberBetween(1,6);
            $apartmentObject->save();
         }
    }
}
