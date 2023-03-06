<!DOCTYPE html>
<html @if( session('lang', 'en') == 'en' ) lang="en"  dir="ltr" @else  lang="ur" dir="ltr" @endif >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>
        @yield('title') - {{env('APP_NAME')}}
    </title>
     <!-- CSRF Token -->
     <meta id="meta-csrf-token" name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/x-icon" href="{{asset('dawa_theme/assets/featured.jpg')}}"/>
<link href="{{asset('dawa_theme/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('dawa_theme/assets/js/loader.js')}}"></script>
 
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('dawa_theme/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('dawa_theme/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/push.min.js')}}"></script>

    <style>
        .widget-account-invoice-two .account-box .info
        {
            margin-bottom: 34px;
        }
        .main-item {
          padding: 10px;
          background-color: #fff;
          width: 700px;
        }

        .background-masker {
          background-color: #fff;
          position: absolute;
        }

        .btn-divide-left {
          top: 0;
          left: 25%;
          height: 100%;
          width: 5%;
        }

        @keyframes placeHolderShimmer {
          0% {
            background-position: -800px 0
          }
          100% {
            background-position: 800px 0
          }
        }

        .animated-background {
          animation-duration: 2s;
          animation-fill-mode: forwards;
          animation-iteration-count: infinite;
          animation-name: placeHolderShimmer;
          animation-timing-function: linear;
          background-color: #f6f7f8;
          background: linear-gradient(to right, #eeeeee 8%, #bbbbbb 18%, #eeeeee 33%);
          background-size: 800px 104px;
          height: 70px;
          position: relative;
        }

        .static-background {
          background-color: #f6f7f8;
          background-size: 800px 104px;
          height: 70px;
          position: relative;
          margin-bottom: 20px;
        }

        .shared-dom {
          width: 800px;
          height: 110px;
        }
        .sub-rect {
          border-radius: 100%;
          width: 70px;
          height: 70px;
          float: left;
          margin: 20px 20px 20px 0;
        }
        .pure-background {
          background-color: #eee;
        }

        .css-dom:empty {
          width: 280px;
          height: 220px;
          border-radius: 6px;
          box-shadow: 0 10px 45px rgba(0, 0, 0, .2);
          background-repeat: no-repeat;

          background-image:
            radial-gradient(circle 16px, lightgray 99%, transparent 0),
            linear-gradient(lightgray, lightgray),
            linear-gradient(lightgray, lightgray),
            linear-gradient(lightgray, lightgray),
            linear-gradient(lightgray, lightgray),
            linear-gradient(#fff, #fff);

          background-size:
            32px 32px,
            200px 32px,
            180px 32px,
            230px 16px,
            100% 40px,
            280px 100%;

          background-position:
            24px 30px,
            66px 30px,
            24px 90px,
            24px 142px,
            0 180px,
            0 0;
        }
                </style>
    <script>


function AjaxError(jqXHR, exception)
            {
               var  msg = "";
                if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
            location.reload();
            return true;
        }
         location.reload();
        return msg;
            }


    </script>

        <style>
html {
  scroll-behavior: smooth;
}
ul, #myUL {
  list-style-type: none;

}

#myUL {
  margin: 0;
  padding: 0;
  list-style-type: none;
    background-color: #0d6e0d;
    color: white;
    padding: 10px;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>

    @yield('pagelevel_scripts_headers')

    {{-- using in filter section for all pages and on assgin designation page my body and below body  --}}
    <link rel="stylesheet" href="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.min.css')}}" >
    <script src="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.js')}}"></script>

<style>

    body
    {
        color: black;
        font-family: "Titillium Web", sans-serif;
    }


    @media only screen and (max-width: 600px)
            {

#content{
    width: 100%;
    margin-top: 70px;
}


#content >  .layout-px-spacing >  .layout-top-spacing
{
display:block !important;
}
.nav {
    display: inline-flex !important;
	}


}
.sidebar-wrapper {

    height: -webkit-fill-available;
}


@media screen and (max-width: 480px) {
    html{
  zoom:80%;
}
}
@media screen and (min-width: 480px) {
    .fit_display{
  zoom:85%;

}
}
@media screen and (min-width: 1400px) {
    .fit_display{
  zoom:100%;
}
}
    </style>



<style>
    .btn-primary {
  color: #fff !important;
  background-color: #005f73!important;
  border-color: #054f5f;
  box-shadow: 0 10px 20px -10px #054f5f;
}
.modal-content .modal-footer .btn.btn-primary {
background-color: #005f73;
color: #fff;
border: 1px solid #054f5f;
}
@media (max-width: 991px)
{
.overlay.show {
    display: block;
    opacity: .7;
    width: -webkit-fill-available;
    height: -webkit-fill-available;
}
}
</style>



    <script>

        $(document).ready(function(){

if ($(window).width() <= 480) {
$("body").removeClass("alt-menu");
}

if ($(window).width() >= 480) {
$("body").addClass("alt-menu");
}
});


    </script>
 <link rel="stylesheet" href="{{asset('toast/dist/toast.min.css')}}">
