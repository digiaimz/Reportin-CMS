<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    protected $table="dawa_tsl";
    public $primaryKey  = 'id_tsl';
    public $timestamps = false;

    public function pp()
    {
        return $this->hasMany('App\PP', 'id_tsl', 'id_tsl');
    }

    public function ucs()
    {
        return $this->hasMany('App\UC', 'id_tsl', 'id_tsl');
    }

    public function workers()
    {
        return $this->hasMany('App\User', 'id_mtsl', 'id_tsl');
    }

    public function wabastas()
    {

     return $this->hasManyThrough( 'App\Wabastagan' , 'App\User'
            , 'id_mtsl' , 'user_id'  , 'id_tsl' ,'id' )
            ->whereIN('id_forum' , Helper::get_forums_access() )  ;

    }


    public function wabasta()
    {
        return $this->hasMany('App\User', 'id_mtsl', 'id_tsl');
    }


    public function users()
    {

        return $this->hasMany('App\User', 'id_mtsl', 'id_tsl')
        ->whereIN('id_forum' , Helper::get_forums_access() ) ;


    }

    public function users_uc_added()
    {
        return $this->hasMany('App\User', 'id_mtsl', 'id_tsl')->where('id_uc' , '<>' , '')->where('id_uc' , '<>' , null)->where('id_uc' , '<>' , 0)
        ->whereIN('id_forum' , Helper::get_forums_access() ) ;
    }
    public function users_rafaqat_added()
    {
        return $this->hasMany('App\User', 'id_mtsl', 'id_tsl')->where('membership_id' , '<>' , '')->where('membership_id' , '<>' , null)
        ->whereIN('id_forum' , Helper::get_forums_access() ) ;
    }



    public function district()
    {
        return $this->belongsTo('App\District', 'id_dist', 'id_dist');
    }

}
