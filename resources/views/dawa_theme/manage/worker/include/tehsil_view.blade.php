

      <select class="form-control  basic " id="txt_Tehsil" name="txt_Tehsil"  autocomplete="off" required=""  >
            <option value="">Select (تحصیل / صوبائی حلقہ)</option>
            @foreach ($tehsils as  $tehsil)
            {{-- {{$tehsil->tsl_name_ur}} - --}}
            <option value="{{$tehsil->id_tsl  }}"> {{$tehsil->tsl_name}}  - {{$tehsil->tsl_name_ur}} </option>
            @endforeach
           </select>
        <b id="txt_Tehsil_req" style="color: red;display:none;"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

        <script>
            var ss = $(".basic").select2({
                tags: false,
            });
                </script>
            
    <script>
           $('.select2-container--default').removeClass('mb-4');
        $("#txt_Tehsil").change(function(e){

            e.preventDefault();
            var tehsil_id = $("#txt_Tehsil").val();
             if(tehsil_id=="" || tehsil_id == null)
             {
                $(this).addClass('error_border');
                 $("#txt_Tehsil_req").show();
             }
             else
             {
                $(this).removeClass('error_border');
                $("#txt_Tehsil_req").hide();
             }

        });

      </script>
