<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wabastagan extends Model
{
    protected $table = "wabastagans";
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\District', 'id_dist' , 'id_dist');
    }
    public function tehsil()
    {
        return $this->belongsTo('App\Tehsil', 'id_tehsil' , 'id_tsl');
    }
    public function complains()
    {
        return $this->hasMany('App\Complain', 'wabastagan_id' , 'id' )->orderby('created_at','desc') ;
    }
    public function getnameAttribute($value)
    {
        return strtoupper($value);
    }

}
