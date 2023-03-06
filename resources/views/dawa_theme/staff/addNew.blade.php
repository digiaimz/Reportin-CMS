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

<link rel="stylesheet" href="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.min.css')}}" >

<script src="{{asset('dawa_theme/selectbox/vendor/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('dawa_theme/selectbox/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.js')}}"></script>
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
$(document).ready(function() {




    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });


            data_table_users = $('#example').DataTable({
         dom: '<"row"<"col-md-12"<"row"<"col-md-4"B><"col-md-4"l><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [

                    { extend: 'copy', className: 'btn btn-primary broadcast-list broadcast-list-copy-button' },
                    { extend: 'csv', className: 'btn  btn-primary broadcast-list  broadcast-list-copy-button-csv' },

                    { extend: 'excel', className: 'btn  btn-primary broadcast-list  broadcast-list-copy-button-excel '  },
                    { extend: 'print', className: 'btn  btn-primary broadcast-list' }
                ]
            },


            "lengthChange": false ,



              processing: false,
              serverSide: false,
              "pageLength": 3 ,


              ajax: {
           url: "{{ route('assign.designation.worker.filter') }}",
           type: 'GET',
                },

            deferRender: true ,

              "order": [[ 0, "desc" ]] ,

              createdRow: function( row, data, dataIndex ) {
        // Set the data-status attribute, and add a class
         $(row).attr('data-id', data.id  );

    } ,

              columns: [

              {data: 'user_info' ,
              className :"certer" }

              ]
          });




    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            data_table_users.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );


} );
</script>
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

                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                            @lang('Assign Designation') </a></li>
                    </ol>
                </nav>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;  ">

        @can('view-Tanzim')
        &nbsp; &nbsp; &nbsp;  <a class="btn btn-primary  " href="{{route('view.staff')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            View Dignitaries</a>

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

                    <h4>Register New Tanzimi Member:</h4>
                </div>
                <div class="row layout-top-spacing"   style="display: block;">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">


                    <form method="get" action="#" >
                        <div class="form-body">
                            <h5 class="box-title m-t-40" style="text-align:center;"><b>Please Follow Step:1 to Step:4</b></h5>

                        <hr>


                        <div class="row">

                            <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step1">
                                <div class="form-group">
                                    <label><h5><b>Step 1: <small><b>Select Tanzimi Member</b></small></b></h5> </label>
                                    <span style="color: red;" id="tanzimi_member"></span>
                                    <table id="example" class="display" style="width:100%">
                                         <tbody>


                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step2">


                                 <div class="form-group">
                                    <label><h5><b>Step 2: <small><b>Select Designation</b></small></b></h5> </label>
                                    <select id="worker_designation" class="js-states basic form-control">
                                        <option value="">Choose...</option>

                                        @foreach (\App\Designation::where('id' , '<>' , 1)->get() as $designation )
                                            <option value="{{$designation->id}}">{{$designation->name}}</option>
                                        @endforeach


                                    </select>
                                <span id="worker_designation_msg" style="color: red;"></span>

                                </div>




                            </div>




                        </div>




 <div class="row">
    <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step3">
    <label><h5><b>Step 3: <small><b>Select Access Level</b></small></b></h5> </label>

    <select onchange="showLevelSelection()"  id="worker_level"class="  form-control" style="cursor: pointer;">
            <option value="" >Choose...</option>

        @foreach (config('access.level.get') as $level )
           <option value="{{$level}}">{{$level}} Level </option>
        @endforeach
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

                <?php
               $zones = \App\Zone::with('districts')->get();
                ?>

                @foreach ( $zones as  $zone)
                <option value="{{$zone->id_zone }}"   >   {{$zone->zone_name}} </option>
                @endforeach



              </select>


              <script type="text/javascript">

                var zone_selection = $("#zone_selection").treeMultiselect({
                  allowBatchSelection: true,
                  enableSelectAll: true,
                  searchable: true,
                  sortable: true,
                  startCollapsed: true
                });
              </script>



            </div>
        </div>
      </div>
                                {{-- select zone --}}
                                {{-- select zone --}}





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
                  allowBatchSelection: true,
                  enableSelectAll: true,
                  searchable: true,
                  sortable: true,
                  startCollapsed: true
                });
              </script>



            </div>
        </div>
      </div>
                                {{-- select District --}}
                                {{-- select District --}}








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



          <select id="tehsil_selection" multiple="multiple">

            @foreach ( $zones as  $zone)
            @foreach (\App\District::has('tehsils')->with('tehsils')->where('id_zone' , $zone->id_zone )->get() as $district)
            @foreach ( $district->tehsils as $tehsil)
           <option value="{{$tehsil->id_tsl}}"
            data-section="{{$zone->zone_name}} / District {{$district->dist_name}}"> {{$tehsil->tsl_name}} - Tehsil</option>
            @endforeach
            @endforeach
            @endforeach
          </select>


              <script type="text/javascript">

                var tehsil_selection = $("#tehsil_selection").treeMultiselect({
                  allowBatchSelection: true,
                  enableSelectAll: true,
                  searchable: true,
                  sortable: true,
                  startCollapsed: true
                });

              </script>



            </div>
        </div>
      </div>
                                {{-- select Tehsil --}}
                                {{-- select Tehsil --}}










    </div>


    <div class="col-md-6 steps_div" style="padding-top: 5px;padding-bottom:5px;" id="step4">
    <label><h5><b>Step 4: <small><b>Select Forum Access</b></small></b></h5> </label>




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
                 @foreach (\App\Forum::all() as  $forum)
                <option value="{{$forum->id_frm}}"   >   {{$forum->frm_code}} -  {{$forum->frm_name}}</option>
                @endforeach

            </select>


                <script type="text/javascript">

                var forum_selection = $("#forum_selection").treeMultiselect({
                    allowBatchSelection: true,
                    enableSelectAll: true,
                    searchable: true,
                    sortable: true,
                    startCollapsed: true
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
                                <a href="{{route('view.staff')}}" class="btn btn-default">Cancel</a>
                                <button type="button" id="assign_designation_button"
                                name="assign_designation_button" class="btn btn-primary  loder-style">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square" style="user-select: auto;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2" style="user-select: auto;"></rect><line x1="12" y1="8" x2="12" y2="16" style="user-select: auto;"></line><line x1="8" y1="12" x2="16" y2="12" style="user-select: auto;"></line></svg>
                                   <span id="button_inner"> Assign Designatory  </span></button>
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
             var user_id = null;
             var designation_id = null;
             var access_level = null;
             var access_ids = [];
             var forum_ids = [];

             if( data_table_users.$('tr.selected').length == 0)
             {
                  $('#tanzimi_member').html('Please Select Tanzimi Member by clicking on row.');

                  scroll('tanzimi_member');
                  $('#step1').addClass('step_error');
                  flag = false; // Error has found
             }
             else
             {
                $('#step1').removeClass('step_error');
                $('#tanzimi_member').html('')
                user_id= data_table_users.$('tr.selected').attr('data-id');
             }


             var  worker_designation  = $('#worker_designation');

             if(worker_designation.val() == null  || worker_designation.val() == "")
             {
                $('#step2').addClass('step_error');
                flag = false; // Error has found
                scroll('worker_designation');
                worker_designation.addClass('is-invalid');

               $('#worker_designation_msg').html('Please Select Designation.');

             }
             else
             {      $('#step2').removeClass('step_error');
                worker_designation.removeClass('is-invalid');
               $('#worker_designation_msg').html('');
                designation_id = worker_designation.val();
             }

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

            //     var user_id = null;
            //  var designation_id = null;
            //  var access_level = null;
            //  var access_ids = [];
            //  var forum_ids = [];

           if(flag)
           {

                $('#button_inner').html('Please Wait...');
                $('.bg-overlay').show();
                  $('.se-pre-con').show();
                $('#user_id').val(user_id);
                $('#designation_id').val(designation_id);
                $('#access_level').val(access_level);
                $('#access_ids').val(access_ids);
                $('#forum_ids').val(forum_ids);
                $('#assign_desgnation_to_user').submit();

                setTimeout(function(){
                    $('#button_inner').html('Assign Designation');
                $('.bg-overlay').hide();
                  $('.se-pre-con').hide();
}, 7000);

           }

         });

    });
    </script>



<form action="{{route('add.new.staff.save')}}" method="POST"  id="assign_desgnation_to_user"
enctype="multipart/form-data" style="display: none;">
    @csrf
    <input type="text" name="user_id" id="user_id" required />
    <input type="text" name="designation_id" id="designation_id" required />
    <input type="text" name="access_level" id="access_level" required />
    <input type="text" name="access_ids" id="access_ids" required />
    <input type="text" name="forum_ids" id="forum_ids" required />

</form>






@endsection
