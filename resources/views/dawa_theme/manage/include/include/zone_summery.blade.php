@if(Auth::user()->access_type != "District" && Auth::user()->access_type != "Tehsil" )
            <div class="widget widget-account-invoice-two wid-top fit_display" style="    background: #fff;">
                <div class="widget-content">

                    <?php

                              $graph = array (  );


                    $zones =  \App\Zone::withcount('users')->orderBy('zone_name', 'ASC')->get();
                    $flag_count = 0;

                            foreach($zones as $zone)
                            {
                                $name = $zone->zone_name;
                                $count =  $zone->users_count  ;
                                     if($count > 0)
                            {
                                $flag_count =   $flag_count+1;
                                array_push($graph , array("lable"=> $name , "value"=>$count )  );

                            }
                         }


                                        usort($graph, function($a, $b) {
                                return  $b['value']  <=> $a['value'];
                            });
                            $height = 0;



                                $height = $flag_count * 35  ;
                                $height =   $height + 100;


                    ?>


                    @include('dawa_theme.manage.include.chart.summery'
                     ,
                    [
                    'chart_title' => 'Zone Summary ',
                    'chart_id' => 'zone_summery',
                    'chart_options' => 'zone_summery_options',
                    'colors' => \App\Helpers\Helper::get_color(4) ,

                       'height' =>  $height

                    ]
                    )


        </div>
        </div>

    @endif
