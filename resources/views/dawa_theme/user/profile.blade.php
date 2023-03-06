@extends('layouts.dawa_theme')
@section('dashboard_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
Edit-Profile
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
<meta name="csrf-token" content="{{ csrf_token() }}" />

  <link href="{{asset('dawa_theme/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}">
  <link href="{{asset('dawa_theme/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/elements/alert.css')}}" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
   <style>
        .btn-light { border-color: transparent; }
    </style>
        <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">
        <link href="{{asset('dawa_theme/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">


        {{-- // cropping tool --}}

    <!-- Css files-->
 <style>
     #fileInput{
  width:0;
  height:0;
  overflow:hidden;
}

#modal{
  z-index: 10;
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-color: #5F5F5F;
  opacity: 0.95;
  display: none;
}

#preview{
  z-index: 11;

  position: fixed;
  top: 74.5px !important;

  display: none;
  border: 4px solid #A5A2A2;
  border-radius: 4px;
  float: left;
  font-size: 0px;
  line-height: 0px;
}

#preview .buttons{
  width: 36px;
  position: absolute;
  bottom:0px;
  right: -44px;
}

#preview .buttons .ok{
  border: 4px solid #F5F5F5;
  border-radius: 4px;
  width: 28px;
  height: 28px;
  line-height: 0px;
  font-size: 0px;
  background-image: url("{{asset('crop/images/Ok.png')}}");

  background-repeat: no-repeat;
}
#preview .buttons .ok:hover{

  background-image: url("{{asset('crop/images/OkGreen.png')}}");
}

#preview .buttons .cancel{
  margin-bottom: 4px;
  border: 4px solid #F5F5F5;
  border-radius: 4px;
  width: 28px;
  height: 28px;
  line-height: 0px;
  font-size: 0px;

  background-image: url("{{asset('crop/images/Cancel.png')}}");
  background-repeat: no-repeat;
}

#preview .buttons .cancel:hover{
  background-image: url("{{asset('crop/images/CancelRed.png')}}");
}

 </style>

 <link rel="stylesheet" type="text/css" href="{{asset('crop/css/style-example.css')}}" />


    <link rel="stylesheet" type="text/css" href="{{asset('crop/css/jquery.Jcrop.min.css')}}" />

    <style>
.cropme{
  float: left;
  background-color: #f1f1f1;
  margin-bottom: 5px;
  margin-right: 5px;

  background-position: center center;
  background-repeat: no-repeat;
  cursor: pointer;
}

.cropme:hover{
  background-image: url("{{asset('crop/images/UploadDark.png')}}");
}
.jcrop-hline {
  background: #ffffff url("{{asset('crop/images/Jcrop.gif')}}");
  font-size: 0;
  position: absolute;
}
    </style>

    <!-- Js files-->

    <script type="text/javascript" src="{{asset('crop/scripts/jquery.Jcrop.js')}}"></script>
    <script type="text/javascript" src="{{asset('crop/scripts/jquery.SimpleCropper.js')}}"></script>


        @endsection

@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/plugins/flatpickr/flatpickr.js')}}"></script>

<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

<script>

    var ss = $(".select").select2({
    tags: false,
});

    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    var f1 = flatpickr(document.getElementById('basicFlatpickr'));
    $("#basicFlatpickr").flatpickr({
  "minDate": "1900-01-01",
  "maxDate": "today" ,
  "dateFormat": "d-M-Y",
  "defaultDate": "today"
});
</script>

@if( Auth::user()->date_of_birth == null  )
<script>
$("#basicFlatpickr").flatpickr({
    "minDate": "1900-01-01",
    "maxDate": "today" ,
    "dateFormat": "d-M-Y",
    "defaultDate": "01-Jan-1990",
  });
</script>
@else
<script>
$("#basicFlatpickr").flatpickr({
    "minDate": "1900-01-01",
    "maxDate": "today" ,
    "dateFormat": "d-M-Y",
    "defaultDate": "{!! Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d-M-Y')!!}"
  });
  </script>

@endif


