<div id="{{ $chart_id }}"></div>


<script>

    var profession_summery_categories_get=  [
        <?php



        foreach($graph as $workers)
        {

            echo  "'".$workers ['lable']."' ,";

        }
        ?>

      ];
    var profession_summery_total_categories_get=  [
        <?php

        foreach($graph as $workers)
        {
            echo  "'".$workers ['workers']."' ,";

        }
        ?>

      ];
    var profession_summery_total_categories_get_2=  [
        <?php

        foreach($graph as $workers)
        {
            echo  "'".$workers ['zerdawat']."' ,";

        }
        ?>

      ];

      var colors_get=[
        <?php
        foreach($colors as $workers)
        {
        echo  "'".$workers."' ,";
        }
        ?>
    ];

    var {{ $chart_options }} = {

    series: [{
        data: profession_summery_total_categories_get
        }, {
            data: profession_summery_total_categories_get_2
        }],
      chart: {
      type: 'bar',
      height: {{$height}}
    },
    plotOptions: {
      bar: {
        columnWidth: '70%',
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
        fontSize: '14px',
      fontFamily: '"Titillium Web", sans-serif',
      fontWeight: 'bold',
        colors: ['black']
      },
      formatter: function (val, opt) {


        //   opt.w.globals.labels[opt.dataPointIndex]
if(opt.seriesIndex == 0)
{
    return    "Workers : " + val
}
return    "Wabasta : " + val

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
    },

    yaxis: {
      labels: {
        show: true ,
        style: {
              fontSize: '14px',
              fontFamily: 'Helvetica, Arial, sans-serif',
              fontWeight: 700,
              cssClass: 'apexcharts-yaxis-label',
          },

      }
    },
    title: {
        text: '{{ $chart_title }}',
        align: 'center',
        floating: true
    },
    subtitle: {
        text: ' ',
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
        {{ $chart_id }}.render();

});



</script>


