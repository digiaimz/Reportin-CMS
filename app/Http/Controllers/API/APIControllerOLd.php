<?php

namespace App\Http\Controllers\API;

use App\Activity;
use App\ActivityLogMobile;
use App\User;
use App\Tehsil;
use App\District;
use App\Wabastagan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\BroadcastListCategory;
use App\Clip;
use App\EducationalInstitute;
use App\Profession;

use App\Forum;
use App\HelpingVideo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{


///////////////////////////////// change_password ////////////////////////////////


public function change_password(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$user = User::where('api_token' , $request->api_token)->first();
if($user == null )
{
$set['error'] = true;
$set['message'] = "Something went wrong";
return $this->set_json_response($set ,  $data);
}
$flag = Auth::attempt(['whatsapp' => trim($user->whatsapp) , 'password' => $request->old_password]);
if (!$flag)
{
$set['error'] = true;
$set['message'] = "Incorrect Old Password";
return $this->set_json_response($set ,  $data);
}
Auth::logout();

if(strlen($request->new_password) < 5  )
{
$set['error'] = true;
$set['message'] = "Passwords must contain at least five characters";
return $this->set_json_response($set ,  $data);
}

$user->password = Hash::make($request->new_password);
$user->api_token = $this->generateToken();
$user->save();

$set['message'] = "Password Changed Successfully";
return $this->set_json_response($set ,  $data);

}
///////////////////////////////// update_user_profile ////////////////////////////////


public function update_user_profile(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;

$user = User::where('api_token' , $request->api_token)->first();
if($user == null )
{
$set['error'] = true;
$set['message'] = "Something went wrong";
return $this->set_json_response($set ,  $data);
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
$user->email =trim($request->email);

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
$user->id_mtsl =trim($request->id_mtsl);
$user->id_uc =trim($request->id_uc);
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
$user->save();

$set['message'] = "Profile Update Successfully";

return $this->set_json_response($set ,  $request->all());




}
///////////////////////////////// Get Helping Videos ////////////////////////////////


public function get_helping_videos(Request $request)
{
// str_replace("world","Peter","Hello world!");
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$clips = HelpingVideo::where('status',1)->get();
foreach($clips as $clip)
{
$clip->youtube_link = str_replace( 'https://www.youtube.com/watch?v=' , '' , $clip->youtube_link);
$data[] = $clip;

}
return $this->set_json_response($set ,  $data);

}
///////////////////////////////// Get Clips ////////////////////////////////


public function get_clips(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$clips = Clip::where('status',1)->orderBy('datetime','desc')->where('datetime', '<=' ,  now() )->get();
foreach($clips as $clip)
{
$clip->youtube_link = str_replace( 'https://youtu.be/' , '' , $clip->youtube_link);
$data[] = $clip;
}
return $this->set_json_response($set ,  $data);

}



///////////////////////////////// Get Districts forums institutes ////////////////////////////////


public function get_districts_forums_institutes_professions_activities(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data['districts'] =  District::with('tehsils')->where('dist_shown' , 1)->get();
$data['forums'] =  Forum::all();
$data['institutes'] =  EducationalInstitute::all();
$data['professions'] =  Profession::all();
$data['activities'] =  Activity::all();
return $this->set_json_response($set ,  $data);

}


//////////////////////////////// Get Tehsils Of Districts ////////////////////////////////


public function get_tehsils_of_districts(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";



if(!$request->has('district_id'))
{
$set['error'] = true;
$set['message'] = "District id Required";
return $this->set_json_response($set ,  $data);
}



$data['tehsils'] =  Tehsil::where('id_dist' ,  $request->district_id)->get();
return $this->set_json_response($set ,  $data);

}

///////////////////////////////// Get institutes ////////////////////////////////


public function get_institutes(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data['institutes'] =  EducationalInstitute::all();
return $this->set_json_response($set ,  $data);

}
///////////////////////////////// Get forums ////////////////////////////////


public function get_forums(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data['forums'] =  Forum::all();
return $this->set_json_response($set ,  $data);

}
///////////////////////////////// Get Districts ////////////////////////////////


public function get_districts(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data['districts'] =  District::with('tehsils')->where('dist_shown' , 1)->get();
return $this->set_json_response($set ,  $data);

}

///////////////////////////////// edit_broadcast_list////////////////////////////////


public function edit_broadcast_list(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();


if(ucwords(trim($request->gender)) == "Male" || ucwords(trim($request->gender))=="Female")
{}
else{
$set['error'] = true;
$set['message'] = "Gender must be Male or Female.";
return $this->set_json_response($set ,  $data);
}

if($request->coma_seprated_tags_ids == null || trim($request->coma_seprated_tags_ids) == '')
{
$set['error'] = true;
$set['message'] = "Tags Id Required";
return $this->set_json_response($set ,  $data);
}
if($request->whatsapp == null || trim($request->whatsapp) == '')
{
$set['error'] = true;
$set['message'] = "Whatsapp Number Required";
return $this->set_json_response($set ,  $data);
}
if($request->name == null || trim($request->name) == '')
{
$set['error'] = true;
$set['message'] = "Name Required";
return $this->set_json_response($set ,  $data);
}
if($request->country == null || trim($request->country) == '')
{
$set['error'] = true;
$set['message'] = "Country Required";
return $this->set_json_response($set ,  $data);
}

$Wabastagan_edit  = Wabastagan::where('id' , $request->wabasta_id)->first();
if( $Wabastagan_edit == null )
{
$set['error'] = true;
$set['message'] = "Wabastagan Record Not Found";
return $this->set_json_response($set ,  $data);
}




$flag = Wabastagan::where('whatsapp' , $request->whatsapp)->where('id' , '<>' , $Wabastagan_edit->id )->first();

if($flag != null)
{
$set['error'] = true;
if(User::where('whatsapp' , $flag->whatsapp)->exists())
{
$set['message'] = "This whatsapp number is already registered as worker.";
}
else
{
if($flag->user_id == $user->id )
{
$set['message'] = "This Number is alerady in your broadcase list.";
}
else {
$set['message'] = "This WhatsApp number is already in another worker's list.
If this person is your loved one/friend or belongs to your area,
    And you add it to your broadcast list. If you want to add it, click here to submit a transfer request.";
}
}
return $this->set_json_response($set ,  $data);

}




$Wabastagan_edit->name	=   ucwords(trim($request->name));
$Wabastagan_edit->country	=  $request->country;
$Wabastagan_edit->whatsapp	=  $request->whatsapp;
$Wabastagan_edit->id_dist	=   $request->district_id;
$Wabastagan_edit->id_tehsil	=  $request->tehsil_id;
$Wabastagan_edit->categories	=  $request->coma_seprated_tags_ids;
$Wabastagan_edit->gender	=  ucwords(trim($request->gender));
//   $Wabastagan_edit->user_id	=  $user->id;
$Wabastagan_edit->id_forum_user	=  $user->id_forum;
$Wabastagan_edit->rafaqat_number	=   $request->rafaqat_number;;
$Wabastagan_edit->remarks	=   $request->remarks;;
$Wabastagan_edit->activities	=   $request->activities;;
$Wabastagan_edit->save();

$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data= $Wabastagan_edit;
return $this->set_json_response($set ,  $data);

}

///////////////////////////////// Add To Broadcast List ////////////////////////////////


public function add_to_broadcast_list(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";



$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();


if(ucwords(trim($request->gender)) == "Male" || ucwords(trim($request->gender))=="Female")
{}
else{
$set['error'] = true;
$set['message'] = "Gender must be Male or Female.";
return $this->set_json_response($set ,  $data);
}

if($request->coma_seprated_tags_ids == null || trim($request->coma_seprated_tags_ids) == '')
{
$set['error'] = true;
$set['message'] = "Tags Id Required";
return $this->set_json_response($set ,  $data);
}
if($request->whatsapp == null || trim($request->whatsapp) == '')
{
$set['error'] = true;
$set['message'] = "Whatsapp Number Required";
return $this->set_json_response($set ,  $data);
}
if($request->name == null || trim($request->name) == '')
{
$set['error'] = true;
$set['message'] = "Name Required";
return $this->set_json_response($set ,  $data);
}



// $string = '{"name":"'.$request->country['name'].'" ,"iso2":"'.$request->country['iso2'].'","dialCode":"'.$request->country['dialCode'].'","priority":'.$request->country['priority'].',"areaCodes":'.$request->country['areaCodes'].'}';


if(isset($request->country['name']) &&
isset($request->country['iso2']) &&
isset($request->country['dialCode'])
 ) {}
else {
$set['error'] = true;
$set['message'] = "Country Required";
return $this->set_json_response($set ,  $data);
}


if(User::where('whatsapp' , $request->whatsapp)->exists())
{
$set['message'] = "This whatsapp number is already registered as worker.";
$set['error'] = true;
return $this->set_json_response($set ,  $data);
}


$flag = Wabastagan::where('whatsapp' , $request->whatsapp)->first();

if($flag != null)
{
$set['error'] = true;
if(User::where('whatsapp' , $request->whatsapp)->exists())
{
$set['message'] = "This whatsapp number is already registered as worker.";
}
else
{
if($flag->user_id == $user->id )
{
$set['message'] = "This Number is alerady in your broadcase list.";
}
else {
$set['message'] = "This WhatsApp number is already in another worker's list.
If this person is your loved one/friend or belongs to your area,
    And you add it to your broadcast list. If you want to add it, click here to submit a transfer request.";
}
}
return $this->set_json_response($set ,  $data);

}



$string = '{"name":"'.$request->country['name'].'" ,"iso2":"'.$request->country['iso2'].'","dialCode":"'.$request->country['dialCode'].'","priority":'.$request->country['priority'].',"areaCodes":null}';

$Wabastagan = new Wabastagan();
$Wabastagan->name	=   ucwords(trim($request->name));
$Wabastagan->country	=  $string;
$Wabastagan->whatsapp	=  $request->whatsapp;
$Wabastagan->id_dist	=   $request->district_id;
$Wabastagan->id_tehsil	=  $request->tehsil_id;
$Wabastagan->categories	=  $request->coma_seprated_tags_ids;
$Wabastagan->gender	=  ucwords(trim($request->gender));
$Wabastagan->user_id	=  $user->id;
$Wabastagan->id_forum_user	=  $user->id_forum;
$Wabastagan->rafaqat_number	=   null;
$Wabastagan->remarks	=   null;
$Wabastagan->activities	=   null;
$Wabastagan->save();

$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$data= $Wabastagan;
return $this->set_json_response($set ,  $data);

}





///////////////////////////////// delete_wabasta ////////////////////////////////


public function delete_wabasta(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();

if(!$request->has('wabasta_id'))
{
$set['error'] = true;
$set['message'] = "Wabasta id Required";
return $this->set_json_response($set ,  $data);
}

if($request->wabasta_id ==  Null || trim($request->wabasta_id) ==   ''  || trim($request->wabasta_id) ==  0)
{
$set['error'] = true;
$set['message'] = "Wabasta id Required";
return $this->set_json_response($set ,  $data);
}

$wabasta = Wabastagan::where('id' , $request->wabasta_id)->where('user_id', $user->id)->first();

if($wabasta == null )
{
$set['error'] = true;
$set['message'] = "Wabasta Not Found";
return $this->set_json_response($set ,  $data);
}
$wabasta->delete();
$set['error'] = false;
$set['message'] = "Successfully Deleted Wabastagan";
$data= [];
return $this->set_json_response($set ,  $data);



}
///////////////////////////////// delete_tag ////////////////////////////////


public function delete_tag(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();


if(!$request->has('tag_id'))
{
$set['error'] = true;
$set['message'] = "Tag Id Required";
return $this->set_json_response($set ,  $data);
}

if($request->tag_id ==  Null || trim($request->tag_id) ==   ''  || trim($request->tag_id) ==  0)
{
$set['error'] = true;
$set['message'] = "Tag Id Required";
return $this->set_json_response($set ,  $data);
}

if(!BroadcastListCategory::where('user_id' ,$user->id )->where('cate_id' ,$request->tag_id )->exists() )
{
$set['error'] = true;
$set['message'] = "Tag Not Found";
return $this->set_json_response($set ,  $data);
}

$tag = BroadcastListCategory::where('user_id' ,$user->id )->where('cate_id' ,$request->tag_id )->first();
$count = DB::table("wabastagans")

->select("wabastagans.*")

->where('user_id' , $user->id)
->whereRaw("find_in_set('".$tag->cate_id."',wabastagans.categories)")

->count();
if($count > 0 )
{
$set['error'] = true;
$set['message'] = "Can't Delete This Tag - Its have Wabastagans";
return $this->set_json_response($set ,  $data);
}
if( $tag->is_authenticated == 1 )
{
$set['error'] = true;
$set['message'] = "Can't Delete This Tag - Primary Tag";
return $this->set_json_response($set ,  $data);
}

$tag->delete();

$set['error'] = false;
$set['message'] = "Successfully Delete Tag";
$data= [];
return $this->set_json_response($set ,  $data);

}



///////////////////////////////// Create New Tag ////////////////////////////////


public function create_new_tag(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

$user = User::where('api_token' , $request->api_token)->first();


if(!$request->has('tag_name'))
{
$set['error'] = true;
$set['message'] = "Tag Name Required";
return $this->set_json_response($set ,  $data);
}

if($request->tag_name ==  Null || trim($request->tag_name) ==   '' )
{
$set['error'] = true;
$set['message'] = "Tag Name Required";
return $this->set_json_response($set ,  $data);
}

if(BroadcastListCategory::where('user_id' ,$user->id )->where('category_name' ,$request->tag_name )->exists() )
{
$set['error'] = true;
$set['message'] = "Tag Name Alerady Created";
return $this->set_json_response($set ,  $data);
}

$tag = new BroadcastListCategory();
$tag->category_name	= ucwords(trim($request->tag_name));
$tag->user_id	= $user->id;
$tag->is_authenticated	=0;

$tag->save();

$tag->count = 0;
unset($tag['created_at']);
unset($tag['updated_at']);
unset($tag['user_id']);

$set['error'] = false;
$set['message'] = "";
$data= $tag;
return $this->set_json_response($set ,  $data);

}

///////////////////////////////// Get User 5  Wabastagans ////////////////////////////////

public function get_user_five_wabastagans(Request $request)
{

$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();

$wabasta = [];

$i= 0;

if($user == null || $user->api_token == null || $user->api_token == '')
{
$set['auth'] = false;
}
else
{

    foreach($user->wabastagans as $wabastagan)
{
$wabasta[] = $wabastagan;

if($i == 4)
{
    break;
}

$i++;

}
$data['wabastagans'] =   $wabasta ;


$data['tags'] =  BroadcastListCategory::where('user_id', $user->id)->orderBy('ordering')->get();



}



$clip =  Clip::where('status',1)->orderBy('datetime','desc')->where('datetime', '<=' ,  now() )->first();

$clip->youtube_link = str_replace( 'https://youtu.be/' , '' , $clip->youtube_link);

$data['clip'] =  $clip ;

// make for each loop


return $this->set_json_response($set ,  $data);

}


///////////////////////////////// Get User Tag Wabastagans ////////////////////////////////


public function get_user_tag_wabastagans(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

if(!$request->has('tag_id'))
{
$set['error'] = true;
$set['message'] = "Tag Id Required";
return $this->set_json_response($set ,  $data);
}

$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();


$filtered = $user->wabastagans->filter(function ($value, $key)use($request) {
$categories = explode(",",$value->categories);
if (in_array($request->tag_id, $categories)) {
{
    return true;
}
return false;

}
}
);

$filtered->all();






$wabasta_temp = [];

$i= 0;
foreach(  $filtered  as $wabastagan)
{
$wabastagan->categories = explode(",", $wabastagan->categories);
$wabasta_temp[] = $wabastagan;

if($i == 4)
{
    break;
}

$i++;

}
$data['wabastagans'] =  $wabasta_temp ;



// $data['wabastagans'] =  $filtered ;

// make for each loop



return $this->set_json_response($set ,  $data);

}


///////////////////////////////// Get User Tags ////////////////////////////////

public function get_user_tags(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

$user = User::where('api_token' , $request->api_token)->first();
$data['tags'] = BroadcastListCategory::where('user_id', $user->id)->get();
return $this->set_json_response($set ,  $data);

}


///////////////////////////////// Get Wabastagans ////////////////////////////////

public function get_wabastagans(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";

$user = User::with('wabastagans')->where('api_token' , $request->api_token)->first();

$data['wabastagans'] = $user->wabastagans ;
// $data['tags'] = BroadcastListCategory::where('user_id', $user->id)->orderBy('ordering')->get();


foreach (BroadcastListCategory::where('user_id', $user->id)->orderBy('ordering')->get() as $tag)
{
$tag['count'] = DB::table("wabastagans")

->select("wabastagans.*")

->whereRaw("find_in_set('".$tag->cate_id."',wabastagans.categories)")

->count();

$all_tags[] =  $tag;
}

$data['tags'] =  $all_tags;

return $this->set_json_response($set ,  $data);

}



///////////////////////////////// Get User Profile ////////////////////////////////

public function get_profile(Request $request)
{
$data= [];
$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$user = User::where('api_token' , $request->api_token)->first();
$user['photo'] = asset($user->photo);
$data= $user;


return $this->set_json_response($set ,  $data);

}

///////////////////////////////// user_register ////////////////////////////////

public function new_user(Request $request)
{
    $data= [];
    $set['error'] = false;
    $set['auth'] = false;


if(strlen($request->password) < 5  )
{
$set['error'] = true;
$set['message'] = "Passwords must contain at least five characters";
return $this->set_json_response($set ,  $data);
}

if(strlen(trim($request->fullname)) < 3  )
{
$set['error'] = true;
$set['message'] = "Fullname must contain at least three characters";
return $this->set_json_response($set ,  $data);
}
if(strlen(trim($request->fathername)) < 3  )
{
$set['error'] = true;
$set['message'] = "Fathername must contain at least three characters";
return $this->set_json_response($set ,  $data);
}

if($request->gender == "Female" || $request->gender == "Male"    ){}
else{
$set['error'] = true;
$set['message'] = "Gender must be Male or Female";
return $this->set_json_response($set ,  $data);
}
if(User::where('whatsapp', $request->whatsapp  )->exists()  )
 {
$set['error'] = true;
$set['message'] = "Account already exists";
return $this->set_json_response($set ,  $data);
}
// if($request->countryData == null || $request->countryData ==    '')
//  {
// $set['error'] = true;
// $set['message'] = "Country Required";
// return $this->set_json_response($set ,  $data);
// }



// $string = '{"name":"'.$request->country['name'].'" ,"iso2":"'.$request->country['iso2'].'","dialCode":"'.$request->country['dialCode'].'","priority":'.$request->country['priority'].',"areaCodes":'.$request->country['areaCodes'].'}';


if(isset($request->country['name']) &&
isset($request->country['iso2']) &&
isset($request->country['dialCode'])
 ) {}
else {
$set['error'] = true;
$set['message'] = "Country Required";
return $this->set_json_response($set ,  $data);
}


 $string = '{"name":"'.$request->country['name'].'" ,"iso2":"'.$request->country['iso2'].'","dialCode":"'.$request->country['dialCode'].'","priority":'.$request->country['priority'].',"areaCodes":null}';



$worker = new User;
$worker_id = "Dawat-".$this->generateWorkerId();    ///////////////////
$worker->country 	=  $string; ///////////////////
$worker->user_slug 	=  $worker_id; // uniqe ///////////////////
$worker->username	=  $worker_id; // uniqe  ///////////////////
$worker->password	=  Hash::make($request->password) ; ///////////////////
$worker->name	=  trim($request->fullname); ///////////////////
$worker->gender	=  $request->gender; ///////////////////
if($worker->gender == "Female")
{
$worker->photo	=  "dawa_theme/assets/img/female.png";
}
else
{
$worker->photo	=  "dawa_theme/assets/img/user.png";
}



// refferal code
// refferal code

$length = 7;
$randomString = null;
$flag = true;
do{
$randomString=  substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
if(User::where('reffer_code' , $randomString )->first()==null)
{
$flag = false;
}

}while($flag);
$worker->reffer_code = $randomString;

// refferal code
// refferal code


$worker->fathername	=  trim($request->fathername); ///////////////////
// $worker->email 	=  "N/A"; // not uniqe
$worker->whatsapp 	=   $request->whatsapp; // uniqe ///////////////////

$purmot_user = Wabastagan::where('whatsapp', $request->whatsapp  )->first();
if ($purmot_user != null ) {
$worker->purmort_by 	=   $purmot_user->user_id; // uniqe
        }


$worker->id_forum		= $request->forum_id;
$worker->education_id		= $request->education_id;
$worker->id_dist		=  $request->district_id;
$worker->is_phone_verified		=  0;
$worker->id_mtsl		=  $request->tehsil_id;

$reffer_user = User::where('reffer_code' , $request->reffer_id)->first();
if($reffer_user!=null)
{
$worker->reffer_by		=  $reffer_user->id;

}

$promote_user = Wabastagan::where('whatsapp' , $request->whatsapp)->first();
if($promote_user!=null)
{
$worker->purmort_by		=  $promote_user->user_id;
}



$worker->save();


        $category = new BroadcastListCategory();
        $category->category_name  = "Rafiq (Active)";
        $category->is_authenticated  =1;
        $category->ordering  = 1;
        $category->user_id  = $worker->id;
        $category->year  = date('Y');
        $category->Save();

        $category = new BroadcastListCategory();
        $category->category_name  = "Rafiq (Inactive)";
        $category->is_authenticated  =1;
        $category->ordering  = 2;
        $category->user_id  = $worker->id;
        $category->year  = date('Y');
        $category->Save();

        $category = new BroadcastListCategory();
        $category->category_name  = "Friends";
        $category->is_authenticated  =1;
        $category->ordering  = 10;
        $category->user_id  = $worker->id;
        $category->year  = date('Y');
        $category->Save();

        $category = new BroadcastListCategory();
        $category->category_name  = "Family";
        $category->is_authenticated  =1;
        $category->ordering  = 10;
        $category->user_id  = $worker->id;
        $category->year  = date('Y');
        $category->Save();

        $category = new BroadcastListCategory();
        $category->category_name  = "Business";
        $category->is_authenticated  =1;
        $category->ordering  = 10;
        $category->user_id  = $worker->id;
        $category->year  = date('Y');
        $category->Save();



$set['message'] = "You are Successfully Registered as Worker";
return $this->set_json_response($set ,  $data);


}


///////////////////////////////// Login API ////////////////////////////////

public function login(Request $request)
{
$data= [];
$set['error'] = true;
$set['auth'] = false;

if(!$request->has('whatsapp'))
{
$set['message'] = "Whatsapp Number Required";
return $this->set_json_response($set ,  $data);
}
if(!$request->has('password'))
{
$set['message'] = "Password Required";
return $this->set_json_response($set ,  $data);
}


if (Auth::attempt(['whatsapp' => trim($request->whatsapp) , 'password' => $request->password]))
{
$user = User::where('whatsapp' , trim($request->whatsapp))->first();

$activity = new ActivityLogMobile();
$activity->user_id = $user->id;
$activity->installVersion = $request->installVersion;
$activity->deviceOS = $request->deviceOS;
$activity->deviceOSVersion= $request->deviceOSVersion;
$activity->pushNotification= $request->pushNotification;
$activity->pushToken= $request->pushToken;
$activity->save();

if($user->api_token == null || $user->api_token == '')
{
    $user->api_token = $this->generateToken();
    $user->save();
}

$set['error'] = false;
$set['auth'] = true;
$set['message'] = "";
$user->photo = asset($user->photo);
$data =   $user;
    return $this->set_json_response($set ,  $data);
}

$set['message'] = "These credentials do not match our records.";
return $this->set_json_response($set ,  $data);

}

//////////////////////////////////////////// HELPER FUNCTIONS ////////////////////////////////

function set_json_response($response , $data)
{
$response['data'] = $data;
return response(str_replace('&amp;', '&', json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)) , 200)
->header('Content-Type', 'application/json; charset=utf-8');
}
//////////////////////////////////////////// HELPER FUNCTIONS ////////////////////////////////
function generateToken()
{
$string = "";

do{
$string = Str::random(80);
}while(User::where('api_token' ,  $string)->count() > 0);

return  $string;

}
//////////////////////////////////////////// HELPER FUNCTIONS ////////////////////////////////

function generateWorkerId()
{
$maxValue = User::max('id');
return  $maxValue + 1;

}



//////////////////////////////////////////// Class End //////////////////////////////////////
}
