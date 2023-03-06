<?php

namespace App\Http\Controllers\Reporting;

use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DistrictSummeryController extends Controller
{
     public function forum_comparison()
     {
        if(Auth::user()->access_type !="Admin")
        {
          return abort(403);
        }

        return view('dawa_theme.reporting.forum-comparison-district-summery');

    }
     public function top20District()
     {
        if(Auth::user()->access_type !="Admin")
        {
          return abort(403);
        }
           return view('dawa_theme.reporting.top_20_districts');
     }
     public function index()
     {
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }
           return view('dawa_theme.reporting.district-summery');
     }
     public function getResult(Request $request)
     {
                 $zones =explode(",",$request->zones);
                $districts = District::with('users')->whereIN('id_zone', $zones)->orderBy('dist_name', 'ASC')->get();
                 $view_graph= view('dawa_theme.reporting.include.district-graph' , ['districts'=>$districts])->render();
                 $view_stat= view('dawa_theme.reporting.include.district-stat' , ['districts'=>$districts])->render();

        return response()->json(['status'=> 'ok'
    , 'view_graph'=>$view_graph
    , 'view_stat'=>$view_stat

    ]);
     }


     public function zone_summery_stats($zone_id = 0)
     {
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }
           return view('dawa_theme.reporting.zone-summery-stats' , ['zone_id' => $zone_id]);
     }


}
