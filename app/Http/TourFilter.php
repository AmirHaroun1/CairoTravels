<?php


namespace App\Http;


use App\Tour;
use Illuminate\Support\Facades\DB;

class TourFilter
{

    public function GetFilteredToursWithStatus($filter,$nearest)
    {
        $tours = Tour::query();

        if($filter->company_id)
        {
            $tours->where('company_id',$filter->company_id);
        }
        if($filter->destination)
        {
            $tours->where('destination',$filter->destination);
        }
        if($filter->BookingStatus)
        {
            if($filter->BookingStatus == "FullyBooked") $tours->FullyBookedTours();
            else if($filter->BookingStatus == "NotBooked") $tours->NotFullyBookedTours();
        }
        if($filter->TourCase)
        {
            if($filter->TourCase == "active") $tours->ActiveTours();
            else if($filter->TourCase == "started") $tours->StartedTours();
            else if($filter->TourCase == "returned") $tours->ReturnedTours();
            else if($filter->TourCase == "BookingClosed") $tours->BookingClosed();
        }
        if($filter->arrivalDate && $filter->returnDate)
        {
            $tours->whereRaw(' arrivalDate = ? and ( returnDate >= ? OR returnDate <= ? ) ',[$filter->arrivalDate,$filter->returnDate,$filter->returnDate]);
        }
        else if($filter->arrivalDate)
        {
            $tours->whereRaw('arrivalDate <= ?',[$filter->arrivalDate]);
        }
        else if($filter->returnDate)
        {
            $tours->whereRaw('returnDate >= ?',[$filter->returnDate]);
        }
        return $tours->withStatus()
                ->when(!is_null($nearest),function ($query) use ($nearest){
                    return $query->orderBy(DB::raw('ABS(DATEDIFF(tours.pickupDate, NOW()))'));
                })
                ->when(is_null($nearest),function ($query) use ($nearest) {
                   return $query->latest();
                })
                ->paginate(9)
                ->appends([
            'returnDate'=>request('returnDate'),
            'arrivalDate'=>request('arrivalDate'),
            'destination'=>request('destination'),
            'company_id'=>request('company_id'),
            'BookingStatus'=>request('BookingStatus'),
            'TourCase'=>request('TourCase'),
        ]);
    }
}
