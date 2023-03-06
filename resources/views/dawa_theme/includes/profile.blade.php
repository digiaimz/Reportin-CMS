
<div class="user-profile layout-spacing  @if(Auth::user()->user_type == 'worker')  fit_display  @endif">



    <div class="widget widget-activity-two  " style="height: auto;filter: none;"   >

       


        <div class="widget-heading d-flex justify-content-between">
            <h5 class="">Profile</h5>
            <div>
             

             <a title="Edit Profile" href="{{route('user.profile')}}" class="  edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
            </div>
        </div>

        <div class="widget-content" style="display: flow-root;">

 


    <div class="text-center user-info"   style="width:30%;float:left;">

     <img style="max-width: 87px;max-height: 87px; border-radius: 9px;
    box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 12%), 0 3px 5px -1px rgb(0 0 0 / 20%);padding:7px;" src="{{asset(Auth::user()->photo)}}" alt="avatar">



    </div>
    <div class="  user-info"   style="width:70%;float:right;">

        <p>{{Auth::user()->name}}
            
          <i class="fa fa-check-circle" style="    color: #1eb91e;
            font-size: 19px;"></i>
           
            </p>
        <p>  @if(Auth::user()->email==null ||
                    Auth::user()->email=='')
                   N/A
                    @else
                    {{Auth::user()->email}}
                    @endif</p>

 

    </div>
    <div class="  widget-account-invoice-one">

        <style>
            .info-detail-2  > p{
                    font-weight: 700;
                    font-size: 14px;
            }
            .info-detail-2 {
                display: flex;
        justify-content: space-between;

            }

        </style>

<div class="widget-content">
    <div class="invoice-box">





    </div>
</div>

</div>

    {{-- Prfile content --}}

        </div>
    </div>







</div>
