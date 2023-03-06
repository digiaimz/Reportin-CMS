
{{-- <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" > --}}
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">

<link rel="stylesheet" href="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.min.css')}}" >

<script src="{{asset('dawa_theme/selectbox/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('dawa_theme/selectbox/dist/jquery.tree-multiselect.js')}}"></script>

<script>

function sortWhatsAppNumber (value)
                {
                  return   value.replace(" ", "").replace(" ", "").replace(" ", "").replace(" ", "").replace(" ", "").replace("-", "").replace("(", "").replace(")", "").replace("(", "").replace(")", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("_", "").replace("-", "").replace("-", "").replace("-", "").replace("-", "");

                }
function sortWhatsAppNumberPlaceholder (value)
                {
                  return   value.replace(" ", "").replace(" ", "").replace(" ", "").replace(" ", "").replace(" ", "").replace("-", "").replace("(", "").replace(")", "").replace("(", "").replace(")", "").replace("-", "").replace("-", "").replace("-", "").replace("-", "");

                }
                var district_required= true;
</script>


<style>
    .loader-custom {
        float: left;
    margin-right: 7px;
      border: 9px solid #f3f3f3;
      border-radius: 50%;
      border-top: 9px solid #3498db;
      width: 20px;
      height: 20px;
      -webkit-animation: spin 0.5s linear infinite; /* Safari */
      animation: spin 0.5s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
<div class="bio layout-spacing ">
    <div style="    padding: 30px;" class="widget-content widget-content-area widget widget-account-invoice-one">


        @if($is_full_page =="yes")

        <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">
                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Home
                </a></li>

                <li class="breadcrumb-item active" aria-current="page">

                    <a href="javascript:void(0);" style="    color: #007bff;">
                        My-Broadcast-list

            </a>  </li>
            </ol>
        </nav>


        @endif


        <div class="d-flex justify-content-between ">
            @if($is_full_page=="no")


            <h6 class="  rounded bs-tooltip" title="اپنی وٹس ایپ براڈ کاسٹ لسٹ میں موجود وابستگان کا ریکارڈ یہاں اپ ڈیٹ کریں" style="    font-size: 17px;
            display: block;
            color: #0e1726;
            font-weight: 600;
            margin-bottom: 0; ">List Wabastagans: <span style="    background-color: moccasin;
    padding: 0px 10px;
    border-radius: 7px;"> <span id="stat_complete_broadcast_list_target_count">{{$total_wabastagan}}</span>  </span>

            </h6>
            @endif


            <a  @if($is_full_page=="yes") hidden @endif class="badge badge-danger" href="{{route('my.broadcast.list')}}"> View All </a>


        </div>
        <div id="custom-loader-for-loadwabastagan" class="loader-custom"  style="display: none;"></div>
        @if($is_full_page=="no")
        <br>
        @endif


<div style="text-align: right; ">
        <button onclick="renewForm()" id="triger-add-whatsapp-number"   type="button" class="btn btn-primary  @if(Auth::user()->user_type == 'worker' &&  $is_full_page == "no")  fit_display  @endif "
        data-toggle="modal" data-target=".bd-example-modal-lg">
        <svg style="height: 24px;width:24px;fill:#fff;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"

        viewBox="0 0 24 24"
        s ><path d="M 12 2 C 6.5 2 2 6.5 2 12 C 2 13.8 2.5007813 15.5 3.3007812 17 L 2 22 L 7.1992188 20.800781 C 8.6992188 21.600781 10.3 22 12 22 C 17.5 22 22 17.5 22 12 C 22 9.3 20.999609 6.8003906 19.099609 4.9003906 C 17.199609 3.0003906 14.7 2 12 2 z M 12 4 C 14.1 4 16.099219 4.8007813 17.699219 6.3007812 C 19.199219 7.9007813 20 9.9 20 12 C 20 16.4 16.4 20 12 20 C 10.7 20 9.2992188 19.7 8.1992188 19 L 7.5 18.599609 L 6.8007812 18.800781 L 4.8007812 19.300781 L 5.3007812 17.5 L 5.5 16.699219 L 5.0996094 16 C 4.3996094 14.8 4 13.4 4 12 C 4 7.6 7.6 4 12 4 z M 8.5 7.4003906 C 8.3 7.4003906 8.0007812 7.3992188 7.8007812 7.6992188 C 7.5007813 7.9992188 6.9003906 8.6007813 6.9003906 9.8007812 C 6.9003906 11.000781 7.8003906 12.200391 7.9003906 12.400391 C 8.1003906 12.600391 9.6992188 15.199219 12.199219 16.199219 C 14.299219 16.999219 14.699219 16.800781 15.199219 16.800781 C 15.699219 16.700781 16.700391 16.199609 16.900391 15.599609 C 17.100391 14.999609 17.099219 14.499219 17.199219 14.199219 C 17.099219 14.099219 16.999219 14.000391 16.699219 13.900391 C 16.499219 13.800391 15.3 13.199609 15 13.099609 C 14.7 12.999609 14.600391 12.899219 14.400391 13.199219 C 14.200391 13.499219 13.699609 13.999219 13.599609 14.199219 C 13.499609 14.399219 13.399609 14.400781 13.099609 14.300781 C 12.899609 14.200781 12.099609 13.999609 11.099609 13.099609 C 10.299609 12.499609 9.7992187 11.700391 9.6992188 11.400391 C 9.4992187 11.200391 9.7007813 11.000391 9.8007812 10.900391 L 10.199219 10.5 C 10.299219 10.4 10.300391 10.199609 10.400391 10.099609 C 10.500391 9.9996094 10.500391 9.8992188 10.400391 9.6992188 C 10.300391 9.4992187 9.7996094 8.3007812 9.5996094 7.8007812 C 9.3996094 7.4007812 9.2 7.4003906 9 7.4003906 L 8.5 7.4003906 z"></path></svg>
         &nbsp; <span style="    vertical-align: text-bottom;">Add your Broadcast Member </span></button>
</div>

         <div style="text-align: right;    font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;font-size: 18px;letter-spacing: 1.5px; margin-top:13px;">

         اپنی وٹس ایپ براڈ کاسٹ لسٹ میں موجود وابستگان کا ریکارڈ یہاں اپ ڈیٹ کریں
         </div>



      <style>
            .error_border{
                border:1px dashed red;
            }
                </style>

<script>
var  is_complain = 0;
var is_complain_is = "no";
    </script>

    <style>
.edit-number-show{display: none;}
        </style>

        <div  class="modal fade bd-example-modal-lg"
        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">
                        <span class="edit-number-hide">


                            Add To Broadcast List</span>
                        <span class="edit-number-show">    Edit  - or  <button id="delete-wabastagan-button" row-element data-id="0" class="btn btn-danger">Delete</button></span>
                        </h5>
                        <button  tabindex="-1" id="close-new-wabastagan-model" type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div id="add-new-wabastagan" class="modal-body">


                        <div id="saveWabastagan_msg" class="alert alert-success msg no-form" style="display: none;" role="alert">
                         <b> Success!  &#128512; </b>  Congratulation new WhatsApp has been added Successfully.
                         <a href="#" onclick="renewForm()" class="alert-link">Click here for Add To Broadcast List</a>

                          </div>
                        <div id="complain-msg" class="alert alert-success msg no-form" style="display: none;" role="alert">
                         <b>  Congratulation !</b>
                         Your Request Added to Queue Successfully. You can View
                         Request status and remarks at your Dashboard >  <a href="{{route('complain.view.worker')}}" >Requests</a> .
                         <br>
                         Thanks For Your Feedback.  &#128578; &nbsp;
                             <a href="#" onclick="renewForm()" class="alert-link">Click here for Add New To Broadcast List</a>
                          </div>

<div class="row">



    <div class="col-xl-6 col-lg-6 col-md-6 mb-4 col-sm-12 form ">
        <div class="input-group " style="    display: inline-grid;">
            {{-- <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon5">
                <img style="height: 31px;border:none;" src="https://img.icons8.com/color/50/000000/pakistan.png"> +92
                </span>
            </div> --}}
            <input id="txt_whatsapp" name="txt_whatsapp"    type="tel" class="form-control"/>


          </div>
          <b  class=" msg no-form" style="color: red;display:none;user-select: auto;
          font-size: 18px;
          direction: rtl;
          text-align: justify;
           font-family: 'Jameel Noori Nastaleeq', NafeesWebNaskhRegular, sans-serif;" id="txt_whatsapp_alerady"><small>
            This  number is Already  added by You before. <BR>
               ( یہ نمبر پہلے ہی آپ کے ذریعے شامل ہو چکا ہے ) </small> </b>
          <b  class=" msg no-form" style="color: red;display:none;user-select: auto;
          font-size: 18px;
          direction: rtl;
          text-align: justify;
           font-family: 'Jameel Noori Nastaleeq', NafeesWebNaskhRegular, sans-serif;" id="txt_whatsapp_complainRegister"><small>
            Your Request is already Registered Click here for view.
            <BR>
               ( آپ کی شکایت پہلے ہی جمع کرائی گئی ہے دیکھنے کے لئے یہاں کلک کریں )
               <a href="{{route('complain.view.worker')}}" > View My Requests</a>
            </small> </b>
          <b  class=" msg no-form" style="color: red;display:none;user-select: auto;
          font-size: 18px;
          direction: rtl;
          text-align: justify;
           font-family: 'Jameel Noori Nastaleeq', NafeesWebNaskhRegular, sans-serif;" id="txt_whatsapp_worker"><small>
            This WhatsApp number is already registered as worker.
            <BR>
               ( یہ واٹس ایپ نمبر پہلے ہی ورکر کے طور پر رجسٹرڈ ہے۔ )

            </small> </b>
          <b class="no-form" style="color: red;display:none;user-select: auto;
          font-size: 18px;
          direction: rtl;
          text-align: justify;
           font-family: 'Jameel Noori Nastaleeq', NafeesWebNaskhRegular, sans-serif;" id="txt_whatsapp_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

          <div id="txt_whatsapp_duplicate" style="display:none; font-family: 'Jameel Noori Nastaleeq', NafeesWebNaskhRegular, sans-serif;
          font-size: 19px;direction: rtl;
          line-height: 36px;
          text-align: justify;" class="alert alert-danger mt-2 msg no-form" role="alert">


<span>
    یہ وٹس ایپ نمبر پہلے سے کسی اور کارکن کی لسٹ میں شامل ہے۔
    اگر یہ شخص آپ کا عزیز/ دوست ہے یا آپ کی علاقے سے تعلق رکھتا ہے،
     اور آپ اسے اپنی براڈ کاسٹ لسٹ
      میں شامل کرنا چاہتے ہیں تو یہاں کلک کرکے اس کی منتقلی کیلئے درخواست بھیجیں۔
            </span>
            <a  style= "margin:5px;"href="#" onclick="showComplainForm()"> Submit Request</a>
          </div>




        </div>


    {{-- Col --}}

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  mb-4 complain form">
        <div class="input-group ">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon5">Name:</span>
            </div>
            <input style="text-transform:uppercase;"    autocomplete="off"   id="txt_FullName" type="text" name="txt_FullName" class="form-control"
             placeholder="Name" aria-label="Name" />

          </div>
          <b class="no-form"  style="color:  red;display:none;" id="txt_FullName_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
          </div>

          <script>



 $("#txt_FullName").on('paste keyup ',function(e){
        // console.log(e.type);
        if(is_fill(this))
        { $("#txt_FullName_req").hide(); } else { $("#txt_FullName_req").show(); }
        allLetter(this);
        if(convertToUpper(this))
        { $("#txt_FullName_req").hide(); } else { $("#txt_FullName_req").show(); }
    });

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
    //   {
    //    var letters = /^[A-Za-z ]+$/;
    //    if(element.value.match(letters))
    //      {
    //         $('#'+element.getAttribute("id")).removeClass('error_border');
    //         return true;
    //      }
    //    else
    //      {
    //         element.value = element.value.slice(0, -1);
    //         return true;
    //      }
    //   }
      {
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
            // const uppercaseWords = str => str.replace(/^(.)|\s+(.)/g, c => c.toUpperCase());
            // element.value = element.value.toUpperCase();
            // uppercaseWords(element.value) ;
            return true;

         }


      }



        </script>

  {{-- Col --}}

{{-- Col --}}



<script>
    $(document).ready(function(){
         $("#txt_whatsapp").focusout(function(){

          if($("#txt_whatsapp").val().length > 0)
          {

            // script
            // script

            $("#txt_whatsapp_alerady").hide();
            $("#txt_whatsapp_duplicate").hide();
            $("#txt_whatsapp_complainRegister").hide();
            $("#txt_whatsapp_worker").hide();


var whatsapp = $("#txt_whatsapp").val();

var click_id = "save-wabastagan";
if(window.getComputedStyle(document.getElementById("edit-wabastagan")).display  ==  'block')
{
    click_id = "edit-wabastagan";
}


var wabastagan_id = $("#delete-wabastagan-button").attr('data-id');


    url = "{{ route('get.new.wabastagan') }}";


var data_var = {   whatsapp:whatsapp , click_id:click_id  , wabastagan_id: wabastagan_id };

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

                if(data.status == "you")
               {

                $("#txt_whatsapp_alerady").show(500);

               }
               else  if(data.status == "another")
               {

                $("#txt_whatsapp_duplicate").show(500);


               }
               else  if(data.status == "complainRegister")
                   {

                    $("#txt_whatsapp_complainRegister").show(500);

                   }
               else  if(data.status == "worker")
               {

                $("#txt_whatsapp_worker").show(500);

               }

               else
               {


            //    alert( 'Uncaught Error');

               }

           }
//            ,
//            error: function (jqXHR, exception) {
//     // var msg = AjaxError(jqXHR, exception);
//     //     process_end();
//     //     if(msg!= true)
//     //     {
//     //             alert(msg);
//     //     }

// },
        });




            // script
            // script
            // script


          }

       });
  });
      </script>






