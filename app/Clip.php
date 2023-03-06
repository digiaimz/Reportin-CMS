<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    protected $table = "clips";
    public function videos()
    {
      return $this->hasMany('App\ClipView', 'clip_id', 'id')->where('action' , 'video');
    }
    public function views()
    {
      return $this->hasMany('App\ClipView', 'clip_id', 'id')->where('action' , 'view');
    }
    public function audios()
    {
      return $this->hasMany('App\ClipView', 'clip_id', 'id')->where('action' , 'audio');
    }

    public function questions()
    {
      return $this->hasMany('App\ClipQuestion', 'clip_id', 'id');
    }
    public function my_evaluation()
    {
      return $this->hasMany('App\MCQsEvaluation', 'clip_id', 'id')->where('user_id' , Auth::id());
    }
    public function myview()
    {
      return $this->hasMany('App\ClipView', 'clip_id', 'id')->where('user_id' , Auth::id())->where('action' , 'view');
    }

}
