<?php

namespace App\Http\Controllers;

use App\User;
use App\ClipView;
use App\District;
use Carbon\Carbon;
use App\Wabastagan;
use App\ActivityLog;
use App\Helpers\Helper;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\BroadcastListCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getGraph(Request $request)
    {
        set_time_limit(0);
        $dates_get =  explode('to' , $request->date);
        $start =  trim($dates_get[0]);
        $end =  trim($dates_get[1]);

        $period = CarbonPeriod::create($start, $end);

        $between=array( );

        $start_ =  Carbon::createFromFormat('d-M-Y',  $start )->format('Y-m-d')." 00:00:00";
        $end_ =  Carbon::createFromFormat('d-M-Y', $end )->format('Y-m-d')." 23:59:00";


    // Iterate over the period
    foreach ($period as $date) {

        array_push($between,$date->format('Y-m-d'));

    }
    $workers_users = null;
    $zerdawat_users = null;
    $today_login = null;
    // $today_login_unique = null;
    $today_clips_views = null;

    $is_limited_user = Helper::is_limted_user();
    $get_forums_access = Helper::get_forums_access();


        // because every staff member is a forum level user

        if($is_limited_user =="yes")
        {
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {
            $workers_users = User::select('created_at')
            ->whereIN('id_forum' , $get_forums_access  )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->whereBetween('created_at', [$start_, $end_])
            ->get();



            $zerdawat_users = Wabastagan::select('created_at')
          ->whereIN('user_id' ,
          // geting users id
          // geting users id
           User::select('id')
            ->whereIN('id_forum' , $get_forums_access  )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->get()->pluck('id')->toArray()
          // geting users id
          // geting users id
          )
          ->whereIN('id_forum_user' ,$get_forums_access)
         ->whereBetween('created_at', [$start_, $end_])
         ->get();

                }
                else
                {
                    $workers_users = User::select('created_at')
                    ->whereIN('id_forum' , $get_forums_access)
                    ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') )
                    ->whereBetween('created_at', [$start_, $end_])
                    ->get();


                    $zerdawat_users = Wabastagan::select('created_at')
          ->whereIN('user_id' ,
          // geting users id
          // geting users id
           User::select('id')
            ->whereIN('id_forum' , $get_forums_access  )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->get()->pluck('id')->toArray()
          // geting users id
          // geting users id
          )
          ->whereIN('id_forum_user' ,$get_forums_access)
         ->whereBetween('created_at', [$start_, $end_])
         ->get();

                }

            // $users_ids = $workers_users->pluck('id')->toArray();


        }
        else
        {
            // $workers_users = User::select('id','created_at')
            $workers_users = User::select('created_at')
            ->whereIN('id_forum' , $get_forums_access )
            ->whereBetween('created_at', [$start_, $end_])
            ->get();
            $zerdawat_users = Wabastagan::select('created_at')
            // ->whereIN('user_id' , $users_ids)
            ->whereIN('id_forum_user' ,$get_forums_access)
           ->whereBetween('created_at', [$start_, $end_])
           ->get();
        }



        //  if(count($get_forums_access) < 8)
        //  {


            if($is_limited_user =="yes")
        {
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {
                    $today_login = ActivityLog::whereHas('worker', function ($query)use($get_forums_access) {
                        $query->whereIN('id_forum',  $get_forums_access)
                        ->whereIN('id_dist' ,  Helper::getLevelIds('District') );

                     })
                    ->select('created_at' , 'id_emply')
                     ->whereBetween('created_at', [$start_, $end_])
                     ->get();
                     $today_clips_views = ClipView::whereHas('worker', function ($query)use($get_forums_access) {
                        $query->whereIN('id_forum',  $get_forums_access)
                        ->whereIN('id_dist' ,  Helper::getLevelIds('District') );
                     })
                     ->select('created_at')
                     ->whereBetween('created_at', [$start_, $end_])
                     ->get();


                }
                else
                {
                    $today_login = ActivityLog::whereHas('worker', function ($query)use($get_forums_access) {
                        $query->whereIN('id_forum',  $get_forums_access)
                        ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') );
                     })
                    ->select('created_at' , 'id_emply')
                     ->whereBetween('created_at', [$start_, $end_])
                     ->get();
                     $today_clips_views = ClipView::whereHas('worker', function ($query)use($get_forums_access) {
                        $query->whereIN('id_forum',  $get_forums_access)
                        ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') );
                     })
                    ->select('created_at')
                     ->whereBetween('created_at', [$start_, $end_])
                     ->get();
                }

        }
        else
        {
            $today_login = ActivityLog::whereHas('worker', function ($query)use($get_forums_access) {
                $query->whereIN('id_forum',  $get_forums_access);
             })
            ->select('created_at' , 'id_emply')
             ->whereBetween('created_at', [$start_, $end_])
             ->get();
             $today_clips_views = ClipView::whereHas('worker', function ($query)use($get_forums_access) {
                $query->whereIN('id_forum',  $get_forums_access);
             })
            ->select('created_at')
             ->whereBetween('created_at', [$start_, $end_])
             ->get();

        }





        //  }
        //  else
        //  {
        //     $today_login = ActivityLog::select('created_at' , 'id_emply')
        //     ->whereBetween('created_at', [$start_, $end_])
        //     ->get();
        //     $today_clips_views = ClipView::select('created_at')
        //     ->whereBetween('created_at', [$start_, $end_])
        //     ->get();
        //  }



        $dates = array();
        $zerdawat = array();
        $login_users = array();
        $login_users_unique = array();
        $clips_views = array();
        $table = array();

        foreach($between as $date)
        {

            $GLOBALS['unique_login_today'] = 0;
            $GLOBALS['unique_users_this_date'] = array();


            $filtered_workers = $workers_users->filter(function ($value, $key)  use ($date) {

                if($value->created_at->format('Y-m-d') ==  $date)
                {
                    return true;
                }
                return false;

            });
            $filtered_zerdawat = $zerdawat_users->filter(function ($value, $key)  use ($date) {



                if($value->created_at->format('Y-m-d') ==  $date)
                {
                    return true;
                }
                return false;

            });



            $filtered_login_today = $today_login->filter(function ($value, $key)  use ($date) {

                if(Carbon::parse($value->created_at)->format('Y-m-d') ==  $date)
                {
                    if(!in_array($value->id_emply,  $GLOBALS['unique_users_this_date'] ))
                    {
                        $GLOBALS['unique_login_today'] = $GLOBALS['unique_login_today'] + 1;
                        array_push($GLOBALS['unique_users_this_date']  , $value->id_emply );
                    }

                    return true;
                }
                return false;

            });



            $filtered_clips_view_today = $today_clips_views->filter(function ($value, $key)  use ($date) {

                if($value->created_at->format('Y-m-d') ==  $date)
                {
                    return true;
                }
                return false;

            });

            array_push($dates,array($date, count($filtered_workers)));
            array_push($zerdawat,array($date, count($filtered_zerdawat)));
            array_push($table,array($date , count($filtered_workers) , count($filtered_zerdawat)));

            array_push($login_users,array($date, count($filtered_login_today)));
            array_push($login_users_unique,array($date, $GLOBALS['unique_login_today']  ));
            array_push($clips_views,array($date, count($filtered_clips_view_today)));

        }

        return response()->json(['status'=>"get" ,
        'dates'=>$dates  ,'zerdawat'=>$zerdawat , 'login_users'=>$login_users , 'login_users_unique'=>$login_users_unique , 'clips_views'=>$clips_views,
        'view' => view('dawa_theme.reporting.include.daily-registration-table' ,['tables'=>$table ])->render() ,
        'view2' => view('dawa_theme.reporting.daily-registration-widget'  , ['tables'=>$table ]  )->render()  ]);

    }
    public function getGraphTesting(Request $request)
    {
        set_time_limit(0);
        $dates_get =  explode('to' , '01-Dec-2021 to 31-Dec-2021');
        $start =  trim($dates_get[0]);
        $end =  trim($dates_get[1]);


        $period = CarbonPeriod::create($start, $end);

        $between=array( );



    // Iterate over the period
    foreach ($period as $date) {

        array_push($between,$date->format('Y-m-d'));


    }



        $workers_users = User::all();
        $zerdawat_users = Wabastagan::all();

        $dates = array();
        $zerdawat = array();
        $table = array();

        foreach($between as $date)
        {

            $filtered_workers = $workers_users->filter(function ($value, $key)  use ($date) {

                if($value->created_at->format('Y-m-d') ==  $date)
                {
                    return true;
                }
                return false;

            });
            $filtered_zerdawat = $zerdawat_users->filter(function ($value, $key)  use ($date) {

                if($value->created_at->format('Y-m-d') ==  $date)
                {
                    return true;
                }
                return false;

            });


            array_push($dates,array($date, count($filtered_workers)));
            array_push($zerdawat,array($date, count($filtered_zerdawat)));
            array_push($table,array($date , count($filtered_workers) , count($filtered_zerdawat)));


        }

        return response()->json(['status'=>"get" ,
        'dates'=>$dates  ,'zerdawat'=>$zerdawat ,
        'view' => view('dawa_theme.reporting.include.daily-registration-table' ,['tables'=>$table ])->render() ,
        'view2' => view('dawa_theme.reporting.daily-registration-widget'  , ['tables'=>$table ]  )->render()  ]);

    }
    public function getToatlCount(Request $request)
    {

        return response()->json(['view'=> view('dawa_theme.manage.include.total_count' , ['is_page'=>false])->render()]);

    }
    public function switchUser(Request $request)
    {
        // dd($request->type);

        // $user = DB::table('users')->where('id',$request->id  )->first();

    //    dd($user->user_type);
        if(Helper::is_forum_level_user()  )
       {
         if($request->type == "worker")
         {
            //   dd("no");
            DB::table('users')->where('id', Auth::id())->update(array('user_type'=> "staff"));
            // $user->user_type = "staff";
            // $user->save();
         }
         if($request->type == "staff")
         {
            DB::table('users')->where('id', Auth::id())->update(array('user_type'=> "worker"));
            // dd("yes");
            // $user->user_type = "worker";
            // $user->save();
         }

        }


         return redirect()->route('home');


    }
    public function index()
    {
        $District = District::orderBy('dist_name', 'ASC')->get();
        $categories = BroadcastListCategory::where('user_id',Auth::id())->orderBy('ordering', 'ASC')->get();
        $wabastagans = Auth::user()->wabastagans;
        $wabastagans_temp = $wabastagans;

        $login = ActivityLog::whereDate('created_at', Carbon::today())->first();
        if(  $login  == null)
        {
            $remarks = 'Login to Software From Credentials';
            $log = new ActivityLog();
            $log->id_emply= Auth::id();
            $log->ip_address=  "000000";
            $log->created_at= now();
            $log->remarks=  $remarks;
            $log->save();
        }

        return view('dawa_theme.manage.dashboard', [
            'Districts'=> $District ,
            'categories'=> $categories ,
            'wabastagans'=> $wabastagans ,
            'total_wabastagan' => count($wabastagans),
            'wabastagans_temp'=>$wabastagans_temp


        ]);
    }
}
