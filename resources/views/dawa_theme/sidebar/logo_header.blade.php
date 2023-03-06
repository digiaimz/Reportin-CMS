<style>
#sidebar .theme-brand li.theme-text a {
    font-size: 19px !important;
}

    </style>

<ul class="navbar-nav theme-brand flex-row  text-center"  >
    <li class="nav-item theme-logo">
        <a href="{{route('home')}}">

            <img  src="{{asset('dawa_theme/assets/icon.webp')}}" class="navbar-logo" alt="logo">
        </a>
    </li>
    <li   class="nav-item theme-text">
        <a style="margin-left: 0px;" id="text-margin" href="{{route('home')}}" class="nav-link"> Reporting CMS </a>
    </li>
    <li class="nav-item toggle-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left sidebarCollapse"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </li>
</ul>
