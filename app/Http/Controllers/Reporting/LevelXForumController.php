<?php

namespace App\Http\Controllers\Reporting;


use App\Zone;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tehsil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LevelXForumController extends Controller
{
    public function zone_wise(Request $request , $id=null){

        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-level-x-forum-reprting')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }

        if(
            Auth::user()->access_type  == "Admin" ||
            Auth::user()->access_type  == "Markazi" ||
            Auth::user()->access_type  == "Zone"
        )
        {
            return view('dawa_theme.reporting.levelxforum.zone-wise');

        }
        else{
            {
                abort(403);
            }
        }


    }
    public function district_wise(Request $request , $id=null){
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-level-x-forum-reprting')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        $zones = null;
        if( \App\Helpers\Helper::is_limted_user() == "yes")
        {
            $zones = Zone::orderBy('zone_name')->whereIN('id_zone' , \App\Helpers\Helper::getLevelIds('Zone') )->get();
        }
       else {
            $zones = Zone::orderBy('zone_name')->get();
        }



        if($id == null)
        {
            $id =   $zones[0]->id_zone ;
        }

            if(!Zone::has('districts')->where('id_zone' , $id)->exists())
            {
                return abort(404, 'No District Record Found');
            }





            if(
                Auth::user()->access_type  == "Admin" ||
                Auth::user()->access_type  == "Markazi" ||
                Auth::user()->access_type  == "Zone" ||
                Auth::user()->access_type  == "District"
            )
            {

        return view('dawa_theme.reporting.levelxforum.district-wise'
     ,
     ['zones' => $zones ,
        'id' => $id
     ]

    );
}
else
{
    abort(403);
}

    }


    public function tehsil_wise(Request $request , $id=null){

        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-level-x-forum-reprting')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        $districts = null;
        if( \App\Helpers\Helper::is_limted_user() == "yes")
        {
            $districts = District::orderBy('dist_name')->whereIN('id_dist' , \App\Helpers\Helper::getLevelIds('District') )->get();
        }
       else {
        $districts = District::orderBy('dist_name')->get();
        }


        if($id == null)
        {
            $id =   $districts[0]->id_dist ;
        }

        if(!District::has('tehsils')->where('id_dist' , $id)->exists())
        {
            return abort(404, 'No Tehsil Record Found');
        }

        if(
            Auth::user()->access_type  == "Admin" ||
            Auth::user()->access_type  == "Markazi" ||
            Auth::user()->access_type  == "Zone" ||
            Auth::user()->access_type  == "District"||
            Auth::user()->access_type  == "Tehsil"
        )
        {

        return view('dawa_theme.reporting.levelxforum.tehsil-wise'
        ,
     ['districts' => $districts ,
        'id' => $id
     ]

    );
}
else{
    abort(403);
}



    }

    public function  pp_wise(Request $request , $id=null){

        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-level-x-forum-reprting')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


       $tehsils = null;
        if( \App\Helpers\Helper::is_limted_user() == "yes")
        {
            $tehsils = Tehsil::orderBy('tsl_name')->whereIN('id_dist' , \App\Helpers\Helper::getLevelIds('District') )->get();
        }
       else {
        $tehsils = Tehsil::orderBy('tsl_name')->get();
        }


        if($id == null)
        {
            $id =  Tehsil::has('pp')->orderBy('tsl_name')->first()->id_tsl  ;
        }

        if(!Tehsil::has('pp')->where('id_tsl' , $id)->exists())
        {
            return abort(404, 'No Tehsil Record Found');
        }

        if(
            Auth::user()->access_type  == "Admin" ||
            Auth::user()->access_type  == "Markazi" ||
            Auth::user()->access_type  == "Zone" ||
            Auth::user()->access_type  == "District"||
            Auth::user()->access_type  == "Tehsil"
        )
        {

        return view('dawa_theme.reporting.levelxforum.pp-wise'
        ,
     ['tehsils' => $tehsils ,
        'id' => $id
     ]

    );
}
else{
    abort(403);
}



    }

    public function uc_wise(Request $request , $id=null){

        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-level-x-forum-reprting')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        $tehsils = null;
        if( \App\Helpers\Helper::is_limted_user() == "yes")
        {
            $tehsils = Tehsil::orderBy('tsl_name')->whereIN('id_dist' , \App\Helpers\Helper::getLevelIds('District') )->get();
        }
       else {
        $tehsils = Tehsil::orderBy('tsl_name')->get();
        }


        if($id == null)
        {
            $id =   $tehsils[0]->id_tsl  ;
        }

        if(!Tehsil::has('ucs')->where('id_tsl' , $id)->exists())
        {
            return abort(404, 'No UC Record Found');
        }

        if(
            Auth::user()->access_type  == "Admin" ||
            Auth::user()->access_type  == "Markazi" ||
            Auth::user()->access_type  == "Zone" ||
            Auth::user()->access_type  == "District"||
            Auth::user()->access_type  == "Tehsil"
        )
        {


        return view('dawa_theme.reporting.levelxforum.uc-wise'
        ,
     ['tehsils' => $tehsils ,
        'id' => $id
     ]

    );
}
else{
    abort(403);
}



    }



}
