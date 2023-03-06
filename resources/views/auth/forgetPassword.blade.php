<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>
    Reset Password - {{env('APP_NAME')}}
    </title>
     <!-- CSRF Token -->

     <link rel="icon" type="image/x-icon" href="{{asset('dawa_theme/assets/featured.jpg')}}"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('dawa_theme/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />


       <meta id="meta-csrf-token" name="csrf-token" content="{{ csrf_token() }}">
  
 
    <link href="{{asset('dawa_theme/assets/css/authentication/form-2.css')}}"  rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/switches.css')}}" >
    <script src="{{asset('dawa_theme/assets/js/libs/jquery-3.1.1.min.js')}}" ></script>
    <script src="{{asset('dawa_theme/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/input-mask/input-mask.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >

<style>
.iti {
    position: relative;
    display: block;
}
.form-form .form-form-wrap form .field-wrapper label {
    font-size: 11px;
    font-weight: 700;
    color: #3b3f5c;
    margin-bottom: 8px;
}

</style>


</head>
<body class="form">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
{{--
   <span width="100%"   style="color: black;">
                         <a id="span" href="{{route('dawati.form.view')}}" style="font-weight:700; "
                          >
                           Click For Registration |

                         رجسٹریشن کیلئے یہاں کلک کریں

                        </a>
                    </span> --}}



                    <img style="max-width:100px;" src="{{asset('dawa_theme/assets/logo.png')}}" class="navbar-logo" alt="logo">
                    <p class="" style="margin:0px;">@lang('Vision 2025 By MQI')
                   </p>

                       <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('login')}}">Login</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);" style="color: blue;">Forgot Password</a></li>

                        </ol>
                    </nav>


                            <form  class="text-left" action="{{ route('forget.password.send') }}" method="POST" autocomplete="off">




                                @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">WhatsApp Number</label>
                                    <div style="display: flex;">

                                    <div>

                                    <select  id="sim_operator" name="sim_operator" style=" height: 46px;cursor:pointer;
                                    border-color: #BFC9D4;
                                    border-right: 0px; " required>
                                        <option value="" style="user-select: auto;">Select Operator</option>
                                        <option value="1" style="user-select: auto;">Mobilink</option>
                                        <option value="2" style="user-select: auto;">Telenor</option>
                                        <option value="3" style="user-select: auto;">Ufone</option>
                                        <option value="4" style="user-select: auto;">Warid</option>
                                        <option value="5" style="user-select: auto;">Zong</option>
                                        <option value="6" style="user-select: auto;">S Com</option>
                                     </select>
                                     @error('sim_operator')
                                     <div class="alert alert-danger">@lang($message)</div>
                                 @enderror
                                    </div>
                                    <div>
                                    <input   style="    padding-left: 79px "
                                    value="{{old('whatsapp')}}"  id="whatsapp" name="whatsapp"
                                     type="tel" class="form-control   @if(Session::has('loginFail_not_match')) is-invalid   @endif
                                     @error('whatsapp') is-invalid @enderror"
                                     placeholder=""  required  autocomplete="off"  />

                                     @error('whatsapp')
                                     <div class="alert alert-danger">@lang($message)</div>
                                 @enderror

                                    </div>
                                </div>


                                 @if (session('message'))
                                 <div class="alert alert-success">
                                    {!! session('message') !!}
                                 </div>
                             @endif
                                </div>


                                <script>

// $("#whatsapp").inputmask({"mask": "(999)-999-9999"});
                                    </script>



 <!-----Row End ----->
 <script>
    $(document).ready(function(){

     $('#whatsapp').inputmask('(999)-999-9999');

    });



    var iti = null;
 var input_whatsapp = document.querySelector("#whatsapp");



    $(document).ready(function(){



iti = window.intlTelInput(input_whatsapp, {
 allowDropdown: false,
 //autoHideDialCode: true,
// autoPlaceholder: "off",
// dropdownContainer: document.body,
 excludeCountries: ["il"],
//  formatOnDisplay: false,
initialCountry: "pk",

hiddenInput: "full_number",

// localizedCountries: { 'de': 'Deutschland' },
//    nationalMode: false,
// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
//  placeholderNumberType: "FIXED_LINE",
// preferredCountries: ['cn', 'jp'],
separateDialCode: true,
utilsScript: "dawa_theme/build/js/utils.js",
});

input_whatsapp.addEventListener("countrychange", function( ) {

setPlaceHolder();
document.getElementById('whatsapp').value = "";
});



setTimeout(function(){  setPlaceHolder(); }, 2000);
});


function setPlaceHolder(country=null)
{
if(document.getElementById('whatsapp').placeholder == "301 2345678" ||
document.getElementById('whatsapp').placeholder == "(301)-234-5678"  || country=="pk")
{
document.getElementById('whatsapp').placeholder= "(301)-234-5678";
}
else
{


}
 $("#whatsapp").inputmask({mask:document.getElementById('whatsapp').placeholder.replace(/[0-9]/g, "9")});

}





</script>


 <style>

  #web-view{ display: block;}
    #mobile-view{ display: none;}
     @media screen and (max-width: 480px) {
      #web-view{ display: none;}
      #mobile-view{ display: block;}
 }
.form-form
.form-form-wrap form
.field-wrapper button.btn {
    align-self: center;
    width: 70%;
    padding: 11px 14px;
    font-size: 16px;
    letter-spacing: 2px;
}

  </style>

                                <div class="d-sm-flex justify-content-between">

                                   <div class="field-wrapper" style="    text-align: center;">
                                        <button id="password_reset" type="submit" class="btn btn-primary" value="" style="letter-spacing: 0px;">



                                            <svg style="position: unset;
                                            color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                             &nbsp; <span id="login_button_value">Send Link</span> </button>
                                    </div>



                                </div>
                                <script>

                                    function go()
                                    {
                                        window.location="{{route('dawati.form.view')}}";
                                    }
                                    </script>



                            </div>
                        </form>
                        <div class="form-group m-b-0 mt-3">
                            <div class="col-sm-12 text-center">
                                <p>© {{date('Y')}} - All Rights Reserved.<br>
                                    </p>
                                    <span>  Developed by  </span>
                                    <a href="http://www.minhaj.net/" class="text-primary m-l-5"><b>MIB | Minhaj-ul-Quran International</b></a>

                                 <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>

    <script src="{{asset('dawa_theme/bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('dawa_theme/bootstrap/js/bootstrap.min.js')}}" ></script>

     <script src="{{asset('dawa_theme/assets/js/authentication/form-2.js')}}" ></script>

       <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->



</body>
<?php

$isOpen = true;

    $system_setting = \App\SystemSetting::where('for_name' , 'otp')->first();
    if($system_setting != null)
    {
    if($system_setting->time_count < \Carbon\Carbon::now() )
    {
        \App\SystemSetting::where('for_name' , 'otp')->delete();
        //enable otp
        \App\Helpers\Helper::setDotEnv('is_SMS_enable',"true");
    }
    else {
        $isOpen = false;
    }
   }

    ?>

 </html>
