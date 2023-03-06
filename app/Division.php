<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected  $table = "divisions";
    public function created_by_user()
    {
        return $this->belongsTo('App\User' , 'id_added' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }

    public function  updated_by_user()
    {
        return $this->belongsTo('App\User' , 'id_modify' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }
    public function  organization()
    {
        return $this->belongsTo('App\Organization' , 'id_org' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }
    public function departments()
    {
      return $this->hasMany('App\Department', 'id_div' , 'id');
    }
}
