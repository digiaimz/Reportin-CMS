<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/switches.css')}}" >
<div class="widget widget-activity-two mb-4" style="height: auto;">

    <div class="widget-heading">
        <h5 class="">System Settings</h5>
    </div>



    <div class="widget-content">

        <div class="row">

            <div id="otp_info" class="col-md-12">
                <div class="animated-background">
                    <div class="background-masker btn-divide-left"></div>
                  </div>
                  <br>

                </div>

    <?php

$isOpen = true;
$run_time = false;

    $system_setting = \App\SystemSetting::where('for_name' , 'otp')->first();
    if($system_setting != null)
    {
    if($system_setting->time_count < \Carbon\Carbon::now() )
    {
        \App\SystemSetting::where('for_name' , 'otp')->delete();
        $run_time = true;
        //enable otp
       // \App\Helpers\Helper::setDotEnv('is_SMS_enable',"true");
    }
    else {
        $isOpen = false;
    }
   }

    ?>

                @can('edit-otp')

    @if($isOpen)
        <div class="col-md-12">

       @lang('Do You Want Activate SMS OTP ?')
        </div>


        <div class="col-md-12">
        <label class="switch s-icons s-outline  s-outline-success mt-2 ">



            <input type="checkbox"  id="sms_otp_activate_button" @IF(Config::get('otp.is_SMS_enable') || env('is_SMS_enable') ||$run_time ) CHECKED @ENDIF >
            <span class="slider"></span>
        </label>

        </div>


        <hr>
        <div class="col-md-12">

            @lang('Cron Job For OTP Setting:')
             </div>
        <div class="col-md-8">
            <form action="{{route('opt.setting.cronJob')}}" method="POST">
        <div class="input-group mb-4">
                <input min="1" type="number" name="minutes" class="form-control" placeholder="Minutes" aria-label="Minutes" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit">Set Job - OTP OFF</button>

            </div>
        </div>
        @error('minutes')
        <div class="alert alert-danger">@lang($message)</div>
    @enderror
            </form>
        </div>

        @else
        <div>
        &nbsp;&nbsp; &nbsp;&nbsp;
        <form id="diactivate" method="post" action="{{route('cancel.opt.setting.cronJob')}}">
            @csrf
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
            Deactivate
        </button>
        </form>
        <script>

$('#diactivate').submit(function(e){
// Stop the form submitting
$('.bg-overlay').show();
   $('.se-pre-con').show();

});
            // $('#login_button').click(function(){
            //     // $('#login_button_value').html('Please Wait...');
            //     // $('#login_button').prop('disabled' ,true);
            // });
            </script>
    </div>
        <br>
      &nbsp;&nbsp; &nbsp;&nbsp;<b> @lang('Cron Job Active - OTP OFF Till:')</b>
    <br>
        {{$system_setting->time_count}}


        @endif
        @endcan

        </div>

        <script>

function getOTPInfo()
{

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'GET',
url: "{{ route('get.setting.otp.info') }}" ,
success:function(data){

    $('#otp_info').html(data.view);

},
               error: function (jqXHR, exception) {
        // var msg = AjaxError(jqXHR, exception);
        //     process_end();
        //     if(msg!= true)
        //     {
        //             alert(msg);
        //     }

    },


});

}





            $(document).ready(function(){

       $('#sms_otp_activate_button').click(function(){

        SetOTPSetting($(this).is(":checked"));

       });

       function SetOTPSetting(value)
{

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  value: value    };
$.ajax({
type:'POST',
url: "{{ route('opt.setting') }}" ,
data: data_var ,
success:function(data){


if(data.status == 'true')
{

    SnackBar({
                            message: "<em>Successfully<em>!. Activate SMS OTP For Registration!",
                                status: "success",
                                fixed: true
                        });

}
else
{

    SnackBar({
                            message: "<em>Successfully<em>!. Deactivate SMS OTP For Registration",
                                status: "info",
                                fixed: true
                        });

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

getOTPInfo();

            });







        </script>



    </div>
</div>

