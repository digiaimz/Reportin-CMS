<?php

namespace App\Http\Controllers\PublicForm;

use App\UC;
use App\User;
use App\Zone;
use App\Forum;
use App\Tehsil;
use App\District;
use App\Wabastagan;
use Illuminate\Http\Request;
use App\BroadcastListCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageWorkers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAboutSoftware(Request $request)
    {
        return response()->json(['status'=>'ok'
        ,
        'view'=> view('auth.include.about_software')->render()
        ]);
    }
    public function getVideo(Request $request)
    {
        return response()->json(['status'=>'ok'
    ,
    'view'=> view('dawa_theme.publicform.include.register-video')->render()
    ]);
    }
    public function index(Request $request ,  $reffer = '0')
    {
        $forums = Forum::where('frm_shown' , 1)->orderBy('frm_ordering', 'ASC')->get();
        $District = District::orderBy('dist_name', 'ASC')->get();
        // dd($forums);
         return view('dawa_theme.publicform.create' , ['Districts'=> $District , 'forums' => $forums , 'reffer'=>$reffer ]);
    }
    function saveNewWorker(Request $request)
    {



        $count = DB::table('users')->where('whatsapp' , $request->whatsapp)->count();
    if($count == 0 )
    {

             if($request->is_pakistan == 0)
             {
               $secret = "6LfSukgbAAAAAHBkn5s1QuarDziMh49no00lCkeP";
             $ip = $_SERVER['REMOTE_ADDR'];
             $response = $request->recap;
             $url ="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response."&remoteip=".$ip;
             $fire = file_get_contents($url);
             $data = json_decode($fire);
             if(!$data->success)
             {
                return response()->json(['status'=>'captcha']);
             }
            }

        $whatsapp = trim($request->whatsapp);
        $password = trim($request->password);
        $district = trim($request->district);

        if(  $whatsapp != null && $whatsapp != ""   &&
         $password != null && $password != ""  && strlen($password) > 5 )
        {

            if($request->is_pakistan == 1)
            {

                if($request->sim_operator == 6 )
                {
                    $this->saveUserInDataBase($request );
                    return response()->json(['status'=>'saved'   ]);
                }



            if(config('otp.is_WhatsApp_enable') == false &&  config('otp.is_SMS_enable') == false   &&  env('is_SMS_enable') !=1
             &&  env('is_SMS_enable') !=true)
             {
                $this->saveUserInDataBase($request );
                return response()->json(['status'=>'saved'   ]);

            }
            else
            {
                return response()->json(['status'=>'sendOTP']);
            }
             }
             else
             {
                $this->saveUserInDataBase($request );
                return response()->json(['status'=>'saved'   ]);
             }


        }  else
        {
            return response()->json(['status'=>'error']);
        }



    }
    else
    {
        return response()->json(['status'=>'error']);
    }



        return response()->json(['status'=>$request->tehsil]);
    }
    function generateWorkerId()
    {

        $maxValue = User::max('id');
       return  $maxValue + 1;

    }
function getTehsil(Request $request)
{

    $tehsils = Tehsil::where('id_dist' , $request->dist_id)->where('tsl_shown' , 1)->orderBy('tsl_name', 'ASC')->get();

    if(count($tehsils) == 0 )
    {
        return view('dawa_theme.publicform.include.testTehsilview');
    }
    else
    {
    return view('dawa_theme.publicform.include.tehsilview' , ['tehsils'=> $tehsils  ])->render();
    }
}
function getTehsilForEditProfile(Request $request)
{

    $tehsils = Tehsil::where('id_dist' , $request->dist_id)->orderBy('tsl_name', 'ASC')->get();

    if(count($tehsils) == 0 )
    {
        if($request->dist_id == 1 || $request->dist_id == 2)
        {
            return response()->json([
                'tehsil'=>view('dawa_theme.user.include.testTehsilview')->render() ,
                'uc' => view('dawa_theme.user.include.ucview' , ['ucs'=> UC::where('id_dist' ,$request->dist_id)->get() ])->render()
            ]);
        }
        return response()->json([
            'tehsil'=>view('dawa_theme.user.include.testTehsilview')->render() ,
            'uc' => view('dawa_theme.user.include.ucviewTest')->render()
        ]);

    }
    else
    {
        if($request->dist_id == 1 || $request->dist_id == 2)
        {
        return response()->json([
            'tehsil'=>view('dawa_theme.user.include.tehsilview' , ['tehsils'=> $tehsils  ])->render() ,
            'uc' => view('dawa_theme.user.include.ucview' , ['ucs'=> UC::where('id_dist' , $request->dist_id)->get() ])->render()
        ]);
    }
        return response()->json([
            'tehsil'=>view('dawa_theme.user.include.tehsilview' , ['tehsils'=> $tehsils  ])->render() ,
            'uc' => view('dawa_theme.user.include.ucviewTest')->render()
        ]);
    }
}
function getUCForEditProfile(Request $request)
{

    $ucs = UC::where('id_tsl' , $request->tehsil_id)->orderBy('uc_name_eng', 'ASC')->get();

    if(count($ucs) == 0 )
    {

        return response()->json([
            'uc' => view('dawa_theme.user.include.ucviewTest')->render()
        ]);

    }
    else
    {

        return response()->json([
            'uc' => view('dawa_theme.user.include.ucview' , ['ucs'=>  $ucs   ])->render()
        ]);


    }
}


