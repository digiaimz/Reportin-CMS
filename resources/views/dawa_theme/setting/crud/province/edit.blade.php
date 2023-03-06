@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('dashboard_active')
active
@endsection
{{-- dashboard_aria --}}
@section('dashboard_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Edit Province
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
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Edit Province</h4>
                </div>
                <div class="row layout-top-spacing"  >
    
                <div class="col-xl-6 col-md-6 col-sm-12 col-6 mb-3">
                    <div class="input-group input-group-sm ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Name (en)</span>
                        </div>
                        <input type="text" class="form-control"   aria-label="Name(En)" aria-describedby="inputGroup-sizing-sm">
                      </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-6 mb-3">
                    <div class="input-group input-group-sm  ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Name (ur)</span>
                        </div>
                        <input type="text" class="form-control"   aria-label="Name(Ur)" aria-describedby="inputGroup-sizing-sm">
                      </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                    <div class="form-group   ">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="custom-select  " size="1">
                           
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                    <div class="form-group">
                        <label style="color:red;">Logo size must be 300 * 300 </label>
                        <input type="file" class="form-control" name="prov_photo" id="prov_photo">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                <div class="form-actions"   >
                    
                    <button type="submit" id="submit_provinces" name="submit_provinces" class="btn btn-outline-primary"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Update Province </button>
                </div>
            </div>
            </div>
                 
 
                 
 

            </div>
        </div>
        


     

    </div>

    </div>










@endsection