@endsection
@section('content')
<style>
.col-md-3{
    float:left;
}
.col-md-4{
    float:left;
}
.form-group label, label {
    font-size: inherit;
    color: #acb0c3;
    letter-spacing: 0px;
}
.req-star{
    color:red;
    font-weight: bolder;
}
.custom-file-container__image-preview {
    box-sizing: border-box;
    transition: all 0.2s ease;
    margin-top: 10px;
    margin-bottom: 10px;
    height: 160px;
    width: 100%;
    border-radius: 4px;
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    background-color: #fff;
    overflow: auto;
    padding: 15px;
}

.error-border{
    border: 2px solid #DC3546 !important;
    border-style: dashed !important;
    box-shadow: 0.3px 0.3px 5px 0.3px #fa00006b !important!important;
}
div.inner-error-border > .select2 {
    border: 2px solid #DC3546 !important;
    border-style: dashed !important;
    box-shadow: 0.3px 0.3px 5px 0.3px #fa00006b !important;
}
span.inner-error-border > .select2 {
    border: 2px solid #DC3546 !important;
    border-style: dashed !important;
    box-shadow: 0.3px 0.3px 5px 0.3px #fa00006b !important;
}
.base{
    align-items: baseline;
}
.error_line{
    border: 2px solid #DC3546 !important;
    border-style: dashed !important;
    box-shadow: 0.3px 0.3px 5px 0.3px #fa00006b !important;
}

.layout-px-spacing > .row
{
    display:block;
}

    </style>


<?php $country_user = json_decode(Auth::user()->country );

?>

<div class="layout-px-spacing" >


    <div class="tab-content widget-content widget-content-area"  >


        <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">
                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Home
                </a></li>

                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
            Edit Profile </a></li>
            </ol>
        </nav>

        <!-----------------Form Start--------------->
        <div class="tab-pane active" id="settings">
            <form class="form-horizontal"
            action="{{route('update.profile')}}"
             method="post" id="update-user" enctype="multipart/form-data">
@csrf
 <h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>

                    Edit Profile
                     
                </h4>

   


                <hr style="    border: 0.5px solid;
                border-style: dashed;" />
                @if ($message = Session::get('msg'))
 <div class="row">
 <div class="col-md-12">
    <a title="View Profile" href="{{url('/')}}" class="  edit-profile">

        <div id="abc" class="alert alert-light-success mb-4" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x close" data-dismiss="alert">
                  <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6"
                  y1="6" x2="18" y2="18"></line></svg></button>
                  <strong>Successfully !</strong>
                   {{Auth::user()->name}} Your Profile Setting has been Updated Successfully.

                   <svg  style="    margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
                  Go To Dashboard

                </div>             </a>

