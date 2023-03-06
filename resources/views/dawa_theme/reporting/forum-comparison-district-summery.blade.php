@extends('layouts.dawa_theme')
@section('forum_comparison_active')
active
@endsection
@section('forum_comparison_aria') aria-expanded="true" @endsection

@section('title')
Top 20 Forum District Comparison
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

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>





            <div class="row analytics">

                <style>
                          .wid-top{
                              margin-top: 20px;
                          }
                          .layout-px-spacing > .row
              {
                  display:block;
              }

                          </style>
                          <style>
                              .blockui-growl-message {
                                  display: none;
                                  text-align: left;
                                  padding: 15px;
                                  background-color: #455a64;
                                  color: #fff;
                                  border-radius: 3px;
                              }
                              .blockui-animation-container { display: none; }
                              .multiMessageBlockUi {
                                  display: none;
                                  background-color: #455a64;
                                  color: #fff;
                                  border-radius: 3px;
                                  padding: 15px 15px 10px 15px;
                              }
                              .multiMessageBlockUi i { display: block }
                              .equal{
                                  width: 14.28%;
                              }
                              @media only screen and (max-width: 600px) {
                                .equal{
                                  width: 100%;
                              }
}
                          </style>
              <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
              <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
              <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >

                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12   layout-spacing">
                              <div class="widget widget-account-invoice-two" style="    background: #fff;">
                                  <div class="widget-content">

                                      <nav class="breadcrumb-two" aria-label="breadcrumb">
                                          <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="{{route('home')}}">
                                                  <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                                  Home
                                              </a></li>

                                              <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                                Top Forum Comparison

                                                 </a></li>
                                          </ol>
                                      </nav>
                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12   layout-spacing" style="display: flex;
                                      justify-content: center;padding-bottom:17px;">
                                  <h3 style="font-weight: 700;
                                  background-color: #00C1AE;border-radius: 15px 50px;
                                  padding: 5px 20px;color: white; ">Top 20 Districts</h3>
                                    </div>


                                      <div class="row">

{{-- all forum  --}}
                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('all_users')->withcount('all_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->all_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'All Forums',
      'chart_sub_title' => '',
      'chart_id' => 'all',
      'chart_options' => 'district_summery_optionsall',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>
{{-- tmq forum  --}}
                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('tmq_users')->withcount('tmq_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->tmq_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'TMQ',
      'chart_sub_title' => '',
      'chart_id' => 'tmq',
      'chart_options' => 'district_summery_optionstmq',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>

{{-- mwl forum  --}}

                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('mwl_users')->withcount('mwl_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->mwl_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'MWL',
      'chart_sub_title' => '',
      'chart_id' => 'mwl',
      'chart_options' => 'district_summery_optionsmwl',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>


{{-- myl forum  --}}

                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('myl_users')->withcount('myl_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->myl_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'MYL',
      'chart_sub_title' => '',
      'chart_id' => 'myl',
      'chart_options' => 'district_summery_optionsmyl',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>


{{-- msm forum  --}}

                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('msm_users')->withcount('msm_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->msm_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'MSM',
      'chart_sub_title' => '',
      'chart_id' => 'msm',
      'chart_options' => 'district_summery_optionsmsm',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>





{{-- pat forum  --}}

                                        <div class="equal" >

                             @can('View-District-Summery')

                                      @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('pat_users')->withcount('pat_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->pat_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'PAT',
      'chart_sub_title' => '',
      'chart_id' => 'pat',
      'chart_options' => 'district_summery_optionspat',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>







{{-- muc forum  --}}

 <div class="equal" >

            @can('View-District-Summery')

               @if( Auth::user()->access_type != "Tehsil" )

                                                   <?php  $graph = array (  );
                                        $districts =     \App\District::has('muc_users')->withcount('muc_users')->orderBy('dist_name', 'ASC')
                                        ->where('id_dist', '<>', 1 )
                                    ->where('id_dist', '<>', 2 )
                                    ->get() ;
                                        foreach ( $districts as $district) {
                                            array_push($graph , array("lable"=> $district->dist_name , "value"=> $district->muc_users_count  )  );

                                        }
                                        usort($graph, function($a, $b) {
                                                              return  $b['value']  <=> $a['value'];
                                                          });

                              $height = 20 * 31;
                              $height =  $height + 100;

                                                  ?>

@include('dawa_theme.reporting.include.summery'
      ,
   [
      'chart_title' => 'MUC',
      'chart_sub_title' => '',
      'chart_id' => 'muc',
      'chart_options' => 'district_summery_optionsmuc',
      'colors' => \App\Helpers\Helper::get_color(3) ,
      'height' => $height
  ]   )

@endif
@endcan

</div>


{{-- end --}}










</div>




</div>
</div>
</div>



                  </div>









        </div>





@endsection
