<div class="img-rounded" id="hideAnnouncement" style="  background-color: #fffbcf;    border: 1px solid black;
                       margin: 10px 0px 10px 0px;    position: relative; ">
                        <svg onclick="hideAnnouncement()" style="    position: absolute;

                        right: 10px;
                        top: 5px;    cursor: pointer;
                        color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        <h3 style="color: #ffffff; background-color: #2a4e57; text-align: center; margin: 0px; padding: 0px;">Announcement</h3>
                        <div id="cc-homepage-announcements" style="  overflow-x: hidden; overflow-y: auto; padding: 6px; text-align: center;
                         font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, 'Alvi Nastaleeq', 'BahijNassim', Titillium Web, sans-serif;
                         font-size: 18px;cursor:pointer;
                        " dir="rtl"
                        onclick="viewPage()"
                        >


        {{config('app.announcement')}}

                             </div>
                             <script>
                                function hideAnnouncement(){
                                   $('#hideAnnouncement').hide();
                                }
                                function viewPage(){
                                  window.location="{{route('view.clips')}}";
                                }
                                </script>
                        </div>


    <style>
    @media screen and (max-width: 480px) {
  #seen_clips_widget {margin-top: 1.0rem;}

}
    </style>



    <style>

    .widget-five .w-content div .task-left {
        margin-bottom: 0;
        font-size: 30px;
        color: #1b55e2;
        background: #c2d5ff;
        font-weight: 600;
        border-radius: 50%;
        display: inline-flex;
        height: 76px;
        min-width: 161px;
    }
    .widget-five {
    background: #fff;
    padding: 0px 0 0 0;
    height: 100%;
}
    </style>


<br>




<div class="widget widget-activity-two mb-4" style="height: auto;">
    <link href="{{asset('loading/style.css')}}" rel="stylesheet" type="text/css" />

    <div class="widget-heading">
        <h5 class="">Latest Clip  </h5>



        <a class="badge badge-danger" href="{{route('view.clips')}}"> View All </a>


    </div>
    <div  id="counter_timer_for_new_video" hidden>


         </div>


    <div class="widget-content" id="recent-clip">


        <div class="animated-background">
            <div class="background-masker btn-divide-left"></div>
          </div>
          <br>
          <div class="animated-background">
            <div class="background-masker btn-divide-left"></div>
          </div>
          <div class="animated-background">
            <div class="background-masker btn-divide-left"></div>
          </div>
          <br>
          <div class="animated-background">
            <div class="background-masker btn-divide-left"></div>
          </div>


    </div>

    <script>

    function getClip()
{


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'GET',
url: "{{ route('get.recent.clip') }}" ,
success:function(data){

if (data.status == "ok")
{
    $('#recent-clip').html(data.view);

}



},
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);
            process_end();
            if(msg!= true)
            {
                    alert(msg);
            }

    },


});



}

$(document).ready(function(){
    getClip();
});





    </script>




</div>




<div id="seen_clips_widget" class="widget widget-five  widget-activity-two mb-4" style="height: auto;">
    <div class="widget-heading">
        <h5 class="">Seen Videos </h5>
        <a class="badge badge-danger" href="{{route('view.clips')}}"> View All </a>
    </div>
    <div class="widget-content" style="    padding: 0px 20px 0px 20px;">



        <div class="w-content">
            <div class="">
                <p class="task-left">
                    <span id="once_clip_total_views">{{\App\ClipView::where('user_id',auth::id())
                    ->distinct('clip_id')
                    ->where('action' , 'view')->count()}}</span> &nbsp;of&nbsp;

                    <span> {{\App\Clip::where('status',1)->where('datetime', '<=' ,  now() )->count()}}</span> </p>

            </div>
        </div>
    </div>
</div>



<script src='https://cdn.rawgit.com/vuejs/vue/v1.0.24/dist/vue.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js'></script>
<link href="{{asset('countdown/main.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('countdown/script.js')}}" ></script>