</head>
<body class=""style='font-family: "Titillium Web", sans-serif;
 ;'>

    <!-- BEGIN LOADER -->
    @yield('loader')
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top ">

        <style>
.sidebar-wrapper ul.menu-categories li.menu.menu-heading > .heading {
font-size: 12px;
padding: 10px 0 10px 10px;
    letter-spacing: 0px
}

        </style>

        @include('dawa_theme.header.top_header')

    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

 
        @include('dawa_theme.sidebar.menu')



        <!--  END SIDEBAR  -->


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row  layout-top-spacing" >

                    @yield('content')

                </div>
            </div>

            {{-- Footer  --}}
            {{-- Footer  --}}
            @include('dawa_theme.includes.footer')
            {{-- Footer  --}}
            {{-- Footer  --}}

        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->

    <script src="{{asset('dawa_theme/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('dawa_theme/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dawa_theme/assets/js/app.js')}}"></script>

<!-- Latest compiled and minified JavaScript -->

    <script>


        $(document).ready(function() {

            App.init();
        });
    </script>
    <script src="{{asset('dawa_theme/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
          toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
          });
        }
        </script>

    @yield('pagelevel_scripts_footer')

<!--Start of Tawk.to Script-->
<script type="text/javascript">


  $(document).ready(function() {
         if($(window).width() < 600)
   {
       $('#mobile-view-activityLog').html($('#web-view-activityLog').html());
       $('#web-view-activityLog').html('');

   }




    });



  </script>
 @if(Auth::user()->user_type =="staff")

<div class="body-container">
    <div class="side-menu">

     <br>
     <br>
     <br>
     <br>
     <br>

        <div class="footer">

        <h4>Apply Forums Filter:</h4>

<hr>
       <form id="filter_form_fourms" method="post" action="{{route('apply.filter.on.forum')}}" >

        @csrf
  @if(Auth::user()->all_forum_access != null)
  <?php
  $activeForums = Auth::user()->active_forum_access->pluck('forum_id')->toArray();
  ?>

           <select id="forum_selection_filter" name="activeForums[]" multiple="multiple" required>
            @foreach (\App\Forum::where('frm_shown' , 1)->whereIN('id_frm' , Auth::user()->all_forum_access->pluck('forum_id')->toArray() )->get() as  $forum)
           <option
           @if(in_array($forum->id_frm  , $activeForums))  selected  @endif
           value="{{$forum->id_frm}}"  >   {{$forum->frm_code}}</option>
           @endforeach
       </select>


       <script type="text/javascript">
 var forum_selection = null;
       $(document).ready(function(){

        forum_selection = $("#forum_selection_filter").treeMultiselect({
          allowBatchSelection: false,
          enableSelectAll: true,
          searchable:false,
          sortable: false,
          startCollapsed: false,
          minSelections: 1,
          hideSidePanel:true,
        });

       });


        </script>
        <style>
            div.tree-multiselect>div.selected, div.tree-multiselect>div.selections { width:100%;}
            </style>



           <button type="submit" id="forum_filter_apply" class="btn btn-primary">
            Apply Filter</button>
       </form>

     @endif





      </div>

     <img  class="toggle-side" style="cursor: pointer;
    position: absolute;
    left: -45px;
    top: 55%;
    user-select: auto;
    width: 45px;
    z-index: 21;" src="{{asset('animation-svg-setting.gif')}}"/>
    </div>


  </div>


</body>

<script>



// So you will have to do something like the following...
$('#filter_form_fourms').submit(function(e){
	// Stop the form submitting
  	e.preventDefault();
  	// Do whatever it is you wish to do

      $('#forum_filter_apply').html('Please Wait ...');
                  $('.bg-overlay').show();
                  $('.se-pre-con').show();
    setTimeout(function(){  $('.bg-overlay').hide();
                  $('.se-pre-con').hide();}, 25000);

  	// Now submit it
    // Don't use $(this).submit() FFS!
  	// You'll never leave this function & smash the call stack! :D
  	e.currentTarget.submit();
});



//     $('.active_forums').click(function(){

//        var element_clicked = $(this);

//     var count =0;

//        $('.active_forums').each(function(index ){

//            if($(this).is(':checked'))
//             {
//                            count = count+1;
//                   }
//           });
//         if(count == 0)
//         {
//             element_clicked.prop('checked', true);
//         }


