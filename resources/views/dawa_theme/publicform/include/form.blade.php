<style>
    .error_border{
        border:1px dashed red;
    }
        </style>

        <script>

        var is_pakistan = 1;
        var number_length = 10;
        var iti = null;

        </script>

<input type="text" id="reffer_id"  value="{{$reffer}}" hidden />

<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">

<form class="contact-form"  name="dawati_form" id="dawati_form" method="post" action="#" enctype="multipart/form-data" dir="ltr">



    <!-- End Entry title -->
    <div class="shortcode-content">

    <!-- End Entry title -->
    <div class="shortcode-content">

    <div id="form_title" class="widget" style="margin-top:20px;">
        <div class="widget_title"><h3 style="font-size:16px;"> Personal Information</h3></div>
    </div>


    <div id="message-display" style="display:none ;" class="form reg area">
        <div class="container">
        <div class="row">
            <style>

.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

                </style>

            <div style="clear:both;margin-top:50px;"></div>
        <form name="form" id="register" method="post" action="#" enctype="multipart/form-data">
        <div align="center">
            <div class="alert alert-success">
                <strong>Congratulation! 😊</strong>  <br><br>
<h3 style=" line-height: initial;">Your registration is complete.
    <br>
    We welcome you on behalf of Minhaj-ul-Quran International.
    <br>
    Please click on the link below to login.



        </h3>
        <strong style="/* color:blue; */font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;    font-size: 18px; ">  😊 ! مبارک ہو</strong>  <br><br>
<h3 style="/* color:blue; */font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;line-height: initial;">
                آپ کا اندراج مکمل ہوچکا ہے۔
<br>
ہم آپ کو تحریک منہاج القرآن کی طرف سے خوش آمدید کہتے ہیں۔
<br>
براہ مہربانی درج ذیل لنک پہ کلک کرکے آپ لوگن کر سکتے ہیں۔
                <br>  <br>
                <a href="{{url('/')}}"> <button
                style="font-family: 'FontAwesome';
                       letter-spacing: 1px;
                    background-color: #000000;
                     font-size: 21px;
                    font-weight: 500; " type="button" class="btn btn-success" > Login </button> </a>

        </h3>
              </div>
        </div>
        </form>
        </div>
        </div>
    </div>

    <!-----Row Start ----->
    <style>
