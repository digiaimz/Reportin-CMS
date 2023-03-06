@extends('layouts.dawa_theme')
@section('district_active')
active
@endsection
@section('district_aria') aria-expanded="true" @endsection

@section('title')
Zone Summary Stats
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



<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
{{-- <script src="{{asset('dawa_theme/plugins/apex/apexcharts.min.js')}}"></script> --}}
{{-- <script src="{{asset('dawa_theme/assets/js/widgets/modules-widgets.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>

<script src="{{asset('dawa_theme/plugins/blockui/jquery.blockUI.min.js')}}"></script>

<script src="{{asset('dawa_theme/plugins/blockui/custom-blockui.js')}}"></script>

<script>
var ss = $(".basic").select2({
    tags: true,
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
        </style>


        <div class="row analytics">


                @include('dawa_theme.reporting.include.zone-summary-stats')



        </div>





@endsection
