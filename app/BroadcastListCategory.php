<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadcastListCategory extends Model
{
    //
    protected $table = "dawa_broadcast_categories";
    public $primaryKey  = 'cate_id';
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id' , 'cate_id');
    }

}
