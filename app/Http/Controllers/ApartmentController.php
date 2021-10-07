<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Service;
use Auth;
use Illuminate\Http\Request;

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
        $allApartments = Apartment::all();
        return view('home', compact('allApartments'));
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
        return view('apartment.create', compact('services', 'apartment'));
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
        $apartment->img = $data['img']; 
        
        if($data['visible'] === 'on'){
            $on=true;
        } else {
            $on=false;
        }

        $apartment->visible = $on;  
        $apartment->price_per_night = $data['price_per_night'];  
        $apartment->user_id = Auth::id();

        $apartment->save();
        if(array_key_exists('services', $data)) {
            $apartment->service()->sync($data['services']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------UPDATE---
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ---------------------DESTROY---
    public function destroy($id)
    {
        //
    }
}
