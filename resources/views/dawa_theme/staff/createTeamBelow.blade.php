@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('manage_tanzim_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_tanzim_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Create Below Level Tanzim
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
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
     <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}" >


{{-- slect boc plugin  --}}
{{-- slect boc plugin  --}}



<script src="{{asset('dawa_theme/selectbox/vendor/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('dawa_theme/selectbox/vendor/jquery-ui.min.js')}}"></script>

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

<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script>
var data_table_users = null;
</script>
@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')


<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}" ></script>
<script src="{{asset('dawa_theme/plugins/select2/custom-select2.js')}}" ></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" ></script>

<script>
    var ss = $(".basic").select2({
        tags: true,
    });
        </script>


    <style>

        .icons{
         float: right;
        }
        .card{
         cursor: pointer;
        }
        </style>
<style>
    div.tree-multiselect>div.selected, div.tree-multiselect>div.selections { width:50% !important;}
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

                        <li hidden class="breadcrumb-item  " aria-current="page">
                            <a href="{{route('make.my.team')}}" >
                            @lang('Assign Designation') </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                            @lang('Below Level') </a></li>
                    </ol>
                </nav>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;  ">

        @can('view-Tanzim')
        &nbsp; &nbsp; &nbsp;  <a class="btn btn-primary  " href="{{route('make.my.team')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
              My Level</a>

        </div>
        @endcan

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

                    <h4>Create Below Level Tanzim:</h4>
                </div>
                <div class="row layout-top-spacing"   style="display: block;">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">


                    <form method="get" action="#" >
                        <div class="form-body">
                            <h5 class="box-title m-t-40" style="text-align:center;"><b>
                                Please Follow Step:1 and Step:2</b></h5>

                        <hr>






 <div class="row">
    <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step3">
    <label><h5><b>Step 1: <small><b>Select Access Level</b></small></b></h5> </label>

    <select onchange="showLevelSelection()"  id="worker_level"class="  form-control" style="cursor: pointer;">
            <option value="" >Choose...</option>

@if( Auth::user()->access_type  == "Admin")
@foreach (config('access.level.Admin') as $level )
<option value="{{$level}}">{{$level}} Level </option>
@endforeach
@elseif ( Auth::user()->access_type  == "Markazi")
@foreach (config('access.level.Markazi') as $level )
<option value="{{$level}}">{{$level}} Level </option>
@endforeach
@elseif ( Auth::user()->access_type  == "Zone")
   @foreach (config('access.level.Zone') as $level )
           <option value="{{$level}}">{{$level}} Level </option>
        @endforeach
@elseif ( Auth::user()->access_type  == "District")
@foreach (config('access.level.District') as $level )
<option value="{{$level}}">{{$level}} Level </option>
@endforeach
@elseif ( Auth::user()->access_type  == "Tehsil")
@foreach (config('access.level.Tehsil') as $level )
<option value="{{$level}}">{{$level}} Level </option>
@endforeach
@endif

       </select>
       <span style="color:red;"></span>

       <script>

       function showLevelSelection()
       {
           var element = $('#worker_level');
           element.removeClass('is-invalid');
           element.next().html('');
             $('.card-selection').hide();
             var selection = element.val();
             if(selection == "" || selection ==  null)
             {
                element.next().html(' Please Select Access Level.');
                element.addClass('is-invalid');
             }
             else if(selection == "Zone" )
             {
                $('.zone-selection').show(300);
             }
             else if(selection == "District" )
             {
                $('.district-selection').show(300);
             }
             else if(selection == "Tehsil" )
             {
                $('.tehsil-selection').show(300);
             }

       }

       </script>
@if ( Auth::user()->access_type  == "Markazi" || Auth::user()->access_type  == "Admin")
<?php
$zones = \App\Zone::with('districts')->get();
 ?>
@elseif( Auth::user()->access_type  == "Zone" || Auth::user()->access_type  == "District" )
<?php
$zones = \App\Zone::with('districts')->whereIN('id_zone' , \App\Helpers\Helper::getLevelIds("Zone"))->get();
 ?>
@endif

@if ( Auth::user()->access_type  == "Markazi" || Auth::user()->access_type  == "Admin")

                                {{-- select zone --}}
                                {{-- select zone --}}

    <div class="card card-selection zone-selection " style="display: none;">
        <div class="card-header" id="headingTwo1">
          <section class="mb-0 mt-0">
            <div role="menu" class=" " data-toggle="collapse"  aria-expanded="true" aria-controls="defaultAccordionTwo">
            Select Zone <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
            </div>
          </section>
        </div>
        <div  aria-labelledby="headingTwo1" data-parent="#toggleAccordion" style="">
            <div class="card-body">


              <select id="zone_selection" multiple="multiple">


                @foreach ( $zones as  $zone)
                <option value="{{$zone->id_zone }}"   >   {{$zone->zone_name}} </option>
                @endforeach



              </select>


              <script type="text/javascript">

                var zone_selection = $("#zone_selection").treeMultiselect({
                  allowBatchSelection: true,
                  enableSelectAll: false,
                  searchable: true,
                  sortable: false,
                  startCollapsed: true,
                  maxSelections: 1,

                });
              </script>



            </div>
        </div>
      </div>
                                {{-- select zone --}}
                                {{-- select zone --}}

