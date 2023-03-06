<?php

namespace App\Http\Controllers;

use App\User;
use App\Asset;
use DataTables;
use App\Division;
use App\Custodian;
use Carbon\Carbon;
use App\Department;
use App\FixedAssest;
use App\Organization;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function delete_user(Request $request)
    {

        $id = $request->id;
        $user = User::find($id);
        if($user == null)
        {
            return abort(404);
        }
        $user->status = 0;
        $user->save();

        return redirect()->back();

    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::with([ 'created_by_user' , 'updated_by_user'])->where('status' , 1)->latest()
            ->where("id" , '<>' , Auth::user()->id)
             ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '

                            <Button   type="button"
                            id="row'.$row->id.'"
                            data-id="'.$row->id.'"
                            data-name="'.$row->name.'"
                            data-email="'.$row->email.'"
                            data-cnic="'.$row->cnic.'"
                            data-mobile="'.$row->mobile.'"
                            data-access_ids="'.$row->access_ids.'"
                            data-toggle="tooltip"
                             data-original-title="Edit"
                            class="edit btn btn-primary btn-sm editProduct">
                            <i class=" fas fa-pencil-alt"   aria-hidden="true"></i>
                            Edit</Button>
                            <Button   type="button"
                            data-id="'.$row->id.'"
                            data-toggle="tooltip"
                             data-original-title="Edit"
                            class="edit btn btn-danger btn-sm deleteuser">
                            <i class=" fas fa-trash-alt"   aria-hidden="true"></i>
                            Delete </Button>


                            ';
                            
                            return $btn; 
                            
                    })
                    ->addColumn('crated_by_name', function($row){     return $row->created_by_user->name;   })
                    ->addColumn('updated_by_name', function($row){     return $row->updated_by_user->name;   })

                    ->addColumn('name', function($row){  return $row->name;  })
                    ->addColumn('email', function($row){  return $row->email;  })
                    ->addColumn('mobile', function($row){  return $row->mobile;  })
                    ->addColumn('cnic', function($row){  return $row->cnic;  })
                    ->addColumn('level_type', function($row){

                          return Helper::getLevel($row->level_type);


                         })
                    ->addColumn('photograph', function($row){  return "<img src='".asset($row->photo)."' style='max-width:80px; max-height:80px;' alt='user photograph'/>";  })
                    ->rawColumns([
                        'name',
                        'email',
                        'photograph',
                        'mobile',
                        'cnic',
                        'level_type',
                        'action' , 'crated_by_name'  , 'updated_by_name' ])
                    ->make(true);
        }


        $fixedAssets = FixedAssest::where('status', 1)->get();
        $custodians = Custodian::where('status', 1)->get();
        if(!Helper::isAllow(7))
        {
           return abort(403);
        }

        return view('manage_users' , [
            'organizations' =>  Organization::with(['divisions'  ])->where('status', 1)->get() ,
            'departments' => Department::where('status', 1)->get() ,
            'fixedAssets' => $fixedAssets ,
            'custodians' => $custodians ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //    return $request->all();

        if($request->name == null  || trim($request->name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'User Name Required' ,
            ]);
        }
        if($request->email == null  || trim($request->email) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Email Required' ,
            ]);
        }
        if(User::where('email',$request->email)->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Email Alerady Exists' ,
            ]);
        }
        if($request->password == null  || trim($request->password) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Password Required' ,
            ]);
        }
        if( strlen($request->password ) < 6)
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Password Must be at least 6 characters ' ,
            ]);
        }
        if($request->level_type == null  || trim($request->level_type) == "" || trim($request->level_type) == 0)
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'User Level Required' ,
            ]);
        }


        // if($request->level_type == 3)
        // {
        //     if($request->organizations_set == null  || trim($request->organizations_set) == "")
        //     {
        //         return response()->json([
        //             'code'=>'500' ,
        //             'message'=>'Organizations Selections are  Required' ,
        //         ]);
        //     }
        // }
        // if($request->level_type == 4)
        // {
        //     if($request->divisions_set == null  || trim($request->divisions_set) == "")
        //     {
        //         return response()->json([
        //             'code'=>'500' ,
        //             'message'=>'Divisions Selections are   Required' ,
        //         ]);
        //     }
        // }
        // if($request->level_type == 5)
        // {
        //     if($request->departments_set == null  || trim($request->departments_set) == "")
        //     {
        //         return response()->json([
        //             'code'=>'500' ,
        //             'message'=>'Departments Selections are  Required' ,
        //         ]);
        //     }
        // }



        if($request->has('permission'))
        {
        if(count($request->permission) < 1 )
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'At least one permission required' ,
            ]);
        }
    }


          $user = new User();

          $user->name = ucwords($request->name);
          $user->email =  $request->email ; 
          $user->password =  Hash::make($request->password);


            //  convert base64 img into physical image
            //  convert base64 img into physical image

            if($request->base_path_img != null  || trim($request->base_path_img) != "")
            {
            $destinationPath = 'dawa_theme/assets/img/'; // upload path
            $folderPath = public_path('dawa_theme/assets/img/');
            $folderPath =str_replace("system/public/","",$folderPath);
            $imageName = date('YmdHis').str_replace(" ","",$request->name).'.png';
            $imageFullPath = $folderPath.$imageName;

        $image_parts = explode(";base64,",$request->base_path_img);
        $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);


        file_put_contents($imageFullPath, $image_base64);
        $user->photo  = $destinationPath.$imageName;
    }
    else {
        # code...default
        $user->photo  = "dawa_theme/assets/img/user.png";
    }

        //  convert base64 img into physical image end
            //  convert base64 img into physical image end

            $user->level_type =  $request->level_type ;
            $user->level_id =  $request->selection_ids ;
            if($request->has('permission'))
        {
            if(count($request->permission) > 0 )
            {
            $user->access_ids =  implode(",",$request->permission);  ;
            }
        }

            $user->save();


      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Created New Asset' ,

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



        if($request->name == null  || trim($request->name) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'User Name Required' ,
            ]);
        }
        if($request->email == null  || trim($request->email) == "")
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Email Required' ,
            ]);
        }
        if(User::where('email',$request->email)->where('id' , '<>' , $request->edit_id )->exists())
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Email Alerady Exists' ,
            ]);
        }




        if($request->has('permission'))
        {
        if(count($request->permission) < 1 )
        {
            return response()->json([
                'code'=>'500' ,
                'message'=>'At least one permission required' ,
            ]);
        }
        }


          $user =  User::find($request->edit_id);
          if($user==null)
          {
            return response()->json([
                'code'=>'500' ,
                'message'=>'Reload Page - Try Again' ,
             ]);
          }

          $user->name = ucwords($request->name);
          $user->email =  $request->email ; 
        //   if($request->has('password'))
        //   {
        //   $user->password =  Hash::make($request->password);
        //   }

            //  convert base64 img into physical image
            //  convert base64 img into physical image

    //         if($request->base_path_img != null  || trim($request->base_path_img) != "")
    //         {
    //         $destinationPath = 'dawa_theme/assets/img/'; // upload path
    //         $folderPath = public_path('dawa_theme/assets/img/');
    //         $folderPath =str_replace("system/public/","",$folderPath);
    //         $imageName = date('YmdHis').str_replace(" ","",$request->name).'.png';
    //         $imageFullPath = $folderPath.$imageName;

    //     $image_parts = explode(";base64,",$request->base_path_img);
    //     $image_type_aux = explode("image/", $image_parts[0]);
    //     // $image_type = $image_type_aux[1];
    //     $image_base64 = base64_decode($image_parts[1]);


    //     file_put_contents($imageFullPath, $image_base64);
    //     $user->photo  = $destinationPath.$imageName;
    // }
    // else {
    //     # code...default
    //     // $user->photo  = "dawa_theme/assets/img/default.png";
    // }

        //  convert base64 img into physical image end
            //  convert base64 img into physical image end

            // $user->level_type =  $request->level_type ;
            // $user->level_id =  $request->selection_ids ;
            if($request->has('permission'))
        {
            if(count($request->permission) > 0 )
            {
            $user->access_ids =  implode(",",$request->permission);  ;
            }
        }

            $user->save();


      return response()->json([
        'code'=>'200' ,
        'message'=>'Successfully Update User' ,

    ]);

    }
}