{{-- Col --}}



{{-- Col --}}





<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4 complain form" id="txt_District_div">

    <select class="form-control basic  " id="txt_District" name="txt_District"
      autocomplete="off" required="">

      <option value="">Select District ( ضلع )</option>
      @foreach ($Districts as  $district)
      {{-- {{$district->dist_name_ur}} - --}}
      <option value="{{$district->id_dist }}"> {{$district->dist_name}}  - {{$district->dist_name_ur}}</option>
      @endforeach

      </select>
     <b class="no-form" style="color: red;display:none;" id="txt_District_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

    </div>

    <script>
        $(document).ready(function(){
          $("#txt_District").focus(function(){
             alert($(this).val());
          });

        });
        </script>

    <script>

  $("#txt_District").change(function(e){

      e.preventDefault();
      var dist_id = $("#txt_District").val();
       if(dist_id=="" || dist_id == null)
       {
          $(this).addClass('error_border');
           $("#txt_District_req").show();
           $("#tehsil-component").empty();
           $('#tehsil-component').hide();
       }
       else
       {
          $(this).removeClass('error_border');
          $("#txt_District_req").hide();
          $("#add-new-wabastagan").LoadingOverlay("show");
          $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
         $.ajax({
         type:'POST',
         url:"{{ route('get.wabastagan.tehsil.ajax') }}",
         data:{dist_id:dist_id},
         success:function(data){
          //    alert(data);
       $('#tehsil-component').html(data);
       $('#tehsil-component').show();
       $("#add-new-wabastagan").LoadingOverlay("hide");
       if(id_tehsil_for_eidt_wabastagan != 0)
       {
        $("#txt_Tehsil").val(id_tehsil_for_eidt_wabastagan).change();
        id_tehsil_for_eidt_wabastagan =0;
       }
         }
         ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    }

      });
       }

  });
