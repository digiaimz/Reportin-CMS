<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolList extends Model
{
    // gender 2 means both
    // gender 0 means girls
    // gender 1 means boys

    protected $table = "dawa_schools_list";


    public function district()
    {
        return $this->belongsTo('App\District', 'dist_id' , 'id_dist');
    }



}
