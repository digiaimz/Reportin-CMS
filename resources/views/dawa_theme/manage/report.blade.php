
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
                                        <th>@lang('DIST')</th>


                                        <th>@lang('WORKERS')</th>
                                        <th>@lang('ZERDAWAT')</th>
                                        <th>@lang('AVG')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>@lang('DIST')</th>


                                        <th>@lang('WORKERS')</th>
                                        <th>@lang('ZERDAWAT')</th>
                                        <th>@lang('AVG')</th>

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
                          ajax: {
                       url: "{{ route('get.stat.report') }}",
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
                          ]
                      });




                    });
                  </script>



