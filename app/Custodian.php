<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custodian extends Model
{
    protected  $table = "custodians";

    public function created_by_user()
    {
        return $this->belongsTo('App\User' , 'created_by' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }

    public function  updated_by_user()
    {
        return $this->belongsTo('App\User' , 'updated_by' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }
    public function  department()
    {
        return $this->belongsTo('App\Department' , 'id_dept' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }


}
