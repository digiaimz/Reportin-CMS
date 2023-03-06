@extends('layouts.dawa_theme')
@section('clips_active')
active
@endsection
@section('clips_active_aria') aria-expanded="true" @endsection

@section('title')
@lang('Clips')
@endsection
@section('loader')
<div id="load_screen"  > <div class="loader"> <div class="loader-content">
<div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<link  href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}"rel="stylesheet" type="text/css" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}
{{-- <script src="{{asset('dawa_theme/assets/js/sweetalert.min.js')}}" ></script> --}}
<link  href="{{asset('clip-quiz.css')}}"rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@endsection

@section('pagelevel_scripts_footer')

<script>
var current_clip_element =null;
</script>

@include('dawa_theme.scripts.watch_clip')

<script src="https://www.youtube.com/iframe_api"></script>
<script>
var interval = null;
var time_watch = 0;
var current_clip_id =null;

var player, playing = false;

    function onYouTubeIframeAPIReady() {
                        player = new YT.Player('play-iframe-video-clip', {
                                videoId: 'Z-ItzWURxWk',
                                playerVars: {rel: 0, showinfo: 0, ecver: 2},
                            events: {
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    }

                    function onPlayerStateChange(event) {

                        if (event.data == YT.PlayerState.PLAYING) {
                        interval = setInterval(updateTime,3000);
                        // add_view_clip( current_clip_id , false);
                        //  alert('video started');
                            playing = true;
                        }
                        if (event.data ==YT.PlayerState.PAUSED) {

                        clearInterval(interval); // stop the interval
                        }

                }

</script>


<script>


    function updateTime()
    {
    time_watch = time_watch + 3;
    if(time_watch > 120 )
    {
        clearInterval(interval); // stop the interval
        add_view_clip( current_clip_id , false);
    }
    }

$('.video-row').click(function () {

    $('#render_discription').html($(this).parent().parent().children('.discription').html());
    if($(this).parent().parent().children('.discription').html().trim() == "")
    {
        $('#render_discription_title').hide();
    }
    else
    {
        $('#render_discription_title').show();
    }

    var src= null;
    current_clip_id =  $(this).attr('data-id');
    current_clip_element =  $(this).parent().parent();
    if($(this).attr('data-type') == "facebook")
    {
        interval = setInterval(updateTime,3000);
        // add_view_clip( current_clip_id , false);
$('#youtube-video').show();
$('#play-iframe-video-clip').hide();
src = 'https://www.facebook.com/plugins/video.php?href='+$(this).attr('data-link')+'&show_text=true&appId';
$('#youtube-video').attr({
        'src': src,
        'width': '800',
        'height': '415',
        'allow': 'encrypted-media'
    }).css('border', '0');
    }
    else{


$('#youtube-video').hide();
    $('#play-iframe-video-clip').show();

        player.cueVideoById($(this).attr('data-link') );
        time_watch = 0;

        // player.stopVideo();

    }

    $('#video-title').html($(this).attr('data-title'));
    $('#clips_view_append').html($(this).parent().parent().find('.clips_view_get').html());



    $('#videoMedia1').modal('show');

});
// $('#vimeo-video-link').click(function () {
//     var src = 'https://player.vimeo.com/video/1084537';
//     $('#videoMedia2').modal('show');
//     $('<iframe>').attr({
//         'src': src,
//         'width': '560',
//         'height': '315',
//         'allow': 'encrypted-media'
//     }).css('border', '0').appendTo('#videoMedia2 .video-container');
// });
$('#videoMedia1 button, #videoMedia2 button').click(function () {
    // $('#videoMedia1 iframe, #videoMedia2 iframe').removeAttr('src');
    player.stopVideo();
    clearInterval(interval); // stop the interval
    time_watch = 0;
});
</script>


<script>


var questionArea    = document.getElementsByClassName('questions')[0],
answerArea      = document.getElementsByClassName('answers')[0],
checker         = document.getElementsByClassName('checker')[0],
current         = 0,
current_clip_id = 0 ,
// An object that holds all the questions + possible answers.
    // In the array --> last digit gives the right answer position
    allQuestions = null;
    var score_points = [];
    var quizElement = null;
    var jsonQuestion = null;


    $('.take-quiz-element').click(function () {

    quizElement = $(this);
    allQuestions = JSON.parse($(this).attr('data-questions'));
    setCurrentVideoQuestions($(this).attr('data-clip-id'));

});



function loadQuestion(curr) {
// This function loads all the question into the questionArea
// It grabs the current question based on the 'current'-variable

var question = Object.keys(allQuestions)[curr];

questionArea.innerHTML = '';
questionArea.innerHTML = question;
}

function loadAnswers(curr) {
// This function loads all the possible answers of the given question
// It grabs the needed answer-array with the help of the current-variable
// Every answer is added with an 'onclick'-function

var answers = allQuestions[Object.keys(allQuestions)[curr]];

answerArea.innerHTML = '';

for (var i = 0; i < answers.length -1; i += 1) {


    if( answers[i].trim() !=  "N/A")
        {
    var createDiv = document.createElement('div'),
        text = document.createTextNode(answers[i]);

    createDiv.appendChild(text);
    createDiv.addEventListener("click", checkAnswer(i, answers));


    answerArea.appendChild(createDiv);
        }
}
}

function checkAnswer(i, arr) {
// This is the function that will run, when clicked on one of the answers
// Check if givenAnswer is sams as the correct one
// After this, check if it's the last question:
// If it is: empty the answerArea and let them know it's done.

return function () {
    var givenAnswer = i,
        correctAnswer = arr[arr.length-1];

        score_points.push(givenAnswer);

    if (givenAnswer === correctAnswer) {

    addChecker(true);
    } else {
    addChecker(false);
    }

    if (current < Object.keys(allQuestions).length -1) {
    current += 1;

    loadQuestion(current);
    loadAnswers(current);
    } else {
    console.log("You Got: "+score_points.join(",").toString()+" Marks of Clip ID"+ current_clip_id);
    saveResult(score_points.join(",").toString() , current_clip_id);
    questionArea.innerHTML = 'Thank You <br> Your Response has been Saved.';
    $('.checkAnswers').show();
    answerArea.innerHTML = '';
    quizElement.next().show();
    quizElement.hide();
    }

};
}

function addChecker(bool) {
// This function adds a div element to the page
// Used to see if it was correct or false

var createDiv = document.createElement('div'),
    txt       = document.createTextNode(current + 1);

createDiv.appendChild(txt);

if (bool) {

    createDiv.className += 'correct';
    checker.appendChild(createDiv);
} else {
    createDiv.className += 'false';
    checker.appendChild(createDiv);
}
}

</script>

<script>

    function saveResult(result ,  clip_id)
     {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var data_var = {  clip_id: clip_id , result:result    };
    $.ajax({
    type:'POST',
    url: "{{ route('add.to.result') }}" ,
    data: data_var ,
    success:function(data){
    console.log(data);
    }
    });
    }



function setCurrentVideoQuestions(clip_id)
    {
        $('.checkAnswers').hide();
    checker.innerHTML = '';
        current_clip_id = clip_id;
        current     = 0;
        score_points = [];


loadQuestion(current);
loadAnswers(current);
$('#quiz_model').modal('show');
    return true;
    }




</script>

@endsection
@section('content')

<style>
.table > tbody > tr > td {
border: none;
color: #000000;
font-size: 21px;
letter-spacing: 0px;
font-family: Calibri;
cursor: pointer;
}

.urdu
{
font-family: Calibri;
font-size: 20px !important;
direction: rtl; text-align: right;
}
@media only screen and (max-width: 600px)
            {
                .urdu
{
font-family: Calibri;
font-size: 16px !important;
direction: rtl; text-align: right;
}
            }

            .calender_img{
                max-width: 20px;
            }
            .hits_img{
                max-width: 20px;
            }
            .circular_button{
                object-fit: unset !important;
height: unset !important;
width: unset !important;
max-width: 100px;
position: absolute;
left: 103px;
top: 37px;
            }

</style>






<!-- Modal Quiz-->
<div class="modal fade" id="quiz_model" tabindex="-1" role="dialog" aria-labelledby="videoMedia1LabelQuiz" aria-hidden="true">
<div class="modal-dialog modal-lg" style="    max-width: fit-content;" role="document">
    <div class="modal-content" style="background: transparent;">

        <div class="modal-body p-0" >

            <button  style="position: absolute; right: 37px; top: 41px;"   type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg style="color: white;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18">
                </line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

        <main>
            <!-- Start DEMO HTML (Use the following code into your project)-->
            <div class="wrapper">
            <div id="quiz">
                <h1>Video Clip Quiz</h1>

                <p class="questions">

                </p>

                <div class="answers">

                </div>

                <div class="checkAnswers">
                <h3>Your Quiz Result</h3>
                <div class="checker">

                </div>
                </div>
            </div>
            </div>
            <!-- END EDMO HTML (Happy Coding!)-->
        </main>



        </div>
    </div>
</div>
</div>

















<!-- Modal -->
<div class="modal fade" id="videoMedia1" tabindex="-1" role="dialog" aria-labelledby="videoMedia1Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" id="videoMedia1Label" style="justify-content: end;"   >


            <button  style="position: absolute; left: 0px;"   type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg style="color: black;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18">
                </line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>


                <span style="font-family: Calibri;
                font-size: 20px;
                user-select: auto;
                vertical-align: inherit;
                text-align: right;
                " id="video-title"> </span>

                <b style="font-family: Calibri;
                font-size: 20px;
                user-select: auto;
                margin-left: 10px;
                /* direction: initial; */
                text-align: right;">
                    &nbsp; :عنوان
                </b>



        </div>
        <div class="modal-body p-0" >
            <style>
            #play-iframe-video-clip{
                width: -webkit-fill-available;width: -moz-available;
            }
            </style>
            <div class="video-container" >
                <div id="play-iframe-video-clip"  ></div>
                <iframe id="youtube-video"   style="width: -webkit-fill-available;width: -moz-available;"></iframe>
            </div>
            <div style="      margin-right: 23px;
            margin-left: 23px;
            user-select: auto;
            text-align:right; " id="clips_view_append">


            </div>

            <span  id="render_discription_title" style="font-size: large;
font-weight: 600;    padding-left: 20px;">Discription:
            </span>
            <div style="padding: 5px 20px 20px 20px;" id="render_discription"></div>
        </div>
    </div>
</div>
</div>




<div class="layout-px-spacing fit_display">

<div class="row  " id="cancel-row"  >

    <div class="col-xl-12 col-lg-12 col-sm-12   ">

            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">
                        <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Home
                    </a></li>

                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                    Clips </a></li>
                </ol>
            </nav>





            <style>

            .blur_css
            {
                filter: blur(2px);
                -webkit-filter: blur(2px);
            }
            .bg-text {
background-color: rgb(0,0,0);
background-color: rgba(0,0,0, 0.4);
border-radius: 5px;
color: white;
font-weight: bold;
border: 1px solid #f1f1f1;
position: absolute;
top: 36%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 2;

padding: 7px;
text-align: center;
}
.bg-text-quiz {
background-color: rgb(0,0,0);
background-color: rgba(0,0,0, 0.4);
border-radius: 5px;
color: white;
font-weight: bold;
border: 1px solid #f1f1f1;
position: absolute;
top: 23%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 2;

padding: 7px;
text-align: center;
}
.video-row
{
position: relative;
}
.bg-text > *{
color: white;
}
.bg-text-quiz> *{
color: white;
}
            </style>



<!-- Main Body Starts -->

<script>
function hideAnnouncement(){
    $('#hideAnnouncement').hide();
}
</script>

<!-- Videos Section -->
<div class="videos">

    <div class="img-rounded" id="hideAnnouncement" style="  background-color: #fffbcf;    border: 1px solid black; margin: 10px;    position: relative; ">
        <svg onclick="hideAnnouncement()" style="    position: absolute;

        right: 10px;
        top: 5px;    cursor: pointer;
        color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
        <h3 style="color: #ffffff; background-color: #2a4e57; text-align: center; margin: 0px; padding: 0px;">Announcement</h3>
        <div id="cc-homepage-announcements" style="  overflow-x: hidden; overflow-y: auto; padding: 6px; text-align: center;
            font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, 'Alvi Nastaleeq', 'BahijNassim', Titillium Web, sans-serif;
            font-size: 18px;
        " dir="rtl">

{{config('app.announcement')}}

                </div>
        </div>



    <div class="videos__container">

    <?php $i=0; ?>
    <?php
    $user_id  = auth()->id();
        ?>

    @if(count($clips)>0 )
    @foreach ( $clips as $clip )

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

    @if(trim($clip->youtube_link)!="" && $clip->youtube_link !=null )

    <!-- Single Video starts -->

    @if((strpos($clip->youtube_link, 'fb.com') !== false))
{{-- extra --}}
<div style="position: relative;">
        <div class="video video-row-disabled" data-type="facebook" data-id="{{$clip->id}}"  data-title="{{$clip->title}}" data-link="{{$clip->youtube_link}}"  style="cursor: pointer;">
        @else
        {{-- extra --}}
        <div style="position: relative;">
        <div class="video video-row-disabled" style="cursor: pointer;"  data-id="{{$clip->id}}"  data-type="youtube" data-title="{{$clip->title}}" data-link="{{str_replace("https://youtu.be/","",$clip->youtube_link)}}">

        @endif
        <div class="discription" hidden>{!! $clip->description !!}</div>


        <div class="video__thumbnail"
        {{-- dowload url for audio or video  --}}
@if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
onclick="window.location='{{$clip->video_download_link}}';"
@elseif($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
onclick="window.location='{{$clip->audio_download_link}}';"
@endif
        {{-- dowload url for audio or video end --}}

        >
        {{-- download video or audio image  --}}
        @if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
        <img loading="lazy" onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'video')"   class="circular_button" src="{{asset('share-button/download-circular-button.png')}}" />
        @elseif($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
        <img loading="lazy"  onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'audio')"  class="circular_button" src="{{asset('share-button/download-circular-button.png')}}" />
        @endif
        {{-- download video or audio image  end --}}

        @if((strpos($clip->youtube_link, 'fb.com') !== false))
        <svg class="@if(count($clip->myview))blur_css  @endif" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        style="width: -webkit-fill-available;
        height: -webkit-fill-available;"
        viewBox="0 0 48 48"
        style=" fill:#000000;"><linearGradient id="awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0d61a9"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path><path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path><path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"></path></svg>

        @else
        <img loading="lazy"
        loading="lazy" class="img_blur @if(count($clip->myview)) blur_css  @endif"
        src="https://img.youtube.com/vi/{{str_replace("https://youtu.be/","",$clip->youtube_link)}}/hqdefault.jpg"
        />
        @if($i==0)
        <span style="position: absolute;
            left: 6px;
top: 8px;
    " class="badge badge-danger">New</span>
        <?php  $i++; ?>
        @endif

            @endif

        </div>


        <div class="video__details" style="justify-content: space-around;">


{{-- share button --}}
{{-- share button --}}
{{-- <a class="mobile_referral_share_link_home"   href="whatsapp://send?text={!!$message!!}" data-action="share/whatsapp/share">
<img loading="lazy" class="share_button" src="{{asset('share-button/share-button.png')}}" />
</a> --}}

@if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
<a  target="_blank"class="mobile_referral_share_link_home"   href="{{$clip->audio_download_link}}" >
<img loading="lazy" class="share_button_audio" src="{{asset('share-button/download-audio_button-.png')}}" />
</a>
@endif
@if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
<a target="_blank" class="mobile_referral_share_link_home"    href="{{$clip->video_download_link}}" >
<img loading="lazy" class="share_button_video" src="{{asset('share-button/download-video_button-.png')}}" />
</a>
@endif
{{-- <a   class="mobile_referral_share_link_home video-row"     href="#"

@if((strpos($clip->youtube_link, 'fb.com') !== false))
data-type="facebook" data-id="{{$clip->id}}"  data-title="{{$clip->title}}" data-link="{{$clip->youtube_link}}"
@else
data-id="{{$clip->id}}"  data-type="youtube" data-title="{{$clip->title}}" data-link="{{str_replace("https://youtu.be/","",$clip->youtube_link)}}"
@endif

>
<img loading="lazy" class="share_button_video" src="{{asset('share-button/play-video.png')}}" />
</a> --}}

<a   class="mobile_referral_share_link_home  @if($clip->id == 141 )  @else video-row @endif"   @if($clip->id == 141 )
    onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'view')"
    target="_blank" href="https://www.fb.com/watch/?v=753117505874783"   href="#"  @endif
@if((strpos($clip->youtube_link, 'fb.com') !== false))
data-type="facebook" data-id="{{$clip->id}}"  data-title="{{$clip->title}}" data-link="{{$clip->youtube_link}}"
@else
data-id="{{$clip->id}}"  data-type="youtube" data-title="{{$clip->title}}" data-link="{{str_replace("https://youtu.be/","",$clip->youtube_link)}}"
@endif

>
<img loading="lazy" class="share_button_video"  src="{{asset('share-button/play-video.png')}}" />
</a>



{{-- <a  class="web_referral_share_link_home"  target="_blank" href="https://web.whatsapp.com/send?phone&text={!!$message!!}" data-action="share/whatsapp/share">
<img loading="lazy"  class="share_button" src="{{asset('share-button/share-button.png')}}" />    </a> --}}

@if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
<a target="_blank" class="web_referral_share_link_home"   onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'audio')"   href="{{$clip->audio_download_link}}" >
<img loading="lazy" class="share_button_audio" src="{{asset('share-button/download-audio_button-.png')}}" />
</a>
@endif
@if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
<a target="_blank" class="web_referral_share_link_home"  onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'video')"    href="{{$clip->video_download_link}}" >
<img loading="lazy" class="share_button_video" src="{{asset('share-button/download-video_button-.png')}}" />
</a>
@endif
<a   class="web_referral_share_link_home  @if($clip->id == 141 )  @else video-row @endif"   @if($clip->id == 141 )
    onclick="add_to_downlaod_clip( this , 2 , {{$clip->id}} , false , 'view')"
    target="_blank" href="https://www.fb.com/watch/?v=753117505874783"   href="#"  @endif
