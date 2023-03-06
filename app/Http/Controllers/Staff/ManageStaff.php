<?php

namespace App\Http\Controllers\Staff;

use App\User;
use App\Designation;
use App\ForumAccess;
use App\Helpers\Helper;
use App\PlaceOfDesignation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ManageStaff extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function assign_designation(Request $request  )
    {

        // dd($request->all() );

        $user  = User::doesntHave('designation')->find($request->user_id);

        if($user  == null)
        {
         return redirect()->back();
        }
        $designation = Designation::find($request->user_designation_id);
        if($designation  == null)
        {
         return redirect()->back();
        }

        $user->designation_id = $request->user_designation_id;
        $user->access_level = $request->user_access;
        $user->access_type = $designation->level; // from tabel
        $user->is_designation_active = 1;
        $user->assign_designation_by = Auth::id();
        $user->update_designation_by = Auth::id();
        $user->save();

        DB::table('forum_access')->where('user_id',$user->id)->delete();

            $access = new ForumAccess();
            $access->forum_id = $designation->forum_id;
            $access->user_id = $user->id;
            $access->status = 1;
            $access->save();

        DB::table('places_of_designation')
        ->where('place_id',$request->user_access)
        ->where('designation_id',$designation->id)
        ->delete();

        $places_of_designation = new PlaceOfDesignation();
        $places_of_designation->place_id =  $request->user_access;
        $places_of_designation->level =  $designation->level ;
        $places_of_designation->user_id =  $user->id ;
        $places_of_designation->designation_id =  $designation->id ;
        $places_of_designation->save();


        return redirect()->back();


    }
    public function deleteUser(Request $request , $id)
    {
       $user = User::find($id);
       if($user == null)
       {
        return redirect()->back();
       }
       $user->user_type = "worker";
       $user->designation_id = null;
       $user->is_designation_active = 0;
       $user->update_designation_by = Auth::id();
       $user->save();
       DB::table('forum_access')->where('user_id',$user->id)->delete();
       DB::table('places_of_designation')
       ->where('user_id', $user->id)
       ->delete();


       return redirect()->back();

    }
    public function getWorker(Request $request , $id)
    {
        $user = User::doesntHave('designation')->where('whatsapp', $id)->whereIN('id_forum' , Helper::get_forums_access())->first();
        if($user != null)
        {
            return response()->json([
                'status'=> '200' ,
                'name'=> $user->name ,
                'whatsapp'=> $user->whatsapp ,
                'photo'=> asset($user->photo) ,
                'id'=>  $user->id  ,

            ]);
        }
        return response()->json(['status'=> '404']);
    }
    public function ChnageWorkerPassword(Request $request)
    {
        $user = User::find($request->user_id);
        if($user == null)
        {
            return response()->json(['status'=> "not-found"]);
        }
        else
        {
            $user->password =  Hash::make($request['password']);
            $user->save();
            return response()->json(['status'=> 'update']);
        }


    }
     public function updateProfile(Request $request)
    {
        $user = User::find($request->user_id);
        if($user == null)
        {
            return response()->json(['status'=> "not-found"]);
        }
        else
        {
            $user->id_forum =  $request['id_forum'];
            $user->save();
            return response()->json(['status'=> 'update']);
        }


    }

    public function index()
    {
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

        if (! Gate::allows('view-designation')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }

        return view('dawa_theme.staff.viewAll');
    }
    public function save(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'designation_id' => 'required',
            'access_level' => 'required',
        ]);

        $forum_ids = explode(",", $request->forum_ids);
        $access_ids = explode(",", $request->access_ids);
        if(count($forum_ids) < 1 )
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }
        if(count($access_ids) < 1 )
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }


        $user = User::find($request->user_id);

        if($user == null)
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }
        $user->designation_id = $request->designation_id;
        $user->access_type = $request->access_level;
        $user->access_level = $request->access_ids;
        $user->assign_designation_by = Auth::id();
        $user->save();


        foreach($forum_ids as $id)
        {
            $access = new ForumAccess();
            $access->forum_id =$id;
            $access->user_id = $user->id;
            $access->save();
        }


  return redirect()->route('view.staff')->with('msg' , 'Dignitary access has given to <b>'.ucwords($user->name)."</b>. Successfully!");




    }
    public function update_user(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'designation_id' => 'required',
            'access_level' => 'required',
        ]);

        $forum_ids = explode(",", $request->forum_ids);
        $access_ids = explode(",", $request->access_ids);
        if(count($forum_ids) < 1 )
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }
        if(count($access_ids) < 1 )
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }
        // dd($request->all());
        $user = User::find($request->user_id);
        if($user == null)
        {
            return redirect()->back()->with('msg' , 'Something went wrong. Please Try Again.');
        }
        $user->designation_id = $request->designation_id;
        $user->access_type = $request->access_level;
        $user->access_level = $request->access_ids;
        $user->update_designation_by = Auth::id();
        $user->save();
        DB::table('forum_access')->where('user_id',$user->id)->delete();
        foreach($forum_ids as $id)
        {
              $access = new ForumAccess();
            $access->forum_id =$id;
            $access->user_id = $user->id;
            $access->status = 1;
            $access->save();
        }


  return redirect()->route('view.staff')->with('msg' , 'Update Dignitary access for  <b>'.ucwords($user->name)."</b>. Successfully!");




    }

    public function workersGet(Request $request)
    {
        if(request()->ajax())
        {
            ini_set('memory_limit', '2024M');

               $users = User::doesnthave('designation')->latest()->get();


               return DataTables::of($users)

                       ->addColumn('user_info', function($data){

                        return '<img src="'.asset($data->photo).'"   class="user-img"/>
                        <div class="user-info-right">
                          <b>Name:</b>'.$data->name.' '.$data->fathername.'<br>
                          <b>Email:</b>'.$data->email.' <br>
                          <b>WhatsApp:</b>'.$data->whatsapp.' <br>
                        </div>';


                     })
                     ->rawColumns([  'user_info'  ])
                    ->make(true);


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetBelowBody(Request $request)
    {
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }
        if (! Gate::allows('create-Tanzim')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }

        $access_level = $request->access_level;
        $access_ids = $request->access_ids;
        $forum_ids = $request->forum_ids;
        // validate
        return view('dawa_theme.staff.AssignTeamBelow' ,
        [
          'access_level'=> $access_level ,
          'access_ids'=> $access_ids ,
          'forum_ids'=> $forum_ids ,
        ]
    );

    }
    public function create()
    {

        if (! Gate::allows('create-Tanzim')) {
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

        return view('dawa_theme.staff.addNew');
    }
    public function createTeam()
    {
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }
        if (! Gate::allows('view-Tanzim')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        return view('dawa_theme.staff.createTeam');
    }
    public function createTeamBelow()
    {
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }
        if (! Gate::allows('create-Tanzim')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }



        if( Auth::user()->access_type  == "Tehsil")
        {
            return abort(403);
        }
        return view('dawa_theme.staff.createTeamBelow');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::with('all_forum_access')->find($id);
        if($user != null)
        {
            return view('dawa_theme.staff.edit' , ['user' => $user]);
        }
        return abort( 404);

    }
    public function changeStatus($id = null)
    {
        if($id == null)
        {
            return redirect()->back() ;
        }
        $user = User::find($id);
        if($user != null)
        {
            $html = "";
            if($user->is_designation_active == 1)
            {
                $user->is_designation_active = 0;
                $user->user_type = "worker";
                $html = "Status Update  of ".$user->name." From Active To In-active Successfully.";
            }
            else{
                $user->user_type = "worker";
                $user->is_designation_active = 1;
                $html = "Status Update   of ".$user->name." From In-active To Active Successfully.";
            }
        $user->save();
            return redirect()->back() ;

        }
        return redirect()->back() ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterForum(Request $request )
    {

        if($request->has('activeForums'))
        {
     DB::table('forum_access')->where('user_id', Auth::id())->update(array('status'=> 0));
     DB::table('forum_access')->where('user_id', Auth::id())
     ->whereIN('forum_id' , $request->activeForums )
     ->update(array('status'=> 1));
        }
        return redirect()->back();


    }
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
