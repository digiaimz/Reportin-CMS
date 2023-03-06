{{-- total wabastagan  --}}

<div class="widget widget-activity-two mb-4" style="height: auto;">


    <div class="widget-heading" style="    border-bottom: 0px dashed #e0e6ed;">
        <h5 class="">Broadcast List Target  </h5>

    </div>

    <div class="widget-content widget-content-area" style="padding-top:0px;">

    <style>
    #congratulation_target_achive{ }
.lights_blink{width: 12px;
    height: 10px;
    display: block;
    border-radius: 10px;
    float: left;}

.lights_blink:nth-child(2n-1){background:red; animation:bar1 0.5s infinite ease;}

.lights_blink:nth-child(2n){background:yellow;animation:bar2 0.5s infinite ease;}

@keyframes bar1{
0%{background:red}100%{background:yellow}
}

@keyframes bar2{
0%{background:yellow}100%{background:red}
}

h2{clear:both;padding-top:15px; padding-left:15px;font-family:verdana;

font-size:1.25em;}
    </style>



        <style>



            #simple_pie {
          max-width: 250px;
          margin: 0px  ;
        }



    @media only screen and (min-width: 600px)
            {
                #simple_pie {
          max-width: 250px;
          margin: 0px auto ;
        }

#hand-shake{
    margin-left: -45px;
	}


}


        </style>
        {{-- <div class="d-flex justify-content-between">
            <h5 class="" style="font-size:21px;">Broadcast List Target:</h5>
         </div> --}}

         <div id="simple_pie"></div>

             <!-- partial:index.partial.html -->

             @php

                $divide =   $total_wabastagan / 100;
                $dividePercentage =  (int)($divide * 100);


             @endphp

@if( $dividePercentage > 99 )
    <span><b>Congratulations!</b> You have achieved your
        target of this year <b>{{$dividePercentage}} Percent</b>. </span>
        <div style="text-align: center;">
        <img id="hand-shake" loading="lazy" src="{{asset('shake-hand.png')}}"   width="72" height="72" >
        </div>
@endif



    </div></div>
    <script>
  var total_wabastagan=Number("<?php echo $total_wabastagan; ?>");
  var remaining = 0 ;
  if(total_wabastagan < 101)
  {
    remaining = 100 - total_wabastagan ;
  }

        var simple_pie_options = {
          series: [ total_wabastagan ,remaining],
          chart: {
          width: 300,
          type: 'pie',
        }
  ,
        labels: ['Completed', 'Remaning'  ],
        title: {
        text: ' ',
        align: 'left'

    },
    colors: ['#28a745', '#f25a5a' ]
    ,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 330
            },
            legend: {
              position: 'bottom'
            }
          }
        }]

,



dataLabels: {
  enabled: true,
  formatter: function (val, opts) {
      return val + "%"
  },
  textAnchor: 'middle',
  distributed: true,
  offsetX: 300,
  offsetY: 300,
  style: {
      fontSize: '14px',
      fontFamily: 'Helvetica, Arial, sans-serif',
      fontWeight: 'bold',
      colors: undefined
  },
  background: {
    enabled: true,
    foreColor: '#fff',
    padding: 4,
    borderRadius: 2,
    borderWidth: 1,
    borderColor: '#fff',
    opacity: 0.9,
    dropShadow: {
      enabled: false,
      top: 1,
      left: 1,
      blur: 1,
      color: '#000',
      opacity: 0.45
    }
  }
}
        };

        var simple_pie =null;
        $(document).ready(function(){

          simple_pie = new ApexCharts(document.querySelector("#simple_pie"), simple_pie_options);
          simple_pie.render();

});


    </script>


<div   class="row  fit_display"  >