@if((strpos($clip->youtube_link, 'fb.com') !== false))
data-type="facebook" data-id="{{$clip->id}}"  data-title="{{$clip->title}}" data-link="{{$clip->youtube_link}}"
@else
data-id="{{$clip->id}}"  data-type="youtube" data-title="{{$clip->title}}" data-link="{{str_replace("https://youtu.be/","",$clip->youtube_link)}}"
@endif

>
<img loading="lazy" class="share_button_video"  src="{{asset('share-button/play-video.png')}}" />
</a>
{{-- share button --}}
{{-- share button --}}


    </div>


        <div class="video__details" style="justify-content: center;">

            <h3 dir="rtl" class="urdu">

                {{ $clip->title }}
                </h3>

        </div>


        <div class="video__details" style="justify-content: space-between">
        <div class="author">
            <?php
            // $views = \App\ClipView::where('clip_id',$clip->id)->count();
            $views = count($clip->views) + count($clip->audios) + count($clip->videos)  ;
            ?>

<img loading="lazy" class="hits_img" loading="lazy" src="{{asset('share-button/eye.png')}}"  />
            <span class="clip_views">

            {{$views}} {{($views == 1)? "View" : "Views"}}</span>

            {{-- • --}}
        </div>
        <div class="title">


            <span  > <img loading="lazy" class="calender_img" loading="lazy" src="{{asset('share-button/calendar.png')}}"  /> {{\Carbon\Carbon::parse($clip->datetime)->format('d-M-Y')}}</span>

        </div>



            {{-- for geting - discription model --}}

            <span class="clips_view_get" hidden>
            <div>

                {{-- share button --}}
{{-- share button --}}
@if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
<a  onclick="add_to_downlaod_clip( this , 4 , {{$clip->id}} , false , 'audio')"  target="_blank" href="{{$clip->audio_download_link}}" >
<img loading="lazy" class="for_ajax_model_audio"   src="{{asset('share-button/download-audio_button-.png')}}" />
</a>
@endif
@if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
<a target="_blank"   onclick="add_to_downlaod_clip( this , 4 , {{$clip->id}} , false , 'video')"     href="{{$clip->video_download_link}}" >
<img loading="lazy"  class="for_ajax_model_video"   src="{{asset('share-button/download-video_button-.png')}}" />
</a>
@endif
<a class="mobile_referral_share_link_home"   href="whatsapp://send?text={!!$message!!}" data-action="share/whatsapp/share">
<img loading="lazy" class="for_ajax_model" src="{{asset('share-button/share-button.png')}}" />
</a>
<a  class="web_referral_share_link_home"  target="_blank" href="https://web.whatsapp.com/send?phone&text={!!$message!!}" data-action="share/whatsapp/share">
<img loading="lazy"   class="for_ajax_model" src="{{asset('share-button/share-button.png')}}" />    </a>


