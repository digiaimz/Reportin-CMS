<?php

namespace App\Helpers;

use App\Department;
use App\Organization;
use App\User;
use App\Wabastagan;
use Illuminate\Support\Facades\Auth;

class Helper {

    public static function  getUserName($id)
    {
      $user = User::where('id', $id)->first();
      if ($user != null) {
       return $user->name;
      }
      return "Unknown user";

    }

    public static function  getKey($object , $key)
    {
        $return_able = "";
        if(request()->cookie('lang' , 'en') == 'en')
        {
            $return_able =  $object[$key];
        }
        if(request()->cookie('lang' , 'en') == 'hi')
        {
            $return_able =  $object[$key."_hindi"];
        }

        if(request()->cookie('lang' , 'en') == 'ar')
        {
            $return_able =  $object[$key."_arabic"];
        }

        if(request()->cookie('lang' , 'en') == 'es')
        {
            $return_able =  $object[$key."_espanol"];
        }

        if(request()->cookie('lang' , 'en') == 'de')
        {
            $return_able =  $object[$key."_deutsch"];
        }

        if(request()->cookie('lang' , 'en') == 'fr')
        {
            $return_able =  $object[$key."_francais"];
        }

        if( $return_able == null || trim ($return_able) == "")
        {
         return $object[$key];
        }

        return $return_able;
    }

    public static function  getTranslation($key)
    {
        if($key == "")
        {
            $key = "en";
        }
        $languages = config('language');
        if(isset($languages[$key]))
        {
            return $languages[$key][request()->cookie('lang' , 'en')];
        }
        else{
            return $key;
        }

    }

    public static function  getDepartmentIds()
    {
        if(Auth::user()->level_type ==  1 || Auth::user()->level_type ==  2 )
        {
           return Department::select('id')->get()->pluck('id')->toArray();
        }

        if(Auth::user()->level_type  == 3)
        {
            $array = array();
            foreach(Organization::with(['departments'])->whereIN('id' ,  explode(",",Auth::user()->level_id ))->get() as $organization)
            {
                     foreach($organization->departments as $department)
                     {
                        array_push($array, $department->id);
                     }
            }
            return $array;

        }
        if(Auth::user()->level_type  == 4)
        {
            return Department::select('id')->whereIN('id_div' ,  explode(",",Auth::user()->level_id ))->get()->pluck('id')->toArray();
        }
        if(Auth::user()->level_type  == 5)
        {
            return explode(",",Auth::user()->level_id );
        }

        return array(0);


    }
    public static function  isAllow($id)
    {
        $ids =  Auth::user()->access_ids;
        if($ids ==null || trim($ids) == "")
        {
           return false;
        }
        return in_array($id,explode(",",$ids));

    }
    public static function  AllLevels()
    {

        $level1 =(object) [
            'id' => 1,
            'name' => 'Super Admin',
            'level' => 5
        ];
        $level2 =(object) [
            'id' => 2,
            'name' => 'Campaign Admin',
            'level' => 4
        ];
        $level3 =(object) [
            'id' => 3,
            'name' => 'Normal User',
            'level' => 3
        ];
        $level4 =(object) [
            'id' => 4,
            'name' => 'Agent',
            'level' => 2
        ];
         ;


     return array($level1, $level2 , $level3 , $level4 );

    }


    public static function  getLevel($id)
    {
        if($id == 1)
        {
            return 'Super Admin';
        }
        elseif ($id == 2)
        {  return 'Campaign Admin';

        }
       elseif ($id == 3)
        {
            return 'Normal User';
        }
        elseif ($id == 4)
        {
            return 'Agent';
        }

        return "Unknown User";

    }


    public static function  GetImg($img_name)
    {
        return asset($img_name);

    }
    public static function  setDotEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
           "{$key}={$value}",
           file_get_contents($path)
        ));
    }



}
