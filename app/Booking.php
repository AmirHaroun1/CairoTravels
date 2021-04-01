<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Booking extends Pivot
{
    protected $table = 'bookings';
    public $incrementing = true;

    public function tour()
    {
        return $this->hasOne('App\Tour','id','tour_id')->WithStatus();
    }
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
