@extends('layouts.dawa_theme')
@section('complein_active')
active
@endsection
@section('complain_aria') aria-expanded="true" @endsection

@section('title')
Create New Group
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}">
   <!--  END CUSTOM STYLE FILE  -->
 
@endsection

@section('pagelevel_scripts_footer')

 <!--  BEGIN CUSTOM SCRIPTS FILE  -->
 <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>
 <script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>
 <script src="{{asset('dawa_theme/plugins/select2/custom-select2.js')}}"></script>
 <!--  BEGIN CUSTOM SCRIPTS FILE  -->
 
 <script>
    $(".tagging").select2({
        tags: true
    });
    
        </script>
@endsection
@section('content')


<div id="fs2Tagging" class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Create New Group:</h4>
                </div>
            </div>
        </div>
        
        <div class="widget-content widget-content-area">

            <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon5">Group Name:</span>
                </div>
                <input type="text" class="form-control" placeholder="Enter Group Name..." aria-label="Username">
              </div>

            <p>Select Group Level:</p>
            <select class="form-control disabled-results">
                <option value="one">Chose...</option>
                <option value="one">Zone</option>
                <option value="two" disabled="disabled">District</option>
                <option value="three">Tehsil</option>
              </select>
              <BR>
            <p>Select Group Forum:</p>
            <select class="form-control disabled-results">
                <option value="one">Chose...</option>
                <option value="one">Zone</option>
                <option value="two" disabled="disabled">District</option>
                <option value="three">Tehsil</option>
              </select>
              <BR>
              <p>Select Group Members:</p>
            <select class="form-control tagging" multiple="multiple">
              <option selected>Membership# 001</option>
              <option selected>Membership# 002</option>
              <option selected>Membership# 003</option>
              <option selected>Membership# 004</option>
              <option selected>Membership# 005</option>
              <option selected>Membership# 006</option>
              <option selected>Membership# 007</option>
              <option selected>Membership# 008</option>
              <option selected>Membership# 009</option>
              <option selected>Membership# 0010</option>
              <option selected>Membership# 0011</option>
              <option selected>Membership# 0012</option>
              <option selected>Membership# 0013</option>
              <option selected>Membership# 0014</option>
              <option selected>Membership# 0015</option>
            </select>
 

<button class="btn btn-success">Create Group</button>
             

        </div>
    </div>
</div>


@endsection
