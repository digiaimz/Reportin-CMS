@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('manage_tanzim_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_tanzim_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Assign Designation
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen" hidden> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')


     <!-- BEGIN PAGE LEVEL PLUGINS -->
     <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
     <!-- END PAGE LEVEL PLUGINS -->

     <!--  BEGIN CUSTOM STYLE FILE  -->
     <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
     <!--  END CUSTOM STYLE FILE  -->
     <script src="{{asset('dawa_theme/assets/js/libs/jquery-3.1.1.min.js')}}" ></script>
     <script src="{{asset('dawa_theme/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
     <script src="{{asset('dawa_theme/plugins/input-mask/input-mask.js')}}"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

     <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >
     <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/sweetalerts/sweetalert2.min.css')}}" >
     <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/sweetalerts/sweetalert.css')}}" >

{{-- slect boc plugin  --}}
{{-- slect boc plugin  --}}

<script>
var  user_id = "";
    var  user_access = "";
    var  user_designation_id = "";
</script>

<style>
    #content > .layout-px-spacing > .layout-top-spacing{
        display: block;
    }
    #cancel-row{
        display: block;
    }
    .step_error{
        background-color: #ff000014;
    }
    .steps_div{
        border: 1px solid black;
    }



    .row.heading h2 {
    color: #fff;
    font-size: 52.52px;
    line-height: 95px;
    font-weight: 400;
    text-align: center;
    margin: 0 0 40px;
    padding-bottom: 20px;
    text-transform: uppercase;
}
ul{
  margin:0;
  padding:0;
  list-style:none;
}
.heading.heading-icon {
    display: block;
}
.padding-lg {
	display: block;
	padding-top: 60px;
	padding-bottom: 60px;
}
.practice-area.padding-lg {
    padding-bottom: 55px;
    padding-top: 55px;
}
.practice-area .inner{
     border:1px solid #999999;
	 text-align:center;
	 margin-bottom:28px;
	 padding:40px 25px;
}
.our-webcoderskull .cnt-block:hover {
    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
    border: 0;
}
.practice-area .inner h3{
    color:#3c3c3c;
	font-size:24px;
	font-weight:500;
	font-family: 'Poppins', sans-serif;
	padding: 10px 0;
}
.practice-area .inner p{
    font-size:14px;
	line-height:22px;
	font-weight:400;
}
.practice-area .inner img{
	display:inline-block;
}



.our-webcoderskull .cnt-block{
    cursor: pointer;
   float:left;
   width:100%;
   background: #0608180a;
   padding:30px 20px;
   text-align:center;
   border:2px solid #d5d5d5;
   margin: 0 0 28px;
}
.our-webcoderskull .cnt-block figure{
   width:148px;
   height:148px;
   border-radius:100%;
   display:inline-block;
   margin-bottom: 15px;
}
.our-webcoderskull .cnt-block img{
   width:148px;
   height:148px;
   border-radius:100%;
}
.our-webcoderskull .cnt-block h3{
   color:#2a2a2a;
   font-size:20px;
   font-weight:500;
   padding:6px 0;
   text-transform:uppercase;
}
.our-webcoderskull .cnt-block h3 a{
  text-decoration:none;
	color:#2a2a2a;
}
.our-webcoderskull .cnt-block h3 a:hover{
	color:#337ab7;
}
.our-webcoderskull .cnt-block p{
   color:#2a2a2a;
   font-size:13px;
   line-height:20px;
   font-weight:400;
}
.our-webcoderskull .cnt-block .follow-us{
	margin:20px 0 0;
}
.our-webcoderskull .cnt-block .follow-us li{
    display:inline-block;
	width:auto;
	margin:0 5px;
}
.our-webcoderskull .cnt-block .follow-us li .fa{
   font-size:24px;
   color:#767676;
}
.our-webcoderskull .cnt-block .follow-us li .fa:hover{
   color:#025a8e;
}
.details{
    display: flex;
    justify-content: space-between;
}
.details_temp{
    display: flex;
    justify-content: space-between;
}
.leader{
    background: #00733d33 !important;
}
.delete{
    top: 5px;
    user-select: auto;
    position: absolute;
    right: 21px;
    cursor: help;
}
    </style>


{{-- slect boc plugin  --}}
{{-- slect boc plugin  --}}


<style>


    select.selectpicker { display:none; /* Prevent FOUC */}
    .media-object{
        max-width:100px;
        max-height:100px;
    }

    </style>



@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>