</div>
</div>
@endif

     <div class="col-md-4">
                <div class="form-group">
                    <label class="req">Your Name: <span class="req-star">*</span></label>
                    <input style="text-transform:uppercase;" type="text" class="form-control
                    @if( Auth::user()->name == null || trim(Auth::user()->name) == "" ) error-border @endif"
                    id="name" name="name"
                     value="{{Auth::user()->name }}"
                      placeholder="Enter Full Name" required="" autocomplete="off" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="req">Father Name: <span class="req-star">*</span></label>
                    <input style="text-transform:uppercase;" type="text" class="form-control
                    @if( Auth::user()->fathername == null || trim(Auth::user()->fathername) == "" ) error-border @endif
                    "
                    id="fathername" name="fathername"
                     value="{{Auth::user()->fathername }}"
                      placeholder="Enter Father Name" required="" autocomplete="off" />
                </div>
            </div>
            <script>
                $("#name").keyup(function(){
          is_fill(this);
        allLetter(this);
        convertToUpper(this);
    });


    $("#fathername").keyup(function(){
        is_fill(this);

        allLetter(this);
        convertToUpper(this);

    });
    function is_fill(element)
    {
        if(element.value.trim() == "" ||  element.value.trim() == null)
        {
            element.value = element.value.trim();
            // window.alert(element.value );
            $('#'+element.getAttribute("id")).addClass('error-border');

            return false;
        }
        else
        {

            $('#'+element.getAttribute("id")).removeClass('error-border');
            return true;
        }

    }
    function allLetter(element)
      {
    //    var letters = /^[A-Za-z ]+$/;
       var notAllowed = /^[\"\!\`\@\#\$\%\^\&\*\(\)\+\=\-\[\]\\\\\\\'\;\,\.\/\{\}\|\\\"\:\<\>\?\~\_\"\;0-9]+$/;
       if(element.value.match(notAllowed))
         {
            element.value = element.value.slice(0, -1);
            return true;
         }
       else
         {
            $('#'+element.getAttribute("id")).removeClass('error-border');
            return true;

         }
           }
           function convertToUpper(element)
      {
        // var letters = /^[A-Za-z ]+$/;
        var notAllowed = /^[\"\!\`\@\#\$\%\^\&\*\(\)\+\=\-\[\]\\\\\\\'\;\,\.\/\{\}\|\\\"\:\<\>\?\~\_\"\;0-9]+$/;

        if(element.value.match(notAllowed))
         {
            element.value = '';
            return false;
          }
         else
         {
            // element.value = element.value.toUpperCase();
            return true;

         }


      }

                </script>

            <div class="col-md-4">


                <div class="form-group">
                    <label> Email:  </label>
                    <input disabled type="email" class="form-control
                    @if( Auth::user()->email == null || trim(Auth::user()->email) == "" ) error-border @endif

                    "
                    id="email" name="email"
                    value="{{Auth::user()->email }}" placeholder="Enter Email" autocomplete="off">
                </div>


            </div>

            <div  hidden   >
        <div style="clear:both;"></div>


            <div class="col-md-3">
                <div class="form-group  @if(
                    Auth::user()->district == null
                   || Auth::user()->id_dist == 0

                   )  inner-error-border @endif">
                    <label> District: <span class="req-star">*</span> </label>
                    <select class="form-control select

                    " id="id_dist" name="id_dist"
                     style="width:100%" autocomplete="off" required>
                     <option  value="0">Select District</option>
                     @foreach ($districts as  $district)
  <option
  @if( Auth::user()->district != null  )
     @if($district->id_dist==Auth::user()->district->id_dist) selected @endif
     @endif
    value="{{$district->id_dist }}">{{$district->dist_name}}</option>
                     @endforeach

                    </select>



                </div>
            </div>



            <div class="col-md-3" >
                <div class="form-group   @if( Auth::user()->tehsil == null  ) inner-error-border @endif" >
                    <label> Tehsil: <span class="req-star">*</span> </label>
                    <span id="id_mtsl_box" class="@if( Auth::user()->tehsil == null  ) inner-error-border @endif">
                        <select class="form-control  @if(Auth::user()->district != null) @if(Auth::user()->district->id_dist != 1) select @endif @endif
                    " id="id_mtsl" name="id_mtsl"
                 @if(Auth::user()->district != null)    @if(Auth::user()->district->id_dist == 1) disabled readonly @endif @endif
                     style="width:100%" autocomplete="off">

                     <option value="0" >Chose..</option>
                     @if( Auth::user()->district != null  )
                     @foreach ($tehsils as  $tehsil)
  <option @if($tehsil->id_tsl ==Auth::user()->id_mtsl) selected @endif
    value="{{$tehsil->id_tsl  }}">{{$tehsil->tsl_name}}</option>
                     @endforeach
                     @endif

                    </select>
                </span>
                </div>
            </div>
            <Script>
$(document).ready(function(){
                $("#id_dist").change(function(e){
                // alert("sdasd");
                e.preventDefault();
                var dist_id = $("#id_dist").val();
                 if(dist_id=="" || dist_id == null)
                 {
                    $(this).addClass('error-border');
                     $("#txt_District_req").show();
                     $("#id_mtsl_box").empty();
                 }
                 else
                 {
                    $(this).removeClass('error-border');
                    $.LoadingOverlay("show");
                let _token   = $('meta[name="csrf-token"]').attr('content');
                // alert(_token);
                $.ajax({
                   type:'POST',
                   url:"{{ route('get.tehsil.for.edit.profile.ajax') }}",
                   data:{dist_id:dist_id ,
                _token: _token},
                   success:function(data){
                 $('#id_mtsl_box').html(data.tehsil);

                    $('#id_uc_box').html(data.uc);


                 $.LoadingOverlay("hide");
                   }
                });
                 }

                });


                // for tehsil

                $("#id_mtsl").change(function(e){
                e.preventDefault();
                var tehsil_id = $("#id_mtsl").val();
                 if(tehsil_id=="" || tehsil_id == null)
                 {
                    $(this).addClass('error-border');
                 }
                 else
                 {
                    $(this).removeClass('error-border');
                    $.LoadingOverlay("show");
                let _token   = $('meta[name="csrf-token"]').attr('content');
                // alert(_token);
                $.ajax({
                   type:'POST',
                   url:"{{ route('get.uc.for.edit.profile.ajax') }}",
                   data:{tehsil_id:tehsil_id ,
                _token: _token},
                   success:function(data){

                    $('#id_uc_box').html(data.uc);

                 $.LoadingOverlay("hide");
                   }
                });
                 }

                });
            });
                                </script>

            <div class="col-md-3">
                <div class="form-group   @if(count($ucs) > 0)  @if( Auth::user()->load('uc')->uc == null    ) inner-error-border @endif  @endif ">
                    <label> Area / Town / UC :  <span class="req-star">*</span> <span class="badge badge-primary">New</span> </label>
                    <span id="id_uc_box" class="@if(count($ucs) > 0)  @if( Auth::user()->load('uc')->uc == null    ) inner-error-border @endif  @endif">
                    <select class="form-control     @if(count($ucs) > 0)  select @endif
                    " id="id_uc" name="id_uc"
                     style="width:100%; cursor:pointer;" autocomplete="off"
                     @if(count($ucs) < 1) disabled readonly @else required @endif
                     >

                     <option value="0" >Chose..</option>

                     @foreach ($ucs as  $uc)
  <option @if($uc->id ==Auth::user()->id_uc ) selected @endif value="{{$uc->id  }}">{{$uc->uc_name_eng}} - {{$uc->uc_name_ur}}</option>
                     @endforeach



                    </select>
                    </span>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>  Unit:  <span class="req-star">*</span> </label>
                    <select class="form-control   " id="Unit" name="Unit"
                     style="width:100%" autocomplete="off" readonly  disabled>

                     <option value="0" >Chose..</option>

                    </select>
                </div>
            </div>
        </div>





        <div style="clear:both;"></div>


        <div class="col-md-3" hidden>
            <div class="form-group">

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                       Address:</span>
                    </div>
                    <textarea  id="address" name="address" class="form-control" aria-label="With textarea">{{Auth::user()->address}}</textarea>
                  </div>

            </div>
        </div>

        <div class="col-md-3" hidden>
            <div class="form-group">
                <label> Forum: <span class="req-star">*</span> </label>

                <select class="form-control  select
                @if( Auth::user()->forum == null  ) error-border @endif

                " id="id_forum" name="id_forum"
                  autocomplete="off" required >

                     @foreach ($forums as  $forum)
                     <option @if($forum->id_frm==Auth::user()->forum->id_frm) selected @endif value="{{$forum->id_frm}}">{{$forum->frm_name}}</option>
                     @endforeach

                </select>


            </div>
        </div>


        <div class="col-md-3" hidden>


            <div class="form-group">
                <label> Rafaqat No: </label>
                <input type="text" class="form-control
                @if( Auth::user()->membership_id == null || trim(Auth::user()->membership_id) == "" ) error-border @endif

                " id="membership_id"
                name="membership_id" value="{{Auth::user()->membership_id }}"
                placeholder="Enter MemberShip_ID" autocomplete="off">
            </div>

        </div>
        <div class="col-md-3" hidden>
            <div class="form-group">
                <label> Gender: <span class="req-star">*</span>  </label>
                <select class="form-control
                @if( Auth::user()->gender == null || trim(Auth::user()->gender) == "" ) error-border @endif
                " id="gender" name="gender"
                 style="width:100%" autocomplete="off" required>
                 <option value=""  >Chose..</option>
                 <option @if("Male"==Auth::user()->gender) selected @endif value="Male"  >Male</option>
                 <option @if("Female"==Auth::user()->gender) selected @endif value="Female"  >Female</option>
                </select>
            </div>
        </div>
        <div style="clear:both;"></div>

        <div class="col-md-3" hidden>
            <div class="form-group  @if( Auth::user()->education_id == null  )  inner-error-border @endif">
                <label> Educational Institute:   </label>

                <select class="form-control  select   " id="education_id" name="education_id"
                 style="width:100%" autocomplete="off"  >
                        <option value="">Select Institute</option>

                        <option @if(1 ==Auth::user()->education_id )   selected @endif value="1"> Markaz - Central Secretariat of MQI </option>
                        <option @if(2 ==Auth::user()->education_id )   selected @endif value="2"> MES - Minhaj Education Society </option>
                        <option @if(3 ==Auth::user()->education_id )   selected @endif value="3"> MUL - Minhaj University Lahore </option>
                        <option @if(4 ==Auth::user()->education_id )   selected @endif value="4"> COSIS - College of Sharia & Islamic Sciences  </option>
                        <option @if(5 ==Auth::user()->education_id )   selected @endif value="5"> MCW - Minhaj College for Women </option>
                </select>

            </div>
        </div>

        <div class="col-md-3" hidden>
            <div class="form-group  @if( Auth::user()->profession == null  )  inner-error-border @endif">
                <label> Profession:   </label>

                <select class="form-control  select   " id="profession" name="profession"
                 style="width:100%" autocomplete="off" required>
                 <option value="0"  >Chose..</option>
                  @foreach ($professions as  $profession)
                     <option @if($profession->profession_id ==Auth::user()->id_Profession )
                        selected @endif value="{{$profession->profession_id }}">{!!$profession->profession_name!!}</option>
                     @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-3" hidden>
            <div class="form-group  @if( Auth::user()->internet_type == null  ) error-border @endif " style="padding:5px;">
                <label> I'am Using Internet as:    </label>

                <div class="n-chk" >
                    <label onclick="internetUsage('wifi')" class="new-control new-radio square-radio new-radio-text radio-success">
                      <input @if( Auth::user()->internet_type == "Wifi User"  ) checked @endif type="radio" value="Wifi User" class="new-control-input" name="internet">
                      <span class="new-control-indicator"></span><span class="new-radio-content">Wifi User</span>
                    </label>
                </div>
                <div class="n-chk"   >
                    <label onclick="internetUsage('data')" class="new-control new-radio square-radio new-radio-text radio-success">
                      <input type="radio" @if( Auth::user()->internet_type == "Mobile Data User"  ) checked @endif   value="Mobile Data User" class="new-control-input" name="internet">
                      <span class="new-control-indicator"></span><span class="new-radio-content">Mobile Data User</span>
                    </label>
                </div>

                {{-- innter selection --}}

                <div style="@if( Auth::user()->internet_type == "Wifi User"  ||  Auth::user()->internet_type == null  ) display:none; @endif margin-left: 30px;" id="option-data-user">
                    <div class="n-chk">
                        <label class="new-control new-radio square-radio new-radio-text radio-classic-success">
                          <input type="radio" @if(Auth::user()->internet_type == "Mobile Data User" && Auth::user()->internet_sub_type == "Internet Bundel"  ) checked @endif  value="Internet Bundel"  class="new-control-input required-dynamic" name="datauser"  >
                          <span class="new-control-indicator"></span><span class="new-radio-content">Internet Bundel</span>
                        </label>
                    </div>
                    <div class="n-chk">
                        <label class="new-control new-radio square-radio new-radio-text radio-classic-success">
                          <input type="radio" @if(Auth::user()->internet_type == "Mobile Data User" && Auth::user()->internet_sub_type == "WhatsApp Packege"  ) checked @endif   value="WhatsApp Packege"   class="new-control-input required-dynamic" name="datauser"  >
                          <span class="new-control-indicator"></span><span class="new-radio-content">WhatsApp Packege</span>
                        </label>
                    </div>
                    <div class="n-chk">
                        <label class="new-control new-radio square-radio new-radio-text radio-classic-success">
                          <input type="radio" @if(Auth::user()->internet_type == "Mobile Data User" && Auth::user()->internet_sub_type == "Youtube Packege"  ) checked @endif  value="Youtube Packege"  class="new-control-input required-dynamic" name="datauser"  >
                          <span class="new-control-indicator"></span><span class="new-radio-content">Youtube Packege</span>
                        </label>
                    </div>

                </div>



            </div>
        </div>
        <script>

          function internetUsage(element)
          {
              if(element == "data")
              {
                  $('#option-data-user').show(100);
                  $(".required-dynamic").prop('required',true);
              }
              if(element=="wifi")
              {
                $('#option-data-user').hide(100);
                $(".required-dynamic").prop('required',false);
              }

          }

            </script>
        <div class="col-md-3" hidden>
            <div class="form-group">
                <label> Date of Birth:   </label>

                <input id="basicFlatpickr" name="dateofbirth"

                class="form-control flatpickr
                @if( Auth::user()->date_of_birth == null  ) error-border @endif
                flatpickr-input active"
                 max="2021-01-01"
                 type="text" placeholder="Select Date..">
            </div>
        </div>



          <div style="clear:both;"></div>

<div class="row" hidden>
        <div class="col-md-6">


<label>Social Media Links: <span class="badge badge-primary" style="user-select: auto;">New</span></label>

            {{-- facebook link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>

                    </span>
                </div>
                <input type="text" name="facebook_link" value="{{Auth::user()->facebook_link}}" class="form-control" id="validationCustomUsername" placeholder="Facebook Link" aria-describedby="inputGroupPrepend">

            </div>
            {{-- Twitter link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </span>
                </div>
                <input type="text" name="twitter_link" value="{{Auth::user()->twitter_link}}" class="form-control" id="validationCustomUsername" placeholder="Twitter Link" aria-describedby="inputGroupPrepend">

            </div>
            {{-- Instagram link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </span>
                </div>
                <input type="text" name="instagram_link" value="{{Auth::user()->instagram_link}}" class="form-control" id="validationCustomUsername" placeholder="Instagram Link" aria-describedby="inputGroupPrepend">

            </div>
            {{-- YouTube link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                    </span>
                </div>
                <input type="text" name="youtube_link" value="{{Auth::user()->youtube_link}}" class="form-control" id="validationCustomUsername" placeholder="YouTube Link" aria-describedby="inputGroupPrepend">

            </div>
            {{-- Tiktok link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend" style="padding: 0px 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="32" height="32"
                        viewBox="0 0 32 32"
                        style=" fill:#888ea8;"><path d="M 9.6113281 5 C 7.0767063 5 5 7.0767063 5 9.6113281 L 5 22.388672 C 5 24.923294 7.0767063 27 9.6113281 27 L 22.388672 27 C 24.923294 27 27 24.923294 27 22.388672 L 27 9.6113281 C 27 7.0767063 24.923294 5 22.388672 5 L 9.6113281 5 z M 9.6113281 7 L 22.388672 7 C 23.84205 7 25 8.15795 25 9.6113281 L 25 22.388672 C 25 23.84205 23.84205 25 22.388672 25 L 9.6113281 25 C 8.15795 25 7 23.84205 7 22.388672 L 7 9.6113281 C 7 8.15795 8.15795 7 9.6113281 7 z M 17 9 L 17 19 C 17 20.116666 16.116666 21 15 21 C 13.883334 21 13 20.116666 13 19 C 13 17.883334 13.883334 17 15 17 L 15 15 C 12.802666 15 11 16.802666 11 19 C 11 21.197334 12.802666 23 15 23 C 17.197334 23 19 21.197334 19 19 L 19 12.888672 C 19.827834 13.529766 20.809277 13.98411 21.927734 14 L 21.957031 12 C 20.310764 11.976611 19 10.654231 19 9 L 17 9 z"></path></svg>

                    </span>
                </div>
                <input type="text" name="tiktok_link" value="{{Auth::user()->tiktok_link}}" class="form-control" id="validationCustomUsername" placeholder="Tiktok Link" aria-describedby="inputGroupPrepend">

            </div>
            {{-- Wikipedia link  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>

                    </span>
                </div>
                <input type="text" name="wikipedia_link" value="{{Auth::user()->wikipedia_link}}" class="form-control" id="validationCustomUsername" placeholder="Wikipedia Link" aria-describedby="inputGroupPrepend">

            </div>

        </div>
        <div class="col-md-6">

<label>My Skill Levels are: <span class="badge badge-primary" style="user-select: auto;">New</span></label>

{{-- skill start  --}}
<div class="input-group mb-3 mt-2 base">
    <div class="input-group-prepend @if(Auth::user()->graphi_skilll ==0) error_line @endif ">
      <span class="input-group-text" id="inputGroup-sizing-default">Graphic Designer: </span>
    </div>
&nbsp;
&nbsp;
&nbsp;
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="101" @if(Auth::user()->graphi_skilll ==101) checked @endif  name="graphi_skilll">
          <span class="new-control-indicator"></span> None
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="1" @if(Auth::user()->graphi_skilll ==1) checked @endif  name="graphi_skilll">
          <span class="new-control-indicator"></span>Basic
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="2" @if(Auth::user()->graphi_skilll ==2) checked @endif  name="graphi_skilll">
          <span class="new-control-indicator"></span>Medium
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="3" @if(Auth::user()->graphi_skilll ==3) checked @endif  name="graphi_skilll">
          <span class="new-control-indicator"></span>Expert
        </label>
    </div>


  </div>
{{-- skill end  --}}


{{-- skill start  --}}
<div class="input-group mb-3 base">
    <div class="input-group-prepend @if(Auth::user()->video_skilll ==0) error_line @endif">
      <span style="    padding-right: 51px;" class="input-group-text" id="inputGroup-sizing-default">Video Editor: </span>
    </div>
&nbsp;
&nbsp;
&nbsp;
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="101" @if(Auth::user()->video_skilll ==101) checked @endif  name="video_skilll">
          <span class="new-control-indicator"></span> None
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="1" @if(Auth::user()->video_skilll ==1) checked @endif  name="video_skilll">
          <span class="new-control-indicator"></span>Basic
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="2" @if(Auth::user()->video_skilll ==2) checked @endif  name="video_skilll">
          <span class="new-control-indicator"></span>Medium
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="3" @if(Auth::user()->video_skilll ==3) checked @endif  name="video_skilll">
          <span class="new-control-indicator"></span>Expert
        </label>
    </div>


  </div>
{{-- skill end  --}}


{{-- skill start  --}}
<div class="input-group mb-3 base">
    <div class="input-group-prepend @if(Auth::user()->vlog_skilll ==0) error_line @endif">
      <span style="    padding-right: 107px;" class="input-group-text" id="inputGroup-sizing-default">vLog: </span>
    </div>
&nbsp;
&nbsp;
&nbsp;
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="101"  @if(Auth::user()->vlog_skilll ==101) checked @endif name="vlog_skilll">
          <span class="new-control-indicator"></span> None
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="1"  @if(Auth::user()->vlog_skilll ==1) checked @endif name="vlog_skilll">
          <span class="new-control-indicator"></span>Basic
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="2"  @if(Auth::user()->vlog_skilll ==2) checked @endif name="vlog_skilll">
          <span class="new-control-indicator"></span>Medium
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="3"  @if(Auth::user()->vlog_skilll ==3) checked @endif name="vlog_skilll">
          <span class="new-control-indicator"></span>Expert
        </label>
    </div>


  </div>
{{-- skill end  --}}


{{-- skill start  --}}
<div class="input-group mb-3 base">
    <div class="input-group-prepend @if(Auth::user()->urdu_skilll ==0) error_line @endif">
      <span style="padding-right: 57px;" class="input-group-text" id="inputGroup-sizing-default">Urdu Writer: </span>
    </div>
&nbsp;
&nbsp;
&nbsp;
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="101"  @if(Auth::user()->urdu_skilll ==101) checked @endif  name="urdu_skilll">
          <span class="new-control-indicator"></span> None
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="1"  @if(Auth::user()->urdu_skilll ==1) checked @endif  name="urdu_skilll">
          <span class="new-control-indicator"></span>Basic
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="2"  @if(Auth::user()->urdu_skilll ==2) checked @endif  name="urdu_skilll">
          <span class="new-control-indicator"></span>Medium
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="3"  @if(Auth::user()->urdu_skilll ==3) checked @endif  name="urdu_skilll">
          <span class="new-control-indicator"></span>Expert
        </label>
    </div>


  </div>
{{-- skill end  --}}


{{-- skill start  --}}
<div class="input-group mb-3 base">
    <div class="input-group-prepend @if(Auth::user()->english_skilll ==0) error_line @endif">
      <span style="padding-right: 37px;" class="input-group-text" id="inputGroup-sizing-default">English Writer: </span>
    </div>
&nbsp;
&nbsp;
&nbsp;
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="101"    @if(Auth::user()->english_skilll == 101) checked @endif  name="english_skilll">
          <span class="new-control-indicator"></span> None
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="1"    @if(Auth::user()->english_skilll ==1) checked @endif  name="english_skilll">
          <span class="new-control-indicator"></span>Basic
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="2"    @if(Auth::user()->english_skilll ==2) checked @endif  name="english_skilll">
          <span class="new-control-indicator"></span>Medium
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio radio-primary">
          <input type="radio" class="new-control-input" value="3"    @if(Auth::user()->english_skilll ==3) checked @endif  name="english_skilll">
          <span class="new-control-indicator"></span>Expert
        </label>
    </div>


  </div>
{{-- skill end  --}}





        </div>
</div>


<br>
{{--  <hr style="    border: 0.5px solid;
        border-style: dashed;" /> --}}


        <div style="clear:both;"></div>
        <div class="row" style="display: flex;">
            <div class="col-md-5" style="display: inline-block;">
                <label> Current Picture:  </label>
                <div class="form-group" style="text-align: center; border:1px dashed black;  ">
                     <br>
            <br>
                <img style="width:auto;height:160px; " src="{{asset(Auth::user()->photo)}}" alt="picture">
            <br>
            <br>
            </div>
            </div>
            <div class="col-md-5" style="display: inline-block;">





                    <div class="custom-file-container   @if( Auth::user()->photo == "dawa_theme/assets/img/user.png"  ) error-border @endif  " data-upload-id="myFirstImage" style="padding:5px;">
                        <label>Upload (New Picture) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>


                         <input name="base_path_img" style="display: none;" value="" id="base_path_img" />
                        <div class="simple-cropper-images">



                            <div class="cropme" style="width: 200px; height: 200px;    background-size: contain;"></div>


                            <script>
                              // Init Simple Cropper
                              $(document).ready(function(){

                              $('.cropme').simpleCropper();
                              });
                            </script>

                          </div>

                        {{-- <label class="custom-file-container__custom-file" >
                            <input type="file" name="picture"
                             class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div> --}}
                    </div>
                </div>

    </div>



            <div class="form-actions" align="center" style="margin-top:50px;">
                <a href="{{URL('/')}}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success"
                id="submit_changes" name="submit_changes">
                <i class="fa fa-check"></i> Update Profile </button>
            </div>



            </form>
        </div>
        <!-----------------Form Start--------------->
        </div>


    </div>
 

@endsection
