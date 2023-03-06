@extends('layouts.dawa_theme')
@section('manage_tanzim_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_tanzim_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
View Dignitaries
@endsection


{{-- loader --}}
@section('loader')
<div id="load_screen" hidden> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
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
            "pageLength": 10 ,
            "order": [[ 0, "desc" ]] ,
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>



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
                                            @lang('View Dignitaries') </a></li>
                                    </ol>
                                </nav>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px; ">

                        @can('create-Tanzim')
                     &nbsp;&nbsp;&nbsp;    <a class="btn btn-primary  " href="{{route('add.new.staff')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square" style="user-select: auto;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2" style="user-select: auto;"></rect><line x1="12" y1="8" x2="12" y2="16" style="user-select: auto;"></line><line x1="8" y1="12" x2="16" y2="12" style="user-select: auto;"></line></svg>
                            Register New Dignitary</a>
                       @endcan

                        </div>

                </div>

                @if (Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    {!! Session::get('msg') !!}</div>
                @endif


                <div class="table-responsive mb-4 mt-4">

                    @can('view-Tanzim')
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Access Level</th>
                                <th>Designation</th>
                                <th>Whatsapp</th>
                                <th>Assign By</th>
                                <th>Update By</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $users  = \App\User::has('designation')->with('designation' , 'assign_designation_by_user')
                            -> where('id',  '<>',  Auth::id())
                            ->get();
                            $i = 1;

                            ?>

        @foreach ($users  as  $user)
        @if($user->designation_id != 1)
        <tr>
            <td>{{$i}}</td>
            <td>{{$user->name}}</td>
            <td><b  >{{$user->access_type}} Level</b></td>
            <td><b  >{{$user->designation->name}}</b></td>
            <td>
                <div style="display: inline-block;vertical-align: text-top;"
                    class="iti__flag flag-custom iti__{{$user->getCountryNameAttribute()->iso2}} "></div>
                    +{{$user->getCountryNameAttribute()->dialCode}} {{$user->whatsapp}}</td>
            <td>{{($user->assign_designation_by_user != null)? $user->assign_designation_by_user->name : "---" }}</td>
            <td>{{($user->update_designation_by_user != null)? $user->update_designation_by_user->name : "---" }}</td>
            <td>
                <div class="d-flex">
                    <div class="usr-img-frame mr-2 rounded-circle">
                        <img alt="avatar" class="img-fluid rounded-circle"
                            src="{{asset($user->photo)}}">
                    </div>
                </div>
            </td>
            <td>

                                    @if($user->is_designation_active == 1)
                                    <span class="shadow-none badge badge-success">Active</span>
                                    @else
                                    <span class="shadow-none badge badge-danger">In-active</span>
                                    @endif
                                    @can('edit-Tanzim')
                                    <img class="bs-tooltip" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Chnage Status"
                                    onclick="changeStatus({{$user->id}})"
                                    style="cursor: pointer;"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/wD/AP+gvaeTAAAB50lEQVRIia3VTYjNYRTH8Q/diQWGwWLkZWlIkg0lZGHCykYZdkoWGi9ZWRk1WQnlJVkYGyxYTbGwUJJiZTVzJwsaL6WpyaQsaBoW5z/c7n3+z71u86v/5nnO83zPOc8550+5KriHcfRm7JpqXgZwH1V8xxIMtAupNAFUcQoH2gXQGEktYAQ3cBJTibM/8BFf/hcygAU4jxPYmjnbgTVYKd7uFn6lDOcn1n6XOFCvKTzCYSzDS6xNGabS9QCjxXddebo6sBFHMYwXuIo9+JaD1IPG0I/9ospSquAyFuJVATlWa5BK1zSOFF72iJScKQHM2p9FNyaKc+sy9g0eDonq2deC/WaRttMi+qxWS0fYikaxW1TaX9Vfdg5PcKdNyAwmsSIH2SbeY3ubEP61QCmE5v2R0xs8xOvaxfrZNSkaq903OY5V+Fy7WH/ZGLbgPTa1cGlvYTskHJ6pB6Qgw+jDTQxqnrodYiqMi8GamuoNkA94hy58xbWyg4Wu4JDIQLUMlPK0C89FF+/CQTFmRqSn7FIReb/o9g1ink3nIMQIf4xnhXc7sR6LM1G9xW1cwk9cnN0oq6JPxcUToiT7sDwDyKrVnugWQ29RYq/tdLWqTjwVFdaTAswF5IL4z3SWAeZCe0Uz3pUp9T8jJ2V2Vdrp1wAAAABJRU5ErkJggg==" />
                                  @endcan
                                </td>



                                <td>
                                    @can('edit-Tanzim')
                   <a href="{{route('edit.designation.view',['id'=>$user->id])}}" class="bs-tooltip  loder-style" data-toggle="tooltip"
                    data-placement="top" title="" data-original-title="Edit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                     </path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                     </path></svg>
                      </a>
                      @endcan
                    </td>
                </tr>

                @endif
                <?php


                            $i = $i + 1;

                            ?>

                            @endforeach

                        </tbody>
                    </table>

                    @endcan
                    <script>

                    function changeStatus(userid){

                      window.location = "{{route('change.status.of.designation')}}/"+userid;
                  $('.bg-overlay').show();
                  $('.se-pre-con').show();
                  setTimeout(function(){
                    $('.bg-overlay').hide();
                  $('.se-pre-con').hide();
}, 7000);

                    }
                    </script>
                </div>
            </div>
        </div>

    </div>

    </div>










@endsection