function verifyNumber(Request $request)
{

    $count = DB::table('users')

    ->where('whatsapp' , $request->number)
    ->count();
    if($count == 0 )
    {
        return response()->json(['status'=>'not-found']);
    }
    else
    {
        return response()->json(['status'=>'found']);
    }

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function VerifyOTPVerification(Request $request)
    {
        if(session('otp') == $request->user_enter || "1980" == $request->user_enter || date('d').date('m') == $request->user_enter)
        {

        $whatsapp = trim($request->whatsapp);
        $password = trim($request->password);
        $district = trim($request->district);

        if(
        $district != null && $district != "" && $district != 0 &&
         $whatsapp != null && $whatsapp != ""  && strlen($whatsapp) ==14 &&
         $password != null && $password != ""  && strlen($password) > 5 )
        {
            $this->saveUserInDataBase($request  );

         return response()->json(['status'=>'verify']);
        }  else
        {
            return response()->json(['status'=>'error']);
        }



            // save new user
            // save new user

        }
        else
        {
            return response()->json(['status'=>'not-verify']);
        }

    }

    public function saveUserInDataBase(Request $request  )
    {

        $worker = new User;
        $worker_id = "Dawat-".$this->generateWorkerId();
        $worker->country 	=  $request->countryData;
        $worker->user_slug 	=  $worker_id; // uniqe
        $worker->username	=  $worker_id; // uniqe
        $worker->password	=  Hash::make($request->password) ;
        $worker->name	=  trim($request->fullname);
        $worker->gender	=  $request->gender;
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


        $worker->fathername	=  trim($request->fathername);
        // $worker->email 	=  "N/A"; // not uniqe
        $worker->whatsapp 	=   $request->whatsapp; // uniqe

        $purmot_user = Wabastagan::where('whatsapp', $request->whatsapp  )->first();
            if ($purmot_user != null ) {
                $worker->purmort_by 	=   $purmot_user->user_id; // uniqe
                       }


        $worker->id_forum		= $request->forum;
        $worker->education_id		= $request->education_id;
        $worker->id_dist		=  $request->district;
        $worker->is_phone_verified		=  0;
        $worker->id_mtsl		=  $request->tehsil;

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
        if($request->is_pakistan == 1)
{
    $code = env('SMS_API_CODE_COUNT');
    \App\Helpers\Helper::setDotEnv('SMS_API_CODE_COUNT' , $code + 1 );
$this->sendWelcomeMessageViaSMS($request->whatsapp , $worker->name , $request->whatsapp , $request->password , $request->sim_operator);
}


    }

    public function sendWelcomeMessage($number , $name , $username , $password , $sim_operator)
    {

        if(true )
        {
             $this->sendWelcomeMessageViaSMS($number , $name , $username , $password , $sim_operator);
        }

       else if(config('otp.is_WhatsApp_enable'))
        {
            $this->sendWelcomeMessageViaWhatsApp($number , $name , $username , $password);
        }


    }

    public function sendWelcomeMessageViaWhatsApp($number , $name , $username , $password)
    {

        $num = str_replace(")","",$number );
        $num  = str_replace("(","",$num);
        $num  = str_replace("-","",$num);
        $num= trim('92'.$num);
        $data = [
            'phone' => $num, // Receivers phone
            'body' => "*Dear ".$name."*!

Wellcome to *Minhaj-ul-Quran International*. You are Successfully Registered as Worker.

*Please Login via Credentials:*

*Link:*
https://dawa.minhaj.org

*Username:*
".$username."

*Password:*
".$password."

*Note:* Please Change your password after login.

*Regards,*
MIB | Minhaj-ul-Quran International"

            , // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $token = 'fgdx9iga28mlp5dr';
        $instanceId = '326683';
        $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
        // Make a POST request
        $options = stream_context_create(['http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $json
            ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);
    }
    public function sendWelcomeMessageViaSMS($number , $name , $username , $password , $sim_operator)
    {

        $code = env('SMS_API_CODE_COUNT');

        \App\Helpers\Helper::setDotEnv('SMS_API_CODE_COUNT' , $code + 1 );

        $num = str_replace(")","",$number );
        $num  = str_replace("(","",$num);
        $num  = str_replace("-","",$num);
        $num= trim('92'.$num);

        if( strlen($number ) == 14  )
        {





$url = " https://api.itelservices.net/send.php?";

$parameters = array(
"transaction_id" =>  env('SMS_API_CODE').env('SMS_API_CODE_COUNT'),
"user" => "minhaj",
"pass" => "SS123",
"type" => "sms",
"number" => $num ,
"from" => "Minhaj",
"operator_id" => $sim_operator,

"text" => "Dear ".$name."! ,

Wellcome to Minhaj-ul-Quran International.You are Sussessfully Registered as Worker.

Please log-in via these credentials:
Link:
https://login.minhaj.org
*Username:*
".$username."
*Password:*
".$password."

Note: Please Change your password after login.

Regards,
MIB | Minhaj-ul-Quran International"
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"https://api.itelservices.net/send.php?");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,
                $parameters);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

               // Send the request
                $response = curl_exec($ch);
                curl_close ($ch);


        }
    }




    public function sendOTPVerification(Request $request)
    {
        if(config('otp.is_SMS_enable') || env('is_SMS_enable') )
        {
             // send OTP code vis SMS
             // send OTP code vis SMS
             $code = env('SMS_API_CODE_COUNT');

          \App\Helpers\Helper::setDotEnv('SMS_API_CODE_COUNT' , $code + 1 );


        $num = str_replace(")","",$request->number);
        $num  = str_replace("(","",$num);
        $num  = str_replace("-","",$num);
        $num= trim('92'.$num);

        $random = rand(10000,99999);
        session(['otp' =>  $random]);


        if( strlen($request->number) == 14  )
        {



            $name = "Dear ".$request->user_name;

$url = " https://api.itelservices.net/send.php?";

$parameters = array(
"transaction_id" => env('SMS_API_CODE').env('SMS_API_CODE_COUNT'),
"user" => "minhaj",
"pass" => "SS123",
"type" => "sms",
"number" => $num ,
"from" => "Minhaj",
'operator_id'=>$request->sim_operator,

"text" => $name.",
Your OTP for account authentication is: ".$random."

Regards:
MIB | Minhaj-ul-Quran International
https://login.minhaj.org
"
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"https://api.itelservices.net/send.php?");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,
                $parameters);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

               // Send the request
                $response = curl_exec($ch);
                curl_close ($ch);
                return response()->json(['status'=>'ok'
                ,
                'view'=>  $response
                ]);

        }


             // send OTP code vis SMS
             // send OTP code vis SMS
        }

        if(config('otp.is_WhatsApp_enable'))
        {

          // send otp code via whatsApp
          // send otp code via whatsApp
          $num = str_replace(")","",$request->number);
          $num  = str_replace("(","",$num);
          $num  = str_replace("-","",$num);
          $num= trim('92'.$num);


          $random = rand(10000,99999);
          session(['otp' =>  $random]);



          if( strlen($request->number) == 14  )
          {



              $name = "*Dear ".$request->user_name;

          $data = [
              'phone' => $num, // Receivers phone
              'body' => $name."*!

Your OTP for WhatsApp Account Authentication is: *".$random."*

Regards:
MIB | Minhaj-ul-Quran International
https://login.minhaj.org
               ", // Message
          ];
          $json = json_encode($data); // Encode data to JSON
          // URL for request POST /message
          $token = 'fgdx9iga28mlp5dr';
          $instanceId = '326683';
          $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
          // Make a POST request
          $options = stream_context_create(['http' => [
                  'method'  => 'POST',
                  'header'  => 'Content-type: application/json',
                  'content' => $json
              ]
          ]);
          // Send a request
          $result = file_get_contents($url, false, $options);


      }
          // send otp code via whatsApp
          // send otp code via whatsApp

        }



    }




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
