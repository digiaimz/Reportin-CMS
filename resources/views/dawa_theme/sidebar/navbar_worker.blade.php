
<li class="menu @yield('dashboard_active')">
    <a href="{{route('home')}}"  @yield('dashboard_aria') class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Dashboard</span>
        </div>
    </a>
</li>


 
<li class="menu   @yield('broadcastlist_active')">
    <a href="{{route('manage-groups.index')}}"  @yield('broadcastlist_active_aria')   class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
              <span>Manage Groups</span>
        </div>
    </a>
</li>
<li class="menu   @yield('clips_active')">
    <a href="{{ route('manage-users.index') }}" @yield('clips_active_aria')   class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              <span>Manage Users</span>
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
               </circle></svg><span>Reporting</span></div>
</li>

 


<li class="menu @yield('manage_CDR_active') ">
    <a href="#Workers"  data-toggle="collapse" @yield('manage_CDR_aria') class="dropdown-toggle collapsed">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <span>CDR Report</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="Workers" data-parent="#accordionExample" style="">

    
 
<li>
    <a  href="{{route('complain.view.incoming')}}" >Incoming Calls </a>
</li>
<li>
    <a href="{{route('complain.view.worker.outgoing')}}"  >Outgoing Calls </a>
</li>

    </ul>
</li>





 
 
