<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = "complains";
    public function invity()
    {
        return $this->belongsTo('App\Wabastagan', 'wabastagan_id' , 'id');
    }
    public function from_()
    {
        return $this->belongsTo('App\User', 'from_user' , 'id');
    }
    public function to_()
    {
        return $this->belongsTo('App\User', 'to_user' , 'id');
    }
    public function wabastagan()
    {
        return $this->belongsTo('App\Wabastagan', 'wabastagan_id' , 'id');
    }
}
