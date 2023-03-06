<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
protected $table ="designations";

   public function permissions()
{
    return $this->belongsToMany('App\Permission' , 'designation_permissions' , 'role_id' , 'permission_id'  ) 
    ->withTimestamps(); 
}
     public function forum()
      {
    return $this->belongsTo('App\Forum', 'forum_id' , 'id_frm')->withDefault([
        'frm_name' => "---" ,
        'Email' => "---" ,
        'frm_code' => "---" ,
    ]);
     }

     public function worker()
      {
    return $this->hasOne('App\User', 'designation_id' , 'id');
      }
    //  public function worker()
    //   {
    // return $this->hasOne('App\User', 'designation_id' , 'id')->withDefault([
    //     'name' => "--------------------" ,
    //     'whatsapp' => "--------------" ,
    //     'photo' => "team/unknown_user.png" ,
    // ]);
    //   }


     public function fill_seats()
      {
    return $this->hasMany('App\PlaceOfDesignation', 'designation_id' , 'id');
      }



}
