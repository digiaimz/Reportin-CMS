@extends('layouts.dawa_theme')
@section('complein_active')
active
@endsection
@section('complain_aria') aria-expanded="true" @endsection

@section('title')
My-Complains
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}
  {{-- <script src="{{asset('dawa_theme/assets/js/sweetalert.min.js')}}" ></script> --}}

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100%;
    height: 100%;}
    </style>

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@endsection

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
        "pageLength": 7
    } );
</script>



@endsection
@section('content')



<div class="layout-px-spacing">

    <div class="row  " id="cancel-row"  >

        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4  ">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Complain#</th>
                                <th>Title</th>
                                <th>Claim</th>
                                <th>For</th>
                                <th>Date</th>
                                <th>Status</th>

                                <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                          $complains = Auth::user()->complains;
                            ?>

                            @if(count($complains)>0 )

                            @foreach ( $complains as $complain )

                            <tr>
                                <td>Complain#{{$complain->id}}</td>
                                <td>{{$complain->title}}</td>
                                <td>{{$complain->complain}}</td>
                                <td> <u>{{($complain->wabastagan==null)? "N/A" : $complain->wabastagan->name}}</u><br>
                                    <b>Whatsapp#</b> <u>{{($complain->wabastagan==null)? "N/A" : $complain->wabastagan->whatsapp}}</u>
                                </td>
                                <td>{{$complain->created_at}}</td>
                                <td><span class="badge badge-primary">In Progress</span></td>

                                <td>N/A</td>


                            </tr>

                            @endforeach

                            @else
                            <tr>

                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>



                        </tr>
                            @endif



                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>




@endsection
