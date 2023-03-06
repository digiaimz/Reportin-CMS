<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Zone extends Model
{

    use  HasRelationships;
    protected $table="dawa_zones";
    public $primaryKey  = 'id_zone';
    public $timestamps = false;
    public function districts()
    {
        return $this->hasMany('App\District', 'id_zone', 'id_zone');
    }
    public function users()
    {

            return $this->hasManyThrough( 'App\User' , 'App\District'  , 'id_zone' ,
            'id_dist'  , 'id_zone' ,'id_dist' )
            ->whereIN('id_forum' , Helper::get_forums_access() );
    }
    public function tehsils()
    {
            return $this->hasManyThrough(
                'App\Tehsil'
               , 'App\District'
               , 'id_zone' ,
              'id_dist'
             , 'id_zone'
              ,'id_dist' ) ;
    }


    public function wabastas()
    {
     return $this->hasManyDeep(
           'App\Wabastagan',
            ['App\District','App\User'], // Intermediate models, beginning at the far parent (Country).
            [
               'id_zone', // Foreign key on the "district" table.
               'id_dist',    // Foreign key on the "user" table.
               'user_id'     // Foreign key on the "wabastagan" table.
            ],
            [
              'id_zone', // Local key on the "zone" table.
              'id_dist', // Local key on the "district" table.
              'id'  // Local key on the "user" table.
            ]
        );


            return $this->hasManyThrough( 'App\User' , 'App\District'  , 'id_zone' ,
            'id_dist'  , 'id_zone' ,'id_dist' )
            ->whereIN('id_forum' , Helper::get_forums_access() );
       }

    public function workers()
    {
     return $this->hasManyDeep(
           'App\User',
            ['App\District' ],
            [
               'id_zone' ,
               'id_dist',

            ],
            [
              'id_zone',
              'id_dist',

            ]
        );


            return $this->hasManyThrough( 'App\User' , 'App\District'  , 'id_zone' ,
            'id_dist'  , 'id_zone' ,'id_dist' )
            ->whereIN('id_forum' , Helper::get_forums_access() );
       }



    public function users_with_forum()
    {

            return $this->hasManyThrough( 'App\User' , 'App\District'  , 'id_zone' ,
            'id_dist'  , 'id_zone' ,'id_dist' ) ;

    }

}
