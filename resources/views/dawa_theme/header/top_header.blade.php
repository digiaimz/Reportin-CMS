<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >

<style>
    .dropdown:not(.custom-dropdown-icon) .dropdown-menu a.dropdown-item {
        border-radius: 5px;
        font-size: 12px;
        font-weight: 500;
        color: #0e1726;
        padding: 11px 8px;
    }
    .dropdown:not(.custom-dropdown-icon) .dropdown-menu a.dropdown-item.active, .dropdown:not(.custom-dropdown-icon) .dropdown-menu a.dropdown-item:active {
        font-weight: 500;
    }
    .media img {
        border-radius: 50%;
        border: solid 5px #ebedf2;
        width: 70px;
        height: 70px;
    }
    .media-body {
        -ms-flex: 1;
        flex: 1;
        margin: 5px 0px 0px 5px;
    }
    .navbar .navbar-item .nav-item.dropdown .dropdown-menu {
        top: 114%;
        border-radius: 0;
        border: none;
        border-radius: 6px;
        -webkit-box-shadow: 0 10px 30px 0 rgb(31 45 61 / 55%);
        box-shadow: 0 10px 30px 0 rgb(31 45 61 / 61%);
        background: #fafafa;
    }
    #notification {
        position: absolute;
        top: 10px;
        right: -6px;
        width: unset;
        height: unset;
        border-radius: 50%;
        padding: 3px 4px 3px 4px;
        font-size: 10px;
        color: #fff!important;
        background: red;
        display: block;
        border: 1px solid #e0e6ed;
    }

    .navbar .dropdown-item {
        line-height: 1.5;}
    </style>

<style>
    .toggle {
    --width: 153px;
    --height: 35px;
    position: relative;
    display: inline-block;
    width: var(--width);
    height: 35px;
    box-shadow: 0px 1px 3px rgb(0 0 0 / 30%);
    border-radius: var(--height);
    cursor: pointer;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    margin-right: 10px;
    margin-left: -5px;
}

