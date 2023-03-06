

<div class="widget widget-activity-two  mb-4  widget-table-one" style="height: auto;">

    <?php

    $total_zones = 13;
    $total_district = \App\District::count();
    $total_filled_district =  \App\District::has('users')->count();
    $avg_dist = ($total_filled_district * 100 ) / $total_district;
    $total_tehsil = \App\Tehsil::count();
    $total_filled_tehsil =\App\Tehsil::has('users')->count();
    $avg_tehsil = ($total_filled_tehsil * 100 ) / $total_tehsil;

  ?>

                    <div class="widget-three">
                        <div class="widget-heading" style="margin-bottom: 10px;      padding: 0px 0px 20px 0px;">
                            <h5 class="">Summary Reporting <small>(Level x Forum)</small></h5>
                    </div>


                        <script>

                            function goToReportingPage(url){
                //                 $('.bg-overlay').show();
                //   $('.se-pre-con').show();
                                // window.location.href  = url;
                                window.open(url, '_blank');

                //                 setTimeout(function(){
                // $('.bg-overlay').hide();
                //   $('.se-pre-con').hide();
                //                          }, 2000);

                            }

                            </script>




    <div class="widget-content">
        @if(
              Auth::user()->access_type  == "Admin" ||
            Auth::user()->access_type  == "Markazi" ||
            Auth::user()->access_type  == "Zone"
        )
        <div class="transactions-list" >
            <div class="t-item" onclick="goToReportingPage('{{route('reporting.zone.wise')}}')">
                <div class="t-company-name">
                    <div class="t-icon">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </div>
                    </div>
                    <div class="t-name">
                        <h4>Zone-Wise Summary</h4>
                        <p class="meta-date"><b>Total: </b>{{$total_zones }}</p>
                        </div>

               </div>
                    <div class="t-rate rate-inc">
                        <p><span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            100% <br> Has-Workers</span>  </p>
                    </div>
                </div>
        </div>
        @endif
        @if(
            Auth::user()->access_type  == "Admin" ||
                Auth::user()->access_type  == "Markazi" ||
                Auth::user()->access_type  == "Zone" ||
                Auth::user()->access_type  == "District"
        )
        <div class="transactions-list" >
            <div class="t-item" onclick="goToReportingPage('{{route('reporting.district.wise')}}')">
                <div class="t-company-name">
                    <div class="t-icon">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        </div>
                    </div>
                    <div class="t-name">
                        <h4>District-Wise Summary</h4>
                        <p class="meta-date"><b>Total: </b>{{$total_district }}</p>

                        </div>
                    </div>
                    <div class="t-rate rate-inc">
                        <p><span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            {{ number_format($avg_dist , 2) }}%<br> Has-Workers</span>

                        </p>
                    </div>
                </div>
            </div>
            @endif
      @if(
        Auth::user()->access_type  == "Admin" ||
        Auth::user()->access_type  == "Markazi" ||
        Auth::user()->access_type  == "Zone" ||
        Auth::user()->access_type  == "District"||
        Auth::user()->access_type  == "Tehsil"
    )
            <div class="transactions-list" >
                <div class="t-item" onclick="goToReportingPage('{{route('reporting.tehsil.wise')}}')">
                <div class="t-company-name">
                    <div class="t-icon">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                    </div>
                    <div class="t-name">
                        <h4>Tehsil-Wise Summary</h4>
                        <p class="meta-date"><b>Total: </b>{{$total_tehsil }}</p>
                    </div>

                </div>
                <div class="t-rate rate-inc">
                    <p><span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        {{number_format($avg_tehsil , 2 )}}% <br> Has-Workers</span>  </p>
                </div>
            </div>
        </div>
        @endif

    </div>


</div>


<style>
.transactions-list{
    cursor: pointer;
}
</style>



</div>

