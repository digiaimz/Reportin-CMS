
<form class="contact-form" name="inv_form" id="inv_form" method="post" action="#" enctype="multipart/form-data" dir="rtl">

    <style>
 .wave {
    font-size: 25px;
    vertical-align: super;
  -webkit-animation-name: wave-animation;
          animation-name: wave-animation;  /* Refers to the name of your @keyframes element below */
  -webkit-animation-duration: 2.5s;
          animation-duration: 2.5s;        /* Change to speed up or slow down */
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;  /* Never stop waving :) */
  transform-origin: 70% 70%;       /* Pivot around the bottom-left palm */
  display: inline-block;
}

@-webkit-keyframes wave-animation {
    0% { transform: rotate( 0.0deg) }
   10% { transform: rotate(14.0deg) }  /* The following five values can be played with to make the waving more or less extreme */
   20% { transform: rotate(-8.0deg) }
   30% { transform: rotate(14.0deg) }
   40% { transform: rotate(-4.0deg) }
   50% { transform: rotate(10.0deg) }
   60% { transform: rotate( 0.0deg) }  /* Reset for the last half to pause */
  100% { transform: rotate( 0.0deg) }
}

@keyframes wave-animation {
    0% { transform: rotate( 0.0deg) }
   10% { transform: rotate(14.0deg) }  /* The following five values can be played with to make the waving more or less extreme */
   20% { transform: rotate(-8.0deg) }
   30% { transform: rotate(14.0deg) }
   40% { transform: rotate(-4.0deg) }
   50% { transform: rotate(10.0deg) }
   60% { transform: rotate( 0.0deg) }  /* Reset for the last half to pause */
  100% { transform: rotate( 0.0deg) }
}


    </style>


<style type="text/css">

    .flashtext {
            border: 1px transparent;

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
              -webkit-box-shadow: 0 0 3px #F99187;
            }
            50% {
              background-color: #FF5D4D;
              -webkit-box-shadow: 0 0 15px #FF5D4D;
            }
            100% {
              background-color: #E7210E;
              -webkit-box-shadow: 0 0 3px #E7210E;
            }
          }
          @keyframes glowing_text {
            0% {

              box-shadow: 0 0 3px #E7210E;
            }
            50% {

              box-shadow: 0 0 15px #FF5D4D;
            }
            100% {

              box-shadow: 0 0 3px #E7210E;
            }
          }

    </style>





<script>
    $('.video-row').click(function () {

        var src= null;
        if($(this).attr('data-type') == "facebook")
        {
  src = 'https://www.facebook.com/plugins/video.php?href='+$(this).attr('data-link')+'&show_text=true&appId';
        }
        else{
            src = 'https://www.youtube.com/embed/'+$(this).attr('data-link');
        }

        $('#video-title').html($(this).attr('data-title'));
        $('#videoMedia1').modal('show');
        $('#youtube-video').attr({
            'src': src,
            'width': '800',
            'height': '415',
            'allow': 'encrypted-media'
        }).css('border', '0');
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
        $('#videoMedia1 iframe, #videoMedia2 iframe').removeAttr('src');
    });
</script>


    <div style="text-align:right;">




        <div id="myBtn" class="video-row " style="    text-align: center;cursor:pointer;"  >

            <span class="wave">👋</span>
            <h5 class="flashtext" style="display: inline-block;
            vertical-align: middle;font-family:Calibri ;">  رجسٹریشن سے پہلے ویڈیو دیکھیں </h5>
            <svg style="margin-bottom: -5px;" xmlns="http://www.w3.org/2000/svg"
            width="35" height="35"
            viewBox="0 0 48 48"
            style=" fill:#000000;">
            <path fill="#FF3D00"
             d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"></path><path fill="#FFF" d="M20 31L20 17 32 24z"></path></svg>

       </div>




<div style=" ">


    <div
    style="text-align:right;font-size:40px;line-height:40px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">


    <button hidden type="button" id="form-step-button" style="font-size: 24px;">
        ضروری ہدایات پڑھیں
       : &nbsp;
       <span style="margin-right:7px;" id="eye-button"> <i class="fa fa-eye" style="    font-size: 18px;"></i> </span>
    </button>
</div>

</div>

    <script>