.cardd {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.cardd:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
        </style>

  <style>
   @media only screen and (max-width: 600px)
  { #otp-card{ width:100%; } }
   @media only screen and (min-width: 600px)
    { #otp-card{ width:50%; } }
    .center{
        text-align: center ;
        display: block;
    }
    </style>



    <div id="otp-card" style="margin-left: auto;
    margin-right: auto;padding:30px; display:none;" class="cardd">

       <button onclick="Back()" type="button" style="cursor: pointer; display: block; width:20%;">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
         Go Back</button>
              <h4 class="center"><strong>OTP Verification  </strong></h4>

          <div style=" padding: 20px;
          background-color: #36f47e38;">    <span class="center">An OTP code has been sent to
              <u><span class="phone-number-for-otp"></span></u>

              @if(config('otp.is_SMS_enable'))
              via SMS Message
              @endif
              @if(config('otp.is_WhatsApp_enable'))
              At WhatsApp Application
              @endif


              . Please Verify And Enter Code Below
              <br>If you are not getting OTP just type <b>MNP</b> and send to <b>4473</b>
            </span>
            <span class="center">ایک او ٹی پی کوڈ بھیج دیا گیا ہے۔ براہ کرم چیک کریں اور اسے نیچے لکھ دیں  </span>
          </div>

          <div >

          </div>
            <hr>

            <span style="float:right;">

                <input type="button"
                onclick="sendOTP()" style="cursor: pointer; display: block;"
                id="resend" value="Resend OTP" />

                <span id="not_resend" onclick="sendOTP()"
                    style="display: none; cursor: not-allowed;"><u>Resend OTP
               </u> in <span id="seconds">0</span>s
               </span>

         </span>

              <b>Enter OTP Code Here:</b>
                <br>
                <br>

       <input id="register_user_otp" style="border-radius: 7px;margin-bottom:0px;"
       type="number" placeholder="Enter OTP Code">
       <span class="center" id="non_register_otp_err" style="display:none;color:red;">
        You Entered Wrong OTP Please Try Again!!
    <br> آپ نے غلط او ٹی پی داخل کیا براہ کرم دوبارہ کوشش کریں !!

    </span>


        <input style="background-color: #29910d;margin-top:7px;" onclick="verifyOTP()" id="non_register_OTP_button"
        type="button" class="btn btn-success btn-info-full"
         value="Verify OTP">

        </div>

        <script>
            var time= 0;
            var myVar ;

            function myTimer() {

             time--;
              document.getElementById("seconds").innerHTML = time;
              if(time < 1)
              {
              myStopFunction();
                myStopFunction();
              }
            }

            function myStopFunction() {
              clearInterval(myVar);
              $('#not_resend').hide();
            }

            function sendOTP()
            {
                if(time < 1)
                {
                    $('#not_resend').show();
                    time= 60;
                    myVar = setInterval(myTimer, 1000);
                    // otp send using ajax
                    // otp send using ajax

                    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

var number = $('#txt_Whatsapp').val();
var user_name = $('#txt_FullName').val();
var sim_operator = $('#sim_operator').val();
        $.LoadingOverlay("show");
            $.ajax({
               type:'POST',
               url:"{{ route('send.otp.verification') }}",
               data:{number:number , user_name:user_name , sim_operator:sim_operator },
               success:function(data){

                  console.log(data);
                // $('#register_user_otp').val(data.code);
                    $.LoadingOverlay("hide");

               }
               ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });
            myTimer();

                    // otp send using ajax
                    // otp send using ajax



                    // start timeer

                }

            }
            function verifyOTP()
            {

              $('#non_register_otp_err').hide();
        var user_enter =  $('#register_user_otp').val();
             if(is_fill(document.getElementById('register_user_otp')))
             {

    var fullname = $("#txt_FullName").val();
    var fathername = $("#txt_FatherName").val();
    var password = $("#txt_Password").val();
    var whatsapp = $("#txt_Whatsapp").val();
    var forum = $("#txt_Forum").val();
    var district = $("#txt_District").val();
    var tehsil = $("#txt_Tehsil").val();
    var sim_operator = $("#sim_operator").val();
    var reffer_id = $("#reffer_id").val();
    var countryData = JSON.stringify(iti.getSelectedCountryData());
    var gender = $('input[name="user_gender_for_forum_selection"]:checked').val();


                 // Check OTP
                 // Check OTP

                    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.LoadingOverlay("show");
            $.ajax({
               type:'POST',
               url:"{{ route('verify.otp.verification') }}",
               data:{gender:gender, reffer_id:reffer_id,countryData:countryData,user_enter:user_enter , fullname:fullname , fathername:fathername ,
                password:password , whatsapp:whatsapp , forum:forum , district:district , tehsil:tehsil
                ,sim_operator:sim_operator
                 },
               success:function(data){
                    $.LoadingOverlay("hide");
                    if(data.status =="verify")
                    {  showMessage();}
                   else if(data.status =="not-verify")
                    { $('#non_register_otp_err').show(500); }
                    else
                    {
                        $.LoadingOverlay("hide");
                      alert("Uncatch Error");
                    }
                    $.LoadingOverlay("hide");
               }
               ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });

   // Check OTP
   // Check OTP

             }
             else
             {
                $('#non_register_otp_err').show(500);
             }

            }

            function Back()
            {
                $('#otp-card').hide();
                $('#form-display').show();
                $('#message-display').hide();
            }
            function showOTPForm()
            {

                $('.phone-number-for-otp').html($('#txt_Whatsapp').val());
                $('#inv_form').hide();
                $('#form-display').hide();
                $('#form_title').hide();
                $('#otp-card').show();
                $('#message-display').hide();
                sendOTP();


            }
            function showMessage()
            {
                $('#otp-card').hide();
                $('#form-display').hide();
                $('#form_title').hide();
                $('#inv_form').hide();
                $('#message-display').show();
            }
            </script>



<div id="form-display"  >
    <!-----Row Start ----->
    <div class="row ">

    <div class="col col_6_of_12">
        <label style="font-weight:600;" class="req"> Full Name ( مکمل نام )</label>
        <input  style="text-transform:uppercase;"  type="text"  name="txt_FullName" id="txt_FullName" placeholder="Full Name"
          title="Full Name"  autocomplete="off" required="" />
          <b style="color: red;display:none;" id="txt_FullName_req" class="reqq"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small><br></b>
     </div>

    <div class="col col_6_of_12">
        <label style="font-weight:600;" class="req"> Father / Husband Name ( والد/ خاوند کا نام )</label>
        <input type="text" style="text-transform:uppercase;" name="txt_FatherName" id="txt_FatherName" placeholder="Father Name"  title="Father Name"
        autocomplete="off" required="">
        <b style="color: red;display:none;" id="txt_FatherName_req" class="reqq"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small><br></b>
     </div>


    </div>
    <!-----Row End ----->

    <div style="clear:both;"></div><br>

    <!-----Row Start ----->
    <div class="row">

    <div class="col col_6_of_12">
        <label style="font-weight:600;" class="req"> Set New Password ( نیا پاس ورڈ رکھیں ) </label>
        <div>
        <input type="password" style="padding-right: 48px;" name="txt_Password" id="txt_Password" placeholder="Password"
          title="Password"
        autocomplete="new-password" required="">
          <i style="position: absolute;
          float: right;
          top: 32px;
          right: 31px;
          font-size: 19px;
          cursor: pointer;display:none;" id="show-password"
                onclick="ManagePassword('hide')"
                 class="fa fa-eye"></i>
          <i
          style="position: absolute;
          float: right;
          top: 32px;
          right: 31px;
          font-size: 19px;
          cursor: pointer;"
          class="fa fa-eye-slash" id="hide-password"
          onclick="ManagePassword('show')"
          aria-hidden="true"></i>
        </div>
        <b style="color: red;display:none;" id="minpass"><small>
            Please enter minimum 6 Character Password <br>
               (  .براہ کرم کم از کم 6 حروف کا پاس ورڈ درج کریں۔)  </small><br></b>
               <b style="color: red;display:none;" id="trypass"><small>Please Try different Password. ( براہ کرم مختلف پاس ورڈ آزمائیں ) </small><br></b>

    </div>
    <script>
        function ManagePassword(status) {

            var x = document.getElementById("txt_Password");

          if (x.type === "password") {
            x.type = "text";
             $('#show-password').show();
             $('#hide-password').hide();
          } else {
            x.type = "password";
            $('#show-password').hide();
             $('#hide-password').show();
          }

        }
        </script>
    <style>
        @media only screen and (max-width: 600px)
        {
            #sim_operator_div{width: 40%;  }
              #whatsapp-number{width: 60%;}

        }
          @media only screen and (min-width: 600px)
          {
            #sim_operator_div{width: 30%;  }
             #whatsapp-number{width: 70%;}

            }
            .iti {
    position: relative;
    display: inline-block;
    width: -webkit-fill-available;
}
.full_width {
     width: 100% !important ;
}
.select2-container .select2-selection--single .select2-selection__rendered
{

    border-radius: 0px;
    border: 1px solid #ddd;
    letter-spacing: 0px;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #3b3f5c!important;
    font-size: 15px;
    padding: 8px 10px;
    background-color: #fff;
    height: calc(1.4em + 1.4rem - 1px);
    padding: 9px;

    box-shadow: none;

}
           </style>
    <div class="col col_6_of_12">

        <script>

            function filter()
            {

            if($('#sim_operator').val() == 6)
            {

        $('#recapcha').show();
        is_pakistan = 0;
            }
            else
            {
        $('#recapcha').hide();
        is_pakistan =1;
            }
            }


        </script>



        <label style="font-weight:600;" class="req"> WhatsApp Number (وٹس ایپ نمبر) </label>
        <div style="width: 100%">
            <div id="sim_operator_div" class="pakistani " style="float: left; ">
            <select onchange="filter()" id="sim_operator" style="height: 39px;">
                <option value="" >Select Operator</option>
                <option value="1" >Mobilink</option>
                <option value="2" >Telenor</option>
                <option value="3"  >Ufone</option>
                <option value="4" >Warid</option>
                <option value="5" >Zong</option>
                <option value="6" >S Com</option>

            </select>
            <b style="color: red;display:none;" class="reqq"><small>it's required field.  </small><br></b>
            </div>

            <div   id="whatsapp-number" style=" float:right; ">
        <input type="text" name="txt_Whatsapp" id="txt_Whatsapp" placeholder=""  title="WhatsApp Number" autocomplete="off" required="">
        <b style="color: red;display:none;" class="reqq"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small><br></b>
        <b id="not-found"  style="color: rgb(126, 199, 83);display:none;"  >
            <small>   <i class="fa fa-check" aria-hidden="true"></i>Not Registered - Available</small><br></b>
        <b id="found"  style="color: red;display:none;" >
            <small>  <i class="fa fa-close"  aria-hidden="true"></i>  Alerady Registered</small><br></b>


    </div>

    </div>


    </div>






    <script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>
    <!-----Row End ----->
    <script>
        $(document).ready(function(){

            // $('#txt_Whatsapp').inputmask('(999)-999-9999');

        });




     var input_whatsapp = document.querySelector("#txt_Whatsapp");



        $(document).ready(function(){



iti = window.intlTelInput(input_whatsapp, {
     allowDropdown: true,
     //autoHideDialCode: true,
   // autoPlaceholder: "off",
   // dropdownContainer: document.body,
     excludeCountries: ["il"],
  //  formatOnDisplay: false,
  initialCountry: "pk",
    geoIpLookup: function(success) {
      // Get your api-key at https://ipdata.co/
      fetch("https://api.ipdata.co/?api-key=72878bd79d3e156f214ad9f4bcfe2c348b1e70b553e5e4dab526233b")
        .then(function(response) {
          if (!response.ok) return success("pk");
          return response.json();
        })
        .then(function(ipdata) {
          success(ipdata.country_code);
        });
    },
   hiddenInput: "full_number",

  // localizedCountries: { 'de': 'Deutschland' },
//    nationalMode: false,
   // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
 //  placeholderNumberType: "FIXED_LINE",
   // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
   utilsScript: "{{asset('dawa_theme/build/js/utils.js')}}",
 });

 input_whatsapp.addEventListener("countrychange", function( ) {
    $('#txt_Whatsapp').removeClass('error_border');
         $('#txt_Whatsapp').siblings('.reqq').hide();

 setPlaceHolder();
document.getElementById('txt_Whatsapp').value = "";
});


setTimeout(function(){  setPlaceHolder(); }, 2000);

 //document.getElementById('txt_whatsapp').placeholder.replace(/[0-9]/g, "9")
//	var mas = document.getElementById('txt_whatsapp').placeholder.replace(/[0-9]/g, "9");

  //  $("#ph-numberr").inputmask({mask:"(999) 999-9999"})

 //  console.log( mas);

 });


 function setPlaceHolder(country=null)
    {


    if(document.getElementById('txt_Whatsapp').placeholder == "" || document.getElementById('txt_Whatsapp').placeholder == "301 2345678" ||
    document.getElementById('txt_Whatsapp').placeholder == "(301)-234-5678"  || country=="pk")
    {
    document.getElementById('txt_Whatsapp').placeholder= "(301)-234-5678";
    is_pakistan = 1;
    number_length = 10;
    FilterForm(1);
    $('#txt_Whatsapp').inputmask('(999)-999-9999');
    return true;
    }
    else
    {
        var value =  document.getElementById('txt_Whatsapp').placeholder.replace("-", "").replace("(", "").replace(")", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("-", "");


        number_length = value.length;
        is_pakistan = 0;
    FilterForm(0);
    }
    console.log(document.getElementById('txt_Whatsapp').placeholder);

     $("#txt_Whatsapp").inputmask({mask:document.getElementById('txt_Whatsapp').placeholder.replace(/[0-9]/g, "9")});

    }
    function FilterForm(is_pakistani = 0)
    {

        if(is_pakistani == 0)
        {
            $('#txt_Forum').children('option').eq(1).html('MQI - Minhaj-ul-Quran International');
            $('#txt_Forum').children('option').eq(3).html('MYL - Muslim Youth League');
            $('#txt_Forum').children('option').eq(5).hide();

            $('.pakistani').hide();
            $('#recapcha').show();
            $('#whatsapp-number').addClass('full_width');


        }
        else
        {
            $('#txt_Forum').children('option').eq(1).html('TMQ - Tehreek Minhaj-ul-Quran');
            $('#txt_Forum').children('option').eq(3).html('MYL - Minhaj Youth League');
            $('#txt_Forum').children('option').eq(5).show();
            $('#whatsapp-number').removeClass('full_width');
            $('.pakistani').show();
            $('#recapcha').hide();

        }

    }





    </script>


























    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){


          $("#txt_Whatsapp").keyup(function(){
            if(is_pakistan == 1)
            {


            var value =  $("#txt_Whatsapp").val().replace("-", "").replace("(", "").replace(")", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("-", "");
             if(value.length==1)
             {

                if(value != 3)
                {
                    swal({
  title: "Alert!",
  text: "WhatsApp Number Must be Start From 3xxxxxxxxx",
  icon: "info",
  button: "OK",
});
$("#txt_Whatsapp").val('')
                }
             }
            }

          });
        });
        </script>
    <div style="clear:both;"></div><br>

    <!-----Row Start ----->
    <div class="row">
        <style>
#fourm_div_1{
   width: 25%;
   display: inline-block;
   border: 1px solid #DDDDDD;
    border-right: 0px;
    height: 43px;
    padding-left: 5px;
}
#fourm_div_2{
    width: 75%;
    display: inline-block;
    float: right;
}
select:disabled
{
    border: solid 1px silver;
    background-color: #EEEEEE;
    cursor: not-allowed;
    color: #000000;

}
.select2-container .select2-selection--single .select2-selection__rendered {

    font-size: inherit !important;

}

        </style>

    <div style="padding-left: 30px;" class="col col_6_of_12 pading-right">
    <label for="c_website" style="font-weight:600;" class="req"> Forum ( فورم ) </label>

    <div style="width: 100%;">

    <div  id="fourm_div_1">
    <div class="n-chk">
        <label class="new-control new-radio square-radio new-radio-text radio-primary">
          <input   type="radio" value="Male" class="new-control-input user_gender_selection" name="user_gender_for_forum_selection">
          <span class="new-control-indicator"></span><span class="new-radio-content">Male</span>
        </label>
    </div>
    <div class="n-chk">
        <label class="new-control new-radio square-radio new-radio-text radio-danger">
          <input     type="radio" value="Female" class="new-control-input user_gender_selection" name="user_gender_for_forum_selection">
          <span class="new-control-indicator"></span><span class="new-radio-content">Female</span>
        </label>
    </div>

    <script>

    $(document).ready(function(){

        $('.user_gender_selection').click(function(){
            $( "#txt_Forum" ).prop( "disabled", false );
            $( "#education_id" ).prop( "disabled", false );

            if($('input[name="user_gender_for_forum_selection"]:checked').val() == "Male")
            {
                $( "#txt_Forum" ).val('').change();
                $('#txt_Forum').children('option').eq(1).show();
                $('#txt_Forum').children('option').eq(2).hide();
                $('#txt_Forum').children('option').eq(3).show();
                $('#txt_Forum').children('option').eq(4).show();

                $('#txt_Forum').children('option').eq(5).show();
                $('#txt_Forum').children('option').eq(6).hide();
                $('#txt_Forum').children('option').eq(7).show();

                $( "#education_id" ).val('').change();
                $('#education_id').children('option').eq(1).show();
                $('#education_id').children('option').eq(2).show();
                $('#education_id').children('option').eq(3).show();
                $('#education_id').children('option').eq(4).show();
                $('#education_id').children('option').eq(5).show();


            }
            if($('input[name="user_gender_for_forum_selection"]:checked').val() == "Female")
            {
                $( "#txt_Forum" ).val('').change();
                $('#txt_Forum').children('option').eq(1).hide();

                $('#txt_Forum').children('option').eq(2).show();
                $('#txt_Forum').children('option').eq(3).hide();
                $('#txt_Forum').children('option').eq(4).hide();
                $('#txt_Forum').children('option').eq(5).hide();
                $('#txt_Forum').children('option').eq(6).show();
                $('#txt_Forum').children('option').eq(7).show();

                $( "#education_id" ).val('').change();
                $('#education_id').children('option').eq(1).show();
                $('#education_id').children('option').eq(2).show();
                $('#education_id').children('option').eq(3).show();
                $('#education_id').children('option').eq(4).show();
                $('#education_id').children('option').eq(5).show();

            }

        });


    });



    </script>

    </div>
    <div id="fourm_div_2">
        <select class="form-control   "  disabled id="txt_Forum"
         name="txt_Forum"  autocomplete="off" required="" style="height: 43px;">
            <option value="">Select Forum</option>

             @foreach ($forums as  $forum)

             @if($forum-> id_frm == 8)
             <optgroup label="Educational Institutes">
            @endif

             <option value="{{$forum->id_frm}}">{{$forum->frm_code}} - {{$forum->frm_name}}</option>
             @if($forum-> id_frm == 12)
             </optgroup >
             @endif

             @endforeach

        </select>
    </div>
    </div>
        <b id="txt_Forum_req" style="color: red;display:none;"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

    </div>
    <style>
     @media only screen and (max-width: 600px)
      {
           .mobile{ padding-left: 30px; }
           .pading-right{ padding-right: 30px; }

    }
       @media only screen and (min-width: 600px)
       { .mobile{ padding-left: 15px; } }
        </style>


{{-- display none --}}
{{-- display none --}}
<div style="padding-right: 30px;display:none;"    class="   col col_6_of_12 mobile">
    <label for="c_website" style="font-weight:600;"  > Select Your Educational Institute  </label>
    <select disabled class=" form-control     "   id="education_id" name="education_id"    >

        <option value="">Select Institute</option>

        <option value="1"> Markaz - Central Secretariat of MQI </option>
        <option value="2"> MES - Minhaj Education Society </option>
        <option value="3"> MUL - Minhaj University Lahore </option>
                <option value="4"> COSIS - College of Sharia & Islamic Sciences  </option>
                <option value="5"> MCW - Minhaj College for Women </option>


            </select>
            <script>

            </script>



<b style="color: red;display:none;" id="education_id_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
</div>
{{-- display none --}}
{{-- display none --}}


{{-- Temporary --}}
{{-- Temporary --}}

<div style="padding-right: 30px;"    class=" pakistani col col_6_of_12 mobile">
    <label for="c_website" style="font-weight:600;" class="req"> District ( ضلع )</label>
        <select class=" form-control  select basic" data-show-subtext="true"
         data-live-search="true" id="txt_District" name="txt_District" required=""  >

                <option value="">Select District</option>
                @foreach ($Districts as  $district)

                <option value="{{$district->id_dist }}"> {{$district->dist_name}} - {{$district->dist_name_ur}}</option>

                @endforeach

            </select>
            <script>

            </script>



        <b style="color: red;display:none;" id="txt_District_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
    </div>

{{-- Temporary --}}
{{-- Temporary --}}






</div>
<!-----Row End ----->

<div style="clear:both;"></div><br>

<!-----Row Start ----->





<div style="margin-left: 16px;margin-right: 16px;" id="tehsil-component" class="pakistani" >

<style>
#select2-txt_Tehsil-container{
background: #e3e3e300;
cursor: not-allowed;
}
</style>

        <div class="row temp"  >
            <div   class="col col_6_of_12">
                <label for="c_website" style="font-weight:600;" class="req"> (تحصیل / صوبائی حلقہ) Tehsil / Provincial Halaqa</label>
                    <select disabled class="form-control  select" id="txt_Tehsil" name="txt_District" tabindex="6" autocomplete="off" required=""  >
                        <option value="0" selected>Select Tehsil</option>

                       </select>
                       <b id="txt_Tehsil_req" style="color: red;display:none;"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
            </div>
         </div>


    </div>
    <!-----Row End ----->


    <div style="clear:both;"></div>

    <!-----Row Start ----->
    <div class="row" id="recapcha" style="display: none;">

    <div style="padding-left: 30px;" class="col col_6_of_12" >
        <div id="recap" class="g-recaptcha" data-sitekey="6LfSukgbAAAAABg3JJrtTzLufxeMhBcXcpMuZJ7F"></div>
        {{-- <label style="font-size:20px;"> Type the Security Code (سکیورٹی کوڈ): </label>
        <input type="text" maxlength="5" class="form-control" id="security_code" name="security_code"  placeholder="Type the Security Code (سکیورٹی کوڈ):"
        autocomplete="off" required=""> --}}
          <b id="security_code_req" style="color: red;display:none;">
            <small>Invalid reCAPTCHA. Please try again.( غلط ریکاٹا۔ دوبارہ کوشش کریں ) </small></b>

    </div>

    <div class="col col_6_of_12 mobile">
            {{-- <label style="font-size:20px;"> Security Code (سکیورٹی کوڈ) </label><br>
            <label id="code" style="font-size:20px;margin-top:10px;color:blue;">40ca0
            </label> --}}
    </div>




    </div>
    <!-----Row End ----->
    </div>

    <div style="clear:both;"></div><br><br>

    <div class="row" align="center">
        <div class="col col_12_of_12">

            <button  type="button" title="Register now" class="btn"
            id="submit_registration"
            name="submit_registration"
            style="width: auto;background-color:#538822; color:#ffffff;">

        <span id="save-form" >  <i class="fa fa-save"></i> Register Now </span>
        </button>
        </div>
    </div>