<script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>



<script src="{{asset('dawa_theme/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <style>

        .icons{
         float: right;
        }
        .card{
         cursor: pointer;
        }
        </style>

@endsection
{{-- content --}}
@section('content')


<style>
h4{
    font-size: 16px;
    font-weight: 700;
}
    </style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">


<style>
.req:after {
    content: "*";
    font-size: 14px;
    color: #cc0000;
    padding-left: 4px;
}
.user-info-right{
    display: inline-block;
    vertical-align: bottom;
}
.user-img{
    max-width: 71px;
}
#example * {
    cursor: pointer;
}
    </style>


          {{-- admin details --}}
          {{-- admin details --}}





          {{-- admin details --}}
          {{-- admin details --}}









        <div class="   layout-spacing">
            <div class="widget-content widget-content-area br-6">
                {{-- <h4>    Assign Designation <a class="btn btn-primary  " href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Tanzim</a>
</h4> --}}
<div class="row">

    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;" >
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            @lang('Home')
                        </a></li>
                        <li class="breadcrumb-item "><a href="#">

                            @lang('Manage Tanzim')
                        </a></li>

                        <li hidden class="breadcrumb-item  " aria-current="page"><a href="javascript:void(0);"  >
                            @lang('Assign Designation') </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                            @lang('Below Level Designations') </a></li>
                    </ol>
                </nav>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;  ">

     @if( Auth::user()->access_type  != "Tehsil")
        @can('create-Tanzim')
        &nbsp; &nbsp; &nbsp;  <a  class="btn btn-primary  " href="{{route('make.my.team')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
             My Level  </a>
        &nbsp; &nbsp; &nbsp;  <a  class="btn btn-primary  " href="{{route('create.below.level.tanzim')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
               Below Level  </a>

        </div>
        @endcan
        @endif

</div>


                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    @if(count($errors) > 0)
<div class="p-1">
    @foreach($errors->all() as $error)
    <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button" class="close"
            data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>
    @endforeach
</div>
@endif
  @if (Session::has('msg'))
<div class="alert alert-warning">
    {{ Session::get('msg') }}</div>
@endif


<?php

$designations = \App\Designation::with('forum', 'worker' , 'permissions')->where('level', $access_level     )
                                ->whereIN('forum_id' , explode(',' , $forum_ids))->orderby('order_by' , 'DESC') ->orderBy('forum_id', 'DESC')->get();
                                $total_seats =  count($designations);

$filled_seat = 0;

?>


                </div>
                <div class="row layout-top-spacing"   style="display: block;  ">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">


                        <div class="form-body" style="text-align: center;">
                            <h3 class="box-title m-t-40" style="text-align:center;"><b>Below Level Tanzimi Body</b></h3>

                            <h5>
                                <h4 style="display: inline-block;" id="filled_seat">--</h4> out of
                                <h4 style="display: inline-block;" id="total_seat">--</h4> cards of your tanzimi body are full and rest of
                                <h4 style="display: inline-block;" id="rem_seat">--</h4> are vacant.<span id="seat_msg"> Please get it filled.</span></h5>


                        </div>


                        <section class="our-webcoderskull padding-lg">
                            <div class="container">

                              <ul class="row">

                                @foreach ($designations as $designation )

<?php

