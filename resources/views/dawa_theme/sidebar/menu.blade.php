  <!--  BEING SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
            
            <style>
                       
                       #sidebar * {
    overflow: inherit;
    /* white-space: nowrap; */
}
#text-margin{
    margin-left: -36px;
}
             @media only screen and (max-width: 600px) 
            { 
                #sidebar * {
    overflow: hidden;
    /* white-space: nowrap; */
}
#text-margin{
    margin-left: 0px;
}
                
                }
                
             
   
   
            </style>
            
            

            <nav id="sidebar"  >

                @include('dawa_theme.sidebar.logo_header')

                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    @if(Auth::user()->user_type=="worker")
                    @include('dawa_theme.sidebar.navbar_worker')
                    @else
                    @include('dawa_theme.sidebar.navbar')
                    @endif 
             
                </ul>
            </nav>

        </div>
        <!--  END SIDEBAR  -->