@extends('layouts.dawa_theme')
@section('broadcastlist_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
My Broadcast-List
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="{{asset('dawa_theme/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >
<link href="{{asset('dawa_theme/assets/css/components/tabs-accordian/custom-tabs.css')}}"  rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <script src="{{asset('dawa_theme/assets/js/sweetalert.min.js')}}" ></script>
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}">

  <link rel="stylesheet" href="{{asset('dawa_theme/dist/js-snackbar.css?v=1.3')}}" />
  @if(Auth::user()->user_type == "staff")

  <link  href="{{asset('dawa_theme/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">


@endif



<script>
var id_tehsil_for_eidt_wabastagan=0;

    </script>
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100%;
    height: 100%;}
    .select2-dropdown {
        z-index: 1140;
    }
    .modal-backdrop {

    background-color: #000000;
}
    </style>

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/elements/alert.css')}}" >
 <style>
     .btn-light { border-color: transparent; }
 </style>
  <script src="{{asset('dawa_theme/dist/js-snackbar.js?v=1.3')}}"></script>
@endsection

@section('pagelevel_scripts_footer')

<script type="text/javascript">
    $(document).ready(function(){

       $('head title', window.parent.document).text('Vision 2025 ');

    });
    </script>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
{{-- <script src="{{asset('dawa_theme/plugins/apex/apexcharts.min.js')}}"></script> --}}
{{-- <script src="{{asset('dawa_theme/assets/js/widgets/modules-widgets.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>

@if(Auth::user()->user_type == "staff")

<script src="{{asset('dawa_theme/plugins/flatpickr/flatpickr.js')}}"></script>


<script>
$(document).ready(function(){

    var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range",
    dateFormat: "d-M-Y",
});
});

</script>

@endif

<script>
var ss = $(".basic").select2({
    tags: false,
});
    </script>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->



<?php $country_user = json_decode(Auth::user()->country );

?>

@if(Auth::user()->id_dist == null && $country_user->iso2 == "pk")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   Swal.fire(
  'Alert! System Update.',
  'We apologize for this activity.You have to Update Your District and Tehsil again.',
  'info'
);

        </script>
        @elseif(Auth::user()->id_Profession === 0 )
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
   Swal.fire(
  'Alert! System Update.',
  'We apologize for this activity. You have to Update Your Profession  Because of System Update.',
  'info'
);

        </script>

@endif


@endsection
@section('content')



<div class="layout-px-spacing">

    <style>
        .layout-px-spacing>.layout-top-spacing {
            display: block;
        }
</style>


    <style>
.widget-account-invoice-two .account-box .info
{
    margin-bottom: 34px;
}
        </style>


        <div class="row analytics">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  ">




 {{-- data table  --}}
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}">
 <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
 {{-- data table  --}}




 @include('dawa_theme.manage.worker.wabastagan_table' , ['is_full_page'=>'yes'])


        </div>


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

    var data_var = { activities_wabasta:activities_wabasta ,rafaqat_number:rafaqat_number,remarks:remarks,  countryData:countryData, name:fullname , District:District ,
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
                   else  if(data.status == "complainRegister")
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






        </div>




@endsection