{{-- share button --}}

</div>

<div class="row">
<div class="col-md-9 col-lg-9 col-sm-12">

    <div class="img-rounded"   style="  background-color: #fffbcf;    border: 1px solid black; margin: 10px;    position: relative; ">

        <h3 style="color: #ffffff; background-color: #2a4e57; text-align: center; margin: 0px; padding: 0px;">Announcement</h3>
        <div id="cc-homepage-announcements" style="  overflow-x: hidden; overflow-y: auto; padding: 6px; text-align: center;
            font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, 'Alvi Nastaleeq', 'BahijNassim', Titillium Web, sans-serif;
            font-size: 18px;
        " dir="rtl">

{{config('app.announcement')}}

                </div>
        </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-12">
                <div>
                <br>
            <span id=" ">{{$clip->clip_id}}</span>
            <b>:
            کلپ نمبر
            </b>
            <br>

            <b>
                ملاحظات
            :</b>
            <span class="clip_views">{{$views}}  </span>
            <br>

            <span id=" ">{{\Carbon\Carbon::parse($clip->datetime)->format('d-M-Y')}}</span>
            <b>:
            تاریخ ارسال
            </B>
                </div>
        </div>

</div>

        </span>
    {{-- for geting - discription model --}}

        </div>
        <?php
    //  $flag = count($clip->myview);
        $flag = count($clip->myview);
        ?>
        @if($flag)
        <div class="bg-text">
        <span>Watched </span>
        </div>


        @endif
        @if(count($clip->questions) )
        <div @if($flag) @if(count($clip->my_evaluation)  )   style="display:none;"   @endif @else  style="display:none;"  @endif

