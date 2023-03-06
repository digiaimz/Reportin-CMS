
<style>

.show-less {max-height: 403px;  overflow: hidden; }
#show-less-countries{ display: none;}

</style>

<div class="widget widget-account-invoice-two layout-spacing mb-4" style="    background: #fff;">
    <div class="widget-content show-less">

        <?php

            $graph = array (  );

            $country_users = \App\User::select('country', DB::raw('count(*) as total_users'))
                        ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
                        ->groupBy('country')
                        ->get();

            $flag_count = 0;

        foreach ( $country_users as  $users) {

            // iso2

                if( json_decode($users->country)->iso2 != "pk" )
                {

                    array_push($graph , array("lable"=> json_decode($users->country)->name , "value"=>  $users->total_users )  );
                    $flag_count =   $flag_count+1;
                }


                }


                usort($graph, function($a, $b) {
                    return  $b['value']  <=> $a['value'];
                });

                $height = 0;
                $height =   $flag_count * 35  ;
                $height =   $height + 100;


        ?>


        @include('dawa_theme.manage.include.chart.summery'
            ,
        [
        'chart_title' => 'Countries Summary',
        'chart_id' => 'country_statistics',
        'chart_options' => 'country_statistics_option',
        'colors' => \App\Helpers\Helper::get_color(1) ,

            'height' =>  $height


        ]
        )


</div>


<div id="show-more-countries"  style="text-align: center">
<a href="javascript:void(0)">Show More</a>
</div>
<div id="show-less-countries"  style="text-align: center">
<a href="javascript:void(0)">Show Less</a>
</div>



</div>
<script>

$(document).ready(function() {

$('#show-more-countries').click(function() {
        $('.show-less').animate({'max-height' : '1660px'}, 1000);
    $('#show-more-countries').hide();
    $('#show-less-countries').show();

    });
$('#show-less-countries').click(function() {
    $('.show-less').animate({'max-height' : '403px'}, 1000);
    $('#show-more-countries').show();
    $('#show-less-countries').hide();

    });

});

</script>
