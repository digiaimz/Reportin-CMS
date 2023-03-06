@extends('layouts.dawa_theme')
@section('district_wise')
active
@endsection
{{-- dashboard_aria --}}
@section('district_wise_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
District-Wise Summery
@endsection


{{-- loader --}}
@section('loader')
<div id="load_screen" hidden> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->

    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}" ></script>
<script>
    $(document).ready(function() { $(".select").select2(); });
</script>

    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>



@endsection
{{-- content --}}
@section('content')


<script>
    var forum_name = [];
    var worker_values = [];
    var wabasta_values = [];
    var chartForumName= [];
    var is_click =0;
    </script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>




<style>
h4{
    font-size: 16px;
    font-weight: 700;
}
.layout-top-spacing{
    display: block;
}
    </style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


            <div class="widget-content widget-content-area br-6">


                <div class="row">
                    <button id="show_graph" hidden type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large</button>

                    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px;" >
                                <nav class="breadcrumb-two" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            @lang('Home')
                                        </a></li>
                                        <li class="breadcrumb-item "><a href="#">

                                            @lang('Reporting')
                                        </a></li>
                                        <li class="breadcrumb-item "><a href="{{route('reporting.zone.wise')}}">

                                            @lang('Zone Summary')
                                        </a></li>

                                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                            @lang('District Summary') </a></li>
                                    </ol>
                                </nav>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12  " style="padding: 0px; ">


                     &nbsp;&nbsp;&nbsp;

                     <?php
                      $name = "";

                     ?>

                     <script>

                     function gotoPage()
                     {
                          window.location = "{{route('reporting.district.wise')}}/"+$('#zone_id').val();
                     }

                     </script>


                     <select id="zone_id" onchange="gotoPage()" class="select">
                         @foreach ($zones  as  $zone)

                         <?php

                    if($zone->id_zone == $id)
                    {

                        $name = $zone->zone_name;
                    }

                     ?>

                         <option  @if($zone->id_zone == $id) selected @endif value="{{$zone->id_zone }}"> {{ $zone->zone_name }} </option>

                         @endforeach


                     </select>


                        </div>

                </div>





<h6 style="text-align: center;
font-size: 29px;
font-weight: 700;">District-Wise Summary   </h6>
<?php

$grand_total_workers = [];
$grand_total_wabasta = [];

?>

                <table id="reporting_table"   style="width:100%;text-align:center; font-size: 18px;font-family: Calibri;" border="1"  cellpadding="9">
                    <thead style="border: 1px solid black;  ">
                        <?php

                        $forums = \App\Forum::whereIN('id_frm' , \App\Helpers\Helper::get_forums_access() )->where('frm_shown' , 1)->get();
                        $count_is_one = 1;
                        if(count($forums) > 1 ){$count_is_one = 0;}

                         ?>
                        <tr  style="    background-color: rgba(128, 128, 128, 0.24);">
                            <th colspan="10"  >

                               Zone: {{   $name }} </th>




                        </tr>
                        <tr  style="      background-color: rgb(223 223 223); position: sticky;
                        top: 55px ;">
                            <th>

                                Districts </th>
                            <th> </th>
                            @foreach ($forums as $forum )

                            <?php

                            array_push($grand_total_workers, 0 );
                            array_push($grand_total_wabasta, 0 );
                        ?>


                            <script>
                                forum_name.push('{{$forum->frm_code}}');
                                chartForumName.push('{{$forum->frm_code}}');
                                </script>

                            <th style="  ">{{$forum->frm_code}}</th>

                            @endforeach
                            <?php

                                array_push($grand_total_workers, 0 );
                                array_push($grand_total_wabasta, 0 );
                            ?>
                            <script>
                                forum_name.push('Total');
                                 </script>
                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach (\App\District::with('wabastas', 'workers' )
                        ->where('id_zone' , $id)
                        ->orderBy('dist_name')  ->get() as $district )

                        <tr>
                            <?php
                              $total  = 0;


                            ?>
                            <th rowspan="2">
                                <a target="_blank" href="{{route('reporting.tehsil.wise' , ['id'=> $district->id_dist])}}">
                                {{ $district->dist_name }}
                                </a>

                                <br>

                                <span data-name="{{$district->dist_name}}" class="badge badge-light view-graph mt-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>

                                View Graph

                                </span>
                            </th>
                            <td> @lang('Workers') </td>
                            <?php
                            $i=0;
                            ?>
                        @foreach ($forums as $forum )

                        <?php





                        $district_workers = $district->workers->filter(function ($value, $key)use($forum) {

                           if($value->id_forum  == $forum->id_frm  )
                           {
                                  return true;
                                }
                                return false;

                        });

                        $district_workers->all();

                        $total_count = count($district_workers);
                        $total =     $total +    $total_count ;

                        $grand_total_workers[$i] =  $grand_total_workers[$i] +  $total_count;
                         $i++;

                                                ?>

                         <td data-workers-count="{{$total_count}}" data-workers="{{number_format($total_count) }}">{{number_format($total_count)}}</td>

                        @endforeach
                        <?php
          $grand_total_workers[$i] =  $grand_total_workers[$i] +  $total;
                        ?>
                        <th  data-workers-count="{{$total}}"  data-workers="{{number_format($total) }}" >{{ number_format($total)}}</th>
                    </tr>
                    <tr  style="background-color: rgb(117 116 116 / 10%);">
                        <?php
                              $total  = 0;


                            ?>
                        <td> @lang('Wabasta') </td>
                        <?php
                        $i=0;
                        ?>
                        @foreach ($forums as $forum )
                        <?php



                    $district_wabastas = $district->wabastas->filter(function ($value, $key)use($forum) {

                    if($value->id_forum_user  == $forum->id_frm  )
                    {
                            return true;
                            }
                            return false;

                    });

                    $district_wabastas->all();

                    $total_count = count($district_wabastas);
                    $total =     $total +    $total_count ;

                    $grand_total_wabasta[$i] =  $grand_total_wabasta[$i] +  $total_count;
                    $i++;
                                                ?>

                        <td data-wabasta-count="{{$total_count}}" data-wabasta="{{number_format($total_count) }}" >{{number_format($total_count) }}</td>

                        @endforeach
                        <?php
          $grand_total_wabasta[$i] =  $grand_total_wabasta[$i] +  $total;
                        ?>
                        <th data-wabasta-count="{{$total}}"  data-wabasta="{{number_format($total) }}" >{{ number_format($total)}}</th>
                    </tr>
                        @endforeach


                        {{-- grand total  --}}
                        {{-- grand total  --}}

                        <tr style="border-top: 2px solid black;
                        border-right: 2px solid black;
                        border-left: 2px solid black; ">

                            <th rowspan="2">
                                Total
                                <br>

                                <span data-name=" Of {{ $name }} " class="badge badge-light view-graph mt-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>

                            </th>
                            <th> @lang('Workers') </th>
                        @foreach ($grand_total_workers as $value )



                        <th  data-workers-count="{{$value}}"  data-workers="{{number_format($value) }}"  > {{ number_format($value) }}</th>

                        @endforeach

                    </tr>
                    <tr style="border-bottom: 2px solid black;
                    border-right: 2px solid black;
                    border-left: 2px solid black;background-color: rgb(117 116 116 / 10%);">


                        <th> @lang('Wabasta') </th>
                    @foreach ($grand_total_wabasta as $value )


                    <th  data-wabasta-count="{{$value}}"  data-wabasta="{{number_format($value) }}"  > {{ number_format($value) }}</th>

                    @endforeach

                </tr>



                    </tbody>

                </table>







            </div>
        </div>

    </div>

    </div>



