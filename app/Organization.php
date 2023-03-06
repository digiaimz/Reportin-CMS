<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected  $table = "organizations";

    public function divisions()
    {
  return $this->hasMany('App\Division', 'id_org' , 'id');
    }
    public function departments()
    {
  return $this->hasManyThrough(
                        'App\Department',
                        'App\Division',
                        'id_org' ,
                        'id_div' ,
                         'id',
                         'id'

);
    }
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


}
