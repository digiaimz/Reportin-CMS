<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClipQuestion extends Model
{
    protected $table = "clips_mcqs";

    public function answers()
    {
      return $this->hasMany('App\ClipQuestionAnswer', 'question_id', 'id');
    }


}
