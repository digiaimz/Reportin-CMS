<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordControllerCustom extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {


           return view('auth.passwords.email');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'whatsapp' => 'required|exists:users',
              'sim_operator' => 'required',
          ]);

          $token = Str::random(64);

          $link = route('reset.password.get.link', ['token' => $token , 'whatsapp' => $request->whatsapp] );

          DB::table('password_resets')->where(['email'=> $request->whatsapp])->delete();

          DB::table('password_resets')->insert([
              'email' => $request->whatsapp,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);



        if(config('otp.is_SMS_enable') || env('is_SMS_enable') )
        {

            $user = User::where('whatsapp' ,   $request->whatsapp)->first();

             $code = env('SMS_API_CODE_COUNT');

          \App\Helpers\Helper::setDotEnv('SMS_API_CODE_COUNT' , $code + 2 );


        $num = str_replace(")","",$request->whatsapp);
        $num  = str_replace("(","",$num);
        $num  = str_replace("-","",$num);
        $num= trim('92'.$num);


            $name = "Dear ".$user->name;

$url = " https://api.itelservices.net/send.php?";

$parameters = array(
"transaction_id" => env('SMS_API_CODE').env('SMS_API_CODE_COUNT'),
"user" => "minhaj",
"pass" => "SS123",
"type" => "sms",
"number" => $num ,
"from" => "Minhaj",
"operator_id" => $request->sim_operator,

"text" => $name."!,

You are receiving this sms because we received a password reset request for your account.

You can rest your password by clicking this link below:
".$link."

If you did not request a password reset, no further action is required.

Regards:
MIB | Minhaj-ul-Quran International
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
                // dd($response);
                curl_close ($ch);



        }


          return back()->with('message', 'We have sent a password rest link on your number:<br>+92 '.$request->whatsapp."<br>If you are not getting OTP just type <b>MNP</b> and send to <b>4473</b>"
        );
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm(Request $request , $token , $whatsapp) {

        $user = User::where('whatsapp' ,  $whatsapp)->first();
            if($user == null)
               {
               return abort(419, 'User Not Exist > Link Expired');
               }
        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $whatsapp,
          'token' => $token
        ])
        ->first();

                if($updatePassword == null){
                    return abort(419, "Link Expired");
                }


         return view('auth.forgetPasswordLink', ['token' => $token  ,'whatsapp' => $whatsapp]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {

          $request->validate([
              'whatsapp' => 'required|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->whatsapp,
                                'token' => $request->token
                              ])
                              ->first();

          if($updatePassword == null){
              return back()->with('message', 'Invalid token or Link Expired!');
          }

          $user = User::where('whatsapp', $request->whatsapp)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->whatsapp])->delete();

          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
