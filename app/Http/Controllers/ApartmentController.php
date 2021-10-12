<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use App\Service;
use App\Sponsor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ---------------------INDEX---
    public function index()
    {

        $user = User::find(auth()->user()->id);
        return view('home', compact('user'));
                
        // $allApartments = Apartment::all();
        // return view('home', compact('allApartments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ---------------------CREATE---
    public function create()
    {
        $apartment = Apartment::all();
        $services = Service::all();
        $sponsors = Sponsor::all();
        return view('apartment.create', compact('services', 'apartment', 'sponsors'));
        
        //TODO Aggiungere Sponsor
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ---------------------STORE---
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'n_beedroom' => 'required',
            'n_beds' => 'required',
            'n_bathrooms' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'img' => 'required', 'image | mimes:jpeg,jpg,png',
            'price_per_night' => 'required',
        ]);

        // dd($request);
        $data = $request->all();
        $apartment = new Apartment;

        $apartment->title = $data['title'];  
        $apartment->n_beedroom = $data['n_beedroom'];  
        $apartment->n_beds = $data['n_beds'];  
        $apartment->n_bathrooms = $data['n_bathrooms'];  
        $apartment->square_meters = $data['square_meters'];  
        $apartment->address = $data['address'];  
        $apartment->lat = $data['lat'];  
        $apartment->long = $data['long']; 
        // $apartment->img = $data['img'];
        $apartment->img = Storage::put('uploads', $data['img']); 
        
        /*
        if($data['visible'] === 'on'){
            $on=true;
        } else {
            $on=false;
        }
        $apartment->visible = $on;  
        */
        $apartment->visible = key_exists('visible', $data) ? true: false;
        $apartment->price_per_night = $data['price_per_night'];  
        $apartment->user_id = Auth::id();

        $apartment->save();
        if(array_key_exists('services', $data)) {
            $apartment->service()->sync($data['services']);
        }
        if(array_key_exists('sponsors', $data)) {
            $apartment->sponsor()->sync($data['sponsors']);
        }

        return view('apartment.show', compact('apartment'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------SHOW---
    public function show($id)
    {
        $apartment = Apartment::find($id);
        return view('apartment.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------EDIT---
    public function edit(Apartment $apartment, Service $service)
    {
        $services = Service::all();
        return view('apartment.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------UPDATE---
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'title' => 'required',
            'n_beedroom' => 'required',
            'n_beds' => 'required',
            'n_bathrooms' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'img' => 'required', 'image | mimes:jpeg,jpg,png',
            'price_per_night' => 'required',
        ]);

        $data = $request->all();

        $apartment->update($data);
        return redirect()->route('apartment.show', $apartment->id);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------DESTROY---
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('home');
    }
}
