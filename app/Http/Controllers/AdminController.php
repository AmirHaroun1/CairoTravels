<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Tour;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
         $todayBookings =  Booking::getQuery()
            ->selectRaw(' count(case when CURRENT_TIMESTAMP = created_at then 1 end ) as BookingsCount ')
                ->selectRaw(' SUM(bookedSeats) as BookedSeatsCount  ')
                ->selectRaw(' SUM(price) as TotalPrice  ')
                ->whereRaw('CURRENT_TIMESTAMP = created_at')->get()
           ->first();

        $tours = Tour::getQuery()
            ->selectRaw('count(case when CURRENT_TIMESTAMP <= lastDayToBook then 1 end) as activeCount')
            ->selectRaw('count(case when CURRENT_TIMESTAMP > lastDayToBook and CURRENT_TIMESTAMP < pickupDate then 1 end) as closedCount')
            ->selectRaw('count(case when CURRENT_TIMESTAMP > returnDate then 1 end) as returnedCount')
            ->selectRaw('count(case when destination="sharmElSheikh" then 1 end) as sharmCount')
            ->selectRaw('count(case when destination="dahab" then 1 end) as dahabCount')
            ->selectRaw('count(case when destination="auxor" then 1 end) as auxorCount')
            ->selectRaw('count(case when destination="haurghada" then 1 end) as haurghadaCount')
            ->selectRaw('count(case when destination="aswan" then 1 end) as aswanCount')
            ->selectRaw('count(case when destination="siwa" then 1 end) as siwaCount')
            ->selectRaw('count(case when destination="ain-sokhna" then 1 end) as ainSokhnaCount')
            ->first();
        return view('admin/dashboard',compact('todayBookings','tours'));
    }
}