<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">

          <div class="modal-body">
            <button style="    position: absolute;
            right: 12px;
            top: 5px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
<br>
            <div class="row">

                <div class="col-md-4" style="border: 1px solid #80808033;padding:10px; 0px">

                    <h6 style="   text-align:center; font-weight: 700;">District: <span class="name_of_selection"></span></h6>

                    <table  style="width:100%;text-align:center;  " border="1"  cellpadding="3" >
                        <thead>
                           <tr>
                               <th>Forum</th>
                               <th>Workers</th>
                               <th>Wabasta</th>
                           </tr>
                        </thead>
                        <tbody id="graph_body">



                        </tbody>
                    </table>

                </div>
                <div class="col-md-8"  style="border: 1px solid #80808033;padding:10px 0px; ">

                    <div id="chart">
                    </div>


                </div>


            </div>



          </div>


      </div>
    </div>
</div>



<style>
.view-graph{
cursor: pointer;
}
</style>

<script>

    // view chart
    // view chart



    var options = {
            series: [{
            name: 'Workers',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
          }, {
            name: 'Wabasta',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
          } ],
            chart: {
            type: 'bar',
            height: 300
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          plotOptions: {
            bar: {
              dataLabels: {
                position: 'top', // top, center, bottom
              },
            }
          },
          colors: ['#4473C5', '#EC7E31' ],
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return val ;
            },
            offsetY: -20,
            style: {
              fontSize: '12px',
              colors: ["#304758"]
            }
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: chartForumName,
          },

          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function (val) {
                return  val ;
                // return "$ " + val + " thousands"
              }
            }
          }
          };
          var chart = null;

   $(document).ready(function(){
    chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();

   });


    // view chart
    // view chart

      $('.view-graph').click(function(){
          $('.name_of_selection').html( $(this).attr('data-name'));

   worker_values = [];
   wabasta_values = [];

   var tr1 = $(this).parent().parent();
   var tr2= tr1.next();



  var table = "";
  for(var i=0 ; i < forum_name.length ; i++)
     {
      worker_values.push(tr1.children().eq(i+2).attr('data-workers-count'));
      wabasta_values.push(+tr2.children().eq(i+1).attr('data-wabasta-count'));
      if(i+1 ==  forum_name.length )
      {
        table=table + "<tr>";
         table= table + "<th>"+forum_name[i]+"</th>";
         table= table + "<th>"+tr1.children().eq(i+2).attr('data-workers')+"</th>";
         table= table + "<th>"+tr2.children().eq(i+1).attr('data-wabasta')+"</th>";
         table=table + "</tr>";
      }
      else
      {
        table=table + "<tr>";
         table= table + "<td>"+forum_name[i]+"</td>";
         table= table + "<td>"+tr1.children().eq(i+2).attr('data-workers')+"</td>";
         table= table + "<td>"+tr2.children().eq(i+1).attr('data-wabasta')+"</td>";
         table=table + "</tr>";
      }

     }



       $('#graph_body').html(table);

       worker_values.pop();
       wabasta_values.pop();

       $('#show_graph').click();


       chart.updateSeries([{
            name: 'Workers',
            data:  worker_values
          }, {
            name: 'Wabasta',
            data:  wabasta_values
          } ]);

  if(is_click == 0)
  {
          setTimeout(function(){  $('#chart').html('');
       chart.render(); }, 300);
       is_click=1;
  }




      });




  </script>

@if($count_is_one == 1)
<script>
      $(document).ready(function(){
     $("#reporting_table th:last-child, #reporting_table td:last-child").remove();
      });
</script>
@endif








@endsection
