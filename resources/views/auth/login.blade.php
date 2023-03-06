<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>
        Login - {{env('APP_NAME')}}
    </title>
     <!-- CSRF Token -->

     <link rel="icon" type="image/x-icon" href="{{asset('dawa_theme/assets/featured.jpg')}}"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('dawa_theme/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
       <meta id="meta-csrf-token" name="csrf-token" content="{{ csrf_token() }}">
 
 
<meta name="verify-v1" content="oqhMBil0Xi3LqYPuyAiOoY8S+DG0faHzu0bgHyd2h20=">
<meta name="alexaVerifyID" content="2NLi5A1oNK8T-2K6nXbWt-2FS8U">
<meta name="robots" content="all, index, follow">

 
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





/* // what is Fehm e din software button style  */




.custom-btn {

 height: 40px;
 color: #fff;
 border-radius: 5px;
 padding: 10px 25px;
 font-weight: 500;
 background: transparent;
 cursor: pointer;
 transition: all 0.3s ease;
 position: relative;
 display: inline-block;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
  7px 7px 20px 0px rgba(0,0,0,.1),
  4px 4px 5px 0px rgba(0,0,0,.1);
 outline: none;
}


/* 16 */
.btn-16 {
 border: none;
 color: #000;
}
.btn-16:after {
 position: absolute;
 content: "";
 width: 0;
 height: 100%;
 top: 0;
 left: 0;
 direction: rtl;
 z-index: -1;
 box-shadow:
  -7px -7px 20px 0px #fff9,
  -4px -4px 5px 0px #fff9,
  7px 7px 20px 0px #0002,
  4px 4px 5px 0px #0001;
 transition: all 0.3s ease;
}
.btn-16:hover {
 color: #000;
}
.btn-16:hover:after {
 left: auto;
 right: 0;
 width: 100%;
}
.btn-16:active {
 top: 2px;
}

/* // what is Fehm e din software button style  */



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



                         <img style="max-width: 240px;" src="{{asset('dawa_theme/assets/logo.png')}}" class="navbar-logo" alt="logo">
                        <p class="" style="margin:0px;">@lang('Reporting CMS')
                       </p>



                            <form  id="Login_form" class="text-left" action="{{ route('login') }}" method="POST" autocomplete="off">
                                @csrf
                            <div class="form">


                                @if (session('message'))
                                <div class="alert alert-success">
                                   {!! session('message') !!}
                                </div>
                            @endif

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Username / Email</label>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                                    <input   value="@if(Session::has('email'))  {{ Session::get('email')}}  @endif"  id="email" name="email"
                                    placeholder="Email"type="email" class="form-control 
                                     
                                     @if(Session::has('loginFail_not_match')) is-invalid   @endif
                                     @error('email') is-invalid @enderror"
                                     placeholder=""  required  autocomplete="off"  >


                                   @if(Session::has('loginFail_not_match'))
                                       <span style="display:block;" class="invalid-feedback" role="alert">
                                          <strong>   {{ Session::get('loginFail_not_match')}} </strong>
                                      </span>
                                        @endif


                                </div>


                  



                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>

                                        @if (Route::has('forget.password.mobile'))
                                        <a href="{{ route('forget.password.mobile') }}" class="forgot-pass-link">     {{ __('Forgot Your Password?') }}</a>
                                    @endif
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" type="password" name="password"
                                      class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password" required  autocomplete="new-password"
                                       />
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>


                                <div class="n-chk new-checkbox checkbox-outline-primary d-sm-flex justify-content-between">

                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                      <input name="remember" type="checkbox" class="new-control-input">
                                      <span class="new-control-indicator"></span>Keep me logged in
                                    </label>


                                     


                                </div>

                                <style>
                                      #web-view{ display: block;}
                                    #mobile-view{ display: none;}
                                @media screen and (max-width: 480px) {
                                    #web-view{ display: none;}
                                    #mobile-view{ display: block;}

                                    } 

                                </style>

                                <div class="d-sm-flex justify-content-between">

                                   <div class="field-wrapper">
                                        <button id="login_button" type="submit" class="btn btn-primary" value="">
                                            <svg style="position: unset;
                                            color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                          <span id="login_button_value">  Log In </span></button>
                                    </div>
                                   


                                </div>
                                <script>
                                    function go()
                                    {
                                        window.location="{{route('dawati.form.view')}}";
                                    }
      $('#Login_form').submit(function(e){
	// Stop the form submitting
  	e.preventDefault();

          $('#login_button_value').html('Please Wait...');
          $('#login_button').prop('disabled' ,true);

  	e.currentTarget.submit();
}); 
                                    </script>



                            </div>
                        </form>
                        <br>
                        
                        <div class="form-group m-b-0 mt-3">
                            <div class="col-sm-12 text-center">
                                <p>© {{date('Y')}} - All Rights Reserved.<br>
                                    </p>
                                    <span>  Developed by  </span>
                                    <a href="#" class="text-primary m-l-5"><b>Reporting CMS</b></a>

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

 </html>
