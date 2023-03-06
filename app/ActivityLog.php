<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = "activity_logs";
    public $timestamps = false;

    public function activities()
    {
        return $this->belongsTo('App\User', 'id_emply' , 'id' );
    }
    public function worker()
    {
        return $this->belongsTo('App\User', 'id_emply' , 'id' );
    }


}
