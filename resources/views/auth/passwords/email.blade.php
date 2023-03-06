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



                    <img style="max-width:200px;" src="{{asset('dawa_theme/assets/logo.png')}}" class="navbar-logo" alt="logo">
                    <p class="" style="margin:0px;">@lang('Reporting CMS')
                   </p>

                       <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('login')}}">Login</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);" style="color: blue;">Forgot Password</a></li>

                        </ol>
                    </nav>


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="text-align: left !important;" for="email" class="col-md-12 col-form-label  ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 " style="    margin-left: 11px;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
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
