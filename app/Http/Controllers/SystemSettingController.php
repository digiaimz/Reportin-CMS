<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SystemSettingController extends Controller
{
     public function backto_mydashboard(Request $request)
     {
        // dd(Auth::id());
         $login_id = (int)$request->back_to_my_dashboard_id;


        // if(in_array(Auth::id() , config('access.custom.login')))
        // {
            // session(['back_login_user_id' => Auth::id() ]);
            if ($request->session()->exists('back_login_user_id')) {
            $request->session()->forget('back_login_user_id');
            }
            // do{
                Auth::logout();
            // }while(Auth::check());
            // dd(Auth::id());
            $user = User::find( $login_id   );

            if($user != null)
        {
            Auth::login($user , true  );
        }
            return redirect('/');
        // }
        // else{
        //     if ($request->session()->exists('back_login_user_id')) {
        //         $request->session()->forget('back_login_user_id');
        //         }
        //     return back();
        // }

     }
     public function login_custom_account(Request $request)
     {
        $login_id =$request->user_id_for_login;
        if(in_array(Auth::id() , config('access.custom.login')))
        {
            if (!$request->session()->exists('back_login_user_id')) {
            session(['back_login_user_id' => Auth::id() ]);
            }
            Auth::logout();
            $user = User::find(  $login_id);
            if($user != null)
        {
            Auth::login($user);
        }
            return redirect('/');
        }
        else{
            if ($request->session()->exists('back_login_user_id')) {
                $request->session()->forget('back_login_user_id');
                }
            return back();
        }

     }
     public function get_gender_comp(Request $request)
     {

        $all_users_global = null;
        $all_wabastagans_global = null;
        $all_dignitaries_global = null;


        // get workers and wabastagans
        // get workers and wabastagans

        if(\App\Helpers\Helper::is_limted_user()=="yes")
        {
            $extra = " | Limited Access ";
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

                    $all_users_global =  \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
            ->get();
              $all_dignitaries_global =  \App\User::has('designation')
              ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
            ->get();


            $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
            \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
            ->pluck('id')->toArray()
            )->get();


             }
                else
                {
                    $all_users_global = \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
            ->get();
                    $all_dignitaries_global = \App\User::has('designation')
                    ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
            ->get();
 $all_wabastagans_global =  \App\Wabastagan::whereIN('user_id' ,
            \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
            ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
            ->pluck('id')->toArray()
            )->get();


                }
        }
        else
        {
            $all_users_global =  \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
            ->get();
             $all_dignitaries_global =  \App\User::has('designation')->whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
            ->get();
// start query optimized
            if(count(\App\Helpers\Helper::get_forums_access()) == 8)
            {
                $all_wabastagans_global = \App\Wabastagan::get();
            }
            else
            {
                $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
                \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )->pluck('id')->toArray()
                )
                ->get();

            }
            // end query optimized




        }

        // get workers and wabastagans
        // get workers and wabastagans




$workers_t = $all_users_global ;
$wabstagan_t =  $all_wabastagans_global ;
$dignitaries_t =  $all_dignitaries_global ;


// workers
   $female_workers = \App\Helpers\Helper::get_male_workers( $workers_t , "Female");
   $worker_percentage_female = 0 ;
   if( count($workers_t) == 0)
   {
    $worker_percentage_female = 0 ;
   }else {
    $worker_percentage_female =  ($female_workers * 100 ) /  count($workers_t) ;
   }

   $worker_percentage_female =  - (int)round($worker_percentage_female);
   $worker_percentage_male = +( 100 + $worker_percentage_female );

// dignitaries

$female_dignitaries = \App\Helpers\Helper::get_male_workers( $dignitaries_t , "Female");
$dignitaries_percentage_female = 0 ;
if( count($dignitaries_t) == 0)
{
 $dignitaries_percentage_female = 0 ;
}else {
 $dignitaries_percentage_female =  ($female_dignitaries * 100 ) /  count($dignitaries_t) ;
}

$dignitaries_percentage_female =  - (int)round($dignitaries_percentage_female);
$dignitaries_percentage_male = +( 100 + $dignitaries_percentage_female );




// wabastagans
   $female_wabastagan = \App\Helpers\Helper::get_male_wabastagan( $wabstagan_t, "Female");
   $percentage_female_wabastagan =  0 ;
   if( count($wabstagan_t) == 0)
   {
    $percentage_female_wabastagan =  0 ;
   }
   else {
    $percentage_female_wabastagan =  ($female_wabastagan * 100 ) /  count($wabstagan_t) ;
   }

   $percentage_female_wabastagan =  - (int)round($percentage_female_wabastagan);
   $percentage_male_wabastagan = + ( 100 + $percentage_female_wabastagan );


return response()->json([
    'status'=>'ok' ,
    'worker_percentage_male'=> $worker_percentage_male ,
    'dignitaries_percentage_male'=> $dignitaries_percentage_male ,
    'percentage_male_wabastagan'=> $percentage_male_wabastagan ,
    'worker_percentage_female'=> $worker_percentage_female ,
    'dignitaries_percentage_female'=> $dignitaries_percentage_female ,
    'percentage_female_wabastagan'=> $percentage_female_wabastagan ,
]);



    }
     public function get_otp_info(Request $request)
     {
        return response()->json([
            'status'=>'ok' ,
            'view'=>view('dawa_theme.manage.otp_info')->render() ,
        ]);
     }
     public function cronJob(Request $request)
     {
        $request->validate([
            'minutes' => 'required|min:1',
        ]);
       DB::table('system_settings')->where('for_name' , 'otp')->delete();
        $setting = new SystemSetting();
        $setting->for_name = "otp";
        $setting->time_count = Carbon::now()->addMinutes($request->minutes);
        $setting->save();
        \App\Helpers\Helper::setDotEnv('is_SMS_enable',"false");

        return redirect()->back();

     }
     public function cancel_cronJob(Request $request)
     {
        DB::table('system_settings')->where('for_name' , 'otp')->delete();

        \App\Helpers\Helper::setDotEnv('is_SMS_enable',"true");

        return redirect()->back();
     }
     public function setOTP(Request $request)
     {
         $value =null;
         if($request->value=="true" )
         {
            $value =true;
         }
         else if($request->value=="false" )
         {
            $value =false;
         }
        \App\Helpers\Helper::setDotEnv('is_SMS_enable',$value);
        return response()->json(['status'=> $request->value]);
     }
}
