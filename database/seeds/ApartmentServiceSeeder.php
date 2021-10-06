<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 80; $i++){
            $apartmentId = rand(1,30);
            $serviceId = rand(1,9);
            $apartment = Apartment::find($apartmentId);
            $apartment->service()->attach($serviceId); 
        } 
    }
}
