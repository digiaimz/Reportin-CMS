<?php

namespace App\Http\Controllers;

use App\Campaign;
use DataTables;
use App\FixedAssest;
use App\Helpers\Helper;
use App\Queuee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FixedAssetController extends Controller
{
    public function manage_group(Request $request , $group)
    {

        $group_get = FixedAssest::with(['created_by_user' , 'updated_by_user'])->where('slug' ,  $group)->first();
        if($group_get == null)
        {
            return abort(404);
        }

      return view('create-ad' , ['group_get' => $group_get ]) ;

    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = FixedAssest::with(['created_by_user' , 'updated_by_user'])->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)"
                              data-id="'.$row->id.'"
                              data-name="'.$row->name.'"
                              data-status="'.$row->status.'"
                              data-admins="'.$row->admins.'"
                            data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"
                            class="edit btn btn-primary btn-sm editProduct">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            Edit</a>


                            <a href="'.route('manage-groups.page', ['group' => $row->slug]).'"
                            class="edit btn btn-light btn-sm  " style="    background-color: #f0f0f8;border: 1px solid #cccbcb;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            Manage </a>


                            ';
                            if(Helper::isAllow(6))
                            {
                            return $btn;}
                            return "---";
                    })
                    ->addColumn('admins', function($row){
                        $myArr = [ ];

                        foreach(  explode(",",$row->admins) as $id)
                        {
                            array_push($myArr,Helper::getUserName($id));
                        }

                          return implode(' | ', $myArr); ;


                        }
                           )
                    ->addColumn('status', function($row){
                           if($row->status == 1)
                           {  return '<span class="badge badge-pill badge-success">Active</span>';       }
                              return '<span class="badge badge-pill badge-danger">In-Active</span>';   })
                    ->addColumn('crated_by_name', function($row){  return $row->created_by_user->name;  })
                    ->addColumn('updated_by_name', function($row){     return $row->updated_by_user->name;   })
                    ->rawColumns(['action' , 'crated_by_name'  , 'updated_by_name', 'status' , 'admins'])
                    ->make(true);
        }
        if(!Helper::isAllow(10))
        {
           return abort(403);
        }

        return view('settings.sign-categories');
    }
    public function dashboard(Request $request)
    {

        if ($request->ajax()) {
            $data = FixedAssest::with(['created_by_user' , 'updated_by_user'])->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '

                            ';
                            if(Helper::isAllow(6))
                            {
                            return $btn;}
                            return "---";
                    })
                    ->addColumn('admins', function($row){
                        $myArr = [ ];

                        foreach(  explode(",",$row->admins) as $id)
                        {
                            array_push($myArr,Helper::getUserName($id));
                        }

                          return implode(' | ', $myArr); ;


                        }
                           )
                    ->addColumn('status', function($row){
                           if($row->status == 1)
                           {  return '<span class="badge badge-pill badge-success">Active</span>';       }      return '<span class="badge badge-pill badge-danger">In-Active</span>';   })
                    ->addColumn('crated_by_name', function($row){  return $row->created_by_user->name;  })
                    ->addColumn('updated_by_name', function($row){     return $row->updated_by_user->name;   })
                    ->rawColumns(['action' , 'crated_by_name'  , 'updated_by_name', 'status' , 'admins'])
                    ->make(true);
        }
        if(!Helper::isAllow(10))
        {
           return abort(403);
        }

        return view('settings.sign-categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function compaign_queue_update(Request $request  )
     {
         if($request->edit_name2 == null  || trim($request->edit_name2) == "")
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Queue Name Required' ,
 
             ]);
         }
         if($request->admins == null  || count($request->admins) < 1)
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Agents Required' ,
 
             ]);
         }
 
         if(Queuee::where('name' ,trim($request->edit_name2))->where('campaign_id' , $request->campaign_id)->where('id' , '!=' ,$request->edit_id2)->exists())
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Queue Name - Already Exists' ,
 
             ]);
         }
 
 
         $selected_values = $request->admins;
         $admins = implode(",", $selected_values);
 
 
       $asset =   Queuee::find($request->edit_id2);
       $asset->name = $request->edit_name2;
       $asset->agents =  $admins ; 
       $asset->updated_by =   Auth::id();
       $asset->status = $request->edit_status2;
       $asset->save();


 
     $queues =  Queuee::with('created_by_user')->where('campaign_id' , $request->campaign_id )->get();
                            
                          
              $response = '   <tbody id="tbody'.$request->campaign_id.'" data-count="1"> ';
                               $i=1;  
                   foreach ($queues  as  $queue)
                      {   

$agents = "";
       $myArr = [ ];

                        foreach(  explode(",", $queue->agents) as $id)
                        {
                            array_push($myArr,\App\Helpers\Helper::getUserName($id));
                        }

                        $agents=   implode(' | ', $myArr);  

 
                              $response =  $response.'   
                                 <tr>
                                    <td>'.$i .'</td>
                                    <td>'.$queue->name .'</td>
                                    <td>'.$agents .'</td>';
                                 if($queue->status == 1)
                                 {
                                    $response =  $response.'   <td>  <span class="badge badge-pill badge-success">Active</span></td> ';
                                 }
                                 else
                                 {
                                    $response =  $response.'  <td> <span class="badge badge-pill badge-danger">In-Active</span> </td>';
                                 }
                                   

                                    $response =  $response.'         <td>'.$queue->created_at .'</td>
                                    <td>'.$queue->created_by_user->name .'</td>
                                    <td><button
                                        data-id="'.$queue->id .'" 
                                        data-name="'.$queue->name .'" 
                                        data-campaign= "'.$request->campaign_id.'"
                                        data-status="'.$queue->status .'" data-agents="'.$queue->agents .'"
                                         type="button" class="btn btn-light editProduct2"><i class=" fas fa-pencil-alt " 
                                         aria-hidden="true"></i> Edit</button></td>
                                </tr>';
                               
                              $i++;  
                    }
                              
                    $response =  $response.'      
                               </tbody>';



 
       return response()->json([
         'code'=>'200' ,
         'message'=>'Successfully Updated Queue' ,
         'row'=>   $response 
     ]);
     }

     public function compaign_queue_store(Request $request)
     {
 
         if($request->name2 == null  || trim($request->name2) == "")
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Group Name Required' ,
 
             ]);
         }
         if($request->admins == null  || count($request->admins) < 1)
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Agents Required' ,
 
             ]);
         }
 
         if(Queuee::where('name' ,trim($request->name2))->where('campaign_id' , $request->campaign_id)->exists())
         {
             return response()->json([
                 'code'=>'500' ,
                 'message'=>'Group Name - Already Exists' ,
 
             ]);
         }
 
 
 
         $selected_values = $request->admins;
         $admins = implode(",", $selected_values);
         
       $asset = new Queuee();
       $asset->name =  $request->name2;
       $asset->campaign_id =  $request->campaign_id;
       $asset->agents =  $admins ; 
       $asset->created_by =   Auth::id();
       $asset->status = 1;
       $asset->save();

       $agents = "";
       $myArr = [ ];

                        foreach(  explode(",", $asset->agents) as $id)
                        {
                            array_push($myArr,Helper::getUserName($id));
                        }

                        $agents=   implode(' | ', $myArr);  

 
       return response()->json([
         'code'=>'200' ,
         'message'=>'Successfully Created New Queue' ,
         'row'=>' <tr>
         <td>--</td>
         <td>'.$asset->name.'</td>
         <td>'. $agents.'</td> 
         <td> <span class="badge badge-pill badge-success">Active</span> </td>
         <td>'. $asset->created_at.'</td>
         <td>'.Auth::user()->name.'</td> 
         <td><button
         data-id="'.$asset->id.'"       data-name="'.$asset->name.'"  
                                        data-campaign="'.$request->campaign_id.'"  
                                        data-status="'.$asset->status.'"  
                                        data-agents="'.$asset->agents.'"
         
       type="button" class="btn btn-light editproduct2"><i class=" fas fa-pencil-alt " aria-hidden="true"></i> Edit</button></td>
     </tr>' ,
 
     ]);
     }


    public function store(Request $request)
    {

        if($request->name == null  || trim($request->name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Group Name Required' ,

            ]);
        }
        if($request->admins == null  || count($request->admins) < 1)
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Campaign Admin Required' ,

            ]);
        }

        if(FixedAssest::where('name' ,trim($request->name))->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Group Name - Already Exists' ,

            ]);
        }



        $selected_values = $request->admins;
        $admins = implode(",", $selected_values);

      $asset = new FixedAssest();
      $asset->name =  $request->name;
      $asset->admins =  $admins ;
      $asset->slug =  Str::slug($request->name, '-');
      $asset->created_by =   Auth::id();
      $asset->status = 1;
      $asset->save();

      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Created New Group' ,

    ]);
    }
    public function compaign_store(Request $request)
    {


        if($request->name == null  || trim($request->name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign Name Required' ,

            ]);
        }
        if($request->group_id == null  || trim($request->group_id) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign group_id Required' ,

            ]);
        }

        if(Campaign::where('name' ,trim($request->name))->where('group_id' , $request->group_id)->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign Name - Already Exists' ,

            ]);
        }


      $asset = new Campaign();
      $asset->name =  $request->name;
      $asset->group_id =  $request->group_id;
      $asset->created_by =   Auth::id();
      $asset->save();

      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Created New Group' ,

    ]);
    }


    public function compaign_update(Request $request)
    {


        if($request->name == null  || trim($request->name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign Name Required' ,

            ]);
        }
        if($request->group_id == null  || trim($request->group_id) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign group_id Required' ,

            ]);
        }

        if(Campaign::where('name' ,trim($request->name))->where('group_id' , $request->group_id)->where('id' , '!=' ,$request->id)->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Compaign Name - Already Exists' ,

            ]);
        }


      $asset = Campaign::find($request->id);
      $asset->name =  $request->name;
      $asset->group_id =  $request->group_id;
      $asset->updated_by =   Auth::id();
      $asset->save();

      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Created New Group' ,

    ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update_record(Request $request  )
    {
        if($request->edit_name == null  || trim($request->edit_name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Group Name Required' ,

            ]);
        }
        if($request->admins == null  || count($request->admins) < 1)
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Campaign Admin Required' ,

            ]);
        }

        if(FixedAssest::where('name' ,trim($request->edit_name))->where('id' , '!=' ,$request->edit_id)->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Group Name - Already Exists' ,

            ]);
        }


        $selected_values = $request->admins;
        $admins = implode(",", $selected_values);


      $asset =   FixedAssest::find($request->edit_id);
      $asset->name = $request->edit_name;
      $asset->admins =  $admins ;
      $asset->slug =  Str::slug($request->edit_name, '-');
      $asset->updated_by =   Auth::id();
      $asset->status =$request->edit_status;
      $asset->save();

      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Updated Category' ,

    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
