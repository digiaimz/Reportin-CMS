<select class="form-control select " id="id_uc"
name="id_uc" tabindex="7" autocomplete="off" required=""  >
    <option value="">Chose..</option>
    @foreach ($ucs as  $uc)
    {{-- {{$tehsil->tsl_name_ur}} - --}}
    <option   value="{{$uc->id  }}">{{$uc->uc_name_eng}} - {{$uc->uc_name_ur}}</option>
    @endforeach
   </select>
   <script>
    var ss = $(".select").select2({
    tags: false,
});
</script>