@endif


@if (Auth::user()->access_type  == "Markazi" ||  Auth::user()->access_type  == "Zone" || Auth::user()->access_type  == "Admin")

                                {{-- select District --}}
                                {{-- select District --}}

    <div class="card card-selection district-selection"  style="display: none;">
        <div class="card-header" id="headingTwo1">
          <section class="mb-0 mt-0">
            <div role="menu" class=" " data-toggle="collapse"  aria-expanded="true" aria-controls="defaultAccordionTwo">
            Select District <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
            </div>
          </section>
        </div>
        <div  aria-labelledby="headingTwo1" data-parent="#toggleAccordion" style="">
            <div class="card-body">


              <select id="district_selection" multiple="multiple">

                @foreach ( $zones as  $zone)
                @foreach ($zone->districts as $district)
                <option value="{{$district->id_dist }}"
                    data-section="{{$zone->zone_name}}"   >District {{$district->dist_name }}</option>
                @endforeach
                @endforeach


              </select>


              <script type="text/javascript">

                var district_selection = $("#district_selection").treeMultiselect({
                  allowBatchSelection: false,
                  enableSelectAll: false,
                  searchable: true,
                  sortable: false,
                  startCollapsed: true ,
                  maxSelections: 1,
                });
              </script>



            </div>
        </div>
    </div>
    {{-- select District --}}
    {{-- select District --}}
@endif

@if ( Auth::user()->access_type  == "Markazi" || Auth::user()->access_type  == "Zone" ||  Auth::user()->access_type  == "District" || Auth::user()->access_type  == "Admin")


                                {{-- select Tehsil --}}
                                {{-- select Tehsil --}}

    <div class="card  card-selection tehsil-selection" style="display: none;">
        <div class="card-header" id="headingTwo1">
          <section class="mb-0 mt-0">
            <div role="menu" class=" " data-toggle="collapse"  aria-expanded="true" aria-controls="defaultAccordionTwo">
            Select Tehsil <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
            </div>
          </section>
        </div>
        <div  aria-labelledby="headingTwo1" data-parent="#toggleAccordion" style="">
            <div class="card-body">


@if (  Auth::user()->access_type  == "Markazi" || Auth::user()->access_type  == "Admin"    )
<select id="tehsil_selection" multiple="multiple">

    @foreach ( $zones as  $zone)
    @foreach (\App\District::has('tehsils')->with('tehsils')->where('id_zone' , $zone->id_zone )->get() as $district)
    @foreach ( $district->tehsils as $tehsil)
   <option value="{{$tehsil->id_tsl}}"
    data-section="{{$zone->zone_name}} / District {{$district->dist_name}}"> {{$tehsil->tsl_name}} </option>
    @endforeach
    @endforeach
    @endforeach
  </select>

 @elseif ( Auth::user()->access_type  == "District"  )
          <select id="tehsil_selection" multiple="multiple">


            @foreach (\App\District::has('tehsils')->with('tehsils')->whereIN('id_dist' , \App\Helpers\Helper::getLevelIds("District") )->get() as $district)
            @foreach ( $district->tehsils as $tehsil)
           <option value="{{$tehsil->id_tsl}}"
            data-section="District {{$district->dist_name}}"> {{$tehsil->tsl_name}} </option>
            @endforeach
            @endforeach

          </select>
 @elseif ( Auth::user()->access_type  == "Zone"  )
           <select id="tehsil_selection" multiple="multiple">

            @foreach (\App\District::has('tehsils')->with('tehsils')->whereIN('id_dist' , \App\Helpers\Helper::getLevelIds("District") )->get() as $district)
            @foreach ( $district->tehsils as $tehsil)
           <option value="{{$tehsil->id_tsl}}"
            data-section="District {{$district->dist_name}}"> {{$tehsil->tsl_name}} </option>
            @endforeach
            @endforeach

          </select>
@endif


              <script type="text/javascript">

                var tehsil_selection = $("#tehsil_selection").treeMultiselect({
                  allowBatchSelection: false,
                  enableSelectAll: false,
                  searchable: true,
                  sortable: false,
                  startCollapsed: true,
                  maxSelections: 1,
                });

              </script>



            </div>
        </div>
      </div>
                                {{-- select Tehsil --}}
                                {{-- select Tehsil --}}

@endif








    </div>


    <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step4">
    <label><h5><b>Step 2: <small><b>Select Forum Access</b></small></b></h5> </label>




