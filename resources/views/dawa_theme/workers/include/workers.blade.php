   @foreach($workers as $worker)
                <tr class="items manage-user" data-id="{{ $worker->id }}" data-name="{{ $worker->name }}" data-image="{{ asset($worker->photo) }}">

                    <td style="   text-align: center;">{{$i}} </td>
                    <td  ><img src="{{asset($worker->photo)}}" style="
                            border: 1px solid #dee2e6;
    max-width: 55px;
    max-height: 55px;
    border-radius: 9px;
                        " alt="Image">
                        <div class="user-meta-info" style="display: inline-block;
                      vertical-align: middle;">
                            <span class="user-name" data-name=" ">{{(trim($worker->name) != '')? $worker->name :
                                "N/A"}}</span>

                        </div></td>
                          <td ><span class="user-work" data-occupation="  ">
                                {!! ucwords( ($worker->profession != null)? $worker->profession->profession_name
                                :"N/A") !!}</span> </td>
                    <td>{{ ($worker->forum != null)? $worker->forum->frm_code :"N/A"}}</td>
                    <td> {{ ($worker->district != null)? $worker->district->dist_name :"N/A" }}  </td>
                    <td> {{ ($worker->tehsil != null)? $worker->tehsil->tsl_name :"N/A" }}
                        </td>
                    <td>  <span class="black"> {{($worker->whatsapp != null)? $worker->whatsapp :"N/A"}} </span>
                       </td>
                     <td>    {{ ($worker->email != null)? $worker->email :"N/A"}}</td>
                    <td>
                        <span class="black" style="font-size: 20px;    margin-left: 16px;">
                            {{($worker->wabastagans != null)? count($worker->wabastagans) :"0"}} </span></td>
                    <td>{{
                        \Carbon\Carbon::parse($worker->created_at)->format('d-M') }} </span> <br />
                    {{ \Carbon\Carbon::parse($worker->created_at)->format('H:i:s') }}</td>

                </tr>

                <?php
$i--;
?>
                @endforeach


                <script>
                 $(document).ready(function() {
        // $(".manage-user").click(function() {
        //     $('#password').val('');
        //     $('.msg').hide();
        //     $('#manage_worker_name').html($(this).attr('data-name'));
        //     manage_user_id= $(this).attr('data-id');
        //     $('#manage_worker_image').attr('src', $(this).attr('data-image'));
        //     $("#open_manage_worder").click();
        // });

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


