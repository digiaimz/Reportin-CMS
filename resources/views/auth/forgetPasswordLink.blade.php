<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>
    Create New Password - {{env('APP_NAME')}}
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
.form-form .form-form-wrap form .field-wrapper.input {
    padding: 5px;
    border-bottom: none;
    position: relative;
}
.form-form .form-form-wrap form .field-wrapper svg.feather-lock {
    top: 43px;
}
.form-form .form-form-wrap form .field-wrapper svg.feather-eye {
    position: absolute;
    top: 42px;
    right: 13px;
    color: #888ea8;
    fill: rgba(0, 23, 55, 0.08);
    width: 17px;
    cursor: pointer;
}
.form-form .form-form-wrap form .field-wrapper svg:not(.feather-eye) {
    position: absolute;
    left: 20px;
    color: #888ea8;
    fill: rgba(0, 23, 55, 0.08);
    width: 20px;
    height: 20px;
}
</style>


</head>
<body class="form">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">



                         <img style="max-width:100px;" src="{{asset('dawa_theme/assets/logo.png')}}" class="navbar-logo" alt="logo">
                        <p class="" style="margin:0px;">@lang('Reporting CMS')
                       </p>



                            <form  class="text-left" action="{{ route('reset.password.post') }}" method="POST" autocomplete="off">
                                @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">WhatsApp Number</label>



                                    <input style="    padding-left: 79px;" value="{{$whatsapp}}" disabled  id="whatsapp" name="whatsapp_null"
                                     type="tel" class="form-control   @if(Session::has('loginFail_not_match')) is-invalid   @endif
                                     @error('whatsapp') is-invalid @enderror"
                                     placeholder=""  required  autocomplete="off"  >

                                     <input hidden type="text" name="whatsapp" value="{{$whatsapp}}" />

                                     <input hidden type="text" name="token" value="{{$token}}" />

                                     @error('whatsapp')
                                     <div class="alert alert-danger">@lang($message)</div>
                                 @enderror



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

});


});




</script>










                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">New Password</label>


                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" type="password" name="password"
                                      class="form-control @error('password') is-invalid @enderror"
                                       placeholder="New Password" required  autocomplete="new-password"
                                       />
                                    <svg onclick="changeView('password')"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"  class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                    @error('password')
                                     <div class="alert alert-danger">@lang($message)</div>
                                 @enderror
                                </div>




                                <div id="confirm-password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Confirm Password</label>


                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                      class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="Confirm Password" required  autocomplete="off"
                                       />
                                    <svg  onclick="changeView('password_confirmation')"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password_confirmation" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                    @error('password_confirmation')
                                     <div class="alert alert-danger">@lang($message)</div>
                                 @enderror
                                </div>

                                @if (session('message'))
                                <div class="alert alert-danger">
                                   {!! session('message') !!}
                                </div>
                            @endif



                                <div class="d-sm-flex justify-content-between">

                                   <div class="field-wrapper" style="text-align: center;">
                                        <button style="width: 70%; letter-spacing:0px;" type="submit" class="btn btn-primary" value="">

                                            <svg  style="position: unset;
                                            color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>

                                            Change Password</button>
                                    </div>


                                </div>
                                <script>
function changeView(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

                                    </script>
 
                            </div>
                        </form>
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
