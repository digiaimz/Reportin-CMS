
                <div class="widget widget-account-invoice-two layout-spacing " style="    background: #fff;">
                    <div class="widget-content">

                        <?php

                            $graph = array (  );

                            $mwl_total = 0;
                            $mwl_code = null;

                        foreach (\App\Forum::has('filtered_users')->withcount('filtered_users')->orderBy('frm_name', 'ASC')->get() as $forum) {

                            if($forum->id_frm  == 2 )
                            {
                                $mwl_code =$forum->frm_code;
                            }

                           if($forum->id_frm  == 2 || $forum->id_frm  == 7)
                           {
                                  $mwl_total =  $mwl_total + $forum->filtered_users_count ;

                          }
                           else {
                               array_push($graph , array("lable"=> $forum->frm_code, "value"=>$forum->filtered_users_count  )  );
                           }

                                }
                                array_push($graph , array("lable"=> $mwl_code, "value"=>$mwl_total )  );

                                usort($graph, function($a, $b) {
                                    return  $b['value']  <=> $a['value'];
                                });

                        ?>


                        @include('dawa_theme.manage.include.chart.summery'
                         ,
                        [
                        'chart_title' => 'Forum Summary',
                        'chart_id' => 'forum_summery',
                        'chart_options' => 'forum_summery_options',
                        'colors' => \App\Helpers\Helper::get_color(2) ,

                           'height' => 300


                        ]
                        )


            </div>
            </div>
