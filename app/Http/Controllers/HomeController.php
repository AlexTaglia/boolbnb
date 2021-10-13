<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $allApartments = Apartment::paginate(12);
        $visibleApartments = Apartment::where('visible', '1')->limit(8)->get();
        // dd($visibileApartments);
        return view('home', compact('allApartments', 'visibleApartments'));
       

    }
}
