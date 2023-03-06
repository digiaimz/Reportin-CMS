@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('dashboard_active')
active
@endsection
{{-- dashboard_aria --}}
@section('dashboard_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
View Workers
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
<script>
     var manage_user_id = null;
     var auth_user_id = {{Auth::id()}};
    </script>
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{asset('dawa_theme/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<link rel="stylesheet" href="{{asset('dawa_theme/dist/js-snackbar.css?v=1.3')}}" />

<script src="{{asset('dawa_theme/dist/js-snackbar.js?v=1.3')}}"  ></script>
@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')
<script src="{{asset('dawa_theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('dawa_theme/assets/js/apps/contact.js')}}"></script>

<style>
.loadingoverlay{
    cursor:not-allowed;
}
</style>
@endsection
{{-- content --}}
@section('content')

<style>
    .layout-px-spacing>.layout-top-spacing {
        display: block;
    }

    .list>.items>.item-content>div {
        width: 15%;
    }

    .searchable-container .searchable-items.list .items.items-header-section h4 {

        margin-left: 0px;
    }

    .list>.items>.item-content>.width-5 {
        width: 5%;
    }

    .list>.items>.item-content>.width-10 {
        width: 10%;
    }

    .list>.items>.item-content>.width-15 {
        width: 15%;
    }

    .list>.items>.item-content>.width-20 {
        width: 20%;
    }

    .list>.items>.item-content>.width-25 {
        width: 25%;
    }

    .black {
        color: black;
    }

    .items {
        cursor: pointer;
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100%;
        height: 100%;
        background-color: #000000;
    }

    /*

header-sr
content-sr


*/
</style>




<div class=" layout-spacing layout-top-spacing" id="cancel-row">
    <div class="col-lg-12">
        <div class="widget-content searchable-container list">

            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <input type="text" class="form-control product-search" id="input-search"
                                placeholder="Search Worker...">
                        </div>
                    </form>
                </div>

                <div
                    class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                    <div class="d-flex justify-content-sm-end justify-content-center">

                        <div class="switch align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-list view-list active-view">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid view-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </div>
                    </div>
                    <button id="open_manage_worder" hidden type="button" class="btn btn-primary mb-2 mr-2"
                        data-toggle="modal" data-target=".bd-example-modal-lg">Large</button>
                </div>
            </div>




            <div class="searchable-items list" id="workers-append">
                <div class="items items-header-section">
                    <div class="item-content">
                        <div class="user-email width-10">
                            <h4>Sr#</h4>
                        </div>
                        <div class="width-20">
                            <!--   <label class="new-control new-checkbox checkbox-primary">-->
                            <!-- <div class="n-chk align-self-center text-center">-->
                            <!--        <input type="checkbox" class="new-control-input" id="contact-check-all">-->
                            <!--        <span class="new-control-indicator"></span>-->
                            <!--    </label>-->
                            <!--</div>-->
                            <h4>Name</h4>
                        </div>

                        <div class="user-email">
                            <h4>Forum</h4>
                        </div>
                        <div class="user-location">
                            <h4 style="margin-left: 0;">District<br>Tehsil</h4>
                        </div>
                        <div class="user-phone width-25">
                            <h4 style="margin-left: 3px;">WhatsApp<br>Email</h4>
                        </div>
                        <div class="user-phone width-10">
                            <h4 style="margin-left: 3px;">Listed</h4>
                        </div>
                        <div class="user-phone width-10">
                            <h4 style="margin-left: 3px;">Date<br>Time</h4>
                        </div>

                    </div>

                </div>







            </div>

        </div>
    </div>
</div>

<?php
$i=count($workers);
?>

<script>

var total_workers = Number('{{$i}}');
var skip =0;
var take =50;

function checkValue()
{

if(skip < total_workers)
{
   appendWorkers(skip , take)
    skip= skip + take;
}

}


function appendWorkers(skip , take)
{


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  skip:skip , take:take   , total: total_workers   };
$.ajax({
type:'POST',
url: "{{ route('append.workers.list') }}" ,
data: data_var ,
success:function(data){

if (data.status == "view")
{

       $('#workers-append').append(data.view);
       checkValue();

}
else
{
    alert("System Catch Error!", "Somthing went Wrong try again latter");
}


},
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    },


});

}

$(document).ready(function(){
    checkValue();
});




</script>





            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg   " tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel" style="font-weight: 600;">
                                <img id="manage_worker_image" src="https://via.placeholder.com/50x50?text=No+Image"
                                    style="        border: 1px solid #dee2e6;max-width: 55px;max-height: 55px;border-radius: 9px; "
                                    alt="Image">
                                <span id="manage_worker_name"></span> - <span class="badge badge-info"
                                    style="    font-size: 16px;"> Manage Worker</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body" id="manage_worker_model">
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  active" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Profile</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p class="modal-text">

                                        <marquee width="100%" direction="left" height="30px">
                                            <h5>Working on Feature - Stay Connected</h5>
                                        </marquee>
                                        <marquee width="100%" direction="right" height="30px">
                                            <h5>Working on Feature - Stay Connected</h5>
                                        </marquee>


                                    </p>
                                    <hr style="    border: 1PX solid;
                               border-color: #dee2e6;">

                                    <div class="modal-footer md-button">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Cancel</button>
                                        <button type="button" class="btn btn-primary">Update Profile</button>
                                    </div>

                                </div>
                                <div class="tab-pane fade active show" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab" style="    margin-left: 15px;">
                                    <div class="row">



                                        <div class="col-md-6">
                                            <div id="password-field" class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Current Password</label>

                                                </div>
                                                <svg style="position: absolute;
                                    top: 41px;
                                    left: 34px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-lock">
                                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                </svg>
                                                <input disabled style="    padding-left: 54px;
                                    padding-right: 54px;" id="current_password" value="         " type="password"
                                                    name="current_password" class="form-control " placeholder="Password"
                                                    required="" autocomplete="new-password" aria-autocomplete="list">

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="password-field" class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Create New Password</label>

                                                </div>
                                                <svg style="position: absolute;
                                    top: 41px;
                                    left: 34px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-lock">
                                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                </svg>
                                                <input style="    padding-left: 54px;
                                    padding-right: 54px;" id="password" type="password" name="password"
                                                    class="form-control " placeholder="Update Password" required=""
                                                    autocomplete="new-password" aria-autocomplete="list">
                                                <svg id="show_password_icon" onclick="ManagePassword('password')" style="position: absolute;
                                    top: 41px;
                                    right: 34px; cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    id="toggle-password" class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>


                                                <svg id="hide_password_icon" onclick="ManagePassword('password')" style="position: absolute;
                                    top: 41px;
                                    right: 34px; cursor:pointer;display:none;" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-eye-off">
                                                    <path
                                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                                    </path>
                                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                                </svg>

                                               <span id="password_msg" style="padding:15px;" class="msg" style="display: none;">Please Enter Minimum 6 Characters.</span>

                                            </div>


                                        </div>
                                    </div>

                                         <br>


                                    <div class="modal-footer md-button">
                                        <button id="manage_worker_update_password_cancel_button" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Cancel</button>
                                        <button id="manage_worker_update_password_button" type="button" class="btn btn-primary">Update Password</button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p class="modal-text">


                                        <marquee width="100%" direction="left" height="30px">
                                            <h5>Working on Feature - Stay Connected</h5>
                                        </marquee>
                                        <marquee width="100%" direction="right" height="30px">
                                            <h5>Working on Feature - Stay Connected</h5>
                                        </marquee>

                                    </p>

                                    <hr style="    border: 1PX solid;
                                border-color: #dee2e6;">

                                    <div class="modal-footer md-button">

                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Close</button>

                                    </div>

                                </div>
                            </div>

{{-- loading overlay --}}
{{-- loading overlay --}}




<div class="loadingoverlay" id="manage_worker_model_loader" style="box-sizing: border-box; position: absolute; display: flex; flex-flow: column nowrap;
 align-items: center; justify-content: space-around; background: rgba(255, 255, 255, 0.8); z-index: 2147483647; opacity: 1;
  top: 0.135px; left: 0.09722px; width: 100%; height: 75%;display: none;"><div class="loadingoverlay_element"
   style="order: 1; box-sizing: border-box; overflow: visible; flex: 0 0 auto; display: flex; justify-content: center;
    align-items: center; animation-name: loadingoverlay_animation__rotate_right; animation-duration: 2000ms; animation-timing-function:
     linear; animation-iteration-count: infinite; width: 120px; height: 120px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
     style="width: 100%; height: 100%; fill: rgb(32, 32, 32);"><circle r="80" cx="500" cy="90" style="fill: rgb(32, 32, 32);"></circle>
     <circle r="80" cx="500" cy="910" style="fill: rgb(32, 32, 32);"></circle><circle r="80" cx="90" cy="500" style="fill: rgb(32, 32, 32);">
         </circle>
         <circle r="80" cx="910" cy="500" style="fill: rgb(32, 32, 32);"></circle><circle r="80" cx="212" cy="212"
         style="fill: rgb(32, 32, 32);"></circle><circle r="80" cx="788" cy="212" style="fill: rgb(32, 32, 32);">
             </circle><circle r="80" cx="212" cy="788" style="fill: rgb(32, 32, 32);"></circle><circle r="80" cx="788" cy="788"
              style="fill: rgb(32, 32, 32);"></circle></svg></div></div>

{{-- loading overlay --}}
{{-- loading overlay --}}



                        </div>

                    </div>
                </div>
            </div>





            <script>
                function ManagePassword(id) {

                    var x = document.getElementById(id);

                    if (x.type === "password") {
                        $('#hide_password_icon').show();
                        $('#show_password_icon').hide();
                        x.type = "text";

                    } else {

                        $('#hide_password_icon').hide();
                        $('#show_password_icon').show();
                        x.type = "password";
                    }


                }

            </script>
            <!-- Modal -->


<script>



    function ChangeUserPassword(password    )
    {
        if(manage_user_id == null)
        {
            update_password_button_enabled();
            return true;
        }
        if(   auth_user_id ==  manage_user_id)
        {
            showMsg('password_msg' , `<span style="color:red;">Dear User! You Can Change Your Password By  &nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;<a href="{{route('change.password.view')}}">Click here</a>.</span>`);
            update_password_button_enabled();
            return true;
        }

        var data_var = { user_id:manage_user_id,   password:password
                  };

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
               type:'POST',
               url: '{{route("change.password.from.admin")}}' ,
               data: data_var ,
               success:function(data){

                //    console.log(data);

                   if(data.status == "not-found")
                   {


                  showMsg('password_msg' , `<span style="color:red;">User Not Found Pleae Reload This Page And Try Again.</span>`);


                   }
                  else if(data.status == "update")
                   {

                    $('#password').val('');
                    showMsg('password_msg' , `<span style="color:green;"><i class="fa fa-check-circle" style="    color: #1eb91e;
            font-size: 19px;    margin: 5px;
    vertical-align: middle;"></i>Password Updated Successfully.</span>`);
    SnackBar({
                            message: "<em>Congratulation<em>!. Password Update Successfully!",
                                status: "success",
                                fixed: true
                        });

                   }


                   else
                   {

                    update_password_button_enabled();

                   alert( 'Uncaught Error');

                   }
                   update_password_button_enabled();

               } ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);
        update_password_button_enabled();
            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });


    }

    function update_password_button_disabled()
    {
        $("#manage_worker_model_loader").css('display','flex');
        $("#manage_worker_update_password_button").attr('disabled' , true);
        $("#manage_worker_update_password_button").html('Please Wait...');
        $("#manage_worker_update_password_cancel_button").attr('disabled' , true);

    }
    function update_password_button_enabled()
    {
        $("#manage_worker_model_loader").hide();
        $("#manage_worker_update_password_button").attr('disabled' , false);
        $("#manage_worker_update_password_button").html('Update Password');
        $("#manage_worker_update_password_cancel_button").attr('disabled' , false);

    }

   function hideMsg(id)
    {
      $('#'+id).html('');
      $('#'+id).hide();
    }

   function showMsg(id,msg)
    {
      $('#'+id).html(msg);
      $('#'+id).show();
    }

</script>






{{-- <a href="{{route('view.worker.profile',['slug'=>'slug'])}}" class="bs-tooltip" data-toggle="tooltip"
    data-placement="top" title="" data-original-title="Edit">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
        </path>
        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
        </path>
    </svg>
</a> --}}



@endsection
