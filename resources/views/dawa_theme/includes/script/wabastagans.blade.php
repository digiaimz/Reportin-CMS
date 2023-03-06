<script>



    function SaveWabastagan(id=null)
                {


        var fullname = $("#txt_FullName").val();

        var District = $("#txt_District").val();
        var Tehsil = $("#txt_Tehsil").val();
        if(district_required == false)
        {
              District = 0 ;
             Tehsil = 0 ;
        }
        // var Gender = $("#txt_Gender").val();
        var Gender = $('input[name="txt_Gender"]:checked').val();
        var categories = $('#broadcast_category').val().toString();
         var countryData = JSON.stringify(iti.getSelectedCountryData());
        var whatsapp = $("#txt_whatsapp").val();
        var complain = "N/A";
        var is_complain_is = "no";
        var click_id = id;
        var wabastagan_id = $("#delete-wabastagan-button").attr('data-id');
        var rafaqat_number = $("#rafaqat_number").val();
        var remarks = $("#remarks").val();
        var activities_wabasta = $("#activities_wabasta").val().toString();
        var url = "";
        // console.log(countryData);
        if(is_complain==1)
        {
            complain = $("#txt_complain").val();
            url = "{{ route('save.new.complain') }}";
        }else
        {
            url = "{{ route('save.new.wabastagan') }}";
        }

        var data_var = { activities_wabasta:activities_wabasta ,rafaqat_number:rafaqat_number,remarks:remarks, countryData:countryData, name:fullname , District:District ,
                    Tehsil:Tehsil , Gender:Gender  , whatsapp:whatsapp , complain:complain
                    , categories: categories , click_id:click_id , wabastagan_id: wabastagan_id
                      };

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                   type:'POST',
                   url: url ,
                   data: data_var ,
                   success:function(data){

                     console.log(data);

                       if(data.status == "save")
                       {


                        process_end();
                        is_complain =0;
                        $(".no-form").hide();
                        $(".form").hide();

                        $("#saveWabastagan_msg").show(500);
                        $("#save-wabastagan").hide();
                        $("#add-new-wabastagan-button").show();
                        // buttonDisable();
                        loadWabastaganList();
                        $("#save-wabastagan").hide();
                        $("#add-new-wabastagan-button").show();

                        total_wabastagan++;
                        remaining--;


    if(total_wabastagan < 101)
    {

                        simple_pie.updateSeries([ total_wabastagan ,remaining]);
    }

          $('#stat_complete_broadcast_list_target_count').html(Number($('#stat_complete_broadcast_list_target_count').html())+1);


                       }
                      else if(data.status == "update")
                       {

                        $('#close-new-wabastagan-model').click();
                        process_end();
                        is_complain =0;
                        $(".no-form").hide();
                        $(".form").hide();
                        renewForm();
                        loadWabastaganList($('#category-list-broadcast').attr('data-id')  );

                        SnackBar({
                                message: "<em>Congratulation<em>!. Record Update Successfully!",
                                    status: "success",
                                    fixed: true
                            });



                       }
                     else  if(data.status == "you")
                       {
                        is_complain =0;
                        process_end();
                        $("#txt_whatsapp_alerady").show(500);

                        if(data.click=="edit-wabastagan")
                        {
                            $("#edit-wabastagan").show();
                            $("#save-wabastagan").hide();
                        }

                       }
                       else  if(data.status == "another")
                       {
                        is_complain =0;
                        process_end();

                        $("#txt_whatsapp_duplicate").show(500);

                        if(data.click=="edit-wabastagan")
                        {
                            $("#edit-wabastagan").show();
                            $("#save-wabastagan").hide();
                        }
                       }
                       else  if(data.status == "worker")
                       {
                        process_end();
                        is_complain =0;
                        $("#txt_whatsapp_worker").show(500);

                        if(data.click=="edit-wabastagan")
                        {
                            $("#edit-wabastagan").show();
                            $("#save-wabastagan").hide();
                        }
                       }
                       else if(data.status == "complainRegister")
                       {
                        process_end();
                        is_complain =0;
                        $("#txt_whatsapp_complainRegister").show(500);

                        if(data.click=="edit-wabastagan")
                        {
                            $("#edit-wabastagan").show();
                            $("#save-wabastagan").hide();
                        }
                       }
                       else  if(data.status == "complain")
                       {
                        process_end();
                        is_complain =0;
                        $(".no-form").hide();
                        $(".form").hide();
                        $("#complain-msg").show(500);
                        buttonDisable();

                        if(data.click=="edit-wabastagan")
                        {
                            $("#edit-wabastagan").show();
                            $("#save-wabastagan").hide();
                        }
                       }
                       else
                       {

                        process_end();

                       alert( 'Uncaught Error');

                       }

                   } ,
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

     function deleteCategory(id)
    {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var data_var = {  id: Number(id)     };
    $.ajax({
    type:'POST',
    url: "{{ route('delete.category') }}" ,
    data: data_var ,
    success:function(data){

    if (data.status == "delete")
    {

        SnackBar({  message: "<em>Congratulation<em>!. Record Deleted Successfully!",
                                    status: "info",
                                    fixed: true
                            });
    }
    else
    {
        alert("System Catch Error!", "Somthing went Wrong try again latter");
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
                    </script>
