
                        <div class="table-responsive mb-4  ">

                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr style="    background: rgb(0 0 0 / 7%);">
                                        <th>Dist</th>


                                        <th>Workers</th>
                                        <th>@lang('ZERDAWAT')</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    @foreach ( $districts as  $district )

                                    <tr>
                                    <td>{{$district->dist_name}} <br> <span style="    font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;
                                        font-size: 18px;"> {{$district->dist_name_ur}} </span></td>


                                    <td>{{count($district->users)}}</td>
                                    <td>{{\App\Helpers\Helper::getWorkerInvityCountNew($district->users->pluck('id')->toArray())}}</td>
                                    </tr>


                                    @endforeach






                                </tbody>
                                <tbody>
                                    <tr>
                                        <th>DIST</th>


                                        <th>WORKERS</th>
                                        <th>@lang('ZERDAWAT')</th>


                                    </tr>
                                </tbody>
                            </table>

                        </div>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-8"B><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-12"i><"col-md-12"p>>> >',
        buttons: {
            buttons: [

                { extend: 'copy', className: 'btn aaa' },

                { extend: 'excel', className: 'btn  aaa '  },
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
        "pageLength": 10
    } );
</script>
