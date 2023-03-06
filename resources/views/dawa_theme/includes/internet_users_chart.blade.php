<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
<div class="widget widget-activity-two mb-4" style="height: auto;">

    <div class="widget-heading">
        <h5 class="">Internet Connections</h5>
    </div>

    <style>


    </style>

<div class="widget-content">

        <div class="row">

            <div id="internet_connections"></div>


            <script>


        var internet_connections_options = {
          series: [76, 67, 61, 90],
          chart: {



height: '100%',
width: '100%',
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '30%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            }
          }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
        labels: ['Wifi User', 'Internet Bundel', 'Whatsapp PAckege', 'Youtube Packege'],
        legend: {
          show: true,
          floating: true,
          fontSize: '12px',
          position: 'left',
          offsetX: 0,
          offsetY: 0,
          labels: {
            useSeriesColors: true,
          },
          markers: {
            size: 0
          },
          formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
          },
          itemMargin: {
            vertical: 2
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
                show: false
            }
          }
        }]
        };



        var internet_connections_chart =null;
    $(document).ready(function(){

        internet_connections_chart = new ApexCharts(document.querySelector("#internet_connections"),internet_connections_options);

setTimeout(function(){ $("#internet_connections").html('');  internet_connections_chart.render();

$('.apx-legend-position-left').css("position", "unset");
$('.apx-legend-position-left').css("position", "unset");

}, 700);


});


            </script>


        </div>



    </div>

</div>