@media screen and (max-width: 480px) {
    .toggle {

margin-right: 0px;
margin-left: 5px;
}

}




    .toggle input {
      display: none;
    }

    .toggle .slider {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: var(--height);
      background-color: #ccc;
      transition: all 0.4s ease-in-out;
    }

    .toggle .slider::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: calc(var(--height));
      height: calc(var(--height));
      border-radius: calc(var(--height) / 2);
      background-color: #fff;
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
      transition: all 0.4s ease-in-out;
    }

    .toggle input:checked+.slider {
    background-color: #005F73;
}

    .toggle input:checked+.slider::before {
      transform: translateX(calc(var(--width) - var(--height)));
    }

    .toggle .labels {
      position: absolute;
      top: 8px;
      left: 0;
      width: 100%;
      height: 100%;
      font-size: 12px;
      font-family: sans-serif;
      transition: all 0.4s ease-in-out;
      overflow: hidden;
    }

   .toggle .labels::after {
    content: attr(data-off);
    position: absolute;
    top: 2px;
    right: 10px;
    color: #4d4d4d;
    opacity: 1;
    text-shadow: 1px 1px 2px rgb(0 0 0 / 40%);
    transition: all 0.4s ease-in-out;
}
   .toggle .labels::before {
    content: attr(data-on);
    position: absolute;
    top: px;
    left: -111px;
    color: #ffffff;
    opacity: 0;
    text-shadow: 1px 1px 2px rgb(255 255 255 / 40%);
    transition: all 0.4s ease-in-out;
}
    .toggle input:checked~.labels::after {
      opacity: 0;
      transform: translateX(calc(var(--width) - var(--height)));
    }

    .toggle input:checked~.labels::before {
      opacity: 1;
      transform: translateX(calc(var(--width) - var(--height)));
    }



  </style>

    <style>


        .bell-ring{

    fill:#fc6170 !important;
    -webkit-animation: ring 2s .7s ease-in-out infinite;
    -webkit-transform-origin: 50% 4px;
    -moz-animation: ring 2s .7s ease-in-out infinite;
    -moz-transform-origin: 50% 4px;
    animation: ring 2s .7s ease-in-out infinite;
    transform-origin: 50% 4px;
    }

    @-webkit-keyframes ring {
    0% { -webkit-transform: rotateZ(0); }
    1% { -webkit-transform: rotateZ(30deg); }
    3% { -webkit-transform: rotateZ(-28deg); }
    5% { -webkit-transform: rotateZ(34deg); }
    7% { -webkit-transform: rotateZ(-32deg); }
    9% { -webkit-transform: rotateZ(30deg); }
    11% { -webkit-transform: rotateZ(-28deg); }
    13% { -webkit-transform: rotateZ(26deg); }
    15% { -webkit-transform: rotateZ(-24deg); }
    17% { -webkit-transform: rotateZ(22deg); }
    19% { -webkit-transform: rotateZ(-20deg); }
    21% { -webkit-transform: rotateZ(18deg); }
    23% { -webkit-transform: rotateZ(-16deg); }
    25% { -webkit-transform: rotateZ(14deg); }
    27% { -webkit-transform: rotateZ(-12deg); }
    29% { -webkit-transform: rotateZ(10deg); }
    31% { -webkit-transform: rotateZ(-8deg); }
    33% { -webkit-transform: rotateZ(6deg); }
    35% { -webkit-transform: rotateZ(-4deg); }
    37% { -webkit-transform: rotateZ(2deg); }
    39% { -webkit-transform: rotateZ(-1deg); }
    41% { -webkit-transform: rotateZ(1deg); }

    43% { -webkit-transform: rotateZ(0); }
    100% { -webkit-transform: rotateZ(0); }
    }

    @-moz-keyframes ring {
    0% { -moz-transform: rotate(0); }
    1% { -moz-transform: rotate(30deg); }
    3% { -moz-transform: rotate(-28deg); }
    5% { -moz-transform: rotate(34deg); }
    7% { -moz-transform: rotate(-32deg); }
    9% { -moz-transform: rotate(30deg); }
    11% { -moz-transform: rotate(-28deg); }
    13% { -moz-transform: rotate(26deg); }
    15% { -moz-transform: rotate(-24deg); }
    17% { -moz-transform: rotate(22deg); }
    19% { -moz-transform: rotate(-20deg); }
    21% { -moz-transform: rotate(18deg); }
    23% { -moz-transform: rotate(-16deg); }
    25% { -moz-transform: rotate(14deg); }
    27% { -moz-transform: rotate(-12deg); }
    29% { -moz-transform: rotate(10deg); }
    31% { -moz-transform: rotate(-8deg); }
    33% { -moz-transform: rotate(6deg); }
    35% { -moz-transform: rotate(-4deg); }
    37% { -moz-transform: rotate(2deg); }
    39% { -moz-transform: rotate(-1deg); }
    41% { -moz-transform: rotate(1deg); }

    43% { -moz-transform: rotate(0); }
    100% { -moz-transform: rotate(0); }
    }

    @keyframes ring {
    0% { transform: rotate(0); }
    1% { transform: rotate(30deg); }
    3% { transform: rotate(-28deg); }
    5% { transform: rotate(34deg); }
    7% { transform: rotate(-32deg); }
    9% { transform: rotate(30deg); }
    11% { transform: rotate(-28deg); }
    13% { transform: rotate(26deg); }
    15% { transform: rotate(-24deg); }
    17% { transform: rotate(22deg); }
    19% { transform: rotate(-20deg); }
    21% { transform: rotate(18deg); }
    23% { transform: rotate(-16deg); }
    25% { transform: rotate(14deg); }
    27% { transform: rotate(-12deg); }
    29% { transform: rotate(10deg); }
    31% { transform: rotate(-8deg); }
    33% { transform: rotate(6deg); }
    35% { transform: rotate(-4deg); }
    37% { transform: rotate(2deg); }
    39% { transform: rotate(-1deg); }
    41% { transform: rotate(1deg); }

    43% { transform: rotate(0); }
    100% { transform: rotate(0); }
    }



    </style>


        <script>

        var total_notifications_request =  -1;
        var total_notifications_notify =  -1;

        </script>


<header class="header navbar navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="currentColor"
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12">
             </line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

    <ul class="navbar-item flex-row">
        <li class="nav-item align-self-center page-heading">
            <div class="page-header">
                <div class="page-title">
                    <small>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                </path><circle cx="12" cy="7" r="4"></circle></svg>
                                <b>{{Auth::user()->name}}
                                     
                                    @lang("('Admin')")
                                    
                                    <i style="color:rgb(85, 212, 85);"
                                    class="fa fa-circle"></i>

                                </b>
                        </small>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-item flex-row search-ul">
        


