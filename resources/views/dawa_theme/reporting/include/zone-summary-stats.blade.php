<div class="row analytics">

    <style>
              .wid-top{
                  margin-top: 20px;
              }
              .layout-px-spacing > .row
  {
      display:block;
  }

              </style>

  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >



              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12   layout-spacing" style="margin: 0px 20px 0px 46px;">
                  <div class="widget widget-account-invoice-two" style="    background: #fff;">
                      <div class="widget-content"  >
                          <div style="margin-left:50px;">
                              <h6 style="    font-size: 17px;
                              display: block;
                              color: #0e1726;
                              font-weight: 600;
                              margin-bottom: 0;">Zone Summary Stats
                                 @if(App\Helpers\Helper::is_forum_level_user())   | {{App\Helpers\Helper::get_forum_name() }}  @endif

                              </h6>

                              <div style="width: 40%;">

                              <select id="zone_id_select" class="form-control basic" style="width: 40%;">
                                <option @if($zone_id == 0) selected @endif  value="0"> Select Zone </option>
                                @foreach ( \App\Zone::get() as $zone )

                                <option @if($zone_id == $zone->id_zone ) selected @endif  value="{{$zone->id_zone}}" >{{$zone->zone_name}}</option>

                                  @endforeach
                              </select>

                              <script>
                              $("#zone_id_select").change(function(){
                                $('.bg-overlay').show();
                  $('.se-pre-con').show();

                                window.location.href = "{{route('reporting.zone.summery.stats')}}/"+$('#zone_id_select').val();

                                        });
                              </script>

                              </div>


                          </div>
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
                              </style>




<div class="table-responsive mb-4  ">

    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
            <tr style="    background: rgb(0 0 0 / 7%);">
                <th><b>District</b><br>Tehsil</th>
                <th>Designations</th>
                <th>Filled</th>
                <th>Vacant</th>
                <th>Workers</th>
                <th>Wabasta</th>
                <th>UC Added</th>
                <th>RF Added</th>

            </tr>

        </thead>


        <tbody>

            @php


            $designations = \App\Designation::with(  'worker'  )
            ->whereIN('forum_id' , \App\Helpers\Helper::get_forums_access() )
            ->where('level', 'Tehsil'    )->count();

            $designations_district = \App\Designation::with(  'worker'  )
            ->whereIN('forum_id' , \App\Helpers\Helper::get_forums_access() )
            ->where('level', 'District'    )->count();

            $designations_district_ids = \App\Designation::with(  'worker'  )
            ->whereIN('forum_id' , \App\Helpers\Helper::get_forums_access() )
            ->where('level', 'District'    )->pluck('id')->toArray();

            $designations_ids = \App\Designation::with(  'worker'  )
            ->whereIN('forum_id' , \App\Helpers\Helper::get_forums_access() )
            ->where('level', 'Tehsil'    )->pluck('id')->toArray();

            @endphp
@foreach (\App\District::whereIN('id_zone' , array($zone_id))->with('tehsils')->orderBy('dist_name', 'ASC')->get() as  $district)
<?php

$rows_htnml = "";
$designation_total = 0;
$filed_total = 0;
$worker_total = 0;
$wabasta_total = 0;
$uc_total = 0;
$ra_total = 0;

foreach ($district->tehsils as  $tehsil)
{

$tehsil_ =  \App\Tehsil::where('id_tsl' , $tehsil->id_tsl   )->withcount('users' , 'wabastas' , 'users_uc_added' , 'users_rafaqat_added')->first();

$filled = \App\PlaceOfDesignation::where('place_id'  , $tehsil->id_tsl   )
->whereIN('designation_id' ,  $designations_ids)
->count();

$left = ((int)$designations - (int)$filled);

$rows_htnml  = $rows_htnml .'
<tr >
    <td>'.$tehsil->tsl_name.'</td>
    <td>'.$designations.'</td>
    <td>'.$filled .'</td>
    <td>'.$left.'</td>
    <td>'.$tehsil_->users_count.'</td>
    <td>'.$tehsil_->wabastas_count.'</td>
    <td>'.$tehsil_->users_uc_added_count.'</td>
    <td>'.$tehsil_->users_rafaqat_added_count.'</td>

</tr>';



$worker_total = $worker_total  + $tehsil_->users_count;
$wabasta_total = $wabasta_total  + $tehsil_->wabastas_count;
$uc_total = $uc_total  + $tehsil_->users_uc_added_count;
$ra_total = $ra_total  + $tehsil_->users_rafaqat_added_count;



}

$filed_total =\App\PlaceOfDesignation::where('place_id'  , $district->id_dist    )
->whereIN('designation_id' ,  $designations_district_ids)
->count();

$designation_total = $designations_district;



?>






<tr style="border-bottom: 1px slid  black;" >
    <td><b>{{$district->dist_name }}<b></td>
    <td><b>{{$designation_total}}<b></td>
    <td><b>{{$filed_total}}<b></td>
    <td><b>{{$designation_total - $filed_total}}<b></td>
    <td><b>{{$worker_total}}<b></td>
    <td><b>{{$wabasta_total}}<b></td>
    <td><b>{{$uc_total}}<b></td>
    <td><b>{{$ra_total}}<b></td>

</tr>
{!! $rows_htnml  !!}



@endforeach
<tfoot>
    <tr style="    background: rgb(0 0 0 / 7%);">
        <th><b>District</b><br>Tehsil</th>
        <th>Designations</th>
        <th>Filled</th>
        <th>Vacant</th>
        <th>Workers</th>
        <th>Wabasta</th>
        <th>UC Added</th>
        <th>RF Added</th>

    </tr>

</tfoot>

        </tbody>

    </table>

    <style>
    .table > tbody > tr > td {
    border: none;
    color: #000000;
    font-size: 16px;
}
    </style>

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
"order": [],
"stripeClasses": [],
"pageLength": 500
} );
</script>










              </div>
              </div>
              </div>









      </div>
