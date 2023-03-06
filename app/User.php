<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function getCountryNameAttribute( )
      {
        return json_decode($this->country);

      }
      public function active_forum_access()
      {
          return $this->hasMany('App\ForumAccess', 'user_id' , 'id' )->where( 'status' , 1) ;
      }
      public function all_forum_access()
      {
          return $this->hasMany('App\ForumAccess', 'user_id' , 'id' )  ;
      }

      public function place_of_designation()
      {
        return $this->hasMany('App\PlaceOfDesignation', 'user_id', 'id');
      }

      public function designation()
      {
        return $this->belongsTo('App\Designation', 'designation_id', 'id');
      }

      public function assign_designation_by_user()
      {
        return $this->belongsTo('App\User', 'assign_designation_by', 'id');
      }
      public function update_designation_by_user()
      {
        return $this->belongsTo('App\User', 'update_designation_by', 'id');
      }

    public function tehsil()
    {
        return $this->belongsTo('App\Tehsil', 'id_mtsl', 'id_tsl');
    }
    public function pp()
    {
        return $this->belongsTo('App\PP', 'pp_id', 'id');
    }
    public function uc()
    {
        return $this->belongsTo('App\UC', 'id_uc', 'id');
    }
    public function profession()
    {
        return $this->belongsTo('App\Profession', 'id_Profession', 'profession_id');
    }

    public function district()
    {
        return $this->belongsTo('App\District', 'id_dist', 'id_dist');
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum', 'id_forum', 'id_frm');
    }
    public function activities()
    {
        return $this->hasMany('App\ActivityLog', 'id_emply' , 'id' )->orderby('created_at','desc') ;
    }
    public function wabastagans()
    {
        return $this->hasMany('App\Wabastagan', 'user_id' , 'id' )->orderby('created_at','desc') ;
    }
    public function wabastagans_registration()
    {
        return $this->hasMany('App\Wabastagan', 'user_id' , 'id' )->orderby('created_at','desc') ;
    }
    public function total_wabastagans()
    {
        return $this->wabastagans()->count() ;
    }
    public function broadcast_list_categories()
    {
        return $this->hasMany('App\BroadcastListCategory', 'user_id' , 'cate_id' );
    }
    public function complains()
    {
        return $this->hasMany('App\Complain', 'from_user' , 'id' )->orderby('created_at','desc') ;
    }
    public function received_requests()
    {
        return $this->hasMany('App\Complain', 'to_user' , 'id' )->where('is_resolved',0)->orderby('created_at','desc') ;
    }
     public function getnameAttribute($value)
    {
        return strtoupper($value);
    }

  public function getfathernameAttribute($value)
    {
        return strtoupper($value);
    }
    public function added_Workers_by_refferal()
    {
        return $this->hasMany('App\User', 'reffer_by' , 'id' )->orderby('created_at','desc') ;
    }
    public function promoted_Workers()
    {
        return $this->hasMany('App\User', 'purmort_by' , 'id' )->orderby('created_at','desc') ;
    }
    public function added_Workers_by_refferal_noti()
    {
        return $this->hasMany('App\User', 'reffer_by' , 'id' )->where('added_notification' , 0 )->orderby('created_at','desc');
    }
    public function promoted_Workers_noti()
    {
        return $this->hasMany('App\User', 'purmort_by' , 'id' )->where('promoted_notification' , 0)->orderby('created_at','desc');
    }
    public function clips_views()
    {
        return $this->hasMany('App\ClipView', 'user_id' , 'id' )->where('action' , 'view');
    }

}