</div>
    <!-----Row End ----->
    <script>

$(document).ready(function(){
  $("#submit_registration").click(function(){
    $.LoadingOverlay("show");
      $('#save-form').html('Please Wait....!');
      $('#security_code_req').hide();
       var flag= true;

     var txt_FullName =   document.getElementById('txt_FullName');

    if(is_fill(txt_FullName))
    {
        $('#txt_FullName_req').hide();
    }
    else
    {
        // show errors
        $('#txt_FullName_req').show();
        flag= false;
    }


   var txt_FatherName =   document.getElementById('txt_FatherName');
    if(is_fill(txt_FatherName))
    {
        $('#txt_FatherName_req').hide();
    }
    else
    {
        // show errors
        $('#txt_FatherName_req').show();
        flag= false;
    }

   var txt_Password =   document.getElementById('txt_Password');

    if(is_password(txt_Password))
        {
            $('#minpass').hide();
            $(txt_Password).removeClass('error_border');
            if(is_diff(txt_Password))
            {
                $('#trypass').hide();
                $(txt_Password).removeClass('error_border');

            }
            else
            {   flag= false;
                $('#trypass').show();
                $(txt_Password).addClass('error_border');
            }
        }
        else
        {      flag= false;
            $('#minpass').show();
            $(txt_Password).addClass('error_border');
        }

    var txt_Whatsapp =   document.getElementById('txt_Whatsapp');
    var value =  txt_Whatsapp.value.replace("-", "").replace("(", "").replace(")", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("-", "");

        if(value.length == number_length)
        {
            $('#txt_Whatsapp').removeClass('error_border');
         $('#txt_Whatsapp').siblings('.reqq').hide();
        //  is_number_register( $('#txt_Whatsapp').val());
          }
         else {
            flag= false;
            $('#txt_Whatsapp').addClass('error_border');
              $('#txt_Whatsapp').siblings('.reqq').show();
         }
    var sim_operator =   document.getElementById('sim_operator');

    if(is_fill(sim_operator) || is_pakistan == 0)
        {
            $('#sim_operator').removeClass('error_border');
         $('#sim_operator').siblings('.reqq').hide();
        //  is_number_register( $('#txt_Whatsapp').val());
          }
         else {
            flag= false;
            $('#sim_operator').addClass('error_border');
              $('#sim_operator').siblings('.reqq').show();
         }

    var txt_Forum =   document.getElementById('txt_Forum');
    if(is_fill(txt_Forum) )
    {
        $('#txt_Forum_req').hide();
    }
    else
    {
        $('#txt_Forum_req').show();
        flag= false;
    }

     var txt_District =   document.getElementById('txt_District');
    if(is_fill(txt_District) || is_pakistan == 0)
    {
        $('#txt_District_req').hide();
    }
    else
    {
        $('#txt_District_req').show();
        flag= false;
    }


    if($("#txt_Tehsil").length > 0 || is_pakistan == 0) {
     var txt_Tehsil =   document.getElementById('txt_Tehsil');
    if(is_fill(txt_Tehsil)|| is_pakistan == 0)
    {
         $('#txt_Tehsil_req').hide();
    }
    else
    {
        $('#txt_Tehsil_req').show();
        flag= false;
    }
}
if(is_pakistan == 0)
{

if(grecaptcha.getResponse().trim() == "" || grecaptcha.getResponse() == null )
    {

        $('#security_code_req').show();
        flag= false;
    }
    else
    {
        $('#security_code_req').hide();
    }
}

    if(flag==true)
    {


            is_number_register( document.getElementById('txt_Whatsapp').value , true);


    }
    else{

        $.LoadingOverlay("hide");

      $('#save-form').html('<i class="fa fa-save"></i> Register Now');


    }




  });
});

        </script>



    <script type="text/javascript">


$("#txt_Forum").change(function(e){

            // e.preventDefault();
            // var forum_id = $("#txt_Forum").val();
            //  if(forum_id=="" || forum_id == null)
            //  {
            //     $(this).addClass('error_border');
            //      $("#txt_Forum_req").show();
            //  }
            //  else
            //  {
            //     $(this).removeClass('error_border');
            //     $("#txt_Forum_req").hide();
            //  }

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $("#txt_District").change(function(e){

            e.preventDefault();
            var dist_id = $("#txt_District").val();
             if(dist_id=="" || dist_id == null)
             {
                $(this).addClass('error_border');
                 $("#txt_District_req").show();
                 $("#tehsil-component").empty();
             }
             else
             {
                $(this).removeClass('error_border');
                $("#txt_District_req").hide();
                $.LoadingOverlay("show");
                let _token   = $('meta[name="csrf-token"]').attr('content');
                // alert(_token );
            $.ajax({
               type:'POST',
               url:"{{ route('get.tehsil.ajax') }}",
               data:{dist_id:dist_id
               },
               success:function(data){
             $('#tehsil-component').html(data);
             $.LoadingOverlay("hide");
               },
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });
             }

        });
    </script>


<script>


function is_number_register(number , nextMove)
{

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
               type:'POST',
               url:"{{ route('get.worker.number.verify') }}",
               data:{number:number},
               success:function(data){
                //    console.log((data.status));
                   if(data.status == "found")
                   {
                    $('#not-found').hide();
                    $('#found').show();
                    if(nextMove)
                    {
                        $.LoadingOverlay("hide");
             $('#save-form').html('<i class="fa fa-save"></i> Register Now');
                      }
                   }
                   else
                   {
                    $('#not-found').show();
                    $('#found').hide();
                   if(nextMove)
                    {
                        saveFormData();
                    }



                   }

               }
            });
            //  }

}
function saveFormData()
{

    var countryData = JSON.stringify(iti.getSelectedCountryData());
    var fullname = $("#txt_FullName").val();
    var fathername = $("#txt_FatherName").val();
    var password = $("#txt_Password").val();
    var whatsapp = $("#txt_Whatsapp").val();
    var forum = $("#txt_Forum").val();
    var education_id = $("#education_id").val();
    var district = $("#txt_District").val();
    var tehsil = $("#txt_Tehsil").val();
    var reffer_id = $("#reffer_id").val();
    var recap = grecaptcha.getResponse();
    var gender = $('input[name="user_gender_for_forum_selection"]:checked').val();
    var sim_operator = $('#sim_operator').val();

    // $.LoadingOverlay("hide");

//   console.log(countryData);
    //   alert(recap);
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
               type:'POST',
               url:"{{ route('save.new.worker.publicform') }}",
               data:{sim_operator:sim_operator , gender:gender , reffer_id:reffer_id , countryData:countryData , number_length:number_length , is_pakistan:is_pakistan , recap: recap, fullname:fullname , fathername:fathername ,
                password:password , whatsapp:whatsapp , forum:forum , education_id:education_id , district:district , tehsil:tehsil  },
               success:function(data){
                $('#save-form').html('<i class="fa fa-save"></i> Register Now');
                 console.log(data);
                   if(data.status == "saved")
                   {

                    showMessage();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    $.LoadingOverlay("hide");

                   }
                   else if(data.status == "sendOTP")
                   {

                      showOTPForm();
                      $.LoadingOverlay("hide");

                   }
                  else if(data.status == "captcha")
                   {

                    $('#security_code_req').show();
                    $.LoadingOverlay("hide");
                   }
                   else
                   {

                     $.LoadingOverlay("hide");
                     alert("Error! Somthing Went Worong Please Try Again.");
                   }


               } ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });

}


    </script>



    <script>

    $("#txt_FullName").keyup(function(){
        if(is_fill(this))
        { $(this).siblings('.reqq').hide(); } else { $(this).siblings('.reqq').show(); }
        allLetter(this);
        if(convertToUpper(this))
        { $(this).siblings('.reqq').hide(); } else { $(this).siblings('.reqq').show(); }
    });


    $("#txt_FatherName").keyup(function(){
        if(is_fill(this))
        { $(this).siblings('.reqq').hide(); } else { $(this).siblings('.reqq').show(); }
        allLetter(this);
        if(convertToUpper(this))
        { $(this).siblings('.reqq').hide(); } else { $(this).siblings('.reqq').show(); }
    });

    $("#txt_Whatsapp").focusout(function(){
        if(is_fill(this))
        { $(this).siblings('.reqq').hide();
        $('#not-found').hide();
        $('#found').hide();
        } else {
            $(this).siblings('.reqq').show();
            $('#not-found').hide();
            $('#found').hide();
         }
       var value =  $(this).val().replace("-", "").replace("(", "").replace(")", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("-", "");
        if(value.length == 10)
        { $(this).removeClass('error_border');
         $(this).siblings('.reqq').hide();
         is_number_register( $(this).val() , false);
          }
         else {
            $(this).addClass('error_border');
              $(this).siblings('.reqq').show();
         }

    });

    $("#txt_Password").keyup(function(){

        if(is_password(this))
        {
            $('#minpass').hide();
            $(this).removeClass('error_border');
            if(is_diff(this))
            {
                $('#trypass').hide();
                $(this).removeClass('error_border');

            }
            else
            {
                $('#trypass').show();
                $(this).addClass('error_border');
            }
        }
        else
        {
            $('#minpass').show();
            $(this).addClass('error_border');
        }

    });
    $("#txt_Password").focusout(function(){

        if(is_password(this))
        {
            $('#minpass').hide();
            $(this).removeClass('error_border');
            if(is_diff(this))
            {
                $('#trypass').hide();
                $(this).removeClass('error_border');

            }
            else
            {
                $('#trypass').show();
                $(this).addClass('error_border');
            }
        }
        else
        {
            $('#minpass').show();
            $(this).addClass('error_border');
        }

    });
    function is_diff(element)
    {
        if(element.value != "aQktHGch")
        {
            return true;
        }
        return false;
    }
    function is_password(element)
    {
         var mytext= element.value;
        if(mytext.length > 5)
        {
            return true;
           var numUpper = (mytext.match(/[A-Z]/g) || []).length;
          var numLower = (mytext.match(/[a-z]/g) || []).length;
          if(numUpper > 0 && numLower > 0)
        {
            return true;
       }
         else
          {
              return false;
          }

        }
        else
        {
            return false;
        }
    }

    function is_fill(element)
    {
        if(element.value.trim() == "" ||  element.value.trim() == null)
        {
            element.value = element.value.trim();
            // window.alert(element.value );
            $('#'+element.getAttribute("id")).addClass('error_border');

            return false;
        }
        else
        {
            // element.value = element.value.trim();
            // window.alert(element.value );
            $('#'+element.getAttribute("id")).removeClass('error_border');
            return true;
        }

    }
    function allLetter(element)
      {
    //    var letters = /^[A-Za-z ]+$/;
       var notAllowed = /^[\"\!\`\@\#\$\%\^\&\*\(\)\+\=\-\[\]\\\\\\\'\;\,\.\/\{\}\|\\\"\:\<\>\?\~\_\"\;0-9]+$/;
       if(element.value.match(notAllowed))
         {
            element.value = element.value.slice(0, -1);
            return true;
         }
       else
         {
            $('#'+element.getAttribute("id")).removeClass('error_border');
            return true;

         }
           }
      function convertToUpper(element)
      {
        // var letters = /^[A-Za-z ]+$/;
        var notAllowed = /^[\"\!\`\@\#\$\%\^\&\*\(\)\+\=\-\[\]\\\\\\\'\;\,\.\/\{\}\|\\\"\:\<\>\?\~\_\"\;0-9]+$/;

        if(element.value.match(notAllowed))
         {
            element.value = '';
            return false;
          }
         else
         {

            //  var current_value = element.value;
            // element.value = '';

            //  element.value = current_value.toUpperCase();
            return true;

         }


      }



        </script>


    <!-- Entry title -->


    </div>
    <!-- Entry content -->
    </div></form>

