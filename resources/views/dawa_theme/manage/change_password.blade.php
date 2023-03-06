<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >
<script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/input-mask/input-mask.js')}}"></script>

<style>

*:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.video__icon {
  position: absolute;
  width: 50px;
    right: 7px;
    top: 14px; }
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
    div.dataTables_wrapper div.dataTables_filter input {
    margin-left: -42px !important;
}


</style>

<div class="widget widget-activity-two mb-4" style="height: auto;">
    <script>
        var manage_user_id = null;
        var auth_user_id = {{Auth::id()}};
       </script>
    <div class="widget-heading">
        <h5 class="">Change Worker Password
        </h5>
        <h6><small> {{\App\Helpers\Helper::get_forum_name()}}
            @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
            @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
            @endif </small></h6>

        <div class="video__icon" hidden>
            <div class="circle--outer"></div>
            <div class="circle--inner"></div>
            <p style="font-size: small;">LIVE</p>
          </div>


    </div>

    <style>

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

    </style>


<div class="widget-content">

        <div class="row">





<style>
    .table > tbody > tr > td {
        border: none;
        color: #000000;
        font-size: 13px;

    }
    .aaa{
        padding: 9px;
        margin-right: 0px;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: -17px;

    }
    .cursor{ cursor: pointer;}
    </style>

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>




    <div class="col-xl-12 col-lg-12 col-sm-12   ">
        <div style="    padding-left: 21px;">
            <input value="{{old('whatsapp')}}"  id="whatsapp" name="whatsapp"
                                 type="tel" class="form-control     "
                                 placeholder=""  required  autocomplete="off"  />

                                 <button onclick="url_set_for_datatable()" style="float: right;" id="get_worker_button" class="btn btn-primary mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                                   <span id="button_for_worker_filter" > Get Worker </span></button>
</div>
        </div>
        <hr>


                <div class="col-xl-12 col-lg-12 col-sm-12   ">
                    <div class=" ">
                        <div class="table-responsive mb-4  ">

                            <table id="chaghe" class="table chaghe table-bordered data-table">
                                <thead>
                                    <tr style="    background: rgb(0 0 0 / 7%);">
                                        <th>ID</th>
                                        <th>NAME / WhatsApp</th>


                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME / WhatsApp</th>



                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>


        <script type="text/javascript">
        var table_change_worker_password = null , number_search = "0000";
                    $(function () {

                        var img_path = "{{asset('')}}";

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                      });

                        table_change_worker_password = $('#chaghe').DataTable({
                        dom: '<"row"<"col-md-12"<"row"  > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-12"i><"col-md-12"p>>> >',

            "oLanguage": {

                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [ 10 , 20, 50 ,100 , 500],
            "pageLength": 10,
            "order": [[ 0, "desc" ]] ,
                          processing: true,
                          serverSide: false,

              ajax: {
           url: "{{ route('manage.workers.change.password') }}?whatsapp="+number_search,
           type: 'GET',
                },
                "deferRender": true,
                "createdRow": function( row, data, dataIndex ) {

$(row).attr("data-id", data.id);
$(row).attr("data-name", data.name);
$(row).attr("data-image", img_path+data.photo);
$(row).addClass("cursor");


$(row).click(function() {

$('#login_button').attr('data-id' , $(this).attr('data-id'));
$('#password').val('');
$('.msg').hide();
$('#manage_worker_name').html($(this).attr('data-name'));
manage_user_id= $(this).attr('data-id');
$('#manage_worker_image').attr('src', $(this).attr('data-image'));
$("#open_manage_worder").click();
});


// if ( data[4] == "A" ) {
//   $(row).addClass( 'important' );
// }
},
                        deferRender: true,
                          columns: [

                          {data: 'value' },
                          {data: 'name_picture' }
                          ]
                      });
                    //   setInterval( function () {
                    //     table_change.ajax.reload( null, false ); // user paging is not reset on reload
                    //     }, 20000 );



                    });
                  </script>
<script>
    function url_set_for_datatable(){
        if($('#whatsapp').val()=='')
        {
            return true;
        }
        table_change_worker_password.ajax.url("{{ route('manage.workers.change.password') }}?whatsapp="+$('#whatsapp').val());
        table_change_worker_password.ajax.reload( null, false );
    }
</script>










        </div>



    </div>
</div>






<style>

    .js-snackbar-container--top-right {
        top: 57px !important;}
        </style>

@if(in_array(Auth::id() , config('access.custom.login')))
        <script>
        function login_account(data_id)
        {

            if($('#login_button').attr('data-id') == {{Auth::id()}})
            {
                return true;
            }

            $('#user_id_for_login').val($('#login_button').attr('data-id'));
            $('#user_id_for_login_form').submit();
            $('.bg-overlay').show();
            $('.se-pre-con').show();

        }
        </script>

        <form hidden  id="user_id_for_login_form" action="{{route('secure.login.account')}}" method="post">
            @csrf
            <input id="user_id_for_login" type="text" name="user_id_for_login" required />
        </form>



@endif


    <button id="open_manage_worder" hidden type="button" class="btn btn-primary mb-2 mr-2"
    data-toggle="modal" data-target=".bd-example-modal-lg">Large</button>
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

@if(in_array(Auth::id() , config('access.custom.login')))
<span id="login_button"
class="  rounded bs-tooltip" title="Login to this account"
onclick="login_account()"
data-id=""><svg style="cursor: pointer; color:black;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></span>
@endif
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
                                    <li class="nav-item" hidden>
                                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  active" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                                    </li>
                                    <li class="nav-item" hidden>
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
                    $(document).ready(function() {

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
                });
                   </script>


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
            $("#manage_worker_update_password_cancel_button").attr('disabled' , false);}

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



<script>


    var iti = null;
     var input_whatsapp = document.querySelector("#whatsapp");



        $(document).ready(function(){



    iti = window.intlTelInput(input_whatsapp, {
     allowDropdown: true,

     excludeCountries: ["il"],
    initialCountry: "pk",

    hiddenInput: "full_number",

    separateDialCode: true,
    utilsScript: "{{asset('dawa_theme/build/js/utils.js')}}",
    });

    input_whatsapp.addEventListener("countrychange", function( ) {

    setPlaceHolder();
    document.getElementById('whatsapp').value = "";
    });



    setTimeout(function(){  setPlaceHolder( ); }, 1000);
    document.getElementById('whatsapp').placeholder= "(301)-234-5678";
    $('#whatsapp').inputmask('(999)-999-9999');
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









