<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedAssest extends Model
{
    protected  $table = "fixed_assets";

    public function signs()
    {
        return $this->hasMany('App\PrintableSign' , 'cate_id' , 'id')
        ->withDefault([
            'name'=> '---'
        ]);
    }

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


}
