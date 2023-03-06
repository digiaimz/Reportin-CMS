{{-- total wabastagan  --}}

<div class="widget widget-activity-two mb-4" style="height: auto;">


<div class="widget-heading" style="    border-bottom: 0px dashed #e0e6ed;">
<h5 class="">Countries Comparison  </h5>

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

        $pakistani = \App\User::where('country' , '{"name":"Pakistan (‫پاکستان‬‎)","iso2":"pk","dialCode":"92","priority":0,"areaCodes":null}')
                    ->count();

        $abroad = \App\User::where('country' , '<>' , '{"name":"Pakistan (‫پاکستان‬‎)","iso2":"pk","dialCode":"92","priority":0,"areaCodes":null}')
                    ->count();


        $pakistani_number = number_format($pakistani);
        $abroad_number = number_format($abroad);


        @endphp


</div></div>
<script>
var pakistani=Number("<?php echo $pakistani; ?>");
var abroad = Number("<?php echo $abroad; ?>");
var pakistani_number="<?php echo $pakistani_number; ?>";
var abroad_number = "<?php echo $abroad_number; ?>";

var simple_pie_options = {
    series: [ pakistani ,abroad],
    chart: {
    width: 300,
    type: 'pie',
}
,
labels: ['Pakistan: '+ pakistani_number, 'Abroad: ' + abroad_number ],
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
return   Math.ceil(val) + "%"
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




