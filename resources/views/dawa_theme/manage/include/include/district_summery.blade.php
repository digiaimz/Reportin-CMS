@if( Auth::user()->access_type != "Tehsil" )

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing fit_display">
    <div class="widget widget-account-invoice-two mb-4" style="    background: #fff;">
        <div class="widget-content">

            @if(Auth::user()->access_type != "District" && Auth::user()->access_type != "Tehsil" )
            <div class="row">
                <div class="col-12" style="display: flex;     justify-content: space-between;" >

                    <a class="badge badge-danger" style="cursor: pointer;"
                     href="{{route('reporting.district.summery')}}"> @Lang('View All') </a>
                     &nbsp; &nbsp; &nbsp;
                     <a class="badge badge-danger" style="cursor: pointer;"
                     href="{{route('forum.comparison.reporting.district.summery')}}"> @Lang('Forum Comparison') </a>
                </div>
            </div>
            @endif




             <?php

                                $graph = array (  );
  $districts =     \App\District::has('users')->withcount('users')->orderBy('dist_name', 'ASC')
                        ->where('id_dist', '<>', 1 )
                        ->where('id_dist', '<>', 2 )
                       ->get() ;
            foreach ( $districts as $district) {
                array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->users_count  )  );

                    }

                    usort($graph, function($a, $b) {
                        return  $b['value']  <=> $a['value'];
                    });

                    // $height = count($districts) * 31;
                    // $height =  $height + 100;
                    $height = 0;
                    if(count($districts) > 25)
                    {
                        $height = 25 * 31;
                    $height =  $height + 100;
                    }
                    else {
                        $height = count($districts) * 31;
                    $height =  $height + 100;
                    }



            ?>


            @include('dawa_theme.manage.include.chart.summery'
             ,
            [
            'chart_title' => 'District Summary',
            'chart_id' => 'district_summery',
            'chart_options' => 'district_summery_options',
            'colors' => \App\Helpers\Helper::get_color(3) ,

               'height' => $height


            ]
            )


</div>
</div>


@can('view-stat-report')
           @if(Auth::user()->access_type != "Tehsil" )
           @include('dawa_theme.manage.statReport')
           @endif
           @endcan

</div>

   @endif