</script>



{{-- Col --}}
{{-- Col --}}



<div  id="tehsil-component" class="col-xl-6 col-lg-6 col-md-6 col-sm-12  mb-4 complain no-form">

    <select disabled class="form-control  " id="txt_Tehsil" name="txt_District"  autocomplete="off" required=""  >
        <option value="0" selected>No (تحصیل / صوبائی حلقہ) Found</option>

       </select>

      </div>




{{-- Col --}}
<style>
.select2-container--default .select2-selection--multiple {
    background-color: white;
    border-radius: 4px;
    cursor: text;
    border: 1px solid #bfc9d4;
    color: #3b3f5c;
    font-size: 15px;
    padding: 8px 16px;
    letter-spacing: 1px;
    font-weight: 700;
    background: #f1f2f300;
}
</style>
{{-- Col --}}
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2 complain form" style="margin-top:-14px;">
 <label style="margin: 0px;">Select Tags:</label>
    <select class="form-control tagging" multiple="multiple"
     id="broadcast_category" name="broadcast_category"   autocomplete="off" required="">

     @foreach($categories as $category)
<option value="{{$category->cate_id}}">{{$category->category_name}}</option>
     @endforeach

  </select>
  <script>
        $(document).ready(function(){
$(".tagging").select2({
  tags: false
});
});
      </script>

  <b class="no-form" style="color: red;display:none;" id="broadcast_category_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

  </div>
  <style>
