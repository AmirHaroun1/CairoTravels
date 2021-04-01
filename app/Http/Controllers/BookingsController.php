<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Company;
use App\Http\BookingFilter;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings =  Booking::with('user','tour')->latest()->paginate(10);

        $companies = Company::all('id','name');
        return view('admin.Bookings',compact('bookings','companies'));

    }
    public function search()
    {
         $bookings = (new BookingFilter())->GetFilteredBookings(request());
         $bookings->load(['user','tour']);
         $companies = null;

        if(\request('tourID')) \Session::flash('tourID',\request('tourID'));
        else $companies = Company::all('id','name');

        return view('admin.Bookings',compact('bookings','companies'));

    }
    public function show($tourID)
    {
        $bookings = Booking::where('tour_id',$tourID)->with('user','tour')->latest()->paginate(10);
        \Session::flash('tourID',$tourID);
        return view('admin.Bookings',compact('bookings'));
    }
    public function store($tourID)
    {
        $tour = Tour::findOrFail($tourID);

        $newBooking = new Booking();
        $newBooking->tour_id = $tourID;
        $newBooking->user_id = Auth::id();
        $newBooking->bookedSeats = \request('placesNumber');
        $newBooking->price = $tour->price * \request('placesNumber');
        $newBooking->save();

        $tour->bookedPlaces = $tour->bookedPlaces + 1;
        $tour->save();
        return redirect(route('user.bookings'));
    }
    public function userBookings()
    {
        $Bookings = Booking::with('tour:id,title,destination,image,price')->where('user_id',auth()->id())->get();
        return view('client.purchases',compact('Bookings'));
    }
}
