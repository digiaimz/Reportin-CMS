<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $primaryKey = 'id_frm';
    public  $timestamps = false;

    protected $table="dawa_forum";

    public function wabastagans()
    {
        return $this->hasManyThrough( 'App\User' , 'App\Wabastagan'  , 'user_id' , 'id_forum'  , 'id_frm' ,'id' );
    }

    public function users()
    {
        return $this->hasMany('App\User', 'id_forum', 'id_frm');
    }

    public function filtered_users()
    {


        if(Helper::is_limted_user() == "yes")
        {

            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

                    return $this->hasMany('App\User', 'id_forum', 'id_frm')
                    // ->whereIN('id_forum' , Helper::get_forums_access() )
                    ->whereIN('id_dist' ,  Helper::getLevelIds('District') );

                }
                else
                {

                    return $this->hasMany('App\User', 'id_forum', 'id_frm')
                    // ->whereIN('id_forum' , Helper::get_forums_access() )
                    ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') );




                }
        }
        else
        {

                 return $this->hasMany('App\User', 'id_forum', 'id_frm');
                // ->whereIN('id_forum' , Helper::get_forums_access() );
        }



        // return $this->hasMany('App\User', 'id_forum', 'id_frm');
    }

    public function male_user()
    {
        return $this->hasMany('App\User', 'id_forum', 'id_frm')->where('gender','Male')->orwhere('gender',null);
    }
    public function female_user()
    {
        return $this->hasMany('App\User', 'id_forum', 'id_frm')->where('gender','Male');
    }
}