.select2-container--default .select2-selection--multiple {
    cursor: text;
    color: #3b3f5c;
    font-size: 12px;
    letter-spacing: 1px;
    font-weight: 500;
}
      </style>
{{-- Col --}}


 {{-- Col --}}

 <?php

 $user_gender = "Male";
 if(auth::user()->gender=="Female")
 {
    $user_gender = "Female";
 }



 ?>


 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4 complain form">

    <div class="n-chk">
        <label class="new-control new-radio new-radio-text radio-primary">
          <input id="txt_Gender_Male" name="txt_Gender" value="Male" type="radio" class="new-control-input txt_Gender_value" @if($user_gender=="Male") checked  @endif required />
          <span class="new-control-indicator"></span><span class="new-radio-content">Male</span>
        </label>
    </div>
        <div class="n-chk">
        <label class="new-control new-radio new-radio-text radio-danger">
          <input  id="txt_Gender_FeMale" name="txt_Gender"  value="Female" type="radio" class="new-control-input txt_Gender_value" @if($user_gender=="Female") checked  @endif  required />
          <span class="new-control-indicator"></span><span class="new-radio-content">Female</span>
        </label>
    </div>
{{--
  <select class="form-control " id="txt_Gender" name="txt_Gender"   autocomplete="off" required="">

    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>

</select> --}}
<b class="no-form" style="color: red;display:none;" id="txt_Gender_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>
</div>

