<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;
use Braintree\Configuration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // braintree setup

        \Braintree\Configuration::environment('sandbox');
        \Braintree\Configuration::merchantId('nwkdc5xn7xkycskw');
        \Braintree\Configuration::publicKey('5qyb7bgb9kwftxw9');
        \Braintree\Configuration::privateKey('56e4d880ba158ea486609d765cc2b2a8');    
        
        $braintree  = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'nwkdc5xn7xkycskw',
            'publicKey' => '5qyb7bgb9kwftxw9',
            'privateKey' => '56e4d880ba158ea486609d765cc2b2a8',
        ]);
        config(['braintree' => $braintree]); 
    
    }
}
