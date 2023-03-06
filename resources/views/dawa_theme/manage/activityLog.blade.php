<div class="widget widget-activity-two mb-4" style="height: auto;">

    <div class="widget-heading">
        <h5 class="">Activity Logs</h5>
    </div>

    <div class="widget-content">

        <div class="mt-container mx-auto ps ps--active-y" style="overflow: auto !important;">
            <div class="timeline-line">



            @if(count(Auth::user()->activities))
                @foreach (Auth::user()->activities->take(10) as $activity)

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
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 293px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 230px;"></div></div></div>


    </div>
</div>