{{-- Col --}}

<div   class="col-xl-12 col-lg-12 col-md-12 col-sm-12  activities ">

    <div   style="    background-color: #eee;
    height: 15px;
    line-height: 15px;
    margin-bottom: 15px;"><h3 style="font-size: 16px;font-weight: 700;
    padding-right: 10px;
    font-size: 15px;
    height: 15px;
    line-height: 15px;
    text-transform: uppercase;
    background-color: #fff;
    display: inline-block;
    margin: 0;"> Activities Information</h3>
    </div>

</div>
<div   class="col-xl-6 col-lg-6 col-md-6 col-sm-12   activities">
    <div class="input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon5">Rafaqat No:</span>
        </div>
        <input style="text-transform:uppercase;"    id="rafaqat_number" type="text"   autocomplete="off"  name="rafaqat_number" class="form-control"
         placeholder="" aria-label="rafaqat_number" />

      </div>
      <b class="no-form"  style="color:  red;display:none;" id="rafaqat_number_req"><small>it's required field </small> </b>
</div>
<div   class="col-xl-6 col-lg-6 col-md-6 col-sm-12   mt-3 activities" style="text-align: right;
position: relative;">

    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
      What activity did you associate with Wabasta?
      <br>
    <b style="    font-family: Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">
        :  میری براڈ کاسٹ لسٹ میں شامل یہ فرد ان سرگرمیوں میں شریک ہو رہا ہے

    </b>

</div>
<div   class="col-xl-12 col-lg-12 col-md-12 col-sm-12   mt-1 activities">

    <select id="activities_wabasta" multiple="multiple">
        @foreach (\App\Activity::where('status' , 1)->get() as  $activty)
       <option value="{{$activty->id}}"   >   {{$activty->name}} </option>
       @endforeach

   </select>


</div>
<div   class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1  activities">
    <div class="input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon5">Remarks:</span>
        </div>

         <textarea  id="remarks"  class="form-control"  name="remarks" aria-label="With textarea"></textarea>
      </div>
      <b class="no-form"  style="color:  red;display:none;" id="remarks_req"><small>it's required field </small> </b>
</div>
<script type="text/javascript">



    var activities_wabasta = $("#activities_wabasta").treeMultiselect({
        allowBatchSelection: false,
        enableSelectAll: true,
        searchable: true,
        sortable: false,
        startCollapsed: false
    });

    </script>




{{-- Col --}}

<div style="display:none;" id="write-complain" class="col-xl-6 col-lg-6 col-md-6 col-sm-12  no-form">
<div class="input-group mb-4">
    <div class="input-group-prepend">
      <span class="input-group-text">Give your remarks<br>اپنا تبصرہ لکھیں</span>
    </div>
    <textarea id="txt_complain" style="margin-top: 0px;
    margin-bottom: 0px;
    height: 154px;" class="form-control" aria-label="With textarea"></textarea>

      <b class="no-form" style="color: red;display:none;" id="txt_complain_req"><small>it's required field. ( براہ کرم اس فیلڈ کو پُر کریں ) </small> </b>

  </div>
  </div>
{{-- Col --}}
{{-- Col --}}

</div>

