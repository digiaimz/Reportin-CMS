<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceOfDesignation extends Model
{
    protected $table = "places_of_designation";

    public function worker()
    {
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }
    public function designation()
    {
        return $this->belongsTo('App\Designation', 'designation_id' , 'id');
    }
    public function zone()
    {
        return $this->belongsTo('App\Zone', 'place_id' , 'id_zone');
    }
    public function district()
    {
        return $this->belongsTo('App\District', 'place_id' , 'id_dist');
    }
    public function tehsil()
    {
        return $this->belongsTo('App\Tehsil', 'place_id' , 'id_tsl');
    }

}
