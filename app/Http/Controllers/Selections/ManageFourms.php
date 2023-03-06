<?php

namespace App\Http\Controllers\Selections;

use Form;
use App\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManageFourms extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dawa_theme.setting.forms.forums.index');
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
    public function edit($slug)
    {
        $forum = Forum::where('id_frm' , $slug)->first();
        if($forum != null)
        {
            return view('dawa_theme.setting.forms.forums.edit', ['slug' => $slug , 'forum'=>$forum]);
        }
    return abort(404 , 'No Record Found');

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
            'frm_name' => 'required|max:155',
            'frm_code' => 'required|max:9',
            'frm_shown' => 'required',
         ]);


        $forum = Forum::where('id_frm' ,  $id)->first();
        if($forum != null)
        {
            $forum->frm_name =  trim($request->frm_name);
            $forum->frm_name_ur =  trim($request->frm_name_ur);
            $forum->frm_code =  trim($request->frm_code);
            $forum->frm_shown = (int)$request->frm_shown;
            $forum->id_modify = Auth::id();

            $forum->save();
            return back()->with('msg' ,  'Forum Successfully Update');


        }
    return abort(404 , 'No Record Found');


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