<script>

    function showComplainForm()
    {
        is_complain =1;
        $('.complain').hide();
        $("#txt_whatsapp").prop('disabled' , true);
        $('#write-complain').show(500);
        $('#edit-wabastagan').hide();
        $('.activities').hide();
        $('#save-wabastagan').show();
        $('.edit-number-show').hide();
        $('.edit-number-hide').show();
   }


</script>


                       </div>
                    <div class="modal-footer">

                        <button onclick="renewForm()"   id="cancel-button" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button  class="edit-number-hide btn btn-primary save-or-update-wabastagan"  id="save-wabastagan" type="button"  >Save</button>
                        <button  class="edit-number-show btn btn-primary save-or-update-wabastagan"  id="edit-wabastagan" type="button"  >Update</button>
                        <button   onclick="renewForm()" style="display:none;" id="add-new-wabastagan-button" type="button" class="btn btn-primary">Add New</button>
                    </div>
                </div>
            </div>
        </div>

        <script>

function process_start(is_edit = false)
{
     if(is_edit)
     {
        $("#update-wabastagan").prop('disabled', true);
        $("#update-wabastagan").html('Please Wait....');
     }
     else
     {
if(is_complain==0)
{
    $(".msg").hide();
   }
      $("#txt_whatsapp_alerady").hide();
    buttonDisable();
      $("#cancel-button").prop('disabled', true);

    $("#save-wabastagan").html('Please Wait....');
}
}

function process_end(is_edit = false)
{
    if(is_edit)
     {
        $("#update-wabastagan").prop('disabled', false);
        $("#update-wabastagan").html('Upate');
     }
     else
     {
    $("#add-new-wabastagan").LoadingOverlay("hide");
    buttonFree();
    $("#cancel-button").prop('disabled', false);
    $("#save-wabastagan").html('Save');
    // renewToken();
     }
}
function renewToken()
{
    $.ajax({
    url: "{{route('refresh.token')}}",
    type: 'get',
    dataType: 'json',
    success: function (result) {
        //  alert(result.token);

        $('#meta-csrf-token').attr('content', result.token);

    }   ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            if(msg!= true)
            {
                    alert(msg);
            }

    }

});
}
function buttonDisable( )
{

    $("#save-wabastagan").show();
    // $("#add-new-wabastagan-button").show();

    $("#save-wabastagan").prop('disabled', true);


}
function buttonFree( )
{

    // $("#add-new-wabastagan-button").hide();
    $("#save-wabastagan").show();

    $("#save-wabastagan").prop('disabled', false);

}