<div   class="col-xl-6 col-lg-6 col-md-6 col-sm-12    ">

   {{-- added workers  --}}
   {{-- added workers  --}}

   <div class="  layout-spacing">
    <div class="widget widget-card-two">
        <div class="widget-content">

            <div class="media">
                <div class="w-img">
                    <img style="border: 0px;border-radius:0%;width: 43px;
                    height: 43px;" src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-add-user-alert-icongeek26-linear-colour-icongeek26.png"/>
                </div>
                <div class="media-body">
                    <h6>Added Workers</h6>
                    <p class="meta-date-time">By Referral Link</p>
                </div>
            </div>
            <?php
               $added_workers = auth::user()->added_Workers_by_refferal()->get();
               $count_added = 1;
            ?>


            <div class="card-bottom-section">
                <h5>{{count($added_workers)}} - Workers Added </h5>
                <div class="img-group">

                    @if(count($added_workers) > 0)
        @foreach ($added_workers as $user )
         <img class="bs-tooltip view_img " data-name="{{$user->name}}  - {{$user->whatsapp}}  "  data-src="{{asset($user->photo)}}" title="{{$user->name}} {{$user->whatsapp}}"
         style="max-width:65px;max-height:65px;cursor:pointer;" src="{{asset($user->photo)}}">

         <?php
         if($count_added == 4)
         {
             break;
         }
                 $count_added++;
         ?>

         @endforeach
         @else
         <img class="bs-tooltip  "  title="No Record Found" style="max-width:65px;max-height:65px; border:0px;"
         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEJklEQVRoge2aSYyMQRTHf8OYaft0j8FFEPuS4S7c7CHDRewXwmUQXK2nsZyIxN1ZnBC7iX3nwGxcMCOxjMQyTJB2eK9ShV7qW7p7iH/ypTpV7/2/V/VVvXr1quE/ehbKYuRKAbOAGcBkYAwwFOgP/AA+Ap1AK9AMXAUua33JkQBWA2cRY9MBn2/AKWAZUFFk2wHoC2wDOhyjvgIXgR1AHTAJSAJ99ElqXR2wE7ikOkb/BbAJGZyiYCHwzDHgDrAOGByCqwpYD9x1+FqBObFYmgUJ4Kjzwnsxv3Ae8MDhPwxUxsgPwHDE8DTwGagHesf9EuXcDHTpu24hDiMWjAaeKnETMDUu4hyoBVqwU21UVMIah/A2MCQqYQAkERedRgZyWFiiBHY6XUf2g2KjP3ATO81CrRmzsJuQza5UqMbOisNBlRdiF3Yx1kQ+1GIdwFxfpb7YfaK+MHaFwhbEpjY8N83t2H2iEC42LMqBh4htW/IJVwLtKjy7sHaFwgLEtg7yfJVV2LCjJ6IM60lX5BI8p0LrimBUWGxAbDydTSAFfEciUp8AsALYh3zmdqCBYKF4WP0k0I0cAaoyCdQhPb3oaUgDf54vGjx1o+pfVvnFmRoPauMOTzLjFNyn3VM3qv5ulT9gKno5jZO0fBTAmN+RjqAbRN/YONFUuB0Zp2WbJ9kxz7pC6LdqOT5T41tkRKo9ySqQOd1O+MUeVn+I2vomU2O3NpYkCRAQldg8AfDr1Pqr4Xbkk5YDSmFIQAzS8oOpcDvyTsvQJ7EiwpzjO02F2xHjrTJ6gh6GCVoa7/VLR5q0nBbhBeVIWucAct5+jhzOPuvvK8B+5HAU5YhQq2VzpkYTolwKQVwF7AFe4Z8u7UB26DCJvUblWJSpMYkNGjMGY1mwCllfxsDHSKfmACOAfvqM0Lq9wBNH/p1y+CKFDRoHZRM6o+TrPQirgBOOQeeRTLwvZgIXHP3j+A3gRpU/lUtopQrd9SC8rbLvgTUe8tmwVjlMyicXyoD7Krs8l2ACG5Xmy1bcQE5rIz2MzYeRynUjj5zJ7rzAI8e1VYXv0/OSD48Q2zb5KCSwud7NhbMrMMwAtxAg4zhflbqwPruUmA58QWwKfJVxBDsCvqF9IVCDRB1p4FAYggSSFkojieRSJLEHIJ4sUhIbZDSasdcKNXFY54kUcI0YrhUMRmM/bQvRYjFfTHfeGctFj8Ew7DTrQnKv5XGROyhHvJNZ2LFevRkksA4gjSSU58fEXYZsdmafMAs79stQF/Own91k7TcgQWdQpJDYyYQdRbmedpFAptdLx4BuJLzeBSwBpiBuu0KfauTSaKnKNGITHu4fBgr6FbKhEsmKn0aOAGH+wnESCQAjdSDOP9UMRv5UMxPJWo5F3PVAbf8IvEZcaTNyWmzESSD8x7+En2IWVCyOWnCWAAAAAElFTkSuQmCC"/>

        @endif
        </div>
                <br>

                <div class="tm-action-btn">
                    <button style="    background-color: #f1f2f3;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border: 1px solid rgba(0, 0, 0, 0.13);"  @if(count($added_workers) > 0) id="view_all_added" @else disabled  @endif class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                </div>
            </div>
        </div>
    </div>
