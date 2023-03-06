@php
 $worker_count= 0;
 $zerdawat_count= 0;
  foreach ( $tables as $table )
      {
  $worker_count= $worker_count +  $table[1];
     $zerdawat_count= $zerdawat_count +  $table[2];
     }
@endphp
<div class="row layout-spacing mt-4">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12    ">
    @include('dawa_theme.includes.total_widget' ,

    ["en_title" => "Workers" ,
     "ur_title" => "
     <span>
        کارکنان
     </span>"
     ,
     "total" =>  $worker_count ,
     "svg" => '
     <svg style="height: 24px;width:24px; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
     ',
      "link" => "#"
    ] )
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12   ">
    @include('dawa_theme.includes.total_widget' ,

    ["en_title" => "Wabasta" ,
     "ur_title" => "
     <span>
        زیر دعوت
          </span>"
     ,
     "total" =>  $zerdawat_count ,
     "svg" => '
     <svg style="height: 24px;width:24px; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
      "link" => "#"
    ] )
</div>
</div>
