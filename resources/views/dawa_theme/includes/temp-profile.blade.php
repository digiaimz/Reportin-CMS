
            <div class=" inv-detail">
                <span class="show-more-profile" style="display: none;">
                <div class=" info-detail-2  ">
                    <p>Name:</p>
                    <p>{{Auth::user()->name}}  </p>
                </div>
                <div class="info-detail-2 ">
                    <p>Email:</p>
                    <p>
                        @if(Auth::user()->email==null ||
                        Auth::user()->email=='')
                       N/A
                        @else
                        {{Auth::user()->email}}
                        @endif
                    </p>
                </div>
                <div class="info-detail-2 ">
                    <p>Mobile:</p>
                    <p>{{Auth::user()->whatsapp}}</p>
                </div>




                    <script>
                        $(document).ready(function(){
                          $("#show-more-profile").click(function(){


                              if($('.show-more-profile').css('display')=="none")
                              {
                                $(".show-more-profile").fadeToggle(500);
                                $("#show-more-profile").html('Show Less...');

                              }
                              else
                              {
                                $(".show-more-profile").fadeToggle(500);
                               $("#show-more-profile").html('Show More...');
                               window.scrollTo({ top: 0, behavior: 'smooth' });
                              }

                          });
                        });
                        </script>



                <div class="info-detail-2 ">
                    <p>Dist:</p>
<p>{!! (Auth::user()->district!=null)? Auth::user()->district->dist_name : '<span style="color: red;">Please Update</span>'!!}</p>
                </div>
                <div class="info-detail-2 ">
                    <p>Forum:</p>
                    <p>{{Auth::user()->forum->frm_code}}</p>
                </div>

                 <div class="info-detail-2 ">
                    <p>Rafaqat No:</p>
                    <p>@if(Auth::user()->membership_id==null ||
                        Auth::user()->membership_id=='')
                        N/A
                        @else
                        {{Auth::user()->membership_id}}
                        @endif</p>
                </div>
                <div class="info-detail-2 ">
                    <p>Gender:</p>
                    <p>@if(Auth::user()->gender==null ||
                        Auth::user()->gender=='')
                        N/A
                        @else
                          {{Auth::user()->gender}}
                        @endif</p>
                </div>
                <div class="info-detail-2 ">
                    <p>Age:</p>
                    <p>@if(Auth::user()->date_of_birth==null ||
                        Auth::user()->date_of_birth=='')
                        N/A
                        @else
                        {{  Carbon\Carbon::parse(Auth::user()->date_of_birth)->diffInYears( Carbon\Carbon::now()) }}
                         Year
                        @endif</p>
                </div>
</span>
                <div id="show-more-profile" style="text-align: center;color: #a49f9f;cursor:pointer;">
                    Show More...
                </div>


@if(Auth::user()->user_type == "staff")

@include('dawa_theme.manage.include.access_level')
@endif

            </div>