function renewForm()
{

    $(".activities").hide();
    $("#add-new-wabastagan-button").hide();
    buttonFree();
    // $("#txt_Gender").val("").change();
     $("#txt_Gender_Male").prop("checked",true);
     $("#txt_District").val("").change();
      $("#broadcast_category").val("").change();

    //   $("#activities_wabasta").val([]).change();
          $("#rafaqat_number").val('') ;
          $("#remarks").val('') ;
          if($('.select-all-container').find('.unselect-all').length > 0){
          $('.select-all-container').find('.unselect-all').click();
          }

    $(".no-form").hide();
    $(".form").show(500);
    is_complain = 0;
    $('input').removeClass('error_border');
    $('select').removeClass('error_border');
    $('#txt_FullName').val('');
    $('#txt_whatsapp').val('');
    $("#txt_Gender_Male").val('Male');
    $("#txt_Gender_FeMale").val('Female');

    $('select').val("");
    $('#txt_whatsapp').prop("disabled" , false);
    // $("select option:first").val();

    $('textarea').html("");
    $('.edit-number-show').hide();
    $('.edit-number-hide').show();


    $("#tehsil-component").html('<select disabled  class="form-control   " id="txt_Tehsil" name="txt_tehsil"  autocomplete="off" required=""  ><option value="" selected>No (تحصیل / صوبائی حلقہ) Found</option></select>');
       $("#tehsil-component").show();


}

            $(document).ready(function(){
                  // for remove margin
          $('.select2-container--default').removeClass('mb-4');

              $("#close-new-wabastagan-model").click(function(){
                   renewForm();
              });
              $(".save-or-update-wabastagan").click(function(){

                $("#add-new-wabastagan-button").hide();

                if($(this).attr('id') == "edit-wabastagan")
                {
                process_start(true);
                }
                else
                {
                process_start(false);
                }
    //////////// start process
    //   txt_FullName  // done
    //   txt_District //done
    //   txt_Tehsil // done
    //   txt_Gender

    //   txt_whatsapp
    //   txt_whatsapp_duplicate



                  var flag= true;
              //             txt_FullName
                 var txt_FullName =   document.getElementById('txt_FullName');

                if(is_fill(txt_FullName))
                {
                    //   txt_complain


                    $('#txt_FullName_req').hide();
                    $('#txt_FullName').removeClass('error_border');

                }
                else
                {
                    if(is_complain!=1)
{
                    // show errors
                    $('#txt_FullName_req').show();
                    $('#txt_FullName').addClass('error_border');
                    flag= false;
  }
                }

              //   txt_District
              //   txt_complain

              if(is_complain!=1)
{
if(district_required == true)
{


               var txt_District =   document.getElementById('txt_District');
                if(is_fill(txt_District))
                {
                    $('#txt_District_req').hide();
                    $('#txt_District').removeClass('error_border');
                }
                else
                {
                    // show errors
                    $('#txt_District_req').show();
                    $('#txt_District').addClass('error_border');
                    flag= false;
                }

               //   txt_Tehsil


               if($("#txt_Tehsil").length > 0) {

                var txt_Tehsil =   document.getElementById('txt_Tehsil');
                if(is_fill(txt_Tehsil))
                {
                    $('#txt_Tehsil_req').hide();
                    $('#txt_Tehsil').removeClass('error_border');
                }
                else
                {
                    // show errors
                    $('#txt_Tehsil_req').show();
                    $('#txt_Tehsil').addClass('error_border');
                    flag= false;
                }
               }
               //   txt_Gender

}
else
{
    $('#txt_District_req').hide();
                    $('#txt_District').removeClass('error_border');
    $('#txt_Tehsil_req').hide();
                    $('#txt_Tehsil').removeClass('error_border');

}
}  //   txt_complain
            //    var txt_Gender =   document.getElementById('txt_Gender');
               var txt_Gender =  $('.txt_Gender_value').is(":checked");
               //   txt_complain

if(is_complain!=1)
{
                if(txt_Gender)
                {
                    $('#txt_Gender_req').hide();
                    // $('#txt_Gender').removeClass('error_border');
                }
                else
                {
                    // show errors
                    $('#txt_Gender_req').show();
                    // $('#txt_Gender').addClass('error_border');
                    flag= false;
                }
            }

 //   BroadCast List Category

                // $('#broadcast_category').val().toString() != ""
                if($('#broadcast_category').val().length != 0)
                {


                  $('#broadcast_category_req').hide();
                    $('#broadcast_category').removeClass('error_border');

                }
                else
                {
 if(is_complain!=1) //   txt_complain
{
    // show errors
                    $('#broadcast_category_req').show();
                    $('#broadcast_category').addClass('error_border');
                    flag= false;
                } //   txt_complain
                }

                   //   txt_whatsapp



                var txt_Whatsapp =   document.getElementById('txt_whatsapp');




                    if(sortWhatsAppNumber(txt_Whatsapp.value).length == sortWhatsAppNumberPlaceholder($('#txt_whatsapp').attr('placeholder')).length)
                    {
                        $('#txt_whatsapp').removeClass('error_border');
                     $('#txt_whatsapp_req').hide();
                    //  is_number_register( $('#txt_whatsapp').val());
                      }
                     else {
                        flag= false;
                        $('#txt_whatsapp').addClass('error_border');
                          $('#txt_whatsapp_req').show();
                     }

//   txt_complain

if(is_complain==1)
{
var txt_complain =   document.getElementById('txt_complain');
                if(is_fill(txt_complain))
                {
                    $('#txt_complain_req').hide();
                    $('#txt_complain').removeClass('error_border');
                }
                else
                {
                    // show errors
                    $('#txt_complain_req').show();
                    $('#txt_complain').addClass('error_border');
                    flag= false;
                }

}


                if(flag==true)
                {   SaveWabastagan($(this).attr('id'));
                 }
                else{

                    if($(this).attr('id') == "edit-wabastagan")
                {
                process_end(true);
                }
                else
                {
                    process_end(false);
                }
                 }

              });
            });

                    </script>


<script>
    function abc()
    {
        $("#add-new-wabastagan").LoadingOverlay("show");

    }


</script>



@if($is_full_page == "no")
<BR>
@endif


<ul @if($is_full_page == "no") hidden @endif  class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist" style="    flex-wrap: unset;">

