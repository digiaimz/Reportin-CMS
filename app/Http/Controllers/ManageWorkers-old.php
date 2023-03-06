<?php

namespace App\Http\Controllers;

use App\User;
use App\Forum;
use App\District;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManageWorkers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReport(Request $request)
    {


        if(request()->ajax())
        {
            return DataTables::of(District::with('users')->latest()->get())
                    ->addColumn('workers', function($data){
                         return   Count($data->users);
                    })
                    ->addColumn('zerdawat', function($data){
                         return \App\Helpers\Helper::getWorkerInvityCountNew($data->users->pluck('id')->toArray());
                    })
                    ->rawColumns(['workers' , 'zerdawat'])
                    ->make(true);
        }





    }





    public function chnagePassword(Request $request)
    {


        if(request()->ajax())
        {
            $users = null;

            if(Helper::is_forum_level_user())
            {
                $users = User::orderBy('id', 'DESC')
                ->whereIN('id_forum' , Helper::get_forums_access() )
                ->latest()->get();
            }
            else
            {
                $users = User::orderBy('id', 'DESC')
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

                        return  $html;
                  })
                 ->addColumn('value', function($data)   {
                    $GLOBALS['total']  =  $GLOBALS['total']   - 1;

                          return $GLOBALS['total']  ;
                  })


                 ->rawColumns([   'name_picture'  , 'value'  ])
                    ->make(true);
        }

    }
    public function index(Request $request)
    {
        ini_set('memory_limit', '2024M');

        if(request()->ajax())
        {
            $users = null;


            if(Helper::is_forum_level_user()){
            $users = User::with('forum' , 'district'  , 'tehsil' , 'wabastagans')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->orderBy('id', 'DESC')
            ->latest()
            ->get();
            }
            else{
           $users = User::with('forum' , 'district'  , 'tehsil' , 'wabastagans')
           ->orderBy('id', 'DESC')
           ->latest()
           ->get();
            }

            $GLOBALS['total'] = count($users) + 1;

         return DataTables::of($users)

                    ->addColumn('name_picture', function($data){

                        $html = '<img src="'.asset($data->photo).'"  class="img-resp" alt="Image">
                        <div class="user-meta-info name-img"  >
                          <span class="user-name" data-name=" ">
                          ';
                          if(trim($data->name) != ''){  $html =  $html.$data->name; }
                          else{ $html =  $html. "N/A";}
                          $html =  $html.'</span>  </div> ';

                        return  $html;
                  })

                    ->addColumn('forum', function($data){

                        $html = '<span class="user-forum"  >';

                        if(trim($data->forum) != null){  $html =  $html.$data->forum->frm_code ; }
                        else{ $html =  $html. "N/A"; }

                      $html =  $html.'</span> ';

                        return  $html;
                  })
                    ->addColumn('district', function($data){

                        $html = '<span class="user-district"  >';

                        if(trim($data->district) != null){  $html =  $html.$data->district->dist_name ; }
                        else{ $html =  $html. "N/A"; }

                      $html =  $html.'</span> ';

                        return  $html;
                  })
                    ->addColumn('tehsil', function($data){

                        $html = '<span class="user-tehsil"  >';

                        if(trim($data->tehsil) != null){  $html =  $html.$data->tehsil->tsl_name ; }
                        else{ $html =  $html. "N/A"; }

                      $html =  $html.'</span> ';

                        return  $html;
                  })
                    ->addColumn('listed', function($data){

                        $html = '  <span class="black" style="font-size: 20px;    margin-left: 16px;">
                        ';

                        if(trim($data->wabastagans) != null){  $html =  $html.count($data->wabastagans) ; }
                        else{ $html =  $html. "0"; }

                        // $html =  $html.' --- </span>';

                        return  $html;
                    })
                    ->addColumn('date', function($data){



                        $html = \Carbon\Carbon::parse($data->created_at)->format('d-M')."  <br /> <span>"
                        .\Carbon\Carbon::parse($data->created_at)->format('H:i:s')."</span>";

                        return  $html;
                    })
                    ->addColumn('value', function($data)   {
                        $GLOBALS['total']  =  $GLOBALS['total']   - 1;

                              return $GLOBALS['total']  ;
                      })
                 ->rawColumns([  'value' , 'name_picture'   , 'forum' , 'district' ,'tehsil' , 'listed'  , 'date'])
                    ->make(true);
        }

        else
        {

            $workers = null;

            if(Helper::is_forum_level_user()){
            $workers = User::with('promoted_Workers', 'added_Workers_by_refferal' ,'profession' ,'forum' , 'district'  , 'tehsil' , 'wabastagans')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->orderBy('id', 'DESC')
            ->paginate(50);
            }
            else{
           $workers = User::with('promoted_Workers', 'added_Workers_by_refferal' ,'profession' ,'forum' , 'district'  , 'tehsil' , 'wabastagans')
           ->orderBy('id', 'DESC')
           ->paginate(50);
            }

            return view('dawa_theme.workers.manage' , ['workers' => $workers]);

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