$("#form-step-button").click(function() {

    if($('#form-steps').is(':visible'))
    {
        $("#eye-button").html('<i class="fa fa-eye" style="    font-size: 18px;"></i> ');
    }
    else
    {
        $("#eye-button").html('<i class="fa fa-eye-slash" style="    font-size: 18px;"></i> ' );
    }

    $("#form-steps").toggle(500);

});

        </script>


    <span id="form-steps" style="display:none;">
    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><B>1-</B> ۔پہلے کالم میں اپنا نام لکھیں۔  پورا نام اردو/ انگلش میں لکھ سکتے ہیں۔  </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>2-</b> دوسرے کالم میں ولدیت یا زوجیت اردو / انگلش میں لکھ سکتے ہیں ۔ </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>3-</b> تیسرے کالم میں آپ نے اپنا پاسورڈ رکھنا ہے ۔ چونکہ ہر مصطفوی کارکن اور اس کے زیر دعوت افراد کا الگ الگ ریکارڈ جمع کیا جائے گا ۔آپ اپنا فارم، زیرِ دعوت افراد کا ڈیٹا موبائل سے ہی Up Date
    کریں گے اور اپنی کارکردگی اپنے موبائل پر دیکھ سکیں گے۔ لہذا اس کے لئے ایک پاسورڈ کی ضرورت ہے۔ یہ پاسورڈ ایسا ہو جو یاد رکھنا آسان ہو

    پاسوڈ  براہ کرم انگلش کے بڑے اور چھوٹے حروف کے امتزاج کے ساتھ کم از کم 8 حروف درج کریں
    ۔
    </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>4-</b> چوتھے کالم میں آپ وٹس ایپ نمبر لکھیں گے ۔وٹس ایپ نمبرز کے بغیر آپ اس دعوتی پروگرام میں شامل نہیں ہوسکتے ۔ اگر آپ اپنے بیٹے/والد کا موبائل استعمال کرنا چاہتے ہیں تو ان کا وٹس ایپ نمبر لکھیں ۔یہ نمبر اس دعوتی پروگرام میں آپ کا تعارفی نمبر (I.D)کے طور پر استعمال ہوگا۔  </p>


    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>5-</b> پانچویں کالم میں آپ اپنے فورم سےمتعلق بتائیں گے ۔ اس میں آپ نے لکھنا نہیں ہے کالم کے خانے میں ٹچ(Touch) کرنا ہے۔ فورم کی لسٹ آپ  کے سامنے آجائے گی ۔آپ اپنے فورم پر  ٹچ(Touch) کریں گے۔ </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>6-</b> چھٹے کالم میں آپ نے اپنا ضلع اور تنظیمی تحصیل بتانا ہے۔  آپ ضلع کے  کالم پر ٹچ(Touch) کریں گے تو ملک بھر کے اضلاع کی لسٹ نظر آئے گی۔ آپ اپنا ضلع تلاش کرکے  اس پر ٹچ (Touch) کریں گے تو ایک نیا کالم سامنے آئے گا ۔ یہ کالم تنظیمی تحصیل کا ہو گا۔ آپ اس کالم پر ٹچ (Touch)کریں گے تو آپ کے ضلع کی تحصیلات یا صوبائی حلقہ جات کے نمبر سامنے آئیں گے۔ آپ اپنی تحصیل یا صوبائی حلقہ نمبر پر ٹچ (Touch) کریں گے تو آپ  کا ایڈریس مکمل ہو جائے گا۔  </p>


    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>7-</b> سیکوٹی کورڈ چیک باکس کو
    ٹچ(Touch)
    کریں ۔یہ اس مقصد کے لیے ہے کہ کمپیوٹر از خود فارم فل نہ کر سکے ۔   </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>8-</b> اسکے بعد آپ  Register Now
         کا بٹن دبائیں گے اور آپ کا فارم مکمل ہو جائے گا
         ۔  </p>

    <p style="text-align:right; margin:0px;font-size:22px;font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;"><b>9-</b> آپ اپنا پاسورڈ جو کہ تیسرے کالم میں درج کیا تھا اس کو محفوظ کر لیں گے دوبارہ آپ اپنے وٹس ایپ فون نمبر  اور پاسورڈ کے ذریعے لاگن (Login)ہو کر  فارم   میں  تبدیلی کر سکیں گے۔ </p>


    </span>
    </div>

    </form>
