<select class="form-control select " id="id_mtsl"
name="id_mtsl" tabindex="6" autocomplete="off" required=""  >
    <option value="">Chose..</option>
    @foreach ($tehsils as  $tehsil)
    {{-- {{$tehsil->tsl_name_ur}} - --}}
    <option value="{{$tehsil->id_tsl  }}"> {{$tehsil->tsl_name}}</option>
    @endforeach
   </select>
   <script>
    var ss = $(".select").select2({
    tags: false,
});


$("#id_mtsl").change(function(e){
                e.preventDefault();
                var tehsil_id = $("#id_mtsl").val();
                 if(tehsil_id=="" || tehsil_id == null)
                 {
                    $(this).addClass('error-border');
                 }
                 else
                 {
                    $(this).removeClass('error-border');
                    $.LoadingOverlay("show");
                let _token   = $('meta[name="csrf-token"]').attr('content');
                // alert(_token);
                $.ajax({
                   type:'POST',
                   url:"{{ route('get.uc.for.edit.profile.ajax') }}",
                   data:{tehsil_id:tehsil_id ,
                _token: _token},
                   success:function(data){

                    $('#id_uc_box').html(data.uc);

                 $.LoadingOverlay("hide");
                   }
                });
                 }

                });


</script>