//    });


    $('#forum_filter_apply').click(function(){


//   $('#forum_filter_apply').html('Please Wait ...');
//                   $('.bg-overlay').show();
//                   $('.se-pre-con').show();
//     setTimeout(function(){  $('.bg-overlay').hide();
//                   $('.se-pre-con').hide();}, 25000);

  });
    $('.toggle-side').click(function(){
    $(".side-menu").toggleClass("show")
  })

  $('.close-side').click(function(){
    $(".side-menu").toggleClass("show")
  })
  </script>


<style>


    .body-container {
      width: 100%;
      height: 100%;
    }
    .body-container * {
     color: #eee;
     font-family: "Titillium Web", sans-serif;
    }
    .body-container .side-menu {
      width: 300px;
      top: 0;
      background-color: #060818;
      height: 100%;
      position: fixed;
      right: -300px;
      transition: all 0.5s;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: start;
      z-index: 30;
    }
    .body-container .side-menu .header {
      display: flex;
         justify-content: start;
      align-items: center;
    }
    .body-container .side-menu .header i {
      align-self: flex-start;
      cursor: pointer;
      transition: all 0.5s;
      transform: rotate(180deg) skewX(0deg);
    }
    .body-container .side-menu .header i:hover {
      color: #E59500;
    }
    .body-container .side-menu .header img {
      width: 60px;
      height: 60px;
      border-radius: 0.25rem;
    }
    .body-container .side-menu .header h1 {
      font-weight: normal;
      margin-top: 10px;
      font-size: 22px;
    }


    .body-container .side-menu .footer a i {
      margin-right: 10px;
    }

    .body-container .side-menu.show {
      right: 0;
    }
    .body-container .side-menu.show .header i {
      transform: rotate(0deg) skewX(0deg);
    }
    .body-container .body-main {
      width: 100%;
      height: 100%;
      background-color: grey;
      background-size: cover;
      margin-top: 56px;
      position: relative;
      background: #060818;
    }

     </style>

@endif

{{-- <style>


    #myBtn {
       display: none;
      position: fixed;
      bottom: 30px;
      right: 50px;
      z-index: 99;
      background-color: #971313;

      border: none;
      outline: none;

      color: white;
      cursor: pointer;

      border-radius: 50%;
    }


    </style> --}}
{{-- <span  onclick="topFunction()" id="myBtn"
title="Go to top">



       <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg>
</span> --}}


<style>

.se-pre-con {
	position: fixed;
	margin:auto;
	right:0;
	bottom:0;
	left: 0px;
	top: 0px;
	width: 30px;
	height: 30px;
	z-index: 99999;

}
.cssload-container{
	position:relative;
}

.cssload-whirlpool,
.cssload-whirlpool::before,
.cssload-whirlpool::after {
	position: absolute;
	top: 50%;
	left: 50%;
	border: 1px solid rgb(204,204,204);
	border-left-color: rgb(0,0,0);
	border-radius: 1124px;
		-o-border-radius: 1124px;
		-ms-border-radius: 1124px;
		-webkit-border-radius: 1124px;
		-moz-border-radius: 1124px;
}

.cssload-whirlpool {
	margin: -28px 0 0 -28px;
	height: 56px;
	width: 56px;
	animation: cssload-rotate 1150ms linear infinite;
		-o-animation: cssload-rotate 1150ms linear infinite;
		-ms-animation: cssload-rotate 1150ms linear infinite;
		-webkit-animation: cssload-rotate 1150ms linear infinite;
		-moz-animation: cssload-rotate 1150ms linear infinite;
}

.cssload-whirlpool::before {
	content: "";
	margin: -26px 0 0 -26px;
	height: 50px;
	width: 50px;
	animation: cssload-rotate 1150ms linear infinite;
		-o-animation: cssload-rotate 1150ms linear infinite;
		-ms-animation: cssload-rotate 1150ms linear infinite;
		-webkit-animation: cssload-rotate 1150ms linear infinite;
		-moz-animation: cssload-rotate 1150ms linear infinite;
}

.cssload-whirlpool::after {
	content: "";
	margin: -33px 0 0 -33px;
	height: 63px;
	width: 63px;
	animation: cssload-rotate 2300ms linear infinite;
		-o-animation: cssload-rotate 2300ms linear infinite;
		-ms-animation: cssload-rotate 2300ms linear infinite;
		-webkit-animation: cssload-rotate 2300ms linear infinite;
		-moz-animation: cssload-rotate 2300ms linear infinite;
}



@keyframes cssload-rotate {
	100% {
		transform: rotate(360deg);
	}
}

@-o-keyframes cssload-rotate {
	100% {
		-o-transform: rotate(360deg);
	}
}

