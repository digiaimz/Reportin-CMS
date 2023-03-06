@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('dashboard_active')
active
@endsection
{{-- dashboard_aria --}}
@section('dashboard_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Edit Forum
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



@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

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



        <div class="col-xl-8 col-lg-8 col-md-10  col-sm-12  layout-spacing">



            <div class="widget-content widget-content-area br-6">



                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12   " style="padding: 0px;">
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">
                                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Home
                            </a></li>
                            <li class="breadcrumb-item  " aria-current="page"><a href="javascript:void(0);"   >
                                Selection </a></li>
                                <li class="breadcrumb-item"><a href="{{route('Manage.forums')}}" style="    color: #007bff;">
                               Manage Forums </a></li>
                               <li class="breadcrumb-item  " aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                Edit   </a></li>
                        </ol>
                    </nav>
                </div>







                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Edit Forum</h4>
                </div>
                <form  action="{{route('store.edit.forum' , ['id' => $slug])}}" enctype="multipart/form-data" method="POST">


                    @if (session('msg'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> @lang(session('msg'))

                    </div>
                @endif

                    <div class="row layout-top-spacing"  >




                <div class="col-xl-6 col-md-6 col-sm-12  mb-3">
                    <div class="input-group  ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="">Name (en)</span>
                        </div>
                        <input type="text" name="frm_name" value="{{old('frm_name' , $forum->frm_name)}}" class="form-control"   aria-label="Name(En)" aria-describedby="">
                      </div>
                      @error('frm_name')
                      <div class="alert alert-danger">@lang($message)</div>
                  @enderror

                </div>
                <div class="col-xl-6 col-md-6 col-sm-12  mb-3">
                    <div class="input-group   ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="">Name (ur)</span>
                        </div>
                        <input type="text" name="frm_name_ur" value="{{old('frm_name_ur' , $forum->frm_name_ur)}}" class="form-control"   aria-label="Name(Ur)" aria-describedby="">
                      </div>
                      @error('frm_name_ur')
                      <div class="alert alert-danger">@lang($message)</div>
                  @enderror
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 ">
                    <div class="form-group   ">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select name="frm_shown" class="custom-select  " size="1">

                            <option value="1" @if(old('frm_shown' , $forum->frm_shown) == 1) selected @endif value="Active">Active</option>
                            <option  value="0"  @if(old('frm_shown' , $forum->frm_shown) == 0) selected @endif  value="Inactive">Inactive</option>

                        </select>
                        @error('frm_shown')
                        <div class="alert alert-danger">@lang($message)</div>
                    @enderror
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-12  mb-3" style="    margin-top: 1.5rem!important;">
                    <div class="input-group    ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="">Code</span>
                        </div>
                        <input type="text" name="frm_code" value="{{old('frm_code' , $forum->frm_code)}}" class="form-control"   aria-label="Name(Ur)" aria-describedby="">
                      </div>
                      @error('frm_code')
                      <div class="alert alert-danger">@lang($message)</div>
                  @enderror
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 ">
                <div class="form-actions"   >

                    <button type="submit" id="submit_provinces" name="submit_provinces" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Update Forum </button>
                </div>
            </div>



            </div>
                </form>





            </div>
        </div>





    </div>

    </div>










@endsection
