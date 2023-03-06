<div class="widget widget-account-invoice-two wid-top fit_display" style="    background: #fff;">
    <div class="widget-content">

<div id="gender_comp">
<div class="animated-background">
    <div class="background-masker btn-divide-left"></div>
  </div>
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
</div>
</div>



@can('View-Gender-Comprasion')

<script>


function getGenderComp()
{

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'GET',
url: "{{ route('get.gender.comp') }}" ,
success:function(data){

 $('#gender_comp').html('');

 renderGraphGenderComp(
     data.worker_percentage_male ,
      data.percentage_male_wabastagan ,
       data.worker_percentage_female ,
        data.percentage_female_wabastagan ,
        data.dignitaries_percentage_male ,
        data.dignitaries_percentage_female
        );

},
            error: function (jqXHR, exception) {
     // var msg = AjaxError(jqXHR, exception);
     //     process_end();
     //     if(msg!= true)
     //     {
     //             alert(msg);
     //     }

 },


});

}


function renderGraphGenderComp(worker_percentage_male , percentage_male_wabastagan ,
worker_percentage_female  , percentage_female_wabastagan  ,
dignitaries_percentage_male , dignitaries_percentage_female
)
{

 var gender_comp_options = {
                   series: [{
                   name: 'Males',
                   data: [ worker_percentage_male , dignitaries_percentage_male,  percentage_male_wabastagan
                   ]
                 },
                 {
                   name: 'Females',
                   data: [worker_percentage_female , dignitaries_percentage_female , percentage_female_wabastagan
                   ]
                 }
                 ],
                   chart: {

             background: '#fff',
                   type: 'bar',
                   height: 350,
                 },
                 colors: ['#008FFB', '#FF4560'],
                 plotOptions: {
                   bar: {
                     horizontal: true,
                     barHeight: '80%',
                   },
                 },

                 dataLabels: {
               enabled: true,
               textAnchor: 'start',
               style: {
                 colors: ['#000000']
               }
               ,
               formatter: function (val, opt) {
               if(val < 0 )
               {
                     var temp = 100 + val;
                     temp = 100 - temp;
                return    temp+"%";
               }
               else
               {
                return  val+"%";
               }

               },
               offsetX: 0,
               dropShadow: {
                 enabled: false
               }
             },
                 stroke: {
                   width: 1,
                colors: ["#fff"]
                 },

                 grid: {
                   xaxis: {
                     lines: {
                       show: false
                     }
                   }
                 },
                 yaxis: {
                   min: -100,
                   max: 100,
                   title: {
                     // text: 'Age',
                   },
                 },
                 tooltip: {
                   shared: false,
                   x: {
                     formatter: function (val) {
                       return val
                     }
                   },
                   y: {
                     formatter: function (val) {
                       return Math.abs(val) + "%"
                     }
                   }
                 },
                 title: {
                   text: 'Vision-2025 Gender Comparison' ,
                   style: {
   fontSize:  '15px',
   fontWeight:  'bold',
   fontFamily: '"Titillium Web", sans-serif',

     colors: ['black']
 }
                 },
      subtitle: {
         text: `{{\App\Helpers\Helper::get_forum_name()}}
     @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
     @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
     @endif `,
     align: 'center',
 },
                 xaxis: {
                   categories: ['Workers', 'Dignitaries', 'Listed'
                   ],
                   title: {
                     text: 'Percent'
                   },
                   labels: {
                     formatter: function (val) {
                       return Math.abs(Math.round(val)) + "%"
                     }
                   }
                 },
 colors: ['#46B5FE', '#FD608C' ]

                 };

                 var gender_comp_chart = null;
                 gender_comp_chart = new ApexCharts(document.querySelector("#gender_comp"), gender_comp_options);
                 setTimeout(function(){  gender_comp_chart.render(); }, 300);
}




                 // var gender_comp_chart = null;
                 $(document).ready(function(){
                 //  gender_comp_chart = new ApexCharts(document.querySelector("#gender_comp"), gender_comp_options);


                 //  setTimeout(function(){  gender_comp_chart.render(); }, 700);
                 getGenderComp();
                 });


             </script>

@endcan
