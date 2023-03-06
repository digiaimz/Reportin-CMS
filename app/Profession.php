<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table="training_professions";
    public function users()
    {
        return $this->hasMany('App\User', 'id_Profession', 'profession_id');
    }
    public function users_custom()
    {

        
        // because every staff member is a forum level user

        if(Helper::is_limted_user()=="yes")
        {
            if( 
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {
                    
                    return $this->hasMany('App\User', 'id_Profession', 'profession_id')
                    ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
                    ->whereIN('id_forum' , Helper::get_forums_access() );
             
                }
                else
                {

                    return $this->hasMany('App\User', 'id_Profession', 'profession_id')
                    ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') )
                    ->whereIN('id_forum' , Helper::get_forums_access() );

                    
                }
        }
        else
        {
            return $this->hasMany('App\User', 'id_Profession', 'profession_id')
            ->whereIN('id_forum' , Helper::get_forums_access() );
        }
         
    }
}
