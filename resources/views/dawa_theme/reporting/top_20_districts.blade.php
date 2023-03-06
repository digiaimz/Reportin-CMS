@extends('layouts.dawa_theme')
@section('top_20_districts')
active
@endsection
{{-- dashboard_aria --}}
@section('top_20_districts_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Top 20 Districts
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




    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>



@endsection
{{-- content --}}
@section('content')

<script>
var forum_name = [];
var worker_values = [];
var wabasta_values = [];
var chartForumName= [];
var is_click =0;
</script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



<style>
h4{
    font-size: 16px;
    font-weight: 700;
}
.layout-top-spacing{
    display: block;
}
    </style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">


        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


            <div class="widget-content widget-content-area br-6">


                <div class="row">

                    <button id="show_graph" hidden type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large</button>

                    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;" >
                                <nav class="breadcrumb-two" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            @lang('Home')
                                        </a></li>
                                        <li class="breadcrumb-item "><a href="#">

                                            @lang('Reporting')
                                        </a></li>

                                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                            @lang('Top 20 Districts Summary') </a></li>
                                    </ol>
                                </nav>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px; ">



                        </div>

                </div>




<h6 style="text-align: center;
font-size: 29px;
font-weight: 700;">Top 20 Districts Summary </h6>



<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
<div class=" " style="height: auto;">

    <div class="widget-heading" style="    text-align: center;">
        <h5 class="">
        @if(\App\Helpers\Helper::is_limted_user()=="yes") | Limited Access @endif
         </h5>
<h6> @if(\App\Helpers\Helper::is_forum_level_user())   {{\App\Helpers\Helper::get_forum_name() }}
  @endif </h6>
    </div>


<div class="widget-content">

        <div class="row">


         {{-- manege report --}}
         {{-- manege report --}}

<style>
    .table > tbody > tr > td {
        border: none;
        color: #000000;
        font-size: 13px;

    }
    .aaa{
        padding: 9px;
        margin-right: 0px;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: -17px;

    }
    .center_{
        text-align: center;
    }
    </style>

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
                <div class="col-xl-12 col-lg-12 col-sm-12   ">
                    <div class=" ">
                        <div class="table-responsive mb-4  ">

                            <table class="table sssss table-bordered data-table">
                                <thead>
                                    <tr style="    background: rgb(0 0 0 / 7%);">
                                        <th>@lang('DISTRICT')</th>


                                        <th>@lang('WORKERS')</th>
                                        <th>@lang('ZERDAWAT')</th>
                                        <th>@lang('AVG')</th>
                                        <th class="center_">@lang('IN-ACTIVE WORKERS')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>@lang('DISTRICT')</th>


                                        <th>@lang('WORKERS')</th>
                                        <th>@lang('ZERDAWAT')</th>
                                        <th>@lang('AVG')</th>
                                        <th class="center_">@lang('IN-ACTIVE WORKERS')</th>

                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>


                <script type="text/javascript">
                    $(function () {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                      });

                      var table = $('.sssss').DataTable({
                        dom: '<"row"<"col-md-12"<"row"<"col-md-8"B><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-12"i><"col-md-12"p>>> >',
            buttons: {
                buttons: [

                    { extend: 'copy', className: 'btn aaa' },
                    { extend: 'excel', className: 'btn  aaa ' },
                    { extend: 'print', className: 'btn aaa' }
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
            "lengthMenu": [ 20, 50 ,100 , 500],
            "pageLength": 20,
                          processing: true,
                          serverSide: false,
                          "order": [[ 1, "desc" ]],
                          ajax: {
                       url: "{{ route('get.stat.report.full.page') }}",
                       type: 'GET',
                            },
                        deferRender: true,
                          columns: [

                          {data: 'dist_name', name: 'dist_name'},
                          {data: 'workers', name: 'workers'},
                          {data: 'zerdawat', name: 'zerdawat'},
                          { data: 'zerdawat' ,
              render: function(data, type, full, meta){

                  var workers = Number(full.workers);
                  if(workers == 0)
                  {
                    workers = 1;
                  }
                  var zerdawat = Number(full.zerdawat);
                  if(zerdawat == 0)
                  {
                    zerdawat = 0;
                  }
                        return  "<span class='badge badge-info'>"+ (Number(zerdawat) / Number(workers )).toFixed(2) +"</span>"  ;
                        }
                        },
                         {data: 'inactive', name: 'inactive' , className: "center_"},
                          ]
                      });




                    });
                  </script>




         {{-- manege report --}}
         {{-- manege report --}}


        </div>



    </div>
</div>






            </div>
        </div>

    </div>

    </div>





@endsection
