@extends('layouts.dawa_theme')
@section('daily_active')
active
@endsection
@section('daily_aria') aria-expanded="true" @endsection

@section('title')
Daily Registration Record
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="{{asset('dawa_theme/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >
<link href="{{asset('dawa_theme/assets/css/components/tabs-accordian/custom-tabs.css')}}"  rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <script src="{{asset('dawa_theme/assets/js/sweetalert.min.js')}}" ></script>
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}">

  <link rel="stylesheet" href="{{asset('dawa_theme/dist/js-snackbar.css?v=1.3')}}" />




<script>
var id_tehsil_for_eidt_wabastagan=0;

    </script>
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100%;
    height: 100%;}
    .select2-dropdown {
        z-index: 1140;
    }
    .modal-backdrop {

    background-color: #000000;
}
    </style>

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/elements/alert.css')}}" >
 <style>
     .btn-light { border-color: transparent; }
 </style>
  <script src="{{asset('dawa_theme/dist/js-snackbar.js?v=1.3')}}"></script>
@endsection

@section('pagelevel_scripts_footer')

<script type="text/javascript">
    $(document).ready(function(){

       $('head title', window.parent.document).text('Vision 2025 ');

    });
    </script>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
{{-- <script src="{{asset('dawa_theme/plugins/apex/apexcharts.min.js')}}"></script> --}}
{{-- <script src="{{asset('dawa_theme/assets/js/widgets/modules-widgets.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>


<script>
var ss = $(".basic").select2({
    tags: false,
});
    </script>



@endsection
@section('content')


<div class="layout-px-spacing">

    <style>
        .layout-px-spacing>.layout-top-spacing {
            display: block;
        }
</style>


    <style>
.widget-account-invoice-two .account-box .info
{
    margin-bottom: 34px;
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


        <div class="row analytics">

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>




               <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12   " >

                   @include('dawa_theme.manage.include.total_count' , ['is_page'=>true])

                </div>

               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12   " >

                    <div class="widget widget-account-invoice-two  " style="    background: #fff;">
                        <div class="widget-content">



<div class="daily_registration_table_loading">
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
                              <div  id="daily_registration_table">
                              </div>






                </div>
                </div>

                <div class="daily_registration_table_loading">


                    <div class="row layout-spacing mt-4">



                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12    ">
                            <div class="widget widget-account-invoice-two  " style="    background: #fff;">
                                <div class="widget-content">
                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>
                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>
                        </div>
                        </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12   ">
                            <div class="widget widget-account-invoice-two  " style="    background: #fff;">
                                <div class="widget-content">
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
                <div  id="daily_registration_table_widget">
                </div>

                </div>










        </div>
  </div>





@endsection
