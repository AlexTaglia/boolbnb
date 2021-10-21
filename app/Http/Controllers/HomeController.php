<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $now = new Carbon();
    
        $allApartments = Apartment::paginate(12);
        // $visibleApartments = Apartment::where('visible', '1')->limit(8)->get();
        // dd($visibileApartments);
        
        $visibleApartments = Apartment::join("apartment_sponsor", "apartments.id", "=", "apartment_sponsor.apartment_id")
                                        ->where("apartment_sponsor.end_on", ">", $now)
                                        ->groupBy("apartment_id")
                                        ->orderBy("apartment_sponsor.end_on", "ASC")
                                        ->limit(8)
                                        ->get();
                                        
        return view('home', compact('allApartments', 'visibleApartments'));

        /*
        SELECT *
        FROM apartments
        INNER JOIN apartment_sponsor ON apartments.id = apartment_sponsor.apartment_id
        WHERE apartment_sponsor.end_on > CURDATE() 
        GROUP BY apartment_sponsor.apartment_id
       */

    }
}
