 <div class="row">
    <div   class="col col_6_of_12 pading-right">
    <label for="c_website" style="font-weight:600;" class="req"> (تحصیل / صوبائی حلقہ) Tehsil / Provincial Halaqa</label>
        <select class="form-control  select " id="txt_Tehsil" name="txt_Tehsil" tabindex="6" autocomplete="off" required=""  >
            <option value="">Select Tehsil</option>
            @foreach ($tehsils as  $tehsil)
            {{-- {{$tehsil->tsl_name_ur}} - --}}
            <option value="{{$tehsil->id_tsl  }}"> {{$tehsil->tsl_name}} - {{$tehsil->tsl_name_ur}}</option>
            @endforeach
           </select>
        <b id="txt_Tehsil_req" style="color: red;display:none;"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
    </div>
    </div>

    <script>
          var ss = $(".select").select2({
    tags: false,
});
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
