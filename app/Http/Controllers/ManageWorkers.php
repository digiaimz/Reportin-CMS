<?php

namespace App\Http\Controllers;

use App\User;
use App\Forum;
use App\District;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Exports\WorkersExport;
use Yajra\DataTables\DataTables;

use App\Exports\WorkersCSVExport;
use App\Exports\WorkersPDFExport;
use App\Exports\WorkersHTMLExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;



class ManageWorkers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function export_users(Request $request)
     {
        $district = null;
        if($request->has('district') )
        {
            if($request->district != "all")
            {
                $district = $request->district;
            }
            }

        return Excel::download(new WorkersExport( $district ), date('d-M-Y H:i:s').' Workers.xlsx');
     }

     public function export_users_csv(Request $request)
     {
        $district = null;
        if($request->has('district') )
        {
            if($request->district != "all")
            {
                $district = $request->district;
            }
            }
        return new WorkersCSVExport( $district );

    }
     public function export_users_html(Request $request)
     {
        $district = null;
        if($request->has('district') )
        {
            if($request->district != "all")
            {
                $district = $request->district;
            }
            }
        return new WorkersHTMLExport( $district );

    }
    //  public function export_users_pdf(Request $request)
    //  {

    //     return new WorkersPDFExport();

    // }


    public function getReport(Request $request)
    {

        if(request()->ajax())
        {

            $districts =null;



            $districts = District::has('users')->withcount('users' , 'users_wabastagans')->latest()
            ->where('id_dist', '<>', 1 )
            ->where('id_dist', '<>', 2 )
            ->get();



            return DataTables::of($districts)

                    ->addColumn('workers', function($data){
                         return   $data->users_count;
                    })
                    ->addColumn('zerdawat', function($data){
                         return $data->users_wabastagans_count;
                    })
                    ->rawColumns(['workers' , 'zerdawat'])
                    ->make(true);
        }





    }

    public function getReport_full_page(Request $request)
    {

        if(request()->ajax())
        {

            $districts =null;

            $districts = District::has('users')->withcount('users' , 'users_wabastagans')->latest()->get();

            return DataTables::of($districts)
                    ->addColumn('workers', function($data){
                         return   $data->users_count;
                    })
                    ->addColumn('zerdawat', function($data){
                         return $data->users_wabastagans_count;
                    })
                    ->addColumn('inactive', function($data){
                        return  User::doesnthave('wabastagans')
                        ->where('id_dist' ,$data->id_dist  )
                        ->whereIN('id_forum' , Helper::get_forums_access() )
                        ->count();
                    })
                    ->rawColumns(['workers' , 'zerdawat' , 'inactive'])
                    ->make(true);
             }
         }


    public function chnagePassword(Request $request)
    {


        if(request()->ajax())
        {
            $users = null;



        // because every staff member is a forum level user

        if(Helper::is_limted_user()=="yes")
        {
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

            $users = User::orderBy('id', 'DESC')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->where('whatsapp' ,  $request->whatsapp )
            ->latest()->get();

                }
                else
                {
                    $users = User::orderBy('id', 'DESC')
                    ->whereIN('id_forum' , Helper::get_forums_access() )
                    ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') )
                    ->where('whatsapp' ,  $request->whatsapp )
                    ->latest()->get();

                }
        }
        else
        {
            $users = User::orderBy('id', 'DESC')
                ->whereIN('id_forum' , Helper::get_forums_access() )
                ->where('whatsapp' ,  $request->whatsapp )
                ->latest()->get();
        }








            $GLOBALS['total'] =  count($users) + 1;

            return DataTables::of($users)

                    ->addColumn('name_picture', function($data){

                        $html = '<img src="'.asset($data->photo).'"  class="img-resp" alt="Image">
                        <div class="user-meta-info name-img"  >
                          <span class="user-name" data-name=" ">
                          ';
                          if(trim($data->name) != ''){  $html =  $html.$data->name."<br>".$data->whatsapp; }
                          else{ $html =  $html. "N/A"."<br>".$data->whatsapp;}
                          $html =  $html.'</span>  </div> ';

                        return   $html   ;
                  })
                 ->addColumn('value', function($data)   {
                    $GLOBALS['total']  =  $GLOBALS['total']   - 1;

                          return  self::convert_from_latin1_to_utf8_recursively($GLOBALS['total']) ;
                  })


                 ->rawColumns([   'name_picture'  , 'value'  ])
                    ->make(true);
        }

    }
    public function index(Request $request)
    {

        if (! Gate::allows('view-worker')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }


            ini_set('memory_limit', '7024M');
            $users = null;


        // because every staff member is a forum level user


// dd("working");
 //  dd ($request->district);

        if($request->has('district') &&  $request->district != "all" )
        {

            $dist_id = -6;

            if(in_array($request->district, Helper::getLevelIds('District')))
            {
                $dist_id = $request->district;
            }

            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
            'wabastagans' , 'promoted_Workers'
            , 'added_Workers_by_refferal' , 'clips_views')
           ->whereIN('id_forum' , Helper::get_forums_access() )
           ->where('id_dist' ,  $dist_id )
           ->orderBy('id', 'DESC')
           ->latest()
           ->paginate(25);

        }

else{
        // dd ($request->district);
       if(Helper::is_limted_user()=="yes")
        {
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
             'wabastagans' , 'promoted_Workers'
             , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->orderBy('id', 'DESC')
            ->latest()
            ->paginate(25);
                }
                else
                {

                    $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
                     'wabastagans' , 'promoted_Workers'
                     , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') )
            ->orderBy('id', 'DESC')
            ->latest()
            ->paginate(25);
            // dd ($request->district);
                }
        }
        else
        {
            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
             'wabastagans' , 'promoted_Workers'
             , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->orderBy('id', 'DESC')
            ->latest()
            ->paginate(25);
        }
    }


// dd($users);

        return view('dawa_theme.workers.manage' , ['users' => $users , 'count' =>  $users->total()  -   ($users->perPage() * ($users->currentPage() - 1))  ] );

    }

    public static function convert_from_latin1_to_utf8_recursively($dat)
   {
      if (is_string($dat)) {
         return utf8_encode($dat);
      } elseif (is_array($dat)) {
         $ret = [];
         foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

         return $ret;
      } elseif (is_object($dat)) {
         foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

         return $dat;
      } else {
         return $dat;
      }
   }




    public function addNew()
    {
        return view('dawa_theme.workers.addNew');
    }
    public function getWorkers(Request $request)
    {

        $total =   $request->total;


        $workers = User::orderBy('id', 'DESC')
        ->skip((int)$request->skip)
        ->take((int)$request->take)
        ->get();

              $view =view('dawa_theme.workers.include.workers' ,
              ['workers' => $workers ,
              'i' => $total -  (int)$request->skip
              ] )->render();

   return response()->json(

            [
                'status'=>'view',
                'view' => $view

                ]

        );



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         return view('dawa_theme.workers.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
