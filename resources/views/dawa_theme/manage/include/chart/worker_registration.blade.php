
    <script>

        var options_worker_registration = {
          series: [{
          name: 'Woker Register',
          data: dates
        }]
              ,
          chart: {
          type: 'area',

          stacked: false,
          height: 350,
          zoom: {
            type: 'x',
            enabled: true,
            autoScaleYaxis: true
          },
          toolbar: {
            autoSelected: 'zoom'
          },

        },
        dataLabels: {
          enabled: true
        },


        colors: ['#629BD0', '#F07D2C' ,'#CD5C5C',  '#25D366' , '#ff7b7b' ],
        markers: {
          size: 0,
        },
        title: {
          text: '  Daily Progress Graph  @if(App\Helpers\Helper::is_limted_user()=="yes") | According To Limited Access  @endif  ',
          align: 'left'
        },
        subtitle: {
        text: `Filter: {{\App\Helpers\Helper::get_forum_name()}}
        @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
        @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
        @endif `,
        align: 'left',
    },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.5,
            opacityTo: 0,
            stops: [0, 90, 100]
          },
        },

        xaxis: {
          type: 'datetime',
		   datetimeUTC: true,
		   datetimeFormatter: {
              year: 'yyyy',
              month: "MMM 'yy",
              day: 'dd MMM'
          },
        },


        };

        var chart_options_worker_registration =null;
        $(document).ready(function(){
          chart_options_worker_registration = new ApexCharts(document.querySelector("#worker_registration_chart"), options_worker_registration);
        chart_options_worker_registration.render();
        });

    </script>

@if($is_page == true)

<script>



    function updateWorkerRegistrationGraph(date)
                {
                    $('#loading-msg').show();
                    $('.daily_registration_table_loading').show();
                    $('#daily_registration_table').hide();
                    $('#daily_registration_table_widget').hide();
        var data_var = {  date:date
                      };

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                   type:'POST',
                   url: "{{route('get.worker.registration.graph')}}" ,
                   data: data_var ,
                   success:function(data){

                  console.log(data);

                       if(data.status == "get")
                       {
                        $('#loading-msg').hide();
                        $('.daily_registration_table_loading').hide();
                        $('#daily_registration_table').show();
                        $('#daily_registration_table_widget').show();


      chart_options_worker_registration.updateSeries([


          {
            name: 'Wokers',
            data: data.dates
          },
          {
            name: 'Wabasta',
            data: data.zerdawat
          },
          {
            name: 'Users Hits',
            data: data.login_users
          }
          ,
          {
            name: 'Clips Watched',
            data: data.clips_views
          },
          {
            name: 'Active Users',
            data: data.login_users_unique
          }

        ]);

  $('#daily_registration_table').html(data.view);
  $('#daily_registration_table_widget').html(data.view2);

                       }

                       else
                       {


                       alert( 'Uncaught Error');

                       }

                   } ,
                   error: function (jqXHR, exception) {
            var msg = AjaxError(jqXHR, exception);

                if(msg!= true)
                {
                        alert(msg);
                }

        },
                });



                }
                $(document).ready(function(){
                updateWorkerRegistrationGraph('{{$date_range}}');
            });


                    </script>


@else


<script>



    function updateWorkerRegistrationGraph(date)
                {
                    $('#loading-msg').show();

        var data_var = {  date:date
                      };

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                   type:'POST',
                   url: "{{route('get.worker.registration.graph')}}" ,
                   data: data_var ,
                   success:function(data){

                      console.log(data);

                       if(data.status == "get")
                       {
                        $('#loading-msg').hide();



      chart_options_worker_registration.updateSeries([



        {
            name: 'Wokers',
            data: data.dates
          },
          {
            name: 'Wabasta',
            data: data.zerdawat
          },

          {
            name: 'Active Users',
            data: data.login_users_unique
          },
          {
            name: 'Clips Watched',
            data: data.clips_views
          }
        ]
 );

                       }

                       else
                       {


                       alert( 'Uncaught Error');

                       }

                   } ,
                   error: function (jqXHR, exception) {
            var msg = AjaxError(jqXHR, exception);

                if(msg!= true)
                {
                        alert(msg);
                }

        },
                });



                }
                $(document).ready(function(){
                updateWorkerRegistrationGraph('{{$date_range}}');
            });


                    </script>

@endif
