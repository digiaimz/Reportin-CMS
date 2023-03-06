@foreach($workers as $worker)
<div class="items manage-user" data-id="{{ $worker->id }}" data-name="{{ $worker->name }}" data-image="{{ asset($worker->photo) }}">
    <div class="item-content">

        <div class="user-email width-5">
            <p class="info-title">Sr#: </p>
            <p class="usr-email-addr">
                {{$i}} </p>
        </div>

        <div class="user-profile width-25">

            <img src="{{asset($worker->photo)}}" style="max-width: 80px; max-height: 80px;" alt="Image">
            <div class="user-meta-info">
                <p class="user-name" data-name=" ">{{(trim($worker->name) != '')? $worker->name :
                    "N/A"}}</p>
                <p class="user-work" data-occupation="  ">
                    {!! ucwords( ($worker->profession != null)? $worker->profession->profession_name
                    :"N/A") !!}</p>
            </div>
        </div>

        <div class="user-email">
            <p class="info-title">Forum: </p>
            <p class="usr-email-addr" data-email="">
                {{ ($worker->forum != null)? $worker->forum->frm_code :"N/A"}}</p>
        </div>
        <div class="user-location">
            <p class="info-title">District:<br>Tehsil: </p>
            <p class="usr-location" data-location="">

                {{ ($worker->tehsil != null)? $worker->tehsil->tsl_name :"N/A" }} <br>
                {{ ($worker->district != null)? $worker->district->dist_name :"N/A" }}
            </p>
        </div>
        <div class="user-phone width-25">
            <p class="info-title">WhatsApp:<br>Email: </p>
            <p class="usr-ph-no" data-phone=" ">
                <span class="black"> {{($worker->whatsapp != null)? $worker->whatsapp :"N/A"}} </span>
                <br>
                {{ ($worker->email != null)? $worker->email :"N/A"}}

            </p>
        </div>
        <div class="user-phone width-10">
            <p class="info-title">Listed:</p>
            <p class="usr-ph-no">

                <span class="black" style="font-size: 20px;    margin-left: 16px;">
                    {{($worker->wabastagans != null)? count($worker->wabastagans) :"0"}} </span>
            </p>
        </div>
        <div class="user-phone width-10">
            <p class="info-title">Date:<br>Time:</p>
            <p class="usr-ph-no"> <span class="black"> {{
                    \Carbon\Carbon::parse($worker->created_at)->format('d-M') }} </span> <br />
                {{ \Carbon\Carbon::parse($worker->created_at)->format('H:i:s') }}
            </p>
        </div>

    </div>
</div>

<?php
$i--;
?>
@endforeach


<script>
 $(document).ready(function() {
$(".manage-user").click(function() {
$('#password').val('');
$('.msg').hide();
$('#manage_worker_name').html($(this).attr('data-name'));
manage_user_id= $(this).attr('data-id');
$('#manage_worker_image').attr('src', $(this).attr('data-image'));
$("#open_manage_worder").click();
});

// update password button

$("#manage_worker_update_password_button").click(function() {

$('.msg').hide();
update_password_button_disabled();

if($('#password').val().length < 6 )
{

showMsg('password_msg' , '<span style="color:red;">Please Enter Minimum 6 Characters.</span>');
update_password_button_enabled();
return true;
}
if($('#password').val().length > 15 )
{

showMsg('password_msg' , '<span style="color:red;">Please Enter Maximum 15 Characters.</span>');
update_password_button_enabled();
return true;
}

ChangeUserPassword($('#password').val() );


});
});
</script>