$permissions_  = $designation->permissions->pluck('id')->toArray();
$flag = in_array(6 , $permissions_ ) ;
 ?>


                                    @if(  $access_level == "Admin"  ||  $access_level == "Markazi")

                                    {{-- if markazi or admin side --}}
                                    {{-- if markazi or admin side --}}
                                    <li
                                     data-access="null"
                                     data-designation="{{$designation->name}}" data-designation-id="{{$designation->id}}"

                                    class="col-12 col-md-6 col-lg-3 @if($designation->worker == null) unknown_user @endif" >
                                    @if($designation->worker != null)
                                    <?php
                                    $filled_seat++;
                                    ?>
                                    @if($designation->worker->id != Auth::id())
                                    <svg class="delete" data-id="{{$designation->worker->id}}"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                    @endif
                                    @endif
                                    <div class="cnt-block equal-hight @if($flag )    leader  @endif" style="    height: max-content;">
                                        <figure><img
                                            @if($designation->worker != null)
                                            src="{{asset($designation->worker->photo )}}"
                                            @else
                                            src="{{asset('team/unknown_user.png')}}"
                                            @endif


                                            class="img-responsive" alt=""></figure>
                                        <h3>
                                            @if($designation->worker != null)
                                            <a href="#">{{$designation->worker->name}}</a><br>
                                            <small> {{$designation->worker->whatsapp}} </small>
                                            @else
                                            <a href="#">---------</a><br>
                                            <svg title="Assign To Worker" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            @endif

                                        </h3>
                                        <div class="details">  <b>Designation:</b> <span>{{ $designation->name }}</span> </div>
                                        <div class="details">   <b>Level:</b> <span>{{ $designation->level }}</span> </div>
                                        <div class="details">    <b>Forum:</b> <span>{{ $designation->forum->frm_code }}</span> </div>

                                        @if($designation->worker != null)
                                        @if($designation->worker->id != Auth::id())  <div class="details_temp">    <b>Status:</b> <span>
                                            @if($designation->worker != null)
                                            @if($designation->worker->is_designation_active == 1)
                                            <span class="shadow-none badge badge-success">Active</span>
                                            @else
                                            <span class="shadow-none badge badge-danger">In-active</span>
                                            @endif
                                            @can('edit-Tanzim')
                                            <img class="bs-tooltip" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Change Status"
                                            onclick="changeStatus({{$designation->worker->id}})"
                                            style="cursor: pointer; width: 18px;
                                            height: 18px;"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==" />
                                          @endcan
                                          @endif
                                        </span> </div>
                                        @endif   @endif

                                    </div>
                                    </li>
                                    {{-- if markazi or admin side --}}

                                     @elseif ( $access_level == "Zone"   )

                                     {{-- if  zone  side --}}

                                     <?php

                                $zones = explode(",", $access_ids);
                                       ?>
                                     @foreach ($zones as  $zone_id)
                                     <?php
                                     $zone = \App\Zone::find($zone_id);
                                      $worker_get = \App\PlaceOfDesignation::with('worker')->where('place_id' , $zone_id )->where('designation_id', $designation->id)
                                      ->first();

                                     ?>

                                     <li
                                     data-access="{{$zone_id}}"
                                     data-designation="{{$designation->name}}" data-designation-id="{{$designation->id}}"

                                    class="col-12 col-md-6 col-lg-3 @if($worker_get == null) unknown_user @endif" >
                                    @if($worker_get != null)
                                    <?php
                                    $filled_seat++;
                                    ?>
                                    @if($worker_get->worker->id != Auth::id())
                                    <svg class="delete" data-id="{{$worker_get->worker->id}}"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                    @endif
                                    @endif
                                         <div class="cnt-block equal-hight @if($flag )    leader  @endif" style="    height: max-content;">
                                        <figure><img
                                            @if($worker_get != null)
                                            src="{{asset($worker_get->worker->photo )}}"
                                            @else
                                            src="{{asset('team/unknown_user.png')}}"
                                            @endif


                                            class="img-responsive" alt=""></figure>
                                        <h3>
                                            @if($worker_get!= null)
                                            <a href="#">{{$worker_get->worker->name}}</a><br>
                                            <small> {{$worker_get->worker->whatsapp}} </small>
                                            @else
                                            <a href="#">---------</a><br>
                                            <svg title="Assign To Worker" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            @endif

                                        </h3>
                                        <div class="details">  <b>Designation:</b> <span>{{ $designation->name }}</span> </div>
                                        <div class="details">   <b>Level:</b> <span>{{ $designation->level }}</span> </div>
                                        <div class="details">    <b>Forum:</b> <span>{{ $designation->forum->frm_code }}</span> </div>
                                        <div class="details">    <b>Zone:</b> <span>{{ $zone->zone_name }}</span> </div>
                                        @if($worker_get != null)
                                    @if($worker_get->worker->id != Auth::id())
                                      <div class="details_temp">    <b>Status:</b> <span>
                                            @if($worker_get != null)
                                            @if($worker_get->worker->is_designation_active == 1)
                                            <span class="shadow-none badge badge-success">Active</span>
                                            @else
                                            <span class="shadow-none badge badge-danger">In-active</span>
                                            @endif
                                            @can('edit-Tanzim')
                                            <img class="bs-tooltip" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Change Status"
                                            onclick="changeStatus({{$worker_get->worker->id}})"
                                            style="cursor: pointer; width: 18px;
                                            height: 18px;"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==" />
                                          @endcan
                                          @endif
                                        </span> </div>
                                        @endif   @endif
                                    </div>
                                </li>
                                @endforeach





                                     {{-- if  zone   --}}
                                     @elseif (   $access_level == "District" )

                                     {{-- if  district   side --}}
                                     <?php

                                     $districts = explode(",",$access_ids);
                                            ?>
                                          @foreach ($districts as  $district_id)
                                          <?php
                                          $district = \App\District::find($district_id);
                                           $worker_get = \App\PlaceOfDesignation::with('worker')->where('place_id' , $district_id )->where('designation_id', $designation->id)
                                           ->first();

                                          ?>

