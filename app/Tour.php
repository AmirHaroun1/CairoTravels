<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    //
    protected $guarded = [];
    protected $table = 'tours';

    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }
    public function Bookings()
    {
        return $this->belongsToMany('App\User','bookings','tour_id','user_id')
            ->using('App\Booking')
            ->withPivot([
                'bookedSeats',
                'price',


            ]);
    }

    public function getImage()
    {
        if(!file_exists(public_path().'/storage'.$this->image))
        {
            return asset('storage/'.$this->image);
        }
    }
    public function scopeWithMoneyMade($query)
    {
        $query->addSelect(['moneyMade' => function ($query) {
            $query->selectRaw('sum(price)')
                ->from('bookings')
                ->whereColumn('tour_id', 'tours.id');
        }]);
    }
    public function scopeWithStatus($query)
    {
        $query->addSelect(['fullyBooked'=>function($query)
        {
            $query->selectRaw(' (case when availablePlaces = bookedPlaces then true else false end ) ') ;

        }]);
        $query->addSelect(['BookingClosed'=>function($query)
        {
            $query->selectRaw(' (case when (CURRENT_TIMESTAMP > lastDayToBook and CURRENT_TIMESTAMP < pickupDate) then true else false end ) ') ;

        }]);
        $query->addSelect(['started'=>function($query)
        {
            $query->selectRaw(' (case when (CURRENT_TIMESTAMP >= pickupDate and CURRENT_TIMESTAMP <= returnDate) then true else false end ) ') ;

        }]);
        $query->addSelect(['active'=>function($query)
        {
            $query->selectRaw(' (case when CURRENT_TIMESTAMP <= lastDayToBook then true else false end ) ') ;

        }]);
        $query->addSelect(['returned'=>function($query)
        {
            $query->selectRaw(' (case when CURRENT_TIMESTAMP > returnDate then true else false end ) ') ;

        }]);
    }
    public function scopeActiveTours($query)
    {
        $query->whereraw('pickupDate > CURRENT_TIMESTAMP');

    }
    public function scopeWithBookingStatus($query)
    {
        $query->addSelect(['fullyBooked'=>function($query)
        {
            $query->selectRaw(' (case when availablePlaces = bookedPlaces then true else false end ) ') ;

        }]);
    }
    public function scopeReturnedTours($query)
    {
        $query->whereraw('returnDate < CURRENT_TIMESTAMP');
    }
    public function scopeStartedTours($query)
    {
        $query->whereRaw('CURRENT_TIMESTAMP BETWEEN pickupDate AND returnDate');
    }
    public function scopeBookingClosed($query)
    {
        $query->whereRaw('CURRENT_TIMESTAMP > lastDayToBook and CURRENT_TIMESTAMP < pickupDate');
    }
    public function scopeFullyBookedTours($query)
    {
        $query->whereRaw('availablePlaces = bookedPlaces');
    }
    public function scopeNotFullyBookedTours($query)
    {
        $query->whereraw('availablePlaces != bookedPlaces');
    }
    public function scopeActiveDestinationCounts($query)
    {
        $query->selectRaw('count(case when destination="sharmElSheikh" then 1 end) as sharmCount')
                ->selectRaw('count(case when destination="dahab" then 1 end) as dahabCount')
                ->selectRaw('count(case when destination="auxor" then 1 end) as auxorCount')
                ->selectRaw('count(case when destination="haurghada" then 1 end) as haurghadaCount')
                ->selectRaw('count(case when destination="aswan" then 1 end) as aswanCount')
                ->selectRaw('count(case when destination="siwa" then 1 end) as siwaCount')
                ->selectRaw('count(case when destination="ain-sokhna" then 1 end) as ainSokhnaCount')
                ->whereRaw('pickupDate > CURRENT_TIMESTAMP');
    }
}
