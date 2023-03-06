<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class PP extends Model
{
    protected $table="dawa_pp";

    public function ucs()
    {
        return $this->hasMany('App\UC', 'prov_no', 'prov_no');
    }

    public function workers()
    {
        return $this->hasMany('App\User', 'pp_id', 'id');
    }

    public function wabastas()
    {

        return $this->hasMany('App\User', 'pp_id', 'id');

     return $this->hasManyThrough( 'App\Wabastagan' , 'App\User'
            , 'pp_id' , 'user_id'  , 'id' ,'id' )
            ->whereIN('id_forum' , Helper::get_forums_access() )  ;

    }


}
