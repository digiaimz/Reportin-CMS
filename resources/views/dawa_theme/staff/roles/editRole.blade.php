@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('manage_tanzim_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_tanzim_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Edit Designation
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
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


<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<style>
#content > .layout-px-spacing > .layout-top-spacing{
    display: block;
}
</style>

@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')




<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>
<script>

    $(document).ready(function(){
        $('#sm2').removeClass();
    });

    </script>
    <style>
        .form-group label, label {
            font-size: 15px;
            color: #000000;
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

        {{-- roles   --}}
        {{-- roles   --}}




        <div id="page-inner" style="opacity: 1;">
        <div class="row">
            <div class="col-md-12">
                <h2>    Edit Designation <a class="btn btn-primary  " href="{{route('staff.role.view')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Designations</a>
</h2>
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
            @lang('Edit Designation') </a></li>
    </ol>
</nav>

@if (Session::has('msg'))
<div class="alert alert-success">
    {{ Session::get('msg') }}</div>
@endif
            </div>
        </div>
        <hr>

            <div class="row">

<div class="col-lg-12">

<style>
input{
margin-right: 5px;
}

</style>
    <form method="POST" action="{{route('edit.new.designation' , ['id' => $designation->id])}}"    >

     @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 form-group">
            <label for="name">Designation Name:</label>
            <input class="form-control @error('name') is-invalid    @enderror "
            placeholder="Enter Designation Name" required="" value="{{old('name' , $designation->name)}}"
            autocomplete="off"
            name="name" type="text"  >
            @error('name')
            <div class="alert alert-danger">@lang($message)</div>
            @enderror

        </div>
        <div class="col-xs-12 col-sm-8 col-md-6 form-group">
            <label for="level">Select Level:</label>
            <select  name="level"   class="  form-control" style="cursor: pointer; user-select: auto;" required>
                <option value="" style="user-select: auto;">Choose...</option>

                       <option @if( old('level' , $designation->level)  == "Admin") selected @endif value="Admin" style="user-select: auto;">Admin Level </option>
                       <option @if( old('level' , $designation->level)  == "Markazi") selected @endif value="Markazi" style="user-select: auto;">Markazi Level </option>
                       <option  @if( old('level' , $designation->level) == "Zone") selected @endif value="Zone" style="user-select: auto;">Zone Level </option>
                       <option  @if( old('level' , $designation->level) == "District") selected @endif value="District" style="user-select: auto;">District Level </option>
                       <option  @if( old('level' , $designation->level) == "Tehsil") selected @endif value="Tehsil" style="user-select: auto;">Tehsil Level </option>
                   </select>
            @error('level')
            <div class="alert alert-danger">@lang($message)</div>
            @enderror

        </div>
        <div class="col-xs-12 col-sm-8 col-md-6 form-group">
            <label for="name">Select Forum:</label>
            <select class="form-control   "
            name="forum_id"  autocomplete="off" required="" style="height: 43px;" required>
            <option value="" style="user-select: auto;">Choose...</option>
               @foreach (\App\Forum::where('frm_shown' , 1)->orderBy('frm_ordering', 'ASC')->get() as  $forum)
                <option @if( old('forum_id' , $designation->forum_id) ==  $forum->id_frm) selected @endif value="{{$forum->id_frm}}">{{$forum->frm_code}} - {{$forum->frm_name}}</option>
                @endforeach

           </select>
            @error('forum_id')
            <div class="alert alert-danger">@lang($message)</div>
            @enderror

        </div>
    </div>

        <div class="row">

            <div class="col-lg-12">
                @error('permission')
                <div class="alert alert-danger">@lang($message)</div>
                @enderror

                    <?php $i= 1 ?>


                    @foreach ($permissions as $for )

                    <?php

                    if($i==1)
                    {
                          echo ' <div class="row">';
                    }

                    ?>


                    <div class="col-lg-3  col-md-3 col-sm-12 ">

                    <label for="permissions"><strong>{{$for->for}}</strong></label>


                       @foreach ($for->permissions as $permission )
                              <div class="checkbox">
                                    <label><input name="permission[]" type="checkbox"
                        @if( in_array( $permission->id , old('permission' , $designation->permissions->pluck('id')->toArray()))) checked  @endif
                                        value="{{$permission->id}}">{{$permission->name}}</label>
                                </div>


                      @endforeach
                    </div>

                    <?php
                    if($i == 4)
                    {
                        $i = 0;
                        echo " </div><hr style='margin:5px;'>";
                    }

                    $i++ ?>
                      @endforeach



                <hr>


  </div>




                <hr>
                <hr>





        <div class="col-xs-12 col-sm-8 col-md-6 form-group">
            <button class="btn btn-primary btn-block loder-style" name="submit_button" type="submit" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>

                Update Designation</button>

        </div>




        {{-- roles   --}}
        {{-- roles   --}}

    </div>
</div>

</div>

</div>










@endsection
