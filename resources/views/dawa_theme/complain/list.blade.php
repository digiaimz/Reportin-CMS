@extends('layouts.dawa_theme')
@section('complein_active')
active
@endsection
@section('complain_aria') aria-expanded="true" @endsection

@section('title')
CDR Report
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
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100%;
    height: 100%;}

    .layout-px-spacing{
        width: 100%;
    }
 
.table > tbody > tr > td {
 
    color: black;

}

#cdr-table .badge-primary {
  color: #1b55e2;
  border: 2px dashed #1b55e2;
}
#cdr-table  .badge-warning {
  color: #e2a03f;
  border: 2px dashed #e2a03f;
}
#cdr-table  .badge-success {
  color: #3fe251;
  border: 2px dashed #3fe251;
}
#cdr-table .badge {
  background: transparent;
}
    </style>

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@endsection

@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
  <!-- JS --> 
<script>
    $(document).ready(function() {
        $('#cdr-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("cdr.data") }}',
                data: function (d) {
                    d.dcontext = $('#dcontext-filter').val();
                    d.src = $('#src-filter').val();
                    d.dst = $('#dst-filter').val();
                    d.duration = $('#duration-filter').val();
                    d.disposition = $('#disposition-filter').val();
                    d.recordingfile = $('#recordingfile-filter').val();
                }
            }, 
            columns: [
                {
    data: 'dcontext',
    name: 'dcontext',
    render: function(data, type, full, meta) {
        if (data === 'from-trunk') {
            return '<span class="shadow-none badge badge-warning">Incoming Call</span>';
        }   else {
            return '<span class="shadow-none badge badge-success">Outgoing Call</span>';
        }
    }
},

                                                    
                { data: 'src', name: 'src' },
                { data: 'dst', name: 'dst' },
                { data: 'duration', name: 'duration' },
                { data: 'disposition', name: 'disposition' },
                { 
                    data: 'recordingfile', 
                    name: 'recordingfile',
                    render: function(data, type, full, meta) {
        
   return `<div style="text-align:center;"><svg style="cursor:not-allowed;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg><span class="icon-name">  </span>
   &nbsp;
   <svg  style="cursor:not-allowed;"   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg><span class="icon-name"> </span>
   </div>
   `;    
    }
                
                }
            ]
            , ordering: true,
            dom: '<"row"<"col-md-12"<"row"<"col-md-3"B><"col-md-2"l><"col-md-3"i><"col-md-4"p> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [ 
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        paging: true,
        pageLength: 25,
        searching: false,
        lengthMenu: [[10, 25, 50 , 100 , -1], [10, 25, 50 , 100 , "All"]],
        "language": {
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries"
        }
        });

        $('#dcontext-filter').on('change', function() {
    table.column('dcontext').search($(this).val()).draw();
});
        // Apply filters on keyup event
        $('#src-filter, #dst-filter, #duration-filter, #disposition-filter, #recordingfile-filter').on('keyup', function() {
            $('#cdr-table').DataTable().draw();
        });
    });
</script>




@endsection
@section('content')



<div class="layout-px-spacing">

    <div class="row  " id="cancel-row"  >

        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Home
                        </a></li>

                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                       CDR Report   </a></li>
                    </ol>
                </nav>
                <div class="table-responsive mb-4  ">








                    <div class=" "> 
                        <table id="cdr-table" class="table table-hover non-hover"  style="width:100%">
                            <thead>
                                <tr>
                                    <th>Call Type</th>
                                    <th>Caller ID</th>
                                    <th>Destination</th>
                                    <th>Call Duration </th>
                                    <th>Call Status</th>
                                    <th>Recording File</th>
                                </tr>
                                <tr>
                                    <th><select class="form-control form-control-sm" id="dcontext-filter">
                                        <option value="">All</option>
                                        <option value="from-trunk">Incoming Call</option>
                                        <option value="else">Outgoing Call</option>
                                    </select></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Filter" id="src-filter"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Filter" id="dst-filter"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Filter" id="duration-filter"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Filter" id="disposition-filter"></th>
                                    <th><input disabled type="text" class="form-control form-control-sm" placeholder="Disabled" id="recordingfile-filter"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                
                     
                    






                    
                </div>
            </div>
        </div>

    </div>

    </div>




@endsection