</div>

   {{-- added workers  --}}
   {{-- added workers  --}}
</div>

<div   class="col-xl-6 col-lg-6 col-md-6 col-sm-12    "  >

   {{-- added workers  --}}
   {{-- added workers  --}}

   <div class="  layout-spacing">
    <div class="widget widget-card-two">
        <div class="widget-content">

            <div class="media">
                <div class="w-img">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="32" height="32"
                    viewBox="0 0 172 172"
                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g><path d="M150.5,96.75v34.9375h8.0625c2.96853,0 5.375,-2.40647 5.375,-5.375v-29.5625z" fill="#f2c7c7"></path><path d="M104.8125,126.3125c0,2.96853 2.40647,5.375 5.375,5.375h8.0625v-34.9375h-13.4375z" fill="#f2c7c7"></path><path d="M155.875,16.125v20.15625c-1.16299,-0.87224 -2.57751,-1.34375 -4.03125,-1.34375h-4.03125v-5.375c-20.15625,0 -26.875,-5.375 -26.875,-5.375v10.75h-4.03125c-1.45374,0 -2.86826,0.47151 -4.03125,1.34375v-17.46875c0,-4.4528 3.6097,-8.0625 8.0625,-8.0625h2.6875c0,-4.4528 3.6097,-8.0625 8.0625,-8.0625h10.75c7.42133,0 13.4375,6.01617 13.4375,13.4375z" fill="#494a59"></path><path d="M151.84375,32.25h-6.71875v5.375c0.01159,2.90934 -0.93262,5.74198 -2.6875,8.0625h9.40625c3.71066,0 6.71875,-3.00809 6.71875,-6.71875c0,-3.71066 -3.00809,-6.71875 -6.71875,-6.71875z" fill="#f2c7c7"></path><path d="M123.625,32.25h-6.71875c-3.71066,0 -6.71875,3.00809 -6.71875,6.71875c0,3.71066 3.00809,6.71875 6.71875,6.71875h9.40625c-1.75488,-2.32052 -2.69909,-5.15316 -2.6875,-8.0625z" fill="#f2c7c7"></path><path d="M142.4375,43v13.4375l-8.0625,8.0625l-8.0625,-8.0625v-13.4375c4.77778,3.58333 11.34722,3.58333 16.125,0z" fill="#f2c7c7"></path><path d="M164.09875,69.41812l-8.22375,-4.91812l-13.4375,-8.0625l-8.0625,8.0625l-8.0625,-8.0625l-13.4375,8.0625l-8.22375,4.91812c-3.22647,1.9533 -5.2022,5.44647 -5.21375,9.21813v18.11375h16.125v18.8125h37.625v-18.8125h16.125v-18.11375c-0.01155,-3.77165 -1.98728,-7.26482 -5.21375,-9.21813z" fill="#e6ecff"></path><path d="M147.8125,26.875v10.75c0,7.42133 -6.01617,13.4375 -13.4375,13.4375v0c-7.42133,0 -13.4375,-6.01617 -13.4375,-13.4375v-16.125c0,0 6.71875,5.375 26.875,5.375z" fill="#ffe1e1"></path><path d="M155.875,64.5l-13.4375,-8.0625l-8.0625,8.0625l13.4375,8.0625z" fill="#d0dbf7"></path><path d="M112.875,64.5l13.4375,-8.0625l8.0625,8.0625l-13.4375,8.0625z" fill="#d0dbf7"></path><rect x="43" y="42" transform="scale(2.6875,2.6875)" width="14" height="21" fill="#4294ff"></rect><path d="M142.89438,96.965l-8.51937,5.16l-8.51938,-5.16l3.14438,-19.0275l-2.39187,-8.78812l7.76687,-4.64938l7.76687,4.64938l-2.39187,8.78812z" fill="#4294ff"></path><path d="M126.60813,69.14938l2.39187,8.78812h10.75l2.39187,-8.78812l-7.76687,-4.64938z" fill="#376cfb"></path><path d="M61.8125,169.3125v-75.25h-10.75l18.8125,-24.1875l18.8125,24.1875h-10.75v75.25z" fill="#4294ff"></path><path d="M18.8125,169.3125v-40.3125h-10.75l18.8125,-24.1875l18.8125,24.1875h-10.75v40.3125z" fill="#4294ff"></path><path d="M158.5625,134.375c4.4528,0 8.0625,-3.6097 8.0625,-8.0625v-26.875h2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-18.10031c-0.01346,-4.71654 -2.48713,-9.08419 -6.52525,-11.52131l-20.34975,-12.212v-5.30512c0.4333,-0.3903 0.84595,-0.80295 1.23625,-1.23625h5.4825c3.78452,0.00494 7.20233,-2.26185 8.67,-5.7502c1.46767,-3.48835 0.69846,-7.51677 -1.95125,-10.21892v-16.28088c-0.00889,-8.90191 -7.22309,-16.11611 -16.125,-16.125h-10.75c-4.90038,0.00472 -9.17901,3.31891 -10.40869,8.0625h-0.34131c-5.93706,0 -10.75,4.81294 -10.75,10.75v13.59338c-2.64971,2.70216 -3.41892,6.73057 -1.95125,10.21892c1.46767,3.48835 4.88548,5.75514 8.67,5.7502h5.4825c0.3903,0.4333 0.80295,0.84595 1.23625,1.23625v5.30512l-20.34975,12.212c-4.03812,2.43712 -6.51179,6.80477 -6.52525,11.52131v18.10031c0,1.48427 1.20323,2.6875 2.6875,2.6875h2.6875v26.875c0,4.4528 3.6097,8.0625 8.0625,8.0625h2.6875v32.25h-32.25v-69.875h8.0625c1.02633,-0.00031 1.96288,-0.58514 2.41362,-1.5072c0.45075,-0.92206 0.33698,-2.02033 -0.29319,-2.83042l-18.8125,-24.1875c-0.5285,-0.6225 -1.30384,-0.98133 -2.12044,-0.98133c-0.81659,0 -1.59194,0.35883 -2.12044,0.98133l-18.8125,24.1875c-0.63017,0.81009 -0.74393,1.90836 -0.29319,2.83042c0.45075,0.92206 1.38729,1.50689 2.41362,1.5072h8.0625v69.875h-21.5v-34.9375h8.0625c1.02633,-0.00031 1.96288,-0.58514 2.41362,-1.5072c0.45075,-0.92206 0.33698,-2.02033 -0.29319,-2.83042l-18.8125,-24.1875c-0.5285,-0.6225 -1.30384,-0.98133 -2.12044,-0.98133c-0.81659,0 -1.59194,0.35883 -2.12044,0.98133l-18.8125,24.1875c-0.63017,0.81009 -0.74393,1.90836 -0.29319,2.83042c0.45075,0.92206 1.38729,1.50689 2.41362,1.5072h8.0625v34.9375h-13.4375c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875c0,1.48427 1.20323,2.6875 2.6875,2.6875h166.625c1.48427,0 2.6875,-1.20323 2.6875,-2.6875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875h-13.4375v-32.25zM161.25,126.3125c0,1.48427 -1.20323,2.6875 -2.6875,2.6875h-2.6875v-29.5625h5.375zM131.279,80.625h6.18125l2.46712,14.99088l-5.55237,3.36744l-5.56313,-3.36744zM137.69675,75.25h-6.6435l-1.31956,-4.8375l4.64131,-2.77887l4.64131,2.77887zM138.70725,63.9625l4.14681,-4.14681l8.68869,5.22181l-4.14681,4.14681zM123.625,37.625v-11.70406c6.89889,2.45718 14.17692,3.67898 21.5,3.60931v8.09475c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75zM151.84375,43h-2.28438c0.61784,-1.7249 0.93597,-3.5428 0.94063,-5.375v-2.6875h1.34375c2.2264,0 4.03125,1.80485 4.03125,4.03125c0,2.2264 -1.80485,4.03125 -4.03125,4.03125zM120.9375,13.4375h2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875c0,-2.96853 2.40647,-5.375 5.375,-5.375h10.75c5.93706,0 10.75,4.81294 10.75,10.75v13.57456c-0.44398,-0.07836 -0.89309,-0.12417 -1.34375,-0.13706h-1.34375v-2.6875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875c-18.6405,0 -25.16037,-4.75956 -25.19531,-4.78644c-0.80674,-0.64591 -1.9124,-0.77201 -2.84386,-0.32433c-0.93146,0.44768 -1.52371,1.38981 -1.52332,2.42327v8.0625h-1.34375c-0.45066,0.01289 -0.89977,0.0587 -1.34375,0.13706v-10.88706c0,-2.96853 2.40647,-5.375 5.375,-5.375zM116.90625,43c-2.2264,0 -4.03125,-1.80485 -4.03125,-4.03125c0,-2.2264 1.80485,-4.03125 4.03125,-4.03125h1.34375v2.6875c0.00465,1.8322 0.32278,3.6501 0.94062,5.375zM134.375,53.75c1.8322,-0.00465 3.6501,-0.32278 5.375,-0.94063v2.5155l-5.375,5.375l-5.375,-5.375v-2.5155c1.7249,0.61784 3.5428,0.93597 5.375,0.94063zM125.89594,59.82106l4.14681,4.14144l-8.68869,5.21106l-4.14681,-4.13606zM102.125,78.64969c0.00881,-2.83044 1.49298,-5.45141 3.91569,-6.91494l6.41775,-3.85119l6.579,6.579c0.87243,0.87221 2.22664,1.03844 3.28413,0.40312l2.623,-1.57487l1.30881,4.78912l-3.03956,18.45775c-0.17779,1.08236 0.32003,2.16416 1.25775,2.73319l8.51131,5.15194c0.85574,0.51822 1.92851,0.51822 2.78425,0l8.51131,-5.15194c0.93772,-0.56903 1.43554,-1.65082 1.25775,-2.73319l-3.02881,-18.39325c0.0182,-0.06812 0.03256,-0.13721 0.043,-0.20694v-0.02956l1.26044,-4.61713l2.623,1.57487c1.05748,0.63531 2.41169,0.46908 3.28412,-0.40312l6.579,-6.579l6.41775,3.85119c2.42065,1.46485 3.90264,4.08558 3.91031,6.91494v15.41281h-10.75v-8.0625c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v24.1875h-32.25v-24.1875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v8.0625h-10.75zM110.1875,129c-1.48427,0 -2.6875,-1.20323 -2.6875,-2.6875v-26.875h5.375v29.5625zM21.5,166.625v-37.625c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875h-5.25406l13.31656,-17.12206l13.31656,17.12206h-5.25406c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v37.625zM64.5,166.625v-72.5625c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875h-5.25406l13.31656,-17.12206l13.31656,17.12206h-5.25406c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v72.5625zM137.0625,166.625v-37.625c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v37.625h-13.4375v-51.0625h32.25v51.0625z" fill="#232328"></path></g></g></g></svg>
                </div>
                <div class="media-body">
                    <h6>Promoted Workers</h6>
                    <p class="meta-date-time">From Broadcast List</p>
                </div>
            </div>
            <?php
            $promoted_Workers = auth::user()->promoted_Workers()->get();
            $count_promoted = 1;
         ?>
            <div class="card-bottom-section">
                <h5>{{count($promoted_Workers )}} - Workers Promoted  </h5>
                <div class="img-group">
       @if(count($promoted_Workers) > 0)
        @foreach ( $promoted_Workers as $user )
        <img class="bs-tooltip view_img " data-name="{{$user->name}} - {{$user->whatsapp}} "  data-src="{{asset($user->photo)}}" title="{{$user->name}} {{$user->whatsapp}}"
        style="max-width:65px;max-height:65px;cursor:pointer;" src="{{asset($user->photo)}}">

        <?php
        if($count_promoted == 4)
        {
            break;
        }
                $count_promoted++;
        ?>

        @endforeach
        @else
        <img class="bs-tooltip  "  title="No Record Found" style="max-width:65px;max-height:65px; border:0px;"
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEJklEQVRoge2aSYyMQRTHf8OYaft0j8FFEPuS4S7c7CHDRewXwmUQXK2nsZyIxN1ZnBC7iX3nwGxcMCOxjMQyTJB2eK9ShV7qW7p7iH/ypTpV7/2/V/VVvXr1quE/ehbKYuRKAbOAGcBkYAwwFOgP/AA+Ap1AK9AMXAUua33JkQBWA2cRY9MBn2/AKWAZUFFk2wHoC2wDOhyjvgIXgR1AHTAJSAJ99ElqXR2wE7ikOkb/BbAJGZyiYCHwzDHgDrAOGByCqwpYD9x1+FqBObFYmgUJ4Kjzwnsxv3Ae8MDhPwxUxsgPwHDE8DTwGagHesf9EuXcDHTpu24hDiMWjAaeKnETMDUu4hyoBVqwU21UVMIah/A2MCQqYQAkERedRgZyWFiiBHY6XUf2g2KjP3ATO81CrRmzsJuQza5UqMbOisNBlRdiF3Yx1kQ+1GIdwFxfpb7YfaK+MHaFwhbEpjY8N83t2H2iEC42LMqBh4htW/IJVwLtKjy7sHaFwgLEtg7yfJVV2LCjJ6IM60lX5BI8p0LrimBUWGxAbDydTSAFfEciUp8AsALYh3zmdqCBYKF4WP0k0I0cAaoyCdQhPb3oaUgDf54vGjx1o+pfVvnFmRoPauMOTzLjFNyn3VM3qv5ulT9gKno5jZO0fBTAmN+RjqAbRN/YONFUuB0Zp2WbJ9kxz7pC6LdqOT5T41tkRKo9ySqQOd1O+MUeVn+I2vomU2O3NpYkCRAQldg8AfDr1Pqr4Xbkk5YDSmFIQAzS8oOpcDvyTsvQJ7EiwpzjO02F2xHjrTJ6gh6GCVoa7/VLR5q0nBbhBeVIWucAct5+jhzOPuvvK8B+5HAU5YhQq2VzpkYTolwKQVwF7AFe4Z8u7UB26DCJvUblWJSpMYkNGjMGY1mwCllfxsDHSKfmACOAfvqM0Lq9wBNH/p1y+CKFDRoHZRM6o+TrPQirgBOOQeeRTLwvZgIXHP3j+A3gRpU/lUtopQrd9SC8rbLvgTUe8tmwVjlMyicXyoD7Krs8l2ACG5Xmy1bcQE5rIz2MzYeRynUjj5zJ7rzAI8e1VYXv0/OSD48Q2zb5KCSwud7NhbMrMMwAtxAg4zhflbqwPruUmA58QWwKfJVxBDsCvqF9IVCDRB1p4FAYggSSFkojieRSJLEHIJ4sUhIbZDSasdcKNXFY54kUcI0YrhUMRmM/bQvRYjFfTHfeGctFj8Ew7DTrQnKv5XGROyhHvJNZ2LFevRkksA4gjSSU58fEXYZsdmafMAs79stQF/Own91k7TcgQWdQpJDYyYQdRbmedpFAptdLx4BuJLzeBSwBpiBuu0KfauTSaKnKNGITHu4fBgr6FbKhEsmKn0aOAGH+wnESCQAjdSDOP9UMRv5UMxPJWo5F3PVAbf8IvEZcaTNyWmzESSD8x7+En2IWVCyOWnCWAAAAAElFTkSuQmCC"/>

       @endif
                </div>
                <br>
                <div class="tm-action-btn">
                    <button style="    background-color: #f1f2f3;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border: 1px solid rgba(0, 0, 0, 0.13);"   @if(count($promoted_Workers) > 0) id="view_all_promoted" @else disabled  @endif class="btn">
                        View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                </div>
            </div>
        </div>
    </div>
