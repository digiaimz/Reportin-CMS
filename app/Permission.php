<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   protected $table = "permissions";

   public function permissions()
   { 
       return $this->hasMany('App\Permission', 'for' , 'for' ) ;
   }

     public function designation()
    {
         return $this->belongsToMany('App\Designation' , 'designation_permissions'  , 'permission_id' , 'role_id'  )
         ->withTimestamps();
    }

}