<?php

$swal = null;

$questions =$clip->questions;
foreach ($questions as $question) {
if( count($question->answers) > 0 )
{
$options = [];
$truePosition = 0;
$j = 0;
foreach ($question->answers as $answer) {

    if( $answer->is_true == 1)
    {  $truePosition = $j;   }

if( $answer->option_value == null  || trim($answer->option_value) == '' ) {array_push($options, 'N/A');}
else{array_push($options, $answer->option_value);}
    $j++;
}
array_push($options,  $truePosition);

$swal[$question->question] =  $options ;

}

}

?>
        data-questions='{{json_encode($swal)}}'
        data-clip-id="{{$clip->id}}"  class="bg-text-quiz flashtext take-quiz-element">
        <span>Take My Quiz </span>
        </div>
        <div class="ribbon ribbon-top-right" @if(count($clip->my_evaluation)  )  @else style="display:none;"  @endif ><span>Examined</span></div>
        @endif

    </div>
    <!-- Single Video Ends -->


        </div>

    @endif



    @endforeach
    @endif

    </div>


</div>

<!-- Main Body Ends -->
@if ($clips->hasPages())
<div class="pagination-wrapper" style="    display: flex;  justify-content: center;">
    {{ $clips->links() }}
</div>
@endif




        </div>
    </div>

