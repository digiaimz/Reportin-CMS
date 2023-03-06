<?php

namespace App\Http\Controllers\Staff\Role;

use App\Forum;
use App\Permission;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ManageRoles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $forum = "";
        $level = "";

        if($request->has('forum'))
        {
            $forum = $request->forum;
        }
        if($request->has('level'))
        {
            $level = $request->level;
        }

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
        $forums = Forum::where('frm_shown' , 1)->orderBy('frm_ordering', 'ASC')->get();
        $designations = null;

        if($forum != "" && $level != "" )
        {
            $designations =  Designation::with('permissions' , 'forum' ,'fill_seats' )
            ->where('forum_id', $forum )
            ->where('level'  , $level )
           ->get();
        }
        elseif($forum !=""  )
        {
            $designations =  Designation::with('permissions' , 'forum' ,'fill_seats' )
            ->where('forum_id', $forum )
           ->get();
        }
        elseif($level !="" )
        {
            $designations =  Designation::with('permissions' , 'forum' ,'fill_seats' )
            ->where('level'  , $level )
           ->get();

        }
        else{
            $designations =  Designation::with('permissions' , 'forum' ,'fill_seats' )
           ->get();
        }


        return view('dawa_theme.staff.roles.viewAll' , [
            'designations' => $designations ,
            'forums' => $forums ,
            'forum_id' => $forum ,
            'level' => $level ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }
        if (! Gate::allows('create-designation')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        $permissions =  Permission::select('for' , 'ordering')->distinct()->with('permissions')->orderBy('ordering' )->get() ;

        return view('dawa_theme.staff.roles.addRole' , ['permissions' => $permissions ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'forum_id' => 'required',
            'name' =>  [
                'required','max:200','min:3',
                Rule::unique('designations')
                       ->where('level', $request->level)
                       ->where('forum_id', $request->forum_id)
            ],
            'permission' => 'required',
        ]);

    //    dd($final_array);

        $designation = new Designation();
        $designation->name = trim($request->name);
        $designation->forum_id = trim($request->forum_id);
        $designation->level = trim($request->level);
        $designation->created_by = Auth::id();
        $designation->save();

         $input["permission"] = $request["permission"];

        $designation->permissions()->sync($input['permission']);



        // $designation = new Designation();
        // $designation->name = trim($request->name);
        // $designation->forum_id = trim($request->forum_id);
        // $designation->level = "Markazi";
        // $designation->created_by = Auth::id();
        // $designation->save();
        // $input["permission"] = $request["permission"];

        // $designation->permissions()->sync($input['permission']);


        // $designation = new Designation();
        // $designation->name = trim($request->name);
        // $designation->forum_id = trim($request->forum_id);
        // $designation->level = "Zone";
        // $designation->created_by = Auth::id();
        // $designation->save();
        // $input["permission"] = $request["permission"];

        // $designation->permissions()->sync($input['permission']);


        // $designation = new Designation();
        // $designation->name = trim($request->name);
        // $designation->forum_id = trim($request->forum_id);
        // $designation->level = "District";
        // $designation->created_by = Auth::id();
        // $designation->save();
        // $input["permission"] = $request["permission"];

        // $designation->permissions()->sync($input['permission']);


        // $designation = new Designation();
        // $designation->name = trim($request->name);
        // $designation->forum_id = trim($request->forum_id);
        // $designation->level = "Tehsil";
        // $designation->created_by = Auth::id();
        // $designation->save();
        // $input["permission"] = $request["permission"];

        // $designation->permissions()->sync($input['permission']);





        return redirect()->back()->with('msg', 'Congratulation!  New Designation Created Successfully !');
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
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }
        if (! Gate::allows('edit-designation')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }


        $designation  = Designation::with('permissions')->find($id);

        //  dd($designation->permissions->pluck('id')->toArray() );

        if($designation != null)
        {

        $permissions =  Permission::select('for' , 'ordering')->distinct()->with('permissions')-> orderBy('ordering' )->get() ;

        return view('dawa_theme.staff.roles.editRole' , [
            'permissions' => $permissions ,
            'designation' => $designation
         ]);

         }
        return abort(404, 'Not Found');

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
        $request->validate([

            'level' => 'required',
            'forum_id' => 'required',
            'name' =>  [
                'required','max:200','min:3',
                Rule::unique('designations')
                      ->ignore($id)
                       ->where('level', $request->level)
                       ->where('forum_id', $request->forum_id)
            ],
            'permission' => 'required',
        ]);

        $designation  = Designation::find($id);
        if($designation == null)
        {
            return abort(404, 'Not Found');
        }
        $designation->name = trim($request->name);
        $designation->forum_id = trim($request->forum_id);
        $designation->level = trim($request->level);
        $designation->updated_by = Auth::id();
        $designation->save();

        $input["permission"] = $request["permission"];

        $designation->permissions()->sync($input['permission']);


        return redirect()->back()->with('msg', 'Congratulation!  Updated Successfully !');
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
