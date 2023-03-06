<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
<div class="widget widget-activity-two mb-4" style="height: auto;">

    <div class="widget-heading">
        <h5 class="">@lang('District Summary') <small>(Statical)</small>
         </h5>
<h6><small> {{\App\Helpers\Helper::get_forum_name()}}
    @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
    @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
    @endif </small></h6>
    </div>


<div class="widget-content">

        <div class="row">


                 @include('dawa_theme.manage.report')


        </div>



    </div>
</div>