@-ms-keyframes cssload-rotate {
	100% {
		-ms-transform: rotate(360deg);
	}
}

@-webkit-keyframes cssload-rotate {
	100% {
		-webkit-transform: rotate(360deg);
	}
}

@-moz-keyframes cssload-rotate {
	100% {
		-moz-transform: rotate(360deg);
	}
}

/**** Background *****/
.bg-overlay
    {
    position: fixed;
    display: block;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 9999;
    background: rgba(0,0,0,0.6);
}

</style>


<div class="se-pre-con"  style="display:none;">
  <div class="cssload-container">
	    <div class="cssload-whirlpool"></div>
  </div>
</div>
<div class="bg-overlay"   style="display:none;" ></div>


<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$('.loder-style').click(function(){

    $('.se-pre-con').show();
    $('.bg-overlay').show();

    setTimeout(function(){
        $('.se-pre-con').hide();
    $('.bg-overlay').hide();

    }, 25000);
});

</script>

<style>
    #manage_designation_li {   color: #c7c9ce !important; }
    </style>


<script src="{{asset('toast/dist/toast.min.js')}}"></script>
<script>
    const TYPES = ['info', 'warning', 'success', 'error'],
        TITLES = {
            'info': 'Notice!',
            'success': 'Awesome!',
            'warning': 'Watch Out!',
            'error': 'Doh!'
        },
        CONTENT = {
            'info': 'Hello, world! This is a toast message.',
            'success': 'The action has been completed.',
            'warning': 'It\'s all about to go wrong',
            'error': 'It all went wrong.'
        },
        POSITION = ['top-right', 'top-left', 'top-center', 'bottom-right', 'bottom-left', 'bottom-center'];

    $.toastDefaults.position = 'top-righ';
    $.toastDefaults.dismissible = true;
    $.toastDefaults.stackable = true;
    $.toastDefaults.pauseDelayOnHover = true;

    $('.snack').click(function () {
        var type = TYPES[Math.floor(Math.random() * TYPES.length)],
            content = CONTENT[type];

        $.snack(type, content);
    });

    $('.toast-btn').click(function () {
        var rng = Math.floor(Math.random() * 2) + 1,
            type = TYPES[Math.floor(Math.random() * TYPES.length)],
            title = TITLES[type],
            content = CONTENT[type];

        if (rng === 1) {
            $.toast({
                type: type,
                title: title,
                subtitle: '11 mins ago',
                content: content,
                delay: 5000
            });
        } else {
            $.toast({
                type: type,
                title: title,
                subtitle: '11 mins ago',
                content: content,
                delay: 5000,
                img: {
                    src: 'https://via.placeholder.com/20',
                    alt: 'Image'
                }
            });
        }
    });
</script>

<style>
.toast-body
{
color: black;
}
</style>

<?php $i=3000; ?>
@if(Auth::user()->user_type == "worker")
@foreach (auth::user()->load('promoted_Workers_noti')->promoted_Workers_noti()->get() as  $promoted)

<script>
    $(document).ready(function(){


        setTimeout(function(){
            $.toast({
            title: 'Congratulation! <br>Worker Promoted',
            position:'top-right',
            subtitle:  `{{\Carbon\Carbon::parse($promoted->created_at)->diffForHumans()}}`,
            content: `Your Broadcast Member
            <br><b>Name</b>:{{$promoted->name}}
            <br><b>Whatsapp</b>:{{$promoted->whatsapp}}
            <br>Promoted as a Worker.`,
            type: 'success',
            delay: 15000,
            dismissible: true,

        });
}, {{$i}});

    });
</script>
<?php $i= $i + 3000; ?>
<?php   $promoted->promoted_notification = 1;  $promoted->save();   ?>
@endforeach
@endif

@if(Auth::user()->user_type == "worker")
@foreach (auth::user()->load('added_Workers_by_refferal_noti')->added_Workers_by_refferal_noti()->get() as  $Added)

<script>
    $(document).ready(function(){


        setTimeout(function(){
            $.toast({
            title: 'Congratulation!<br>  Referral Worker Register',
            position:'top-right',
            subtitle:  `{{\Carbon\Carbon::parse($Added->created_at)->diffForHumans()}}`,
            content: `Your Referral invity
            <br><b>Name</b>:{{$Added->name}}
            <br><b>Whatsapp</b>:{{$Added->whatsapp}}
            <br>Registered as a Worker.`,
            type: 'info',
            delay: 15000,
            dismissible: true,

        });
}, {{$i}});


    });
</script>
<?php $i= $i + 3000; ?>
<?php   $Added->added_notification = 1;  $Added->save();   ?>
@endforeach
@endif

 </html>
