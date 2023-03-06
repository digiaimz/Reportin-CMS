<?php

namespace App\Http\Controllers\CRUD;

use App\Activity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Activity::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "---";

                        if( Gate::allows('edit-activity' )) {
                            $btn = "";

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct" style="font-size: 14px;">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                           Edit</a>';

                           if($row->status == 1)
                           {
                            $btn = $btn.'
                            <span class="shadow-none badge badge-success" style="user-select: auto;">Active</span>';

                           }
                           else
                           {
                            $btn = $btn.'
                            <span class="shadow-none badge badge-danger" style="user-select: auto;">In-Active</span>';

                           }


                           $btn = $btn.'

                           <a href="javascript:void(0)"   data-id="'.$row->id.'"   class="changestatus">

                           <img class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chnage Status"   style="cursor: pointer; user-select: auto;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==">

                           </a>';
                        }

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('dawa_theme.setting.activities' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Activity::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'urdu_name' => $request->urdu_name]);

        return response()->json(['success'=>'Activity saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        return response()->json($activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $activity = Activity::find($id);
         if($activity->status == 1)
         {
            $activity->status =0;
         }
         else
         {
            $activity->status = 1;
         }
         $activity->save();

        return response()->json(['success'=>'Activity deleted successfully.']);
    }
}