</div>
   {{-- added workers  --}}
   {{-- added workers  --}}
</div>






</div>




    {{-- total wabastahan --}}


    <div   >



{{-- view Added Workers --}}
{{-- view Added Workers --}}

<div class="modal in" id="view_added_workers" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="    font-weight: 600;" >

                    Total  -  {{count($added_workers )}}

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="text-align:center;padding:0px;">


                <div class="widget widget-table-two" style="padding:18px;">

                    <div class="widget-heading">
                        <h5 class="">Added Workers By Referral Link</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Sr#</div></th>
                                        <th><div class="th-content">Name</div></th>
                                        <th><div class="th-content">WhatsApp</div></th>
                                        <th><div class="th-content" style="    text-align: center;">Register at</div></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                             @foreach ($added_workers as  $user)


                                    <tr>
                                 <td><div class="td-content product-brand">{{$i}}</div></td>
                         <td><div class="td-content customer-name"><img src="{{asset($user->photo)}}" alt="avatar">{{$user->name}}</div></td>
                         <td><div class="td-content product-brand">{{$user->whatsapp}}</div></td>
                         <td style="text-align: center;"><div class="td-content">{{\Carbon\Carbon::parse($user->created_at)->format('d-M-Y')}}</div></td>


                                    </tr>
                                    <?php
                                    $i++;
                                ?>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






                </div>
            </div>
        </div>
    </div>


