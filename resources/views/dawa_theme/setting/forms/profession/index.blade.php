@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('dashboard_active')
active
@endsection
{{-- dashboard_aria --}}
@section('dashboard_aria') aria-expanded="true" @endsection
{{-- title --}} 
@section('title') 
Manage Professions
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
            "pageLength": 10 
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



        <div class="col-xl-8 col-lg-8 col-md-10  col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
               
                <div class="row layout-top-spacing"  >
    
                <div class="col-xl-6 col-md-6 col-sm-12 col-6 mb-3">
                    <div class="input-group input-group-sm ">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Name:</span>
                        </div>
                        <input type="text" class="form-control"   aria-label="Name(En or Ur)" aria-describedby="inputGroup-sizing-sm">
                      </div>
                </div>
                
                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                <div class="form-actions"   >
                    
                    <button style="margin-top: -3px;" type="submit" id="submit_provinces" name="submit_provinces" class="btn btn-outline-primary"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        
                        Filter </button>
                </div>
            </div>
            </div>
                 
 
                 
 

            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-2  col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                 <center>   <h4>Add New Profession</h4>
                 </center>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary mb-2 mr-2" 
                    data-toggle="modal" data-target="#exampleModal"
                 
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </button>
                </div>
                <!-- Modal --> 
<div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Profession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text">
                
                    <div class=" ">
                         
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
                        <div class="col-xl-6 col-md-6 col-sm-12 col-6 mb-3">
                            <label for="exampleFormControlSelect1">Profession Code:</label>
                            <div class="input-group input-group-sm  ">
                                
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-sm">Code</span>
                                </div>
                                <input type="text" class="form-control"   aria-label="Name(Ur)" aria-describedby="inputGroup-sizing-sm">
                              </div>
                        </div>
                       
                         
                        <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                        <div class="form-actions"   >
                            
                            <button type="submit" id="submit_provinces" name="submit_provinces" class="btn btn-outline-primary"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                Create Profession </button>
                        </div>
                    </div>
                    </div>
                         
         
                         
         
        
                    </div>  
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                {{-- <button type="button" class="btn btn-primary">Save</button> --}}
            </div>
        </div>
    </div>
</div>
                
            </div>
        </div>




    
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name(En)</th>
                                <th>Name(Ur)</th>
                                <th>Code</th>
                              
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                 
                                <td>Edinburgh</td>
                                <td>داسداسد</td>
                                <td>ABC</td>
                                
                                
                                <td><span class="shadow-none badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{route('edit.Profession',['slug'=>'slug'])}}" class="bs-tooltip" data-toggle="tooltip" 
                                    data-placement="top" title="" data-original-title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit">
                                     <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                        </path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                            </path></svg>
                                            </a>
                                        </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>










@endsection