<style type="text/css">

    .flashbutton {



            cursor: pointer;
            max-width: 112px;
        max-height: 33px;
        border-radius: 10px;
            /* -webkit-animation: glowing 1300ms infinite;
            -moz-animation: glowing 1300ms infinite;
            -o-animation: glowing 1300ms infinite; */
            /* animation: glowing 1300ms infinite; */
          }
          @-webkit-keyframes glowing {
            0% {

              -webkit-box-shadow: 0 0 3px #3d90d4;
            }
            50% {

              -webkit-box-shadow: 0 0 15px #3d90d4;
            }
            100% {

              -webkit-box-shadow: 0 0 3px #3d90d4;
            }
          }
          @keyframes glowing {
            0% {

              box-shadow: 0 0 3px #3d90d4;
            }
            50% {

              box-shadow: 0 0 15px #3d90d4;
            }
            100% {

              box-shadow: 0 0 3px #3d90d4;
            }
          }

    </style>



        


    </ul>
    <ul class="navbar-item flex-row navbar-dropdown">
        <li id="date_li" class="nav-item dropdown language-dropdown more-dropdown">
            <div style="position: relative;
            padding: 9px 35px 10px 15px;
            border: 1px solid #d3d3d3;
            border-radius: 6px;
            transform: none;
            font-size: 13px;
            line-height: 17px;
            background-color: #fff;
            letter-spacing: normal;
            min-width: 115px;
            text-align: inherit;
            color: #1b2e4b;
            box-shadow: none;
            max-height: 35px;margin-rign:10px;"  >
            <style>

@media only screen and (max-width: 600px)
            {

#date_li{
    display: none;
}
#chat-notifications{
    display: none;
}
#how-its-web{
    display: block;
}
.flashbutton{
    max-width: 69px;
}

                }
                </style>
@if(Auth::id()==5 || Auth::id()==1 || Auth::id()==40    )
            <style>
                 @media only screen and (max-width: 600px)
                {
                    .flashbutton{
                          max-width: 51px;
                       }
                       .btn_cus{
                        padding: 5px !important;
                       }

                }
            </style>

@else

<style>
    @media only screen and (max-width: 600px)
   {
       .flashbutton{
             max-width: 69px;
          }

   }
</style>


@endif


<a href="#" role="button"
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <span id='date'  >@lang('mm/dd/yy ')</span>
  </a>

  <span id='time'  >@lang('H:m:s')</span>
  </a>


            </div>
        </li>

        <script>
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        function display_ct6() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
            x1 = days[x.getDay()]+" , "+ x1 +" - ";
            var x2 =  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
            document.getElementById('date').innerHTML = x1;
            document.getElementById('time').innerHTML = x2;
            display_c6();
             }
             function display_c6(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct6()',refresh)
            }
            display_c6()
            </script>
 
<style> .navbar .navbar-item .nav-item.dropdown.message-dropdown {
    margin-left: 0px;
}</style>
 {{-- @if( Auth::id()==5 || Auth::id()==1 || Auth::id()==40 || Auth::id()==9   || App\Helpers\Helper::is_forum_level_user()  ) --}}
  
 {{-- @endif --}}
        <li style="margin-left: 15px;" class="nav-item dropdown message-dropdown" id="chat-notifications">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            </a>
            <div class="dropdown-menu p-0 position-absolute" aria-labelledby="messageDropdown">
                <div class="">
 
                    <center style="color:orange;"><small>@lang('Not Found')</small></center>

                </div>


            </div>
        </li>



        <li class="nav-item dropdown notification-dropdown" id="get-notification-data" >




        </li>


        <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="">
                    <div class="dropdown-item">
                        <a class="" href="{{route('user.profile')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                </path><circle cx="12" cy="7" r="4"></circle></svg> @lang('Edit Profile')</a>
                    </div>
                    <div class="dropdown-item">
                        <a class="" href="{{route('change.password.view')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            @lang('Change Password')</a>
                    </div>

                    <div class="dropdown-item">
                        <a
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-log-out">
                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                              </path><polyline points="16 17 21 12 16 7">
                                  </polyline><line x1="21" y1="12" x2="9"
                                  y2="12"></line></svg>  @lang('Sign Out')</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
    <script>
        function  paste_notifications()
        {
            $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var data_var = {  request_id: "yes"  };
        $.ajax({
        type:'POST',
        url: "{{ route('get.notification.data') }}" ,
        data: data_var ,
        success:function(data){
         if(data.total_request > total_notifications_request || data.total_notify > total_notifications_notify )
         {
            total_notifications_request= data.total_request;
            total_notifications_notify = data.total_notify;
         $('#get-notification-data').html(data.view);

         if(total_notifications_request + total_notifications_notify == 0 )
         {
        //     Push.create("Hi! {{Auth::user()->name}}", {
        //     body: "Welcome Back From Minhaj-ul-Quran International.",
        //     icon: '{{asset('dawa_theme/assets/logo.png')}}',
        //     timeout: 8000,
        //     onClick: function () {
        //         window.focus();
        //         this.close();
        //     }
        // });
         }
         else
         {
            Push.create("Hi! {{Auth::user()->name}}", {
            body: "You have Received new Notification Please Check.",
            icon: '{{asset('dawa_theme/assets/logo.png')}}',
            timeout: 8000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
         }

         }


        },


        });


        }
        $(document).ready(function(){
            // setInterval(paste_notifications, 15000);
            paste_notifications();
        });
        </script>


</header>