<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">2021 - 22 </a>
</li>

<li class="nav-item">
<a class="nav-link  " id="hometwo-tabs" data-toggle="tab" href="#hometwo" role="tab" aria-controls="hometwo" aria-selected="true">2022 - 23 </a>
</li>
<li class="nav-item">
<a class="nav-link  " id="homethree-tabs" data-toggle="tab" href="#homethree" role="tab" aria-controls="homethree" aria-selected="true">2023 - 24</a>
</li>
<li class="nav-item">
<a class="nav-link  " id="homefour-tabs" data-toggle="tab" href="#homefour" role="tab" aria-controls="homefour" aria-selected="true">2024 - 25</a>
</li>
<li class="nav-item" hidden>
<a class="nav-link  " id="homefive-tabs" data-toggle="tab" href="#homefive" role="tab" aria-controls="homefive" aria-selected="true">2025</a>
</li>

</ul>

<div class="@if(Auth::user()->user_type == 'worker' &&  $is_full_page == "no")  fit_display  @endif" id="wabastagan-list">
@include('dawa_theme.manage.worker.include.wabastagan_list'
,
[
    'Category_index' => "all" ,
    'is_full_page' => $is_full_page
]
)
</div>

    </div>
</div>

     <script>

         function loadWabastaganList( index="all" , is_full_page ='{{$is_full_page}}' )
         {
             $('#custom-loader-for-loadwabastagan').show();

    $.ajax({
    url: "{{route('load.Wabastagan.list')}}?index="+index+'&is_full_page='+is_full_page,
    type: 'get',
    success: function (result) {


        var height = $('#wabastagan-list').height();

        $('#wabastagan-list').css('min-height', height+'px');

         $('#wabastagan-list').html(result);
         $('#custom-loader-for-loadwabastagan').hide();
         $('#wabastagan-list').css('min-height', 'auto');


    }  ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);
        appendOnListAndProcessEnd(null , true , false);
        $('#custom-loader-for-loadwabastagan').hide();
            if(msg!= true)
            {
                    alert(msg);
                    location.reload();
            }

    }

});
}



            $("#txt_whatsapp").inputmask('(999)-999-9999');
            // document.getElementById('txt_whatsapp').placeholder= "(301)-234-5678";
    </script>



<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
{{-- <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" > --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/demo.css')}}" > --}}
<script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>
<script>
    var iti = null;
     var input_whatsapp = document.querySelector("#txt_whatsapp");
     function setPlaceHolder(country=null)
    {
    if(document.getElementById('txt_whatsapp').placeholder == "301 2345678" ||
    document.getElementById('txt_whatsapp').placeholder == "(301)-234-5678"  || country=="pk")
    {
    document.getElementById('txt_whatsapp').placeholder= "(301)-234-5678";
    district_required = true;
    $("#txt_District_div").show();
    $("#tehsil-component").show();
    }
    else
    {
    district_required = false;
    $("#txt_District_div").hide();
    $("#tehsil-component").hide();

    }



     $("#txt_whatsapp").inputmask({mask:document.getElementById('txt_whatsapp').placeholder.replace(/[0-9]/g, "9")});

    }

    $(document).ready(function(){




    iti = intlTelInput(input_whatsapp, {
         allowDropdown: true,
         //autoHideDialCode: true,
       // autoPlaceholder: "off",
       // dropdownContainer: document.body,
         excludeCountries: ["il"],
      //  formatOnDisplay: false,
    geoIpLookup: function(callback) {
          $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";

         callback(countryCode);
        });
         },
       hiddenInput: "full_number",
        initialCountry: "pk",
      // localizedCountries: { 'de': 'Deutschland' },
    //  nationalMode: false,
       // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
     //  placeholderNumberType: "FIXED_LINE",
       // preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
       utilsScript: "dawa_theme/build/js/utils.js",
     });

     input_whatsapp.addEventListener("countrychange", function( ) {

     setPlaceHolder();
   document.getElementById('txt_whatsapp').value = "";
 });


 setTimeout(function(){  setPlaceHolder(); }, 1000);

     //document.getElementById('txt_whatsapp').placeholder.replace(/[0-9]/g, "9")
 //	var mas = document.getElementById('txt_whatsapp').placeholder.replace(/[0-9]/g, "9");

      //  $("#ph-numberr").inputmask({mask:"(999) 999-9999"})

     //  console.log( mas);

     });



   </script>



