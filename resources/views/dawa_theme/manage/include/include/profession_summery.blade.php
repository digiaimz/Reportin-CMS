<?php

$graph = array (  );

$professions_list = \App\Profession::has('users_custom')->withcount('users_custom')->orderBy('profession_name', 'ASC')->get() ;
?>

<div class="widget widget-account-invoice-two  wid-top fit_display" @if(!count($professions_list)) hidden @endif style="    background: #fff;">
<div class="widget-content">

<?php



foreach (     $professions_list  as $profession) {

        array_push($graph , array("lable"=> $profession->profession_name, "value"=>$profession->users_custom_count)  );

    }


    usort($graph, function($a, $b) {
        return  $b['value']  <=> $a['value'];
    });

    $height =count( $professions_list) * 33;
    $height =$height +100;
?>


@include('dawa_theme.manage.include.chart.summery'
,
[
'chart_title' => 'Profession Summary ',
'chart_id' => 'profession_summery',
'chart_options' => 'profession_summery_options',
'colors' => \App\Helpers\Helper::get_color(1) ,

'height' => $height

]
)


</div>
</div>
