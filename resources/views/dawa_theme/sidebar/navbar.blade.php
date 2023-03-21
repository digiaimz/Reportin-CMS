
<li class="menu @yield('dashboard_active')">
    <a href="{{route('home')}}"  @yield('dashboard_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Dashboard</span>
        </div>
    </a>
</li>
<li class="menu menu-heading">
    <div class="heading">
        <svg xmlns="http://www.w3.org/2000/svg"
         width="24" height="24" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-circle"><circle cx="12" cy="12" r="10">
               </circle></svg><span>User Management</span></div>
</li>



@can('manage-worker' )
<li class="menu">
    <a href="#Workers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <span>Manage Workers</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="Workers" data-parent="#accordionExample" style="">

        <li hidden>
            <a  href="{{route('add.new.worker')}}"> Register New </a>
        </li>
@can('view-worker')
<li>
    <a href="{{route('manage.workers')}}"> View Workers </a>
</li>
@endcan

    </ul>
</li>
@endcan

 
@can('manage-clips' )
<li class="menu   @yield('clips_active')">
    <a href="{{route('view.clips.manage')}}"  @yield('clips_active_aria')   class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
             <span>Manage Clips</span>
        </div>
    </a>
</li>
@endcan

@can('manage-tanzim' )

<li class="menu @yield('manage_tanzim_active')">
    <a href="#submenu2" data-toggle="collapse" @yield('manage_tanzim_aria') class="dropdown-toggle collapsed">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
             <span>Manage Tanzim</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="submenu2" data-parent="#accordionExample" style="">

        @can('view-Tanzim')

        <li hidden>
            <a href="{{route('view.staff')}}"> View Dignitaries </a>
        </li>
        @endcan
        @can('view-Tanzim')
        <li hidden>
            <a href="{{route('add.new.staff')}}">Assign Designation</a>
        </li>

        <li>
            <a href="{{route('make.my.team')}}">My Level</a>
        </li>
        @if( Auth::user()->access_type  != "Tehsil")
        <li>
            <a href="{{route('create.below.level.tanzim')}}">Below Level</a>
        </li>
        @endif
        @endcan
        @can('manage-designation')


        <li>
            <a href="#sm2" data-toggle="collapse" id="manage_designation_li" aria-expanded="false" class="dropdown-toggle ">Manage Designation<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
            <ul class="collapse list-unstyled sub-submenu @yield('manage_section')" id="sm2" data-parent="#submenu2">
                @can('create-designation')

                <li>
                    <a style="color: #BFC9D4;" href="{{route('staff.role.create')}}"> Create Designation </a>
                </li>
                @endcan
                @can('view-designation')
                <li>
                    <a style="color: #BFC9D4;" href="{{route('staff.role.view')}}"> View Designations </a>
                </li>
                @endcan
            </ul>
        </li>

        @endcan
    </ul>
</li>

@endcan
{{-- list-unstyled sub-submenu show --}}


<li class="menu menu-heading">
    <div class="heading">
        <svg xmlns="http://www.w3.org/2000/svg"
         width="24" height="24" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-circle"><circle cx="12" cy="12" r="10">
               </circle></svg><span>Reporting</span></div>
</li>

@can('View-District-Summery')
@if(Auth::user()->access_type != "District" && Auth::user()->access_type != "Tehsil" )

@if(Auth::user()->access_type == "Admin"  )
<li class="menu @yield('top_20_districts_active')">
    <a href="{{route('reporting.top.20.district.summery')}}"  @yield('top_20_districts_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cast"><path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path><line x1="2" y1="20" x2="2.01" y2="20"></line></svg>
            <span>Top 20 Districts</span>
        </div>
    </a>
</li>
@endif

<li class="menu @yield('district_active')">
    <a href="{{route('reporting.district.summery')}}"  @yield('district_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
            <span>District Summery</span>
        </div>
    </a>
</li>


<li class="menu @yield('forum_comparison_active')">
    <a href="{{route('forum.comparison.reporting.district.summery')}}"  @yield('forum_comparison_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
              <span>Top Forum Comparison</span>
        </div>
    </a>
</li>

@endif
@endcan
@can('View-Daily-Registration')
<li class="menu @yield('daily_active')">
    <a href="{{route('reporting.registration.graph')}}"  @yield('daily_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
              <span>Daily Progress Graph </span>
        </div>
    </a>
</li>

@endcan


{{-- edit able --}}
@can('view-level-x-forum-reprting')
<li class="menu @yield('zone_wise')">
    <a href="{{route('reporting.zone.wise')}}"  @yield('zone_wise_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
              <span>Zone-Wise Summary</span>
        </div>
    </a>
</li>

<li class="menu @yield('district_wise')">
    <a href="{{route('reporting.district.wise')}}"  @yield('district_wise_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            <span>District-Wise Summary</span>
        </div>
    </a>
</li>


<li class="menu @yield('tehsil_wise')">
    <a href="{{route('reporting.tehsil.wise')}}"  @yield('tehsil_wise_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin" style="user-select: auto;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" style="user-select: auto;"></path><circle cx="12" cy="10" r="3" style="user-select: auto;"></circle></svg>
            <span>Tehsil-Wise Summary</span>
        </div>
    </a>
</li>
@endcan




<li class="menu menu-heading">
    <div class="heading">
        <svg xmlns="http://www.w3.org/2000/svg"
         width="24" height="24" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-circle"><circle cx="12" cy="12" r="10">
 </circle></svg><span>Setting & Operations</span></div>
</li>

{{-- <li class="menu" hidden>
    <a href="#Selections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">

        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>

            <span>CRUDS</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="Selections" data-parent="#accordionExample" style="">
        <li>
            <a href="{{route('manage.province')}}"> Manage Province </a>
        </li>

        <li>
            <a href="{{route('manage.zone')}}"> Manage Zones </a>
        </li>

          <li>
            <a href="#"> Manage Divisions </a>
        </li>

        <li>
            <a href="#"> Manage Districts </a>
        </li>
        <li>
            <a href="#"> Manage Tehsils </a>
        </li>
         <li>
            <a href="#"> Manage Tanzimi Tehsils </a>
        </li>
        <li>
            <a href="#"> Manage UC </a>
        </li>
        <li>
            <a href="#"> Manage Unit </a>
        </li>

    </ul>
</li> --}}

@can('manage-selection' )
<li class="menu @yield('manage_activities_active')">
    <a href="#cruds" data-toggle="collapse" @yield('manage_activities_area') class="dropdown-toggle collapsed">


        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>

            <span> Selections</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    @can('manage-forum' )
    <ul class="submenu list-unstyled collapse" id="cruds" data-parent="#accordionExample" style="">
        <li>
            <a href="{{route('Manage.forums')}}">Manage Forums </a>
        </li>
    </ul>
    @endcan
    @can('manage-activities' )
    <ul class="submenu list-unstyled collapse" id="cruds" data-parent="#accordionExample" style="">
        <li>
            <a href="{{route('ajaxActivities.index')}}">Manage Activities </a>
        </li>
    </ul>
    @endcan
</li>
@endcan

@can('manage-language' )
<li class="menu @yield('language_active')">
    <a href="{{route('manage.languages')}}"  @yield('language_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
              <span>Languages & Translation </span>
        </div>
    </a>
</li>
@endcan

