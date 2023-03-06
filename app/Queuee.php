<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queuee extends Model
{
    protected  $table = "queues";

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
