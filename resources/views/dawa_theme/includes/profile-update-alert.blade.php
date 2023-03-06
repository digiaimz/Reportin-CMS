
{{-- alert message --}}
{{-- alert message --}}



@if($progress_complete!=100)

   <a href="{{route('user.profile')}}">
   <div id="profile-complete-update-msg" class="alert alert-arrow-left alert-icon-left alert-light-warning  " role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        <strong>Alert!</strong> Please Update Your Profile 100%.
          Click here.
   </div>
   </a>
   <Script>

       var myVar;


       function alertFunc() {

           if ( $('#profile-complete-update-msg').css('visibility') == "visible" )
           {
                  $('#profile-complete-update-msg').css({  visibility: "hidden"});
           }
           else
           {
               $('#profile-complete-update-msg').css({  visibility: "visible"});
           }

       }
       myVar = setInterval(alertFunc, 1000);

       function myStopFunction() {
           clearInterval(myVar);
           $('#profile-complete-update-msg').css({  visibility: "visible"});
                       }
       function mouseOut() {
           myVar = setInterval(alertFunc, 1000);
                       }
   document.getElementById("profile-complete-update-msg").addEventListener("mouseover", myStopFunction);
   document.getElementById("profile-complete-update-msg").addEventListener("mouseout", mouseOut);
                          </script>

     <div class="progress br-30">
       <div class="progress-bar @if($progress_complete < 70 ) bg-warning @else bg-info @endif  progress-bar-striped progress-bar-animated"
       role="progressbar" style="width: {{$progress_complete}}%;      font-weight: 700;
       font-size: 16px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
   {{$progress_complete}}%
   </div>
   </div>


   @endif


{{-- alert message --}}
{{-- alert message --}}