<li
data-access="{{$district_id}}"
data-designation="{{$designation->name}}" data-designation-id="{{$designation->id}}"

class="col-12 col-md-6 col-lg-3 @if($worker_get == null) unknown_user @endif" >
@if($worker_get != null)
<?php
$filled_seat++;
?>
@if($worker_get->worker->id != Auth::id())
<svg class="delete" data-id="{{$worker_get->worker->id}}"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
@endif
@endif
                                              <div class="cnt-block equal-hight @if($flag )    leader  @endif" style="    height: max-content;">
                                             <figure><img
                                                 @if($worker_get != null)
                                                 src="{{asset($worker_get->worker->photo )}}"
                                                 @else
                                                 src="{{asset('team/unknown_user.png')}}"
                                                 @endif


                                                 class="img-responsive" alt=""></figure>
                                             <h3>
                                                 @if($worker_get!= null)
                                                 <a href="#">{{$worker_get->worker->name}}</a><br>
                                                 <small> {{$worker_get->worker->whatsapp}} </small>
                                                 @else
                                                 <a href="#">---------</a><br>
                                                 <svg title="Assign To Worker" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                 @endif

                                             </h3>
                                             <div class="details">  <b>Designation:</b> <span>{{ $designation->name }}</span> </div>
                                             <div class="details">   <b>Level:</b> <span>{{ $designation->level }}</span> </div>
                                             <div class="details">    <b>Forum:</b> <span>{{ $designation->forum->frm_code }}</span> </div>
                                             <div class="details">    <b>District:</b> <span>{{ $district->dist_name }}</span> </div>
                                             @if($worker_get != null)
                                             @if($worker_get->worker->id != Auth::id())
                                               <div class="details_temp">    <b>Status:</b> <span>
                                                @if($worker_get != null)
                                                @if($worker_get->worker->is_designation_active == 1)
                                                <span class="shadow-none badge badge-success">Active</span>
                                                @else
                                                <span class="shadow-none badge badge-danger">In-active</span>
                                                @endif
                                                @can('edit-Tanzim')
                                                <img class="bs-tooltip" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Change Status"
                                                onclick="changeStatus({{$worker_get->worker->id}})"
                                                style="cursor: pointer; width: 18px;
                                                height: 18px;"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==" />
                                              @endcan
                                              @endif
                                            </span> </div>
                                            @endif
                                            @endif
                                         </div>
                                     </li>
                                     @endforeach






                                     {{-- if   district   side --}}
                                     @elseif (  $access_level  == "Tehsil"
                                     )

                                     {{-- if    tehsil side --}}
                                     <?php

                                     $tehsils = explode(",",$access_ids);
                                            ?>
                                          @foreach ($tehsils as  $tehsil_id)
                                          <?php
                                          $tehsil = \App\Tehsil::find($tehsil_id);
                                           $worker_get = \App\PlaceOfDesignation::with('worker')->where('place_id' , $tehsil_id )->where('designation_id', $designation->id)
                                           ->first();

                                          ?>

<li
data-access="{{$tehsil_id}}"
data-designation="{{$designation->name}}" data-designation-id="{{$designation->id}}"

