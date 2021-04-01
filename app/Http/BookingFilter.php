<?php


namespace App\Http;


use App\Booking;

class BookingFilter
{

    public function GetFilteredBookings($filter)
    {
        $bookings = Booking::query();

        if($filter->company_id)
        {
            $bookings->whereHas('tour', function ($query) use ($filter) {
                    $query->where('company_id',$filter->company_id);
                 });
        }
        if($filter->tourID)
        {
            $bookings->where('tour_id',$filter->tourID);
        }

        if($filter->destination)
        {
            $bookings->whereHas('tour', function ($query) use ($filter) {
                $query->where('destination',$filter->destination);
            });
        }
        if($filter->BookingStatus)
        {
            if($filter->BookingStatus == "FullyBooked") {
                $bookings->whereHas('tour', function ($query) use ($filter) {
                    $query->whereRaw('availablePlaces = bookedPlaces');
                });
            }
            else if($filter->BookingStatus == "NotBooked"){
                $bookings->whereHas('tour', function ($query) use ($filter) {
                    $query->whereRaw('availablePlaces > bookedPlaces');
                });
            };
        }
         if($filter->BookingDate)
        {
            $bookings->whereRaw('created_at = ?',[$filter->BookingDate]);
        }
         if($filter->userName)
        {
            $bookings->whereHas('user', function ($query) use ($filter) {
                $query->where('name','LIKE', '%'.$filter->userName.'%' );
            });
        }


                return $bookings->latest()->paginate(10)->appends([
                    'BookingDate'=>request('BookingDate'),
                    'destination'=>request('destination'),
                    'company_id'=>request('company_id'),
                    'BookingStatus'=>request('BookingStatus'),
                    'userName'=>request('userName'),
                    'tourID'=>request('tourID'),
                ]);
    }
}
