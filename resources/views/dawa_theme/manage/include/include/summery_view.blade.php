<style>
    .wid-top{
        margin-top: 20px;
    }
    </style>


           <div class="row " style="margin:0px;">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing fit_display">


                    @can('view-change-password')

                    @include('dawa_theme.manage.change_password')

                    @endcan

                    @can('View-Forum-Summery')

                    @include('dawa_theme.manage.include.include.countryData')

                    @include('dawa_theme.manage.include.include.countryDataSum')

                    @endcan


                    @can('View-Forum-Summery')

                      @include('dawa_theme.manage.include.include.forum_summery')

                      @endcan

                      {{-- end forum  --}}

                      @can('View-Zone-Summery')

                      @include('dawa_theme.manage.include.include.zone_summery')

            @endcan
        {{-- end zones  --}}




    </div>
    {{-- end column  --}}

    @can('View-District-Summery')
    @include('dawa_theme.manage.include.include.district_summery')

                 @endcan

                </div>
                {{-- end row --}}
