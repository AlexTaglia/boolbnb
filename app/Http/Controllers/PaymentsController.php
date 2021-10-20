<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Braintree\Transaction;
// use Braintree_Transaction;
use Braintree;
// use App\User;
// use App\Sponsor;
use App\Apartment;
use App\Sponsor;
// use DateInterval;
// use Braintree\Gateway;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;
use Symfony\Component\VarDumper\Cloner\Data;

class PaymentsController extends Controller
{
    /*
    public function subscribe(Request $request)

    {
        try {
            $payload = $request->input('payload', false);
            $nonce = $payload['nonce'];

            return response()->json(['success' => true]);    
        } catch (\Exception $ex) {
            return response()->json(['success' => false]);
        }
    }
    */

    public function subscribe(Request $request, $id, $apartmentdId)
    {
        // dd($apartmentdId);
        $apartment = Apartment::find($apartmentdId);
        $sponsors = Sponsor::all();
        
        $payload = $request->input('payload', false);
        // $nonce = $payload['nonce'];
        $nonce = 'fake-valid-nonce';

        // Recupero il prezzo dell'attuale sponsor
        $amount = DB::table("sponsors")
                    ->select("price")
                    ->where("id", "=", $id)
                    ->get();
        // dd($amount->first()->price);

        // Recupero la durata dell'attuale sponsor
        $duration = DB::table("sponsors")
                    ->select("duration")
                    ->where("id", "=", $id)
                    ->get();
        // dd($duration->first()->duration);
                    
        $hours = $duration->first()->duration;  
        // dd($hours);

        $gateway = new Braintree\Gateway([
            'environment' => env('BTREE_ENV'),
            'merchantId' => env('BTREE_MERCHANT_ID'),
            'publicKey' => env('BTREE_PUBLIC_KEY'),
            'privateKey' => env('BTREE_PRIVATE_KEY')
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $amount->first()->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
                ]
            ]);
        // dd($result);
        
        // Creo la data attuale
        $now = date_create()->format('Y-m-d H:i:s');
        // dd($now);

        // Recupero l'ultima data di fine degli sponsor dell'attuale appartmento
        $lastSponsorDate = DB::table('apartment_sponsor')
                            ->select('end_on')
                            ->where('apartment_id', '=', $apartmentdId)
                            // ->where('sponsor_id', '=', $id)
                            ->where('end_on', '>=', $now)
                            ->orderBy('end_on', 'DESC')     
                            ->limit(1)
                            ->first();
        // dd($lastSponsorDate->end_on);

        // Conto quante righe ci sono per ogni sposor per vedere se c'e ne sono 0
        $countRowDb = DB::table('apartment_sponsor')
                        ->select('end_on')
                        ->where('apartment_id', '=', $apartmentdId)
                        ->get()
                        ->count();
        // dd($countRowDb);
        
        if($countRowDb == 0 or $now > $lastSponsorDate->end_on){
            $startDate = $now;
        } else{
            $startDate = $lastSponsorDate->end_on;
        };

        // dd(gettype(strtotime($startDate)));
        // dd($startDate);

        // Creo la fine dello sponsr aggiungendo le ore all'ultima data di scadenza
        $end = date('Y-m-d H:i:s', strtotime("$startDate +{$hours} hours"));
        // dd($end);

        // dd($result);
        if($result->success) {

            $apartment = Apartment::find($apartmentdId);
            $apartment->sponsor()->attach($id,['method' => 'visa', 
            'currency' => $result->transaction->currencyIsoCode,
            'status' => true,
            'started_on' => $startDate,
            'end_on' => $end]); 
                        
            return response()->json(['success' => true]); 
            
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function index(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $id = array_key_first($data);
        $apartmentdId = array_key_last($data);

        // dd($apartmentdId);

        // $id = key($data);
        // $apartmentId = key($data);

        return view('payment', compact('id', 'apartmentdId'));

    }
    
}