{{-- select Forum --}}
    {{-- select Forum --}}

    <div class="card">
        <div class="card-header" id="headingTwo1">
            <section class="mb-0 mt-0">
            <div role="menu" class=" " data-toggle="collapse"  aria-expanded="true" aria-controls="defaultAccordionTwo">
            Select Forum
            <span  id="forum_msg" style="color: red;"> </span>

            <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
            </div>
            </section>
        </div>
        <div  aria-labelledby="headingTwo1" data-parent="#toggleAccordion" style="">
            <div class="card-body">



            <select id="forum_selection" multiple="multiple">
                 @foreach (\App\Forum::whereIN('id_frm', \App\Helpers\Helper::get_forums_access())->get() as  $forum)
                <option value="{{$forum->id_frm}}"   >   {{$forum->frm_name}}</option>
                @endforeach

            </select>


                <script type="text/javascript">

                var forum_selection = $("#forum_selection").treeMultiselect({
                    allowBatchSelection: false,
                  enableSelectAll: false,
                  searchable: true,
                  sortable: false,
                  startCollapsed: true,
                  maxSelections: 1,
                });

                </script>



            </div>
        </div>
        </div>
                                {{-- select Forum --}}
                                {{-- select Forum --}}



    </div>

</div>



                   @can('create-Tanzim')
                            <div class="form-actions mt-4" align="center"  >
                                <a href="{{route('make.my.team')}}" class="btn btn-default">Cancel</a>
                                <button type="button" id="assign_designation_button"
                                name="assign_designation_button" class="btn btn-primary   ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                                   <span id="button_inner"> Get Tanzimi Body  </span></button>
                            </div>

                    @endcan

                        </form>

            </div>





            </div>
        </div>





    </div>

    </div>


    <script>
    $(document).ready(function(){

        function scroll(id)
        {
            $([document.documentElement, document.body]).animate({
        scrollTop: $("#"+id).offset().top - 300
    }, 50);
        }

         $('#assign_designation_button').click(function(){


             var flag = true;

             var access_level = null;
             var access_ids = [];
             var forum_ids = [];



             // validate step 3

          var element = $('#worker_level');
           element.removeClass('is-invalid');
           element.next().html('');
             $('.card-selection').hide();
             var selection = element.val();
             $('#step3').removeClass('step_error');
             if(selection == "" || selection ==  null)
             {
                $('#step3').addClass('step_error');
                flag = false; // Error has found
                element.next().html(' Please Select Access Level.');
                element.addClass('is-invalid');
             }
             else if(selection == "Zone" )
             {
                $('.zone-selection').show();
                if($('#zone_selection').val() == null)
                {
                    element.next().html(' Please Select minimum one Zone.');
                    $('#step3').addClass('step_error');
                    flag = false; // Error has found
                }
                else
                {
                    element.next().html('');
                    access_ids =  $('#zone_selection').val();
                    $('#step3').removeClass('step_error');
                }
             }
             else if(selection == "District" )
             {
                $('.district-selection').show();
                if($('#district_selection').val() == null)
                {
                    element.next().html(' Please Select minimum one District.');
                    $('#step3').addClass('step_error');
                    flag = false; // Error has found
                }
                else
                {
                    access_ids =  $('#district_selection').val();
                    $('#step3').removeClass('step_error');
                    element.next().html('');

             }
             }
             else if(selection == "Tehsil" )
             {
                $('.tehsil-selection').show();
                if($('#tehsil_selection').val() == null)
                {
                    element.next().html(' Please Select minimum one Tehsil.');
                    $('#step3').addClass('step_error');
                    flag = false; // Error has found
                }
                else
                {
                    access_ids =  $('#tehsil_selection').val();
                    $('#step3').removeClass('step_error');
                    element.next().html('');

                }
             }

             access_level = selection;

             if($('#forum_selection').val() == null)
                {
                    $('#forum_msg').html(' Please Select minimum one Forum.');
                    $('#step4').addClass('step_error');
                    flag = false; // Error has found
                }
                else
                {
                    forum_ids =  $('#forum_selection').val();
                    $('#step4').removeClass('step_error');
                    $('#forum_msg').html('');

                }


            //  var access_level = null;
            //  var access_ids = [];
            //  var forum_ids = [];

           if(flag)
           {

                $('#button_inner').html('Please Wait...');
                $('.bg-overlay').show();
                  $('.se-pre-con').show();
                $('#access_level').val(access_level);
                $('#access_ids').val(access_ids);
                $('#forum_ids').val(forum_ids);
                $('#assign_desgnation_to_user').submit();

                setTimeout(function(){
                    $('#button_inner').html('Get Tanzimi Body');
                $('.bg-overlay').hide();
                  $('.se-pre-con').hide();
}, 2000);

           }

         });

    });
    </script>



<form   action="{{route('below.level.tanzim.designations')}}" method="GET"  id="assign_desgnation_to_user"
enctype="multipart/form-data" style="display: none;">

    <input type="text" name="access_level" id="access_level" required />
    <input type="text" name="access_ids" id="access_ids" required />
    <input type="text" name="forum_ids" id="forum_ids" required />

</form>






@endsection
