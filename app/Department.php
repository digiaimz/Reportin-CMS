<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected  $table = "departments";
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
    public function  division()
    {
        return $this->belongsTo('App\Division' , 'id_div' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }
}