{{-- view Added Workers --}}
{{-- view Added Workers --}}



{{-- View Promoted Workers --}}
{{-- View Promoted Workers --}}

<div class="modal in" id="view_promoted_workers" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="    font-weight: 600;" >

                    Total  -  {{count($promoted_Workers )}}

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="text-align:center;padding:0px;">


                <div class="widget widget-table-two" style="padding:18px;">

                    <div class="widget-heading">
                        <h5 class="">Promoted invites as Workers</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Sr#</div></th>
                                        <th><div class="th-content">Name</div></th>
                                        <th><div class="th-content">WhatsApp</div></th>
                                        <th><div class="th-content">Invited</div></th>
                                        <th><div class="th-content">Promoted</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                             @foreach ($promoted_Workers as  $user)
 <?php
$old_user =  \App\Wabastagan::where('whatsapp' ,$user->whatsapp )->first();

 ?>

                                    <tr>
                                 <td><div class="td-content product-brand">{{$i}}</div></td>
                       <td><div class="td-content customer-name"><img src="{{asset($user->photo)}}" alt="avatar">{{$user->name}}</div></td>
                     <td><div class="td-content product-brand">{{$user->whatsapp}}</div></td>


                      <td><div class="td-content pricing"><span class="">
                        @if($old_user !=null)
                        {{\Carbon\Carbon::parse($old_user->created_at)->format('d-M-Y')}}
                       @else
                       Deleted
                        @endif

                    </span></div></td>
                      <td><div class="td-content pricing"><span class="">{{\Carbon\Carbon::parse($user->created_at)->format('d-M-Y')}}</span></div></td>

                                    </tr>
                                    <?php
                                    $i++;
                                ?>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






                </div>
            </div>
        </div>
    </div>

