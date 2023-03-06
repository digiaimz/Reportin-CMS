<style>
.main-item {
  padding: 10px;
  background-color: #fff;
  width: 700px;
}

.background-masker {
  background-color: #fff;
  position: absolute;
}

.btn-divide-left {
  top: 0;
  left: 25%;
  height: 100%;
  width: 5%;
}

@keyframes placeHolderShimmer {
  0% {
    background-position: -800px 0
  }
  100% {
    background-position: 800px 0
  }
}

.animated-background {
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-iteration-count: infinite;
  animation-name: placeHolderShimmer;
  animation-timing-function: linear;
  background-color: #f6f7f8;
  background: linear-gradient(to right, #eeeeee 8%, #bbbbbb 18%, #eeeeee 33%);
  background-size: 800px 104px;
  height: 70px;
  position: relative;
}

.static-background {
  background-color: #f6f7f8;
  background-size: 800px 104px;
  height: 70px;
  position: relative;
  margin-bottom: 20px;
}

.shared-dom {
  width: 800px;
  height: 110px;
}
.sub-rect {
  border-radius: 100%;
  width: 70px;
  height: 70px;
  float: left;
  margin: 20px 20px 20px 0;
}
.pure-background {
  background-color: #eee;
}

.css-dom:empty {
  width: 280px;
  height: 220px;
  border-radius: 6px;
  box-shadow: 0 10px 45px rgba(0, 0, 0, .2);
  background-repeat: no-repeat;

  background-image:
    radial-gradient(circle 16px, lightgray 99%, transparent 0),
    linear-gradient(lightgray, lightgray),
    linear-gradient(lightgray, lightgray),
    linear-gradient(lightgray, lightgray),
    linear-gradient(lightgray, lightgray),
    linear-gradient(#fff, #fff);

  background-size:
    32px 32px,
    200px 32px,
    180px 32px,
    230px 16px,
    100% 40px,
    280px 100%;

  background-position:
    24px 30px,
    66px 30px,
    24px 90px,
    24px 142px,
    0 180px,
    0 0;
}
</style>

<div id="{{ $chart_id }}">


<br>
    <div class="animated-background">
        <div class="background-masker btn-divide-left"></div>
      </div>
    <div class="animated-background">
        <div class="background-masker btn-divide-left"></div>
      </div>
    <div class="animated-background">
        <div class="background-masker btn-divide-left"></div>
      </div>

</div>


<script>

    var max_value = "@if(isset($graph[0]['value'])) {{$graph[0]['value']}} @endif";
    if(max_value ==0 || max_value =="")
    {
        max_value =10;
    }

    var profession_summery_categories_get=  [
        <?php


         $count_break = 1;
        foreach($graph as $value)
        {

            echo  "'".$value ['lable']."' ,";

            if($chart_id == 'district_summery' &&   $count_break == 25)
            {
                break;
            }
            $count_break++;

        }
        ?>

      ];
    var profession_summery_total_categories_get=  [
        <?php
        $count_break = 1;
        foreach($graph as $value)
        {
            echo  "'".$value ['value']."' ,";
            if($chart_id == 'district_summery' &&   $count_break == 25)
            {
                break;
            }
            $count_break++;

        }
        ?>

      ];

      var colors_get=[
        <?php
        foreach($colors as $value)
        {
        echo  "'".$value."' ,";
        }
        ?>
    ];

    var {{ $chart_options }} = {
      series: [{
      data: profession_summery_total_categories_get
    }],

      chart: {
      type: 'bar',
      height: {{$height}},
        redrawOnWindowResize: true,
          redrawOnParentResize: true,
          events: {
      dataPointSelection: function(event, chartContext, config) {
         console.log(event);
         console.log(chartContext);
         console.log(config);
      }
    }


    },
    plotOptions: {
      bar: {
        columnWidth: '100%',
        barHeight: '100%',
        distributed: true,
        horizontal: true,
        dataLabels: {
          position: 'bottom'
        },
      },
      area: {
        fillTo: 'origin',
    }
    },
    colors: colors_get,
    dataLabels: {
      enabled: true,
      textAnchor: 'start',
      style: {
        fontSize: '15px',
      fontFamily: '"Titillium Web", sans-serif',
      fontWeight: 'bold',
        colors: ['black']
      },
      formatter: function (val, opt) {
        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
      },

      offsetX: 0,
      dropShadow: {
        enabled: false
      }
    },
    stroke: {
      width: 1,
      colors: ['#fff']
    },
    xaxis: {
      categories: profession_summery_categories_get,
      min: 0,
      max: max_value,
    },

    yaxis: {

      labels: {
        show: false

      }
    },
    title: {
        text: '{{ $chart_title }}  ',
        align: 'center',
        floating: true,
        style: {
      fontSize:  '15px',
      fontWeight:  'bold',
      fontFamily: '"Titillium Web", sans-serif',

        colors: ['black']
    },
    },
    subtitle: {
        text: `{{\App\Helpers\Helper::get_forum_name()}}
        @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
        @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
        @endif `,
        align: 'center',
    },

    legend: {
    show: false
  },
    tooltip: {
      theme: 'dark',
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function () {
            return ''
          }
        }
      }
    }


    };
var {{ $chart_id }} =null;
    $(document).ready(function(){

        {{ $chart_id }} = new ApexCharts(document.querySelector("#{{ $chart_id }}"), {{ $chart_options }});


        setTimeout(function(){  $('#{{$chart_id}}').html(''); {{ $chart_id }}.render(); }, 700);



});



</script>


