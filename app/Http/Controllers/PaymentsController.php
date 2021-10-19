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
// use Braintree\Gateway;
use Illuminate\Support\Facades\DB;
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
        
        $payload = $request->input('payload', false);
        // $nonce = $payload['nonce'];
        $nonce = 'fake-valid-nonce';


        $amount = DB::table("sponsors")
                    ->select("price")
                    ->where("id", "=", $id)
                    ->get();

        // dd($amount->first()->price);

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

        if($result->success) {

            $apartment = Apartment::find($apartmentdId); //Todo Passare anche l'id dell'appartmento
            $apartment->sponsor()->attach($id,['method' => 'visa', 
            'currency' => $result->transaction->currencyIsoCode,
            'status' => true,
            'started_on' => $result->transaction->createdAt,
            'end_on' => $result->transaction->createdAt]);  //Todo 
                        
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