<style>
.widget-table-two .table > tbody > tr > td .td-content {
    cursor: pointer;
    font-weight: 500;
    /* letter-spacing: 1px; */
    color: #888ea8;
    font-size: 14px;
}

</style>
{{-- View Promoted Workers --}}
{{-- View Promoted Workers --}}





{{-- view img model  --}}
{{-- view img model  --}}

<div class="modal in" id="viewImg" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="    font-weight: 600;"  >

                    View Image
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <img src="" style="max-width: -webkit-fill-available;"  id="view_img_src" />
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){


$('.view_img').on('click', function(e) {
  $('#view_img_name').html($(this).attr('data-name'));
  $('#view_img_src').attr('src', $(this).attr('data-src'));
  $('#viewImg').modal('show');
});

$('#view_all_promoted').on('click', function(e) {

  $('#view_promoted_workers').modal('show');
});
$('#view_all_added').on('click', function(e) {

  $('#view_added_workers').modal('show');
});


});
</script>

{{-- view img model  --}}
{{-- view img model  --}}



        <div class="widget-content widget-content-area ">


        <style>

            #chart {
          max-width: 650px;
          margin: 0px auto;
        }

        </style>

         <div id="chart">

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
              <div class="animated-background">
                <div class="background-masker btn-divide-left"></div>
              </div>

         </div>
    </div></div>