</div>

</div>



<style type="text/css">

    .flashtext {
            border: 1px solid red;
            cursor: pointer;
            display: inline-block;
            font-weight: 500;
            font-size:13px;
            padding: 7px 7px;
            /* text-align: center; */
            text-decoration: none;
            -webkit-animation: glowing_text 1300ms infinite;
            -moz-animation: glowing_text 1300ms infinite;
            -o-animation: glowing_text 1300ms infinite;
            /* animation: glowing 1300ms infinite; */
            }
            @-webkit-keyframes glowing_text {
            0% {
                background-color: #F99187;
                -webkit-box-shadow: 0 0 6px #F99187;
            }
            50% {
                background-color: #FF5D4D;
                -webkit-box-shadow: 0 0 30px #FF5D4D;
            }
            100% {
                background-color: #E7210E;
                -webkit-box-shadow: 0 0 6px #E7210E;
            }
            }
            @keyframes  glowing_text {
            0% {

                box-shadow: 0 0 6px #E7210E;
            }
            50% {

                box-shadow: 0 0 30px #FF5D4D;
            }
            100% {

                box-shadow: 0 0 6px #E7210E;
            }
            }









/* common */
.ribbon {
width: 150px;
height: 150px;
overflow: hidden;
position: absolute;
}
.ribbon::before,
.ribbon::after {
position: absolute;
z-index: -1;
content: '';
display: block;
border: 5px solid #db3434;
}
.ribbon span {
position: absolute;
display: block;
width: 225px;
padding: 15px 0;
background-color: #db3434;
box-shadow: 0 5px 10px rgba(0,0,0,.1);
color: #fff;

text-shadow: 0 1px 1px rgba(0,0,0,.2);
text-transform: uppercase;
text-align: center;
}

