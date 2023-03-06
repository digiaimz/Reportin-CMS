<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClipView extends Model
{
    protected $table = "clips_views";
    public function worker()
    {
        return $this->belongsTo('App\User', 'user_id' , 'id' );
    }

}
