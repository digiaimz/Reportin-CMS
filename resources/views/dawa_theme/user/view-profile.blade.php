@extends('layouts.dawa_theme')
@section('dashboard_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
My-Profile
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
<div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
<link href="{{asset('dawa_theme/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >

@endsection

@section('pagelevel_scripts_footer')

@endsection
@section('content')



{{--  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}


<?php $country_user = json_decode(Auth::user()->country );

?>

<style>
.user-profile .widget-content-area .user-info-list ul.contacts-block {
border: none;
max-width: 293px;
margin: 36px auto;
}
</style>
<?php
$progress_complete =0;
if(Auth::user()->name!=null ||
trim(Auth::user()->name)!='' )
{ $progress_complete = $progress_complete+5; }
if(Auth::user()->fathername!=null ||
Auth::user()->fathername!='' )
{ $progress_complete = $progress_complete+5; }

if(Auth::user()->email!=null ||
Auth::user()->email!='' )
{ $progress_complete = $progress_complete+10; }

if(Auth::user()->gender!=null ||
Auth::user()->gender!='' )
{ $progress_complete = $progress_complete+10; }

if(Auth::user()->id_dist!=0 &&  Auth::user()->id_dist!=null &&
Auth::user()->district!=null )
{ $progress_complete = $progress_complete+10; }

//for overseases
//for overseases
if(strtolower($country_user->iso2) != "pk")
{ $progress_complete = $progress_complete+10; }
//for overseases



if( Auth::user()->id_forum!=null ||
Auth::user()->id_forum!=0 )
{ $progress_complete = $progress_complete+10; }

if( Auth::user()->membership_id!=null ||
trim(Auth::user()->membership_id)!='' )
{ $progress_complete = $progress_complete+15; }

// 60%

if( Auth::user()->id_Profession!=null ||
trim(Auth::user()->id_Profession)!=0 )
{ $progress_complete = $progress_complete+10; }
// 70%
if( Auth::user()->internet_type!=null ||
trim(Auth::user()->internet_type)!='' )
{ $progress_complete = $progress_complete+10; }
// 80%
if( Auth::user()->date_of_birth!=null ||
trim(Auth::user()->date_of_birth)!='' )
{ $progress_complete = $progress_complete+10; }
// 90%
if( Auth::user()->photo!=null ||
trim(Auth::user()->photo)!='dawa_theme/assets/img/user.png' )
{ $progress_complete = $progress_complete+5; }
// 100%
?>


<link href="{{asset('dawa_theme/chart/assets/styles.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Content -->
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 layout-top-spacing">

<div class="user-profile layout-spacing">
    <div class="widget-content widget-content-area">


        <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">
                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Home
                </a></li>

                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
            View Profile </a></li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between">
            <h3 class="">Profile</h3>
            <a href="{{route('user.profile')}}" class="mt-2 edit-profile">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
        </div>
        <div class="text-center user-info">
            <img src="{{asset(Auth::user()->photo)}}" style="max-width: 180px; padding:7px;" alt="avatar">
            <p class="">  {{ucwords(strtolower((Auth::user()->name != null)? Auth::user()->name  :"N/A"))}}
                @if($progress_complete >= 100)

<i class="fa fa-check-circle" style="    color: #1eb91e;
font-size: 19px;"></i>
<br>
 <small style="font-weight: 700;">{{ucwords(strtolower((Auth::user()->fathername != null)? Auth::user()->fathername  :"N/A"))}}
</small>
@endif
            </p>

        </div>
        <div class="user-info-list">

            <div class="">
                <ul class="contacts-block list-unstyled">
                    <li class="contacts-block__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                           {{ucwords(strtolower((Auth::user()->profession != null)? Auth::user()->profession->profession_name  :"N/A"))}}
                    </li>
                    <li class="contacts-block__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
                          {{ (Auth::user()->forum != null)? Auth::user()->forum->frm_name  :"N/A"   }}
                    </li>
                    <li class="contacts-block__item">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        {{ucwords(strtolower((Auth::user()->whatsapp != null)? Auth::user()->whatsapp  :"N/A"))}}
                    </li>
                    <li class="contacts-block__item">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            {{ strtolower((Auth::user()->email != null)? Auth::user()->email  :"N/A") }}

                    </li>
                    <li class="contacts-block__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                         {{ucwords(strtolower((Auth::user()->membership_id != null)? Auth::user()->membership_id  :"N/A"))}}
                    </li>
                    <li class="contacts-block__item">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        {{ ucwords((Auth::user()->date_of_birth != null)?
                         \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d-M-Y')." "
                         :"N/A") }} /   ({{  \Carbon\Carbon::parse(Auth::user()->date_of_birth)->diffInYears(Carbon\Carbon::now()) }} Years)
                    </li>

                    <li class="contacts-block__item">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>

                          @if(strtolower($country_user->iso2) == "pk")
                          {{ (Auth::user()->tehsil != null)? Auth::user()->tehsil->tsl_name  :"N/A"    }} , {{ (Auth::user()->district != null)? Auth::user()->district->dist_name  :"N/A"   }}
                          @else
                                      {{$country_user->name}}
                          @endif


                        </li>




                    <li class="contacts-block__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                         {{ucwords(strtolower((Auth::user()->gender != null)? Auth::user()->gender  :"N/A"))}}
                    </li>


                    <li class="contacts-block__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-radio"><circle cx="12" cy="12" r="2"></circle><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path></svg>
                         {{ucwords(strtolower((Auth::user()->internet_type != null)? Auth::user()->internet_type  :"N/A"))}}
                    </li>



                </ul>
            </div>
        </div>
    </div>
</div>

</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 layout-top-spacing">

<div class="education layout-spacing ">
    <div class="widget-content widget-content-area">
        <h3 class="">Activity Logs</h3>
        <div class="timeline-alter"  >

            @if(count(Auth::user()->activities))
            @foreach (Auth::user()->activities->take(7) as $activity)

            <div class="item-timeline timeline-new">
                <div class="t-dot" data-original-title="" title="">
                </div>
                <div class="t-text">
                    <p><span>Using-IP:<u>{{$activity->ip_address}}</u></span> {{$activity->remarks}}</p>
                {{\Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}
                </div>
            </div>
            @endforeach

            @else
            <div class="item-timeline timeline-new">
                <div class="t-dot" data-original-title="" title="">
                </div>
                <div class="t-text">
                    <p><u style="color:orange;"> No Activity Found</u></p>
                </div>
            </div>

@endif



        </div>
    </div>
</div>

</div>





<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 layout-top-spacing">

<div class="skills layout-spacing ">
    <div class="widget-content widget-content-area">
        <h3 class="">My Broadcast List:</h3>

        <?php
$total = count($wabastagans);
        ?>





<style>

#chart {
max-width: 650px;
margin: 35px auto;
}

</style>

<div id="chart"></div>



<script>
var chart =null;
var total_wabastagan=Number("<?php echo $total; ?>");
var options = {
series: [{
name: 'Completed Target',
type: 'column',
data: [ total_wabastagan , 0, 0, 0, 0 ]
}, {
name: 'Actual Target',
type: 'line',
data: [100, 100, 100, 100, 100 ]
}],
chart: {
height: 350,
type: 'line',
},
stroke: {
width: [0, 4]
},
title: {
text: 'Target Results'
},
dataLabels: {
enabled: true,
enabledOnSeries: [0 , 1]
},
xaxis: {
labels: {
rotate: -45
},
categories: [
"2021",
"2022",
"2023",
"2024",
"2025"
],
tickPlacement: "on"
},
yaxis: [{
title: {
text: 'Completed Target',
},

}
]
};

$(document).ready(function(){

chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

});



</script>



    </div>
</div>



</div>




<!--  END CONTENT AREA  -->



@include('dawa_theme.sidebar.bottom' , ['bottom_active' => 'profile'])







@endsection
