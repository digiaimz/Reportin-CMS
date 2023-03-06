@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('manage_tanzim_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_tanzim_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
View Designations
@endsection
{{-- loader --}}
@section('loader')
{{-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div> --}}
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

<script>

   $(document).ready(function(){

      $('.show-permission').click(function(){



          var element_click = $(this)[0];

        $('.show-permission').each(function(index, element ){

            if(element_click ==  element)
            {
                $(this).hide();
                $(this).next().show();

            }
            else
            {
                $(this).show();
                $(this).next().hide();

            }



        });


      });

      $('.hide-permission').click(function(){


           $(this).parent().hide();

           $(this).parent().prev().show();



      });

   });

</script>



    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 50
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>
    <script>

        $(document).ready(function(){
            $('#sm2').removeClass();
        });

        </script>
        <style>
        .table > tbody > tr > td {
    border: none;
    color: black;
    font-size: 14px;
    letter-spacing: 0px;
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



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">

    <div class="row">
    <div class="col-xl-6 col-lg-6 col-sm-6   ">
    <nav class="breadcrumb-two" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">
                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                @lang('Home')
            </a></li>
            <li class="breadcrumb-item "><a href="#">

                @lang('Manage Tanzim')
            </a></li>
            <li class="breadcrumb-item  " aria-current="page"><a href="javascript:void(0);" >
                @lang('Manage Designation') </a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                @lang('View Designation') </a></li>

        </ol>

    </nav>

</div>
<div class="col-xl-6 col-lg-6 col-sm-6   " style="text-align: right;">

    @can('create-designation')


    <a class="btn btn-primary " href="{{route('staff.role.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>

        Create Designations</a>

        @endcan
</div>
</div>


                <div class="table-responsive mb-4 mt-4">

                    <form id="filter_forum" action="{{route('staff.role.view')}}" method="get">
                    <div class="row">

                    <div class="col-xl-3 col-lg-3 col-sm-12    form-group">
                        <label for="level">Filter Forum:</label>
                        <select  name="forum"   class="  form-control" style="cursor: pointer; user-select: auto;"  >
                            <option   value="" style="user-select: auto;">Choose Forum... </option>
             @foreach ($forums as  $forum)
             <option @if(   $forum_id  ==  $forum->id_frm) selected @endif value="{{$forum->id_frm}}">{{$forum->frm_code}} - {{$forum->frm_name}}</option>
             @endforeach
                               </select>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-12    form-group">
                        <label for="level">Filter Level:</label>
                        <select  name="level"   class="  form-control" style="cursor: pointer; user-select: auto;"  >
                            <option   value="" style="user-select: auto;">Choose Level... </option>
                            <option  @if(   $level ==  "Admin") selected @endif value="Admin" style="user-select: auto;">Admin Level </option>
                            <option  @if(   $level ==  "Markazi") selected @endif value="Markazi" style="user-select: auto;">Markazi Level </option>
                            <option  @if(  $level ==  "Zone") selected @endif value="Zone" style="user-select: auto;">Zone Level </option>
                            <option  @if(  $level ==  "District") selected @endif value="District" style="user-select: auto;">District Level </option>
                            <option  @if(   $level ==  "Tehsil") selected @endif value="Tehsil" style="user-select: auto;">Tehsil Level </option>
                               </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-sm-12    form-group" style="position: relative;">
                      <button id="filter_button" type="submit" style="position: absolute; cursor:pointer;
                      bottom: 0px;" class="btn btn-primary">Apply Filter</button>
                    </div>


                    </div>
                </form>

                <script>


$('#filter_forum').submit(function(e){

  	e.preventDefault();
     $('#filter_button').html("Please Wait...");
     $('.bg-overlay').show();
                  $('.se-pre-con').show();
  	e.currentTarget.submit();
});




                </script>


                    @can('view-designation')
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>

                                <th>Designation Name</th>
                                <th>Count</th>
                                <th>Forum</th>
                                <th>Level</th>
                                <th>Permissions</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  $i = 1; ?>




                            @foreach ($designations as $designation )
                            @if ($designation->id != 1)



                            <tr  @if ($designation->id == 1)  style="cursor: not-allowed;"  @endif >

                                <td>{{$i}}</td>


                                <td>{{$designation->name}}</td>
                                <td>


                                    @if($designation->fill_seats != null)

                                    {{count($designation->fill_seats)}}

                                    @else
                                        0
                                        @endif
                                        of
                                    @if($designation->level =="Markazi" || $designation->level =="Admin")
                                        1
                                    @elseif ($designation->level =="Zone")
                                        13
                                    @elseif ($designation->level =="District")
                                        157
                                    @elseif ($designation->level =="Tehsil")
                                        625
                                    @endif

                                </td>
                                <td>{{$designation->forum->frm_code}}</td>
                                <td>{{$designation->level}}</td>
                                <td>
                                    <a   class="show-permission" style="color: rgb(0, 26, 255);cursor: pointer;">
                                        @foreach ($designation->permissions->slice(0, 1) as $permission )
                                     <span style="color: #9598a0;">   Can - {{$permission->name}} -  {{$permission->for}}        </span> <br>
                                    @endforeach

                                        <u>Show</u>...</a>
                                    <span style="display: none;">
                                    @foreach ($designation->permissions as $permission )
                                        Can - {{$permission->name}} -  {{$permission->for}} <br>
                                    @endforeach

                                    <a   class="hide-permission" style="color: rgb(0, 26, 255);cursor: pointer;">
                                         <u>Hide</u>...</a>
                                    </span>
                                </td>

                                <td>{{\Carbon\Carbon::parse($designation->created_at)->format('d-M-Y')}}</td>

                                <td><span class="shadow-none badge badge-success">Active</span></td>
                                <td>
                                @can('edit-designation')


                                    @if ($designation->id == 1)


                                        <svg style="cursor: not-allowed;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                        </path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                        </path></svg>

                                     @else
                                     <a href="{{route('edit.designation.permission',['id'=>$designation->id])}}" class="bs-tooltip   "
                                        data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                        </path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                        </path></svg>
                                    </a>
                                    @endif
                                    @endcan

                                </td>
                            </tr>
                            <?php  $i++; ?>
                            @endif
                            @endforeach


                        </tbody>
                    </table>


                    @endcan
                </div>
            </div>
        </div>

    </div>

    </div>










@endsection
