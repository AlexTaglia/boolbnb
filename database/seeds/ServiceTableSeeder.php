<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceList = [
            'wifi',
            'parking slot',
            'swimming pool',
            'concierge',
            'animals allowed',
            'sauna',
            'private entrance',
            'free cancellation',
            'hairdryer',
        ];    

        $listOfServiceID = []; 

        foreach($serviceList as $service) {
            $serviceObject = new Service();
            $serviceObject->name = $service;
            $serviceObject->save();

            $listOfServiceID[] = $serviceObject->id;
        }
    }
}
