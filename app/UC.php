<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class UC extends Model
{
    protected $table="dawa_ucs";

    public function workers()
    {
        return $this->hasMany('App\User', 'id_uc', 'id');
    }

    public function wabastas()
    {

        return $this->hasMany('App\User', 'id_uc', 'id');

     return $this->hasManyThrough( 'App\Wabastagan' , 'App\User'
            , 'id_uc' , 'user_id'  , 'id' ,'id' )
            ->whereIN('id_forum' , Helper::get_forums_access() )  ;

    }



}
