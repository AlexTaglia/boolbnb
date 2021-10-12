<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
         
        return view('search', compact('apartments'));
    }
}
