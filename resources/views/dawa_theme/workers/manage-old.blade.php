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
     var selected_row = null;
     var current_forum_id = null;
    </script>
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{asset('dawa_theme/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<link rel="stylesheet" href="{{asset('dawa_theme/dist/js-snackbar.css?v=1.3')}}" />




<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />

@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/dist/js-snackbar.js?v=1.3')}}"></script>
<style>
.loadingoverlay{
    cursor:not-allowed;
}
</style>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

{{-- https://code.jquery.com/jquery-3.5.1.js --}}



<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        fixedHeader: true,
        pageLength  : 100,
        stateSave: true,
        buttons: [ {
            extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return (idx+1)+': '+title;
            }
        } ]
    } );
} );
</script>


@endsection




{{-- content --}}
@section('content')

<style>

    .layout-px-spacing>.layout-top-spacing {
        display: block;
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

    .img-resp{

        border: 1px solid #dee2e6;
  max-width: 55px;
  max-height: 55px;
  border-radius: 9px;
    }
    .name-img{
        display: inline-block;
                      vertical-align: middle;
    }

    /*

header-sr
content-sr


*/
</style>

<style>

    *:before, *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .video__icon {
      position: absolute;
      width: 50px;
        right: 40px;
        top: 24px; }

        @media screen and (min-width: 480px) {
            .video__icon {
                position: absolute;
    width: 50px;
    right: 101px;
    top: 24px; }
}

      .video__icon .circle--outer {
        border: 1px solid #e50040;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin: 0 auto 5px;
        position: relative;
        opacity: .8;
        -webkit-animation: circle 2s ease-in-out infinite;
                animation: circle 2s ease-in-out infinite; }
      .video__icon .circle--inner {
        background: #e50040;
        left: 15px;
        top: 10px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: absolute;
        opacity: .8; }
        .video__icon .circle--inner:after {
          content: '';
          display: block;
          border: 2px solid #e50040;
          border-radius: 50%;
          width: 28px;
          height: 28px;
          top: -4px;
          left: -4px;
          position: absolute;
          opacity: .8;
          -webkit-animation: circle 2s ease-in-out .2s infinite;
                  animation: circle 2s ease-in-out .2s infinite; }
      .video__icon p {
        color: #000;
        text-align: center; }

    @-webkit-keyframes circle {
      from {
        -webkit-transform: scale(1);
                transform: scale(1); }

      to {
        -webkit-transform: scale(1.5);
                transform: scale(1.5);
        opacity: 0; } }

    @keyframes circle {
      from {
        -webkit-transform: scale(1);
        transform: scale(1);
        }

      to {
        -webkit-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
        } }


    </style>
{{--
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" > --}}


<div class=" layout-spacing layout-top-spacing fit_display" id="cancel-row">
    <div class="col-lg-12">


<style>
    .table > tbody > tr > td {
        border: none;
        color: #000000;
        font-size: 14px;
    font-family: Calibri;
    letter-spacing: 0px;
    }
    .aaa{
        padding: 9px;
        margin-right: 0px;
    }
    tr{
        background: #fff;
    box-shadow: 0px 2px 4px rgb(126 142 177 / 12%);
    padding: 13px 18px;
    margin-bottom: 8px;
    align-items: center;
    cursor:pointer;
    }


.dataTables_wrapper .form-control {
    background: #fff;
    border: none;
    margin-top: 5px;
    -webkit-box-shadow: 2px 5px 17px 0 rgb(31 45 61 / 10%);
    box-shadow: 10px 6px 20px 0px rgb(31 45 61 / 10%);
    border-radius: 6px;
    border: 1px solid #acb0c3;
    padding: 8px 30px 8px 14px;
}

    </style>
    <button id="open_manage_worder" hidden type="button" class="btn btn-primary mb-2 mr-2"
    data-toggle="modal" data-target=".bd-example-modal-lg">Large</button>

    <div id="myProgress">
        <div id="myBar"></div>
      </div>

      <style>
        #myProgress {
            width: 100%;
    background-color: #ddd;
    margin-left: 15px;

    position: absolute;
    top: -17px;
    z-index: 1000;
        }

        #myBar {
          width: 0%;
          height: 11px;
          background-color: #04AA6D;
        }
        .certer {
           text-align: center;
        }
        .gray > span {
          color: gray;
        }

        @media screen and (max-width: 480px) {
            .broadcast-list{
padding: 10px;
margin: 0px;
        }
  }
  .gray-color{
    color: gray;
  }
        </style>


                <div class="col-xl-12 col-lg-12 col-sm-12   ">
                    <div class="widget-content   widget-content-area  br-6">




                        <nav class="    breadcrumb-two" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">
                                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    Home
                                </a></li>

                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                    View Workers @if(App\Helpers\Helper::is_forum_level_user())   | {{App\Helpers\Helper::get_forum_name() }}  @endif  </a></li>
                            </ol>
                        </nav>
                        <div class="table-responsive mb-4  ">
                            <div class="video__icon" hidden>
                                <div class="circle--outer"></div>
                                <div class="circle--inner"></div>
                                <p style="font-size: small;">LIVE</p>
                              </div>

                            <table id="example" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr  >
                                        <th style="   text-align: center;">Sr#</th>
                                        <th>Date <br> Time</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Forum</th>
                                        <th>Profession</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>District</th>
                                        <th>Tehsil</th>
                                        <th>WhatsApp</th>
                                        <th>Email</th>
                                        <th>Listed</th>
                                        <th>Promoted</th>
                                        <th>Referral</th>
                                        <th>Rafaqat#</th>
                                        <th>Internet</th>
                                    </tr>

                                </thead>

                                <tbody  >

                                    @foreach ($workers as  $worker)

                                    <tr  >
                                        <td style="   text-align: center;">{{$worker->id}}</td>
                                        <td>
                                         {{ \Carbon\Carbon::parse($worker->created_at)->format('d-M')}}
                                         <br>
                                      <span class="gray-color">   {{\Carbon\Carbon::parse($worker->created_at)->format('H:i:s')}}     </span>
                                         </td>
                                        <td> {{$worker->name}}    </td>
                                        <td> {{$worker->fathername}} </td>
                                         <td>{{$worker->forum->frm_code}} </td>
                                         <td>{{($worker->profession != null)? $worker->profession->profession_name : "---"}} </td>
                                         <td>{{$worker->gender}} </td>
                                         <td>{{ ($worker->country != null)? $worker->country_name->name : "---" }} </td>
                                         <td>{{ ($worker->district != null)? $worker->district->dist_name : "---" }} </td>
                                         <td>{{ ($worker->tehsil != null)? $worker->tehsil->tsl_name : "---" }} </td>
                                         <td>{{$worker->whatsapp}} </td>
                                         <td>{{ ($worker->email != null)? $worker->email : "---" }} </td>
                                        <td>{{($worker->wabastagans != null)? count($worker->wabastagans) :  "0"}}</td>
                                        <td>{{($worker->promoted_Workers != null)? count($worker->promoted_Workers) :  "0"}}</td>
                                        <td>{{($worker->added_Workers_by_refferal != null)? count($worker->added_Workers_by_refferal) :  "0"}}</td>
                                        <td>{{ ($worker->membership_id != null)? $worker->membership_id : "---" }} </td>
                                        <td>  @if ($worker->internet_type != null && $worker->internet_type == "Wifi User" )  {{$worker->internet_type}}   @elseif($worker->internet_type != null)  {{$worker->internet_type}} -  {{$worker->internet_sub_type}}   @else  ---  @endif  </td>
                                    </tr>

                                    @endforeach




                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>






    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    {{-- <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script> --}}

    <script type="text/javascript">


$(document).ready(function(){

//     $('#tableworker').DataTable( {
//     responsive: true
// } );

        //     $('#table-worker').DataTable({
        //     responsive: true,
        //  dom: '<"row"<"col-md-12"<"row"<"col-md-4"B><"col-md-4"l><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        //     buttons: {
        //         // buttons: [

        //         //     { extend: 'copy', className: 'btn btn-primary broadcast-list broadcast-list-copy-button' },
        //         //     { extend: 'csv', className: 'btn  btn-primary broadcast-list  broadcast-list-copy-button-csv' },

        //         //     { extend: 'excel', className: 'btn  btn-primary broadcast-list  broadcast-list-copy-button-excel '  },
        //         //     { extend: 'print', className: 'btn  btn-primary broadcast-list' }
        //         // ]
        //     },

        //     "pageLength": 100,
        //                "order": [[ 0, "desc" ]] ,


        //   });


});


      </script>








    </div>
</div>


<script>
    $(document).ready(function() {
// $(".manage-user").click(function() {
// $('#password').val('');
// $('.msg').hide();
// $('#manage_worker_name').html($(this).attr('data-name'));
// manage_user_id= $(this).attr('data-id');
// $('#manage_worker_image').attr('src', $(this).attr('data-image'));
// $("#open_manage_worder").click();
// });

// update password button

$("#manage_worker_update_password_button").click(function() {

$('.msg').hide();
update_password_button_disabled();

if($('#password').val().length < 6 )
{

   showMsg('password_msg' , '<span style="color:red;">Please Enter Minimum 6 Characters.</span>');
   update_password_button_enabled();
   return true;
}
if($('#password').val().length > 15 )
{

   showMsg('password_msg' , '<span style="color:red;">Please Enter Maximum 15 Characters.</span>');
   update_password_button_enabled();
   return true;
}

ChangeUserPassword($('#password').val() );


});
// update profile password button

$("#update-profile-button").click(function() {

updateUserProfile();

});
});
   </script>



<script>


$(document).ready(function(){



    $('.broadcast-list-copy-button').click(function(){

SnackBar({
                        message: " Record has Copied in your Clipboard. <em>Successfully<em>!",
                            status: "success",

                            fixed: true ,


                    });
});
$('.broadcast-list-copy-button-csv').click(function(){


SnackBar({
                        message: "   File Downloaded. <em>Successfully<em>!",
                            status: "success",
                            fixed: true,

                    });
});
$('.broadcast-list-copy-button-excel').click(function(){


SnackBar({
                        message: "   File Downloaded. <em>Successfully<em>!",
                            status: "success",
                            fixed: true

                    });
});
});


</script>

<style>

.js-snackbar-container--top-right {
    top: 57px !important;}
    </style>



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
                                    <div class="row">



                                        <div class="col-md-7">
                                            <div id="forum-filed" class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Current Forum</label>

                                                </div>
                                                <select id="forum_select" style="cursor:pointer;" class="form-control
                                                ">
              @foreach (\App\Forum::where('frm_shown' , 1)->orderBy('frm_ordering', 'ASC')->get() as  $forum)
             <option value="{{$forum->id_frm}}">{{$forum->frm_code}} - {{$forum->frm_name}}</option>
             @endforeach
                                                </select>

        <span id="forum_msg" style="padding:5px;" class="msg" style="display: none;"></span>




                                            </div>
                                            <br>
                                            <br>
                                            <br>


                                        </div>
                                    </div>


                                    <div class="modal-footer md-button">
                                        <button id="update-profile-cancel-button"class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Cancel</button>
                                        <button id="update-profile-button" type="button" class="btn btn-primary">Update Profile</button>
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


    function updateUserProfile(  )
    {

$('.msg').hide();
update_profile_button_disabled();
var selected_forum_id = $('#forum_select').val();

        if( current_forum_id ==  selected_forum_id)
        {
            showMsg('forum_msg' , `<span style="color:green;">No Change Made!</span>`);
            update_profile_button_enabled();
            return true;
        }

        var data_var = { user_id:manage_user_id,   id_forum:selected_forum_id
                  };

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
               type:'POST',
               url: '{{route("update.user.profile.from.admin")}}' ,
               data: data_var ,
               success:function(data){

                //    console.log(data);

                   if(data.status == "not-found")
                   {


                  showMsg('forum_msg' , `<span style="color:red;">User Not Found Pleae Reload This Page And Try Again.</span>`);


                   }
                  else if(data.status == "update")
                   {
                    current_forum_id = selected_forum_id;
                       if(selected_forum_id == 1){ selected_row.find('.user-forum').html("TMQ"); }
                       if(selected_forum_id == 2){ selected_row.find('.user-forum').html("MWL"); }
                       if(selected_forum_id == 3){ selected_row.find('.user-forum').html("MYL"); }
                       if(selected_forum_id == 4){ selected_row.find('.user-forum').html("MUC"); }
                       if(selected_forum_id == 5){ selected_row.find('.user-forum').html("MSM"); }
                       if(selected_forum_id == 6){ selected_row.find('.user-forum').html("PAT"); }
                       if(selected_forum_id == 7){ selected_row.find('.user-forum').html("MSMS"); }

                    showMsg('forum_msg' , `<span style="color:green;"><i class="fa fa-check-circle" style="    color: #1eb91e;
            font-size: 19px;    margin: 5px;
    vertical-align: middle;"></i>Profile Updated Successfully.</span>`);
    SnackBar({
                            message: "<em>Congratulation<em>!. Profile Update!",
                                status: "success",
                                fixed: true
                        });

                   }


                   else
                   {

                    update_profile_button_enabled();

                   alert( 'Uncaught Error');

                   }
                   update_profile_button_enabled();

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

    function update_profile_button_disabled()
    {
        $("#manage_worker_model_loader").css('display','flex');
        $("#update-profile-cancel-button").attr('disabled' , true);
        $("#update-profile-button").html('Please Wait...');
        $("#update-profile-button").attr('disabled' , true);

    }
    function update_profile_button_enabled()
    {
        $("#manage_worker_model_loader").hide();
        $("#update-profile-cancel-button").attr('disabled' , false);
        $("#update-profile-button").html('Update Profile');
        $("#update-profile-button").attr('disabled' , false);

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
