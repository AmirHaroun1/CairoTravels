<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded =[];
    protected $table = 'companies';

    public function tours()
    {
        return $this->hasMany('App\Tour');
    }
    public function ProfilePicture()
    {
        if(!file_exists(public_path().'/storage'.$this->image))
        {
            return asset('storage/'.$this->image);
        }
    }
    public function scopeOrderByVerified($query)
    {
        return $query->orderByDesc('verified');
    }
    public function scopeOrderByName($query)
    {
        return $query->orderBy('name');
    }
    public function scopeOrderByAddress($query)
    {
        return $query->orderBy('location');
    }

}
