@extends('layouts.dawa_theme')
@section('title')
  @lang('Change Password')
@endsection
@section('dashboard_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="{{asset('dawa_theme/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endsection

@section('pagelevel_scripts_footer')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('dawa_theme/assets/js/widgets/modules-widgets.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:black;">Change Password- {{env('app_name')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                        @if(count($errors->all()) > 0)
   <div style="background-color: #ff00001c;
   padding: 10px;
   margin-bottom: 7px;">
                         @foreach ($errors->all() as $error)
                            <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                {{ $error }}</p>
                         @endforeach
   </div>
   @endif

   <style>

.svg{
    position: absolute;
    /* float: right; */
    top: 9px;
    right: 30px;
    cursor: pointer;
    color: gray;
}
. {
    padding-right: 48px;
}
       </style>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control padding" name="current_password" autocomplete="current-password">
                                <svg onclick="ManagePassword('password')" class="svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control padding" name="new_password" autocomplete="current-password">
                                <svg class="svg" onclick="ManagePassword('new_password')"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                 Confirm Password</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control padding" name="confirm_password" autocomplete="current-password">
                                <svg onclick="ManagePassword('confirm_password')"  class="svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function ManagePassword(id) {

                            var x = document.getElementById(id);

                          if (x.type === "password") {
                            x.type = "text";

                          } else {
                            x.type = "password";
                          }

                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