<script>

    var categories_get=  [
        <?php
        foreach($categories as $category)
        {
        echo "'".$category->category_name."',";
        }
        ?>

      ];
    var total_categories_get=  [
        <?php
        foreach($categories as $category)
        {
        echo  \App\Helpers\Helper::get_total_wabastagan( $wabastagans_temp , $category->cate_id ).",";
        }
        ?>

      ];

      var colors_get=[
'#ffa822',
'#edd2cb',
'#4bb4f2',
'#95beaf',
'#f9f3ab',
'#68cca7',
'#f6d912',
'#d184f8',
'#e3f6f5',
'#edd2cb',
'#f58bc5',
'#bbd4ce',
'#f9c46b',
          '#e0f0ea',
'#95adbe',
'#f9b4ab',
'#dee0e6',
'#3fcdd2',
'#bae8e8',
'#f78282',
'#ffca7a',
          '#84e8e7',

'#cab670',
'#d8f58b',

'#fefcbf',


'#fdebd3',
    ];

    var options = {
      series: [{
      data: total_categories_get
    }],
      chart: {
      type: 'bar',
      height: 380
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        horizontal: true,
        dataLabels: {
          position: 'bottom'
        },
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
      categories: categories_get,
    },

    yaxis: {
      labels: {
        show: false

      }
    },
    title: {
        text: 'Broadcast List Tags',
        align: 'center',
        floating: true
    },
    subtitle: {
        text: ' ',
        align: 'center',
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
var chart =null;
    $(document).ready(function(){

chart = new ApexCharts(document.querySelector("#chart"), options);

setTimeout(function(){ $("#chart").html('');  chart.render(); }, 700);


});



</script>