class="col-12 col-md-6 col-lg-3 @if($worker_get == null) unknown_user @endif" >
@if($worker_get != null)
<?php
$filled_seat++;
?>
@if($worker_get->worker->id != Auth::id())
<svg class="delete" data-id="{{$worker_get->worker->id}}"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
@endif
@endif
                                              <div class="cnt-block equal-hight @if($flag )    leader  @endif" style="    height: max-content;">
                                             <figure><img
                                                 @if($worker_get != null)
                                                 src="{{asset($worker_get->worker->photo )}}"
                                                 @else
                                                 src="{{asset('team/unknown_user.png')}}"
                                                 @endif


                                                 class="img-responsive" alt=""></figure>
                                             <h3>
                                                 @if($worker_get!= null)
                                                 <a href="#">{{$worker_get->worker->name}}</a><br>
                                                 <small> {{$worker_get->worker->whatsapp}} </small>
                                                 @else
                                                 <a href="#">---------</a><br>
                                                 <svg title="Assign To Worker" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                 @endif

                                             </h3>
                                             <div class="details">  <b>Designation:</b> <span>{{ $designation->name }}</span> </div>
                                             <div class="details">   <b>Level:</b> <span>{{ $designation->level }}</span> </div>
                                             <div class="details">    <b>Forum:</b> <span>{{ $designation->forum->frm_code }}</span> </div>
                                             <div class="details">    <b>Tehsil:</b> <span>{{ $tehsil->tsl_name }}</span> </div>
                                             @if($worker_get != null)
                                             @if($worker_get->worker->id != Auth::id())

                                             <div class="details_temp">    <b>Status:</b> <span>
                                                @if($worker_get != null)
                                                @if($worker_get->worker->is_designation_active == 1)
                                                <span class="shadow-none badge badge-success">Active</span>
                                                @else
                                                <span class="shadow-none badge badge-danger">In-active</span>
                                                @endif
                                                @can('edit-Tanzim')
                                                <img class="bs-tooltip" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Change Status"
                                                onclick="changeStatus({{$worker_get->worker->id}})"
                                                style="cursor: pointer; width: 18px;
                                                height: 18px;"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==" />
                                              @endcan
                                              @endif
                                            </span> </div>
                                            @endif
                                            @endif
                                         </div>
                                     </li>
                                     @endforeach






                                     {{-- if   tehsil side --}}

                                    @endif


                                @endforeach


                              </ul>
                            </div>
                          </section>

{{-- <h1>{{$filled_seat}}</h1> --}}
<script>

    var total_seats = Number('{{$total_seats}}');
    var filled = Number('{{$filled_seat}}');
    var rem = total_seats -  filled;
 $('#filled_seat').html(filled);
 $('#total_seat').html(total_seats);
 $('#rem_seat').html(rem);
 if(rem == 0)
 {
   $('#seat_msg').hide();
 }


