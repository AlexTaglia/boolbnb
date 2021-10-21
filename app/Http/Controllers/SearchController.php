<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
// use DB;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        $apartmentservices = DB::table('apartment_service')->get();
         
        return view('search', compact('apartments', 'services', 'apartmentservices'));
    }
}
