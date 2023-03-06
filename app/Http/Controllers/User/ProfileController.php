<?php

namespace App\Http\Controllers\User;

use App\District;
use App\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profession;
use App\Tehsil;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BroadcastListCategory;
use App\UC;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        $tehsils  = "";
        $forums  =  Forum::where('frm_shown', 1)->get();
        $districts  =  District::where('dist_shown', 1)->orderBy('dist_name', 'ASC')->get();
        $ucs = null;

        if(Auth::user()->load('district')->district != null)
        {
            $tehsils  =  Tehsil::where('tsl_shown', 1)->orderBy('tsl_name', 'ASC')->where('id_dist' ,
             Auth::user()->load('district')->district->id_dist  )->get();

             if(Auth::user()->load('district')->district->id_dist  == 1)
             {
                $ucs =  UC::where('id_dist' , 1)->get();
             }
             elseif(Auth::user()->load('district')->district->id_dist  == 2){
                $ucs =  UC::where('id_dist' , 2)->get();
             }
             else
             {
                $ucs =  UC::where('id_tsl' , Auth::user()->id_mtsl)->get();
             }

        }
        else
        {
            $tehsils  =  Tehsil::where('tsl_shown', 1)->orderBy('tsl_name', 'ASC')->get();
            $ucs =  UC::where('id_tsl' , Auth::user()->id_mtsl)->get();
        }





        $professions  =  Profession::where('profession_status', 1)->orderBy('profession_name', 'ASC')->get();
         return view('dawa_theme.user.profile' ,
          [
              'forums'=>$forums,
              'districts'=>$districts,
              'tehsils'=>$tehsils,
              'professions'=>$professions,
              'ucs'=>$ucs ,
        ]);
    }
    public function ViewProfile(Request $request)
    {
        $categories = BroadcastListCategory::where('user_id',Auth::id())->orderBy('ordering', 'ASC')->get();
        $wabastagans = Auth::user()->wabastagans;

           return view('dawa_theme.user.view-profile'  ,[
             'wabastagans'=> $wabastagans ,
            'categories'=> $categories   ] );
    }
    public function UpdateProfile(Request $request)
    {

        if(trim($request->email)=="" || $request->email==null)
        {}
        else
        {
        // $request->validate([

        //     'email' => ['email', 'unique:users,email,'.Auth::id()],

        // ]);
    }

         $user = User::find(Auth::id());
    //     if ($request->hasFile('picture')) { // if user upload file

    //         $destinationPath = 'dawa_theme/assets/img/'; // upload path
    //           $profileImage = date('YmdHis') . "." . $request->file('picture')->getClientOriginalExtension();
    //         $request->file('picture')->move($destinationPath, $profileImage);
    //         $user->photo  = $destinationPath.$profileImage;
    //    }
        if ($request->base_path_img != null &&  trim($request->base_path_img) != "") { // if user upload file


            //  convert base64 img into physical image
            //  convert base64 img into physical image


            $destinationPath = 'dawa_theme/assets/img/'; // upload path

            $folderPath = public_path('dawa_theme/assets/img/');
            $folderPath =str_replace("system/public/","",$folderPath);

            $imageName = date('YmdHis').str_replace(" ","",$request->name).'.png';

        $imageFullPath = $folderPath.$imageName;


        $image_parts = explode(";base64,",$request->base_path_img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);


        file_put_contents($imageFullPath, $image_base64);
        $user->photo  = $destinationPath.$imageName;

       }


       $user->id_forum =$request->id_forum;
       $user->internet_type =$request->internet;
       if($request->internet=="Mobile Data User")
       {
        $user->internet_sub_type =$request->datauser;
       }
        $user->education_id =$request->education_id;
       $user->id_Profession =$request->profession;
       $user->date_of_birth =$request->dateofbirth;
       $user->gender =$request->gender;
    

       $user->address =trim($request->address);
       // social media links
       $user->facebook_link =trim($request->facebook_link);
       $user->twitter_link =trim($request->twitter_link);
       $user->instagram_link =trim($request->instagram_link);
       $user->youtube_link =trim($request->youtube_link);
       $user->tiktok_link =trim($request->tiktok_link);
       $user->wikipedia_link =trim($request->wikipedia_link);

        
       $user->name =trim($request->name);
       $user->id_dist =trim($request->id_dist);
       if($request->has('id_mtsl'))
       {
           $user->id_mtsl =trim($request->id_mtsl);
       }
       if($request->has('id_uc'))
       {
           $user->id_uc =trim($request->id_uc);
       }
       $user->fathername =trim($request->fathername);
       $user->membership_id =trim($request->membership_id);


       if($request->has('graphi_skilll'))
       {
        $user->graphi_skilll =$request->graphi_skilll;
       }
       if($request->has('video_skilll'))
       {
        $user->video_skilll =$request->video_skilll;
       }
       if($request->has('vlog_skilll'))
       {
        $user->vlog_skilll =$request->vlog_skilll;
       }
       if($request->has('urdu_skilll'))
       {
        $user->urdu_skilll =$request->urdu_skilll;
       }
       if($request->has('english_skilll'))
       {
     $user->english_skilll =$request->english_skilll;
       }



//   dd($request->all());
       $user->save();
       return redirect()->back()->with('msg','Updated!');

    }
}