</script>



                    </div>

                </div>



                <style>
                    .layout-spacing{
                        padding-bottom: 0px;
                    }
                    .container{
                        padding-left: 0px;
                        padding-right: 0px;
                    }
                    </style>






                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Assign Designation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg style="    color: black;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">

                    <div id="model_details">
                                    <div class="details">  <b>Designation:</b> <span>-----</span> </div>
                                    <div class="details">   <b>Level:</b> <span>-----</span> </div>
                                    <div class="details">    <b>Forum:</b> <span>-----</span> </div>
                                    <div class="details">    <b>Tehsil:</b> <span>-----</span> </div>
                    </div>

                    <hr>

                    <div style="    padding-left: 21px;">
                                    <input value="{{old('whatsapp')}}"  id="whatsapp" name="whatsapp"
                                                         type="tel" class="form-control     "
                                                         placeholder=""  required  autocomplete="off"  />
                                                         <button id="get_worker_button" class="btn btn-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                                                           <span id="button_for_worker_filter" > Get Worker </span></button>
                    </div>

                    <br>
                    <table class="table table-bordered table-striped  ">
                    <tr>
                        <th class=" text-center">Worker</th>
                        <th class=" text-center">Action</th>
                    </tr>
                    <tbody>
                        <tr id="search_msg">

                            <td   colspan="2" class=" text-center"  >
                                Please Search Worker
                            </td>
                        </tr>
                        <tr id="no_record_msg" style="display: none;">

                            <td  colspan="2" class=" text-center" style="color:red;">
                                 No Record Found
                            </td>
                        </tr>
                        <tr id="worker_record"  style="display: none;">
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar"  id="get_img" class="img-fluid rounded-circle" src="http://127.0.0.1:8000/dawa_theme/assets/img/20220216121638MUHAMMADZUBAIR.png">
                                    </div>
                                    <div>
                                    <div id="get_name" class="align-self-center mb-0">Muhammad Zubair</div>
                                    <div id="get_whatsapp" class="align-self-center mb-0">Muhammad Zubair</div>
                                    </div>
                                </div>
                            </td>

                            <td class=" text-center"><button id="declared_user" class="btn btn-primary">Declared as <br><span id="clicked_designation">Nazim-e-Ala</span></button> </td>
                        </tr>
                    </tbody>

                    </table>




                                </div>

                            </div>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function(){

                            // on clik user unknown
                            // on clik user unknown

                       $("#get_worker_button").click(function(){

                        if($('#whatsapp').val().length < 1)
                        {
                            return true;
                        }

                        $('.bg-overlay').show();
                        $('.se-pre-con').show();
                        $('#button_for_worker_filter').html('Wait...');
                    // ajax step
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                    type:'GET',
                    url: "{{ route('below.level.tanzim.get.worker') }}/"+$('#whatsapp').val() ,
                    success:function(data){

                        if(data.status == "200")
                        {
                        //     $('#user_id').val(user_id);
                        // $('#user_access').val(user_access);
                        // $('#user_designation_id').val(user_designation_id);

                            $('#get_name').html(data.name);
                            $('#get_whatsapp').html(data.whatsapp);
                            $('#get_img').attr('src' ,data.photo ) ;
                            user_id = data.id;

                            $('#search_msg').hide();
                        $('#no_record_msg').hide();
                        $('#worker_record').show();

                        }
                        else if(data.status == "404")
                        {

                            $('#search_msg').hide();
                            $('#worker_record').hide();
                            $('#no_record_msg').show();
                        }
                        else
                        {
                            $('#worker_record').hide();
                            $('#no_record_msg').hide();
                            $('#search_msg').show();
                        }
                        $('.bg-overlay').hide();
                        $('.se-pre-con').hide();
                        $('#button_for_worker_filter').html('Get Worker');

                        //   console.log(data);

                    },
                                   error: function (jqXHR, exception) {
                            var msg = AjaxError(jqXHR, exception);

                                if(msg!= true)
                                {
                                        alert(msg);
                                }
                        $('.bg-overlay').hide();
                        $('.se-pre-con').hide();
                        $('#button_for_worker_filter').html('Get Worker');

                        },


                    });

                    // ajax step




                            //  alert($('#whatsapp').val().length);
                       });



                       $(".unknown_user").click(function(){

                        $('#whatsapp').val('')
                        $('#search_msg').show();
                        $('#no_record_msg').hide();
                        $('#worker_record').hide();

                        var designation_details ="";

                        $(this).find( ".details" ).each(function( index ) {
                            designation_details = designation_details + '<div class="details">' + $( this ).html()  + '</div>' ;
                            // console.log( index + ": " + $( this ).html() );
                    });

                    // $(this).attr('data-designation-id');

                        $('#model_details') .html(designation_details);
                        $('#clicked_designation').html($(this).attr('data-designation'));
                        user_access = $(this).attr('data-access');
                        user_designation_id = $(this).attr('data-designation-id');



                        $('#open_model').click();

                      });


                            // on clik user unknown
                            // on clik user unknown



                         $('#whatsapp').inputmask('(999)-999-9999');

                        });



                        var iti = null;
                     var input_whatsapp = document.querySelector("#whatsapp");



                        $(document).ready(function(){



                    iti = window.intlTelInput(input_whatsapp, {
                     allowDropdown: false,

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


                    $(document).ready(function(){

                    // on clik user unknown
                    // on clik user unknown

                    $("#declared_user").click(function(){

                        $('#user_id').val(user_id);
                        $('#user_access').val(user_access);
                        $('#user_designation_id').val(user_designation_id);


                        $('#form_submit_user').submit();
                    });

                    $('#form_submit_user').submit(function(e){

                        $("#declared_user").html('Wait...');
                        $('.bg-overlay').show();
                        $('.se-pre-con').show();
                    });

                    });


                    </script>



                    <button hidden  data-toggle="modal" data-target="#exampleModal" id="open_model"></button>

                    <form id="form_submit_user" action="{{route('below.level.tanzim.assign.designation')}}" method="POST" hidden>
                       @csrf
                    <input name="user_id" id="user_id"  type="text" required/>
                    <input name="user_access" id="user_access" type="text"  required/>
                    <input name="user_designation_id" id="user_designation_id" type="text"  required/>

                    </form>

                    <script>

// on clik user unknown
// on clik user unknown

$(".delete").click(function(){
    var user_id = $(this).attr('data-id');
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      padding: '2em'
    }).then(function(result) {
      if (result.value) {

  window.location = "{{route('below.level.tanzim.delete.user')}}/"+user_id;
$('.bg-overlay').show();
$('.se-pre-con').show();

      }
    });


});




                        function changeStatus(userid){

                          window.location = "{{route('change.status.of.designation')}}/"+userid;
                      $('.bg-overlay').show();
                      $('.se-pre-con').show();


                        }
                        </script>


                    @endsection
