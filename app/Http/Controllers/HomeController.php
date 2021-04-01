<?php

namespace App\Http\Controllers;

use App\Http\TourFilter;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Il(luminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $destinations = Tour::ActiveDestinationCounts()->first();


        return view('client.home',compact('destinations','destinations'));
    }
    public function show($tourID)
    {
        $tour = Tour::with('company:id,name,location')->WithBookingStatus()->findOrFail($tourID);

        return view('client.TourPage',compact('tour'));
    }
    public function search()
    {
         $tours = (new TourFilter())->GetFilteredToursWithStatus(request(),'nearest');

        $tours->load(['company:id,name,location']);
        return view('client.tours',['tours'=>$tours,'destination'=>null]);

    }
    public function tours($destination = null)
    {
        $tours = Tour::ActiveTours()->
            when(!is_null($destination),function ($query) use ($destination)
            {
               return $query->where('destination',$destination);
            })
            ->WithBookingStatus()
            ->with('company:id,name,location')
            ->orderBy(DB::raw('ABS(DATEDIFF(tours.pickupDate, NOW()))'))->paginate(9);
        return view('client.tours',compact('tours','destination'));
    }
}
