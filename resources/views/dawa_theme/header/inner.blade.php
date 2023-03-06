<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php
    $requests = Auth::user()->received_requests;
   ?>
     <?php
     $notifications =  auth::user()->unreadNotifications ;
        ?>
    <svg id="show-notifications" onclick="$(this).removeClass('bell-ring');" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
     stroke-linecap="round" stroke-linejoin="round" class="feather @if(count($requests) > 0 ||   count($notifications) > 0) bell-ring @endif feather-bell">
     <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
     <path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>


    {{-- <span id="notification" class="badge badge-danger counter">0</span> --}}
</a>


@if( count($notifications) > 0)
<script>

    $(document).ready(function(){
        $('#show-notifications').click(function(){

           $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  request_id: "yes"  };
$.ajax({
type:'POST',
url: "{{ route('mark.notification.as.read') }}" ,
data: data_var ,
success:function(data){

console.log(data);

},
error: function (jqXHR, exception) {
var msg = AjaxError(jqXHR, exception);

if(msg!= true)
{
   alert(msg);
}

},


});


        });

    });


</script>
@endif


    <div id="paste-notification-down" style="max-height: max-content;
    width: max-content;
    overflow: scroll;  ;" class="dropdown-menu p-0 position-absolute" aria-labelledby="notificationDropdown">
    <div class="notification-scroll">

        <h6 style="padding:20px 0px 0px 20px; font-weight: 750;"> @lang('Notifications') </h6>
        <hr style="margin:0px 20px 0px 20px; border:1px solid black;" />

        @if(
        count($requests) > 0 ||
        count($notifications) > 0
        )


        <div class=""  >



            @foreach ( $notifications as  $notification)

            <?php     $request = \App\Complain::find($notification->data['request_id']); ?>

            <a href="{{route('complain.view.worker')}}" class="dropdown-item">
                <div class="">

                    <div class="media">
                        <div class="user-img">
                            <img class="usr-img rounded-circle"
                            style="width: 80px;height:80px;" loading="lazy"
                            src="{{asset($request->to_->photo)}}"
                             alt="profile">
                        </div>
                        <div class="media-body">
                            <div class="">

                                <p class="msg-title">


                                 @if ($request->is_resolved == 1)
                                  <svg style="color: green;margin: 0px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                   stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                   <polyline points="20 6 9 17 4 12"></polyline></svg>
                                  {{$request->to_->name}} @lang(' Accept Your Request and')<br> @lang('Invity Added into Your Broadcast list')

                                 @elseif ($request->is_resolved == -1)
                                 <svg style="margin: 0px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-alert-triangle"><path
                                   d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                </path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17">
                                    </line></svg>
                                 {{$request->to_->name}}  @lang('Reject Your Request for')<br>
                                 @lang('Release Invity from Broadcast list.')

                                  @endif
                                 <br>
                                    <b>@lang('Invity:')</b>
                                    <?php $country = json_decode($request->invity->country );  ?>

                                        <span class="iti__flag flag-custom iti__{{ $country->iso2 }} "  ></span>
                                         <span style="    vertical-align: top;"> +{{ $country->dialCode }} {{$request->invity->whatsapp}}</span>


                                    <br>

                                    {{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                      <br>
                                     </p>
                            </div>
                        </div>
                    </div>

                </div>
            </a>

            @endforeach





            {{-- end text notificatoins --}}



            @foreach ( $requests as  $request)

            <a class="dropdown-item">
                <div class="">

                    <div class="media">
                        <div class="user-img">
                            <img class="usr-img rounded-circle"
                            style="width: 80px;height:80px;" loading="lazy"
                            src="{{asset($request->from_->photo)}}"
                             alt="profile">
                        </div>
                        <div class="media-body">
                            <div class="">

                                <p class="msg-title">
                                    <b>@lang('Title:')</b> @lang('Request For Release Duplicate Invity.')<br>
                                    <b>@lang('From:')</b> {{$request->from_->name}}<br>
                                    <b>@lang('Invity:')</b>
                                    <?php $country = json_decode($request->invity->country );  ?>

                                        <span class="iti__flag flag-custom iti__{{ $country->iso2 }} "  ></span>
                                         <span style="    vertical-align: top;"> +{{ $country->dialCode }} {{$request->invity->whatsapp}}</span>


                                    <br>
                                    <b>@lang('Request:')</b> {{$request->complain}} <br>
                                    {{\Carbon\Carbon::parse($request->created_at)->diffForHumans()}}
                                    </p>
                                    <span>
                                    <button data-button="allow" data-id="{{$request->id}}" class=" noti btn btn-primary  ">
                                        <svg style="    color: greenyellow;margin:0px;" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-check"><polyline
                                          points="20 6 9 17 4 12"></polyline></svg> @lang('Allow')
                                    </button>
                                    <button data-button="cancel" data-id="{{$request->id}}" class=" noti btn btn-danger  ">
                                        <svg style="    color: darkred;margin:0px;" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon">
                                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                            </polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15">
                                                </line></svg> @lang('Reject')

                                    </button>
                                    </span>
                            </div>
                        </div>
                    </div>

                </div>
            </a>

            @endforeach

        </div>
@else

        <center style="color:orange;"><small>@lang('Not Found')</small></center>
@endif
    </div>
</div>




<Script>
    $(document).ready(function(){

        $(".noti").click(function(){


$(this).html("Please Wait...");
$(this).parent().children().prop('disabled',true);
var element =  $(this);

// warning <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
// <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  request_id: $(this).attr('data-id') , button:  $(this).attr('data-button')    };
$.ajax({
type:'POST',
url: "{{ route('manage.complain.requests') }}" ,
data: data_var ,
success:function(data){

console.log(data);

if (data.status == "allow")
{
element.parent().html(`
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
 Thanks For Your Response. `);

}
else if (data.status == "cancel")
{
element.parent().html(`
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
You has Rejected this Request.`);
}
else
{
element.parent().html(`
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
System Catch Error!", "Somthing went Wrong try again latter.`);

}


},
           error: function (jqXHR, exception) {
    var msg = AjaxError(jqXHR, exception);

        if(msg!= true)
        {
                alert(msg);
        }

},


});




});


$('.navbar .dropdown.notification-dropdown > .dropdown-menu, .navbar .dropdown.message-dropdown > .dropdown-menu ').click(function(e) {
e.stopPropagation();
});


});


</script>
