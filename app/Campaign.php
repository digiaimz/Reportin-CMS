<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected  $table = "campaign";

    public function queues()
    {
        return $this->hasMany('App\Queuee' , 'campaign_id' , 'id')
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
