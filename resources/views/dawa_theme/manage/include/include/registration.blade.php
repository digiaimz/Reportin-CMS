<div class="widget widget-account-invoice-two  " style="    background: #fff;">
    <div class="widget-content">

        @if($is_page == true) <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">
                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    @lang('Home')
                </a></li>

                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                    Daily Progress Graph
                   @if(App\Helpers\Helper::is_forum_level_user())   | {{App\Helpers\Helper::get_forum_name() }}  @endif
                </a></li>
            </ol>
        </nav>
@endif

        <div class="row">


        <div class="col-md-6 col-lg-6 col-sm-12" id="select_date_range">
          <label>  @lang('Date Range:') </label>
            <div style="display: inline-block;width: 70%;" class="form-group mb-0">
                <input     id="rangeCalendarFlatpickr" value="{{$date_range}}" class="form-control flatpickr flatpickr-input active"
                type="text" placeholder="Select Date..">
            </div>
        </div>

@if($is_page == false)
        <style>


          #select_date_range{ display: none;}
            @media screen and (min-width: 580px) {
                #select_date_range {
              display: block;
              }
            }
            </style>
@endif
        <style>
@keyframes rotate {

from {transform: rotate(0deg)}
to {transform: rotate(360deg)}

}


.refresh-start {
font-size: 20px;
animation-name: rotate;
animation-duration: 1s;
animation-iteration-count: infinite;
animation-timing-function: linear;
animation-play-state: running;

}
</style>

         <div class="col-md-6 col-lg-6 col-sm-12" style="    padding: 11px 11px 11px 11px;
       display: flex;
justify-content: flex-end;">
          <b id="loading-msg" style="display:none;    color: #1030cd;">


                <i   class="fa fa-refresh spin-animation refresh-start" aria-hidden="true"></i>
                @lang('Please Wait...') &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;         </b>

@if($is_page == false)
        <div  style="   text-align: right; ">
            <a class="badge badge-danger" style="cursor: pointer;" href="{{route('reporting.registration.graph')}}"> @lang('View Page') </a>
        </div>
@endif


        </div>

        </div>
        <script>
            $(document).ready(function(){
              $("#rangeCalendarFlatpickr").change(function(){
                  var date = $("#rangeCalendarFlatpickr").val();
                  if( date.includes("to")){

                    updateWorkerRegistrationGraph(date);

                  }
              });
            });
            </script>

        <br>


<div id="worker_registration_chart"></div>
</div>
</div>
