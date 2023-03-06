
@include('dawa_theme.scripts.watch_clip')

@foreach ( \App\Clip::orderBy('datetime','desc')->where('status' ,  1)->where('datetime', '<=' ,  now() )->take(1)->get() as $clip )

<div class="modal-content">
    <div class="modal-header"   style="font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;
       font-size: 21px; display:block;text-align: right;">





<span id=" ">{{$clip->clip_id}}</span>
<b>:
کلپ نمبر
</b>
<br>

<b>
عنوان
:</b>
<span id=" ">{{$clip->title}}</span>
<br>

<span id=" ">{{\Carbon\Carbon::parse($clip->datetime)->format('d-M-Y')}}</span>
<b>:
تاریخ ارسال
</B>

@if($clip->description == null || trim($clip->description) == "" &&  false)


{{-- share button  --}}
{{-- share button  --}}

<?php
$message = "
*السلام علیکم ورحمۃ اللہ وبرکاتہ*
*فہم دین پراجیکٹ*
*کلپ نمبر:* ".$clip->clip_id."
*دورانیہ:* ".$clip->short_." منٹ
_بتاریخ: 2 دسمبر 2021ء بروز جمعرات_
*کلپ کا عنوان:*  ".$clip->title."
";

 $message = $message . strip_tags($clip->description);
 $message =  $message ."
---------------------------------------------------------------------------
مکمل کلپ کو لنک کے ذریعے سنیں، نیز لائیک، کمنٹ اور شیئر بھی کریں۔
".$clip->youtube_link;
$message = urlencode( $message );
  ?>
  {{-- <a id="mobile_referral_share_link_home"   href="whatsapp://send?text={!!$message!!}" data-action="share/whatsapp/share">
  <img style=" max-width: 95px;
  float: left;
  margin-top: -26px;"  src="{{asset('share-button/share-button.png')}}" />


  </a>
  <a  id="web_referral_share_link_home"  target="_blank" href="https://web.whatsapp.com/send?phone&text={!!$message!!}" data-action="share/whatsapp/share">
       <img style=" max-width: 95px;
       float: left;
       margin-top: -26px;"  src="{{asset('share-button/share-button.png')}}" />    </a>

@if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
<a   target="_blank" href="{{$clip->audio_download_link}}" >
     <img style="       max-width: 149px;
     float: left;
     margin-top: -91px;
     margin-left: -96px;
     user-select: auto;;"  src="{{asset('share-button/download-audio_button-.png')}}" />   </a>
@endif
@if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
<a   target="_blank"  href="{{$clip->video_download_link}}" >
     <img style="max-width: 149px;
     float: left;
     margin-top: -59px;
     margin-left: -96px;
     user-select: auto;"  src="{{asset('share-button/download-video_button-.png')}}" />  </a>
@endif


<style>


#web_referral_share_link_home {
display: none;
/*  none  */
}
#mobile_referral_share_link_home {
display: block;
}
@media screen and (min-width: 580px) {
#web_referral_share_link_home {
display: block;
}
#mobile_referral_share_link_home {
display: none;
/*  none */
}
}
</style>
 --}}





{{-- share button  --}}
{{-- share button  --}}
@endif



<script src="https://www.youtube.com/iframe_api"></script>
    </div>
    <div class="modal-body p-0">
        <div class="video-container">

            @if($clip->id == 141)
            <a target="_blank" onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , true , 'video')"  href="https://www.fb.com/watch/?v=753117505874783" >
<img style="    position: absolute;
width: -webkit-fill-available;
height: -webkit-fill-available;cursor: pointer;" src="https://vision.minhaj.org/extra/clip-141.png" />
            </a>
            @endif


            <style>

           #recent-iframe-video-clip   {
            width: -webkit-fill-available;
             height: 300px;
             width: -moz-available;
            ;
            }

            </style>

             <div id="recent-iframe-video-clip"  ></div>

             <script>
                 var interval_video = null;
               var time_watch = 0;
                var player, playing = false;