/* top left*/
.ribbon-top-left {
top: -10px;
left: -10px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
border-top-color: transparent;
border-left-color: transparent;
}
.ribbon-top-left::before {
top: 0;
right: 0;
}
.ribbon-top-left::after {
bottom: 0;
left: 0;
}
.ribbon-top-left span {
right: -25px;
top: 30px;
transform: rotate(-45deg);
}

/* top right*/
.ribbon-top-right {
top: -10px;
right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
border-top-color: transparent;
border-right-color: transparent;
}
.ribbon-top-right::before {
top: 0;
left: 0;
}
.ribbon-top-right::after {
bottom: 0;
right: 0;
}
.ribbon-top-right span {
left: -25px;
top: 30px;
transform: rotate(45deg);
}

/* bottom left*/
.ribbon-bottom-left {
bottom: -10px;
left: -10px;
}
.ribbon-bottom-left::before,
.ribbon-bottom-left::after {
border-bottom-color: transparent;
border-left-color: transparent;
}
.ribbon-bottom-left::before {
bottom: 0;
right: 0;
}
.ribbon-bottom-left::after {
top: 0;
left: 0;
}
.ribbon-bottom-left span {
right: -25px;
bottom: 30px;
transform: rotate(225deg);
}

/* bottom right*/
.ribbon-bottom-right {
bottom: -10px;
right: -10px;
}
.ribbon-bottom-right::before,
.ribbon-bottom-right::after {
border-bottom-color: transparent;
border-right-color: transparent;
}
.ribbon-bottom-right::before {
bottom: 0;
left: 0;
}
.ribbon-bottom-right::after {
top: 0;
right: 0;
}
.ribbon-bottom-right span {
left: -25px;
bottom: 30px;
transform: rotate(-225deg);
}

    </style>




@endsection
