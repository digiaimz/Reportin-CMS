
<?php

                         $graph = array (  );


     foreach ($districts as $district) {
         array_push($graph , array("lable"=> $district->dist_name ,
          "workers"=> count($district->users)  ,
          "zerdawat"=>   \App\Helpers\Helper::getWorkerInvityCountNew($district->users->pluck('id')->toArray())
          )  );

             }

             usort($graph, function($a, $b) {
                 return  $b['workers']  <=> $a['workers'];
             });


             $height= count($districts)*60;
             if(count($districts) == 1 )
             {
                $height =150;

             }

             $post_fix = (\App\Helpers\Helper::is_forum_level_user())?   "| ".\App\Helpers\Helper::get_forum_name() :"";

     ?>


     @include('dawa_theme.reporting.include.graph'
      ,
     [
     'chart_title' => 'District Summery  '.$post_fix,
     'chart_id' => 'district_summery',
     'chart_options' => 'district_summery_options',
     'colors' => \App\Helpers\Helper::get_color(3) ,

        'height' =>$height

     ]
     )