function updateTime()
{
time_watch = time_watch + 3;
if(time_watch > 295 )
{
    clearInterval(interval_video); // stop the interval_video
    add_view_clip('{{$clip->id}}' , true);
}
}
                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('recent-iframe-video-clip', {

                        videoId: '{{str_replace("https://youtu.be/","",$clip->youtube_link)}}',
                        events: {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }

                function onPlayerStateChange(event) {

                //   if (event.data == YT.PlayerState.PLAYING) {
                //     add_view_clip('{{$clip->id}}' , true);
                //    //  alert('video started');
                //      playing = true;
                //     }

                    if (event.data == YT.PlayerState.PLAYING) {
                    interval_video = setInterval(updateTime,3000);
                    // add_view_clip( current_clip_id , false);
                    //  alert('video started');
                     playing = true;
                    }
                  if (event.data ==YT.PlayerState.PAUSED) {

                    clearInterval(interval_video); // stop the interval_video
                    }


            }
            </script>





        </div>

        <hr>








        <?php
        $message = "
*السلام علیکم ورحمۃ اللہ وبرکاتہ*
*فہم دین پراجیکٹ*
*کلپ نمبر:* ".$clip->clip_id."
*دورانیہ:* ".$clip->short_." منٹ
_بتاریخ: 2 دسمبر 2021ء بروز جمعرات_
*کلپ کا عنوان:*  ".$clip->title."
";

         $message = $message . strip_tags($clip->description);
         $message =  $message ."
---------------------------------------------------------------------
مکمل کلپ کو لنک کے ذریعے سنیں، نیز لائیک، کمنٹ اور شیئر بھی کریں۔
".$clip->youtube_link;
        $message = urlencode( $message );
          ?>

          <div style="text-align: right;    display: flex;
          justify-content: space-evenly;">

            @if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
          <a   onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , true , 'video')"    target="_blank" href="{{$clip->audio_download_link}}" >
               <img style="    max-width: 95px;
      margin-top: 3px;


               user-select: auto;"  src="{{asset('share-button/download-audio_button-.png')}}" />   </a>
        @endif
        @if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
          <a  onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , true , 'audio')"    target="_blank"  href="{{$clip->video_download_link}}" >
               <img style="     max-width: 95px;

margin-top: 3px;

               user-select: auto;"  src="{{asset('share-button/download-video_button-.png')}}" />  </a>
        @endif


          <a  id="mobile_referral_share_link_home"   href="whatsapp://send?text={!!$message!!}" data-action="share/whatsapp/share">
          <img style=" max-width: 95px;
         margin-top: 3px;
           "  src="{{asset('share-button/share-button.png')}}" />
          </a>


          <a   id="web_referral_share_link_home"  target="_blank" href="https://web.whatsapp.com/send?phone&text={!!$message!!}" data-action="share/whatsapp/share">
               <img style=" max-width: 95px;
                     margin-top: 3px;
               "  src="{{asset('share-button/share-button.png')}}" />    </a>

    <img onclick="player.playVideo();" hidden style="  cursor:pointer;   max-width: 95px;
    margin-top: 3px;  user-select: auto;"   src="{{asset('share-button/play-video.png')}}" />
    </div>
<style>


#web_referral_share_link_home {
      display: none;
      }
        #mobile_referral_share_link_home {
      display: inline;
      }
    @media screen and (min-width: 580px) {
        #web_referral_share_link_home {
      display: inline;
      }
        #mobile_referral_share_link_home {
      display: none;
      }
    }
    </style>

@if($clip->description != null && trim($clip->description) != "")
<br>
        <span style="font-size: large;
font-weight: 600;">Discription:
        </span>
        <br>
        <style>

        .urdu > * {
            font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;
font-size: 24px;
line-height: normal;
color: black;     text-align: right
        }
      .urdu > p > span   {
            color: #000000 !important;
font-size: 14pt !important;
        }
      .urdu > *  {
            color: #000000 !important;
font-size: 14pt !important;
        }

        </style>
        <span class="urdu">

    {!! $clip->description !!}

        </span>
        @endif
    </div>
</div>

@endforeach
