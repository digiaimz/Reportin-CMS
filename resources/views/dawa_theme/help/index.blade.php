@extends('layouts.dawa_theme')
@section('help_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
Help
@endsection
@section('loader')
<div id="load_screen"  > <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')

@endsection

@section('pagelevel_scripts_footer')


@endsection
@section('content')

<div id="help_page">
<style>

.layout-px-spacing > .row
{
    display:block;
}
 .widget_title {
    background-color: #eee;
    height: 15px;
    line-height: 15px;
    margin-bottom: 15px;

}
  .widget_title h3 {
    font-weight: 700;
    padding-right: 10px;
    font-size: 15px;
    height: 15px;
    line-height: 15px;
    text-transform: uppercase;
    background-color: #fff;
    display: inline-block;
    margin: 0;
}
 .owl-item {
    cursor: pointer;
    padding: 5px;

}
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: -webkit-fill-available;
    height: -webkit-fill-available;
    background-color: #000;
}

@media screen and (min-width: 480px) {
    .content-row{
    padding:   55px 85px 0px 85px;
}
}
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



<div class="layout-px-spacing">

    <div class="row  " id="cancel-row"    >

        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">

                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Home
                        </a></li>

                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                      Help </a></li>
                    </ol>
                </nav>



    <div class=" "  >


        <div class="row content-row"   >



            <!-- player wrapper -->
            <div class="col-lg-12  col-md-12 col-sm-12      "  >


                <div class="widget_title  "><h3 style="font-size:16px;  ">- Software Tutorials </h3></div>



         <div class="carousel__wrap mt-3">


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

          <br>

          <div class="widget_title  "><h3 style="font-size:16px;    "



            >- WhatsApp Tutorials </h3></div>

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





            </div>
        </div>

    </div>

    </div>
</div>

<script>
        function GetPage()
{
    var id=null;
    if ($(window).width() < 400) {
        id = "mobile";
}
else {
    id = "wev";
}

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  id: id  };
$.ajax({
type:'POST',
url: "{{ route('get.help.page') }}" ,
data: data_var ,
success:function(data){

$('#help_page').html(data.view);




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

$(document).ready(function(){
GetPage();
});

</script>

<script src="https://cdn.jsdelivr.net/npm/owl.carousel2@2.2.2/dist/owl.carousel.min.js"></script>
@endsection
