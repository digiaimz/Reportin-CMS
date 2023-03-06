<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class District extends Model
{
    protected $table="dawa_dist";
    public $primaryKey  = 'id_dist';
    public $timestamps = false;


    public function schools()
    {
         return $this->hasMany('App\SchoolList', 'dist_id', 'id_dist')  ;

    }

    public function users_wabastagans()
    {

     return $this->hasManyThrough( 'App\Wabastagan' , 'App\User'
            , 'id_dist' , 'user_id'  , 'id_dist' ,'id' )
            ->whereIN('id_forum' , Helper::get_forums_access() );

    }

    public function wabastas()
    {

     return $this->hasManyThrough( 'App\Wabastagan' , 'App\User'
            , 'id_dist' , 'user_id'  , 'id_dist' ,'id' ) ;

    }

    public function workers()
    {
         return $this->hasMany('App\User', 'id_dist', 'id_dist')  ;

    }
    public function users()
    {
        // because every staff member is a forum level user

        if(Helper::is_limted_user() == "yes")
        {

            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

                    return $this->hasMany('App\User', 'id_dist', 'id_dist')
                    ->whereIN('id_forum' , Helper::get_forums_access() )
                    ->whereIN('id_dist' ,  Helper::getLevelIds('District') );

                }
                else
                {

                    return $this->hasMany('App\User', 'id_dist', 'id_dist')
                    ->whereIN('id_forum' , Helper::get_forums_access() )
                    ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') );




                }
        }
        else
        {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , Helper::get_forums_access() );
        }


    }
    public function all_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(1,2,3,4,5,6,7 ,9) );

    }
    public function tmq_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(1) );

    }
    public function mwl_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(2 , 7) );

    }
    public function pat_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(6 , 9) );

    }
    public function myl_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(3) );

    }
    public function muc_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(4) );

    }
    public function msm_users()
    {

                 return $this->hasMany('App\User', 'id_dist', 'id_dist')
                ->whereIN('id_forum' , array(5) );

    }
    public function tehsils()
    {
        return $this->hasMany('App\Tehsil', 'id_dist', 'id_dist');
    }
    public function zone()
    {
        return $this->belongsTo('App\Zone', 'id_zone', 'id_zone');
    }
    public function wabastagans()
    {
        return $this->hasMany('App\Wabastagan', 'id_dist', 'id_dist');
    }
}
