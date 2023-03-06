@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('clips_active')
active
@endsection
{{-- dashboard_aria --}}
@section('clips_active_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
@lang('Edit Clip')
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link  href="{{asset('dawa_theme/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/g58ogmgjt39o7khu54qd47z1i6ahhcrv6yhxkgfudq7twher/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css"  href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}" >

   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/forms/theme-checkbox-radio.css')}}">

@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/plugins/flatpickr/flatpickr.js')}}"></script>

<script src="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.js')}}"></script>

    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>

    <script>
        tinymce.init({
          selector: '.mytextarea' ,

    plugins: [
      ' directionality advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: ' ltr rtl undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'


        });
        </script>
    <script>
 var f2 = null;
       $(document).ready(function(){

       f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
           enableTime: true,
           dateFormat: "d-M-Y H:i",
       });
       });



        </script>
  <script  src="{{asset('dawa_theme/plugins/select2/select2.min.js')}}"></script>
  <script  src="{{asset('dawa_theme/plugins/select2/custom-select2.js')}}"></script>

<style>
.delete-element{
    color: red;
    left: 48%;
    position: absolute;
    bottom: 40px;
    cursor: pointer;
}
</style>

<script>

var mcqs_count = 1;


    $( "#create_quiz" ).click(function() {

        var flag = true;


        if($('.question_block').length == 0)
        { alert("Please Create Minimum One Row"); return    false; }

        $( ".question_block" ).each(function( index ) {

            var count_id = $(this).attr("data-id");
            $('#message'+count_id).html('');


            if($('#question'+count_id).val().length < 4)
            {
$('#message'+count_id).html('<div class="alert alert-danger" role="alert">  Question Statatement Required. </div>');
                flag = false;
            }
            else
            {

              if($('#option1'+count_id).is(':checked'))
              {
                if($('#option_value1'+count_id).val()  == "") { $('#message'+count_id).html('<div class="alert alert-danger" role="alert">  True Answer - Required. </div>'); flag = false;}
              }

              if($('#option2'+count_id).is(':checked'))
              {
                if($('#option_value2'+count_id).val()  == "") {$('#message'+count_id).html('<div class="alert alert-danger" role="alert">  True Answer - Required. </div>'); flag = false;}
              }

              if($('#option3'+count_id).is(':checked'))
              {
                if($('#option_value3'+count_id).val()  == "") {$('#message'+count_id).html('<div class="alert alert-danger" role="alert">  True Answer - Required. </div>'); flag = false;}
              }

              if($('#option4'+count_id).is(':checked'))
              {
                if($('#option_value4'+count_id).val()  == "") {$('#message'+count_id).html('<div class="alert alert-danger" role="alert">  True Answer - Required. </div>'); flag = false;}
              }

            }

        });


if(flag)
{
    $('#store_new_clip_questions').submit();
}





    });


    $( "#add_new_row" ).click(function() {
        $('.tobedeleted').remove();
        var html_row =  `{{-- MCQs Block Start  --}}
            <div class=" layout-spacing question_block" data-id="`+mcqs_count+`"  style="position: relative;">
                <div class="widget-content widget-content-area br-6" style="padding:15px;">

                        <div class="question-block">

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Question</span>
                                </div>
                                <textarea class="form-control" id="question`+mcqs_count+`""  name="question[]" aria-label="With textarea"></textarea>
                              </div>

                              <div class="input-group mb-4">

                                <input type="text" id="option_value1`+mcqs_count+`""  name="option_value[]"   class="form-control" placeholder="Option 1" aria-label="Option 1">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                              <input type="radio" class="new-control-input" id="option1`+mcqs_count+`" value="1" name="option`+mcqs_count+`" checked >
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                              &nbsp;
                                <input type="text" id="option_value2`+mcqs_count+`"" name="option_value[]"   class="form-control" placeholder="Option 2" aria-label="Option 2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                              <input type="radio" class="new-control-input"  id="option2`+mcqs_count+`" value="2" name="option`+mcqs_count+`" >
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                              <div class="input-group mb-4">


                                <input type="text" id="option_value3`+mcqs_count+`"" name="option_value[]"      class="form-control" placeholder="Option 3" aria-label="Option 3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                              <input type="radio" class="new-control-input" id="option3`+mcqs_count+`" value="3"  name="option`+mcqs_count+`"  >
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                              &nbsp;
                                <input type="text" id="option_value4`+mcqs_count+`"" name="option_value[]"   class="form-control" placeholder="Option 4" aria-label="Option 4">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                              <input type="radio" class="new-control-input" id="option4`+mcqs_count+`" value="4"  name="option`+mcqs_count+`"  >
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

      </div>

      <div id="message`+mcqs_count+`"></div>
      </div> </div>
      <svg  class="delete-element" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
      </div>
    {{-- MCQs Block End  --}}
    `;

     $('#mcqs_list').append(html_row);
     mcqs_count++;
     $( ".delete-element" ).click(function() {

$(this).parent().remove();

});

    });
    $( ".delete-element" ).click(function() {

$(this).parent().remove();

});

    </script>








@endsection
{{-- content --}}
@section('content')



<div class="layout-px-spacing" style="width: 100%;">

    <div class="row layout-top-spacing" id="cancel-row">



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">



<div class="shortcode-content">




    <nav class="breadcrumb-two" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">
                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                @lang('Home')
            </a></li>
            <li class="breadcrumb-item "><a href="{{route('view.clips.manage')}}">
                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                @lang('Clips')
            </a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
               Edit Clip </a></li>
        </ol>
    </nav>

 <hr>

 @if (session('msg'))
    <div class="alert alert-success">
      @lang(session('msg'))  <a href="{{route('view.clips.manage')}}"> @lang('View Clips') </a>
    </div>
@endif

<form method="POST" autocomplete="off" action="{{route('edit.store.clip' , ['id' => $clip->id])}}"  >

    @csrf
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-6 col-sm-12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('Clip') <small>#</small> </span>
        </div>
        <input type="number"  autocomplete="off"  value="{{old('Clip_Id' , $clip->clip_id)}}" name="Clip_Id" class="form-control" aria-label="Name(En)" >
      </div>
      @error('Clip_Id')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror


</div>

<div class="col mb-4 col-md-6 col-sm-12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('Speech#')  &nbsp; </span>
        </div>
        <input type="text" name="Speech_Id"   autocomplete="off"  value="{{old('Speech_Id' , $clip->speech_id)}}" class="form-control" aria-label="Name(En)" >
      </div>
      @error('Speech_Id')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror
</div>



</div>


<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group input-group  ">
        <div class="input-group-prepend">
          <span class="input-group-text"  >@lang('Clip Title')  </span>
        </div>
        <input type="text" name="Title"  autocomplete="off"  value="{{old('Title' , $clip->title)}}"  class="form-control" aria-label="Name(En)" >
      </div>

      @error('Title')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror

 </div>


 </div>
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group input-group  ">
        <div class="input-group-prepend">
          <span class="input-group-text"  >@lang('Youtube Link') </span>
        </div>
        <input type="text" name="Youtube_Link"  autocomplete="off"  value="{{old('Youtube_Link' , $clip->youtube_link)}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('Youtube_Link')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror
 </div>


 </div>
<!-----Row Start ----->
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group input-group  ">
        <div class="input-group-prepend">
            <span class="input-group-text"  >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
               &nbsp; @lang('Video Download Link') </span>
        </div>
        <input type="text" name="video_download_link"  autocomplete="off"  value="{{old('video_download_link' , $clip->video_download_link)}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('video_download_link')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror
 </div>


 </div>
<!-----Row Start ----->
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group input-group  ">
        <div class="input-group-prepend">
            <span class="input-group-text"  >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                &nbsp;   @lang('Audio Dowload Link') </span>
        </div>
        <input type="text" name="audio_download_link"  autocomplete="off"  value="{{old('audio_download_link' , $clip->audio_download_link)}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('audio_download_link')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror
 </div>


 </div>
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-6 col-sm-6">

    <label style="    color: black;">@lang('Select Release Date And Time:')</label>

    <div class="form-group mb-0">
        <input
        name="Date_And_Time"
        style="    color: black;" id="dateTimeFlatpickr"
        value="{{old('Date_And_Time' , \Carbon\Carbon::parse($clip->datetime)->format('d-M-Y H:i') )}}"    class="form-control flatpickr flatpickr-input active"
         type="text" placeholder="Select Date and time..">
    </div>

    @error('Date_And_Time')
    <div class="alert alert-danger"> @lang($message)</div>
@enderror
 </div>
 <div class="col mb-4 col-md-6 col-sm-6">

    <label style="    color: black;">@lang('Status:')</label>

    <div class="form-group mb-0">

        <select class="basic" name="status" >
             <option value="1" @if( old('status'   , $clip->status )==1) selected @endif > @lang('Active')</option>
             <option value="0" @if(old('status'   , $clip->status )==0) selected @endif  > @lang('In-Active')</option>
        </select>

    </div>

    @error('status')
    <div class="alert alert-danger"> @lang($message)</div>
@enderror
 </div>



 </div>

 <!-----Row Start ----->
 <div class="row">


    <div class="col mb-4 col-md-6 col-sm-12">

        <div class="input-group input-group ">
            <div class="input-group-prepend">
              <span class="input-group-text"  >@lang('Minutes') <small> @lang('(Short)')</small></span>
            </div>
            <input type="number"   autocomplete="off"   value="{{old('Minutes_Short'   , $clip->short_ )}}"  name="Minutes_Short"  class="form-control" aria-label="Name(En)"  >
          </div>

          @error('Minutes_Short')
          <div class="alert alert-danger"> @lang($message)</div>
      @enderror


     </div>

    <div class="col mb-4 col-md-6 col-sm-12">

        <div class="input-group input-group ">
            <div class="input-group-prepend">
              <span class="input-group-text"  >@lang('Minutes') <small> @lang('(Long)')</small></span>
            </div>
            <input type="number"    autocomplete="off"     value="{{old('Minutes_Long'  , $clip->long_ )}}"   name="Minutes_Long"   class="form-control" aria-label="Name(En)"  >
          </div>
          @error('Minutes_Long')
          <div class="alert alert-danger"> @lang($message)</div>
      @enderror

     </div>



 </div>


<!-----Row Start ----->
<div class="row">


    <div class="col mb-4 col-md-12 col-sm-12">

       <div class="input-group  "  style="display: block;">
           <div class="input-group-prepend">
             <span class="input-group-text">@lang('Discription') </span>
           </div>
           <textarea class="form-control mytextarea " rows="12"   autocomplete="off"  name="discription"  aria-label="With textarea">{{old('discription' , $clip->description )}}</textarea>
         </div>

         @error('discription')
         <div class="alert alert-danger"> @lang($message)</div>
     @enderror
    </div>

   </div>
   <!-----Row End ----->
 <!-----Row Start ----->
 <div class="row">

 <div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group  " style="display: block;">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('Remarks') </span>
        </div>
        <textarea class="form-control mytextarea" rows="12"  autocomplete="off"  name="remarks"  aria-label="With textarea">{{old('remarks' , $clip->remarks )}}</textarea>
      </div>

      @error('remarks')
      <div class="alert alert-danger"> @lang($message)</div>
  @enderror
 </div>

</div>




<!-----Row End ----->

<div style="clear:both;"></div><br>


<div class="row" align="center">
	<div class="col col-md-12">
		<button type="submit" class="btn btn-primary" id="submit_registration"   >

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
          &nbsp;  @lang('Update Clip')
        </button>
	</div>
</div>

<!-----Row End ----->

<!-- Entry title -->
</form>

</div>


            </div>
        </div>

    </div>

    </div>






    <form method="POST" id="store_new_clip_questions" autocomplete="off" action="{{route('store.new.clip.questions')}}" style="width: 100%;margin: 0px 17px;">

        @csrf
        <input type="text" hidden name="clip_id" value="{{$clip->id}}" />

<div class=" "   style="width: 100% ">

    <div class="row layout-top-spacing" id="cancel-row">



        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">



<div class="shortcode-content">




   <h5><b>Clip's MCQs List:</b></h5>

</div>


  </div>
  </div>

    </div>

    </div>



<div class="layout-px-spacing"   style="width: 100% ">

    <div class="row layout-top-spacing"  style="position: relative;justify-content:center;" >

 @if(count($clip->questions ) < 1)
        <div class=" layout-spacing  tobedeleted"   style="position: relative;">
            <div class="widget-content widget-content-area br-6" style="text-align: center;">
<h3 style="color: orange;">No Quiz Found</h3>
            </div></div>
@endif

<div id="mcqs_list" style="    display: flex;flex-wrap: wrap;">

    <?php $mcqs_count = 150 ?>

@foreach ($clip->questions as  $question)
<?php $all_answers = $question->answers ?>

<div class=" layout-spacing question_block" data-id="{{$mcqs_count}}"  style="position: relative;">
    <div class="widget-content widget-content-area br-6" style="padding: 15px;">

            <div class="question-block">

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Question</span>
                    </div>
                    <textarea class="form-control" id="question{{$mcqs_count}}"  name="question[]" aria-label="With textarea">{{$question->question}}</textarea>
                  </div>



                  <div class="input-group mb-4">

                    <input type="text" id="option_value1{{$mcqs_count}}"  name="option_value[]" value="{{$all_answers[0]->option_value}}"
                     class="form-control" placeholder="Option 1" aria-label="Option 1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="n-chk align-self-end">
                                <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                  <input type="radio" class="new-control-input" id="option1{{$mcqs_count}}" value="1" name="option{{$mcqs_count}}"
                                  @if($all_answers[0]->is_true == 1) checked @endif >
                                  <span class="new-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                  &nbsp;
                    <input type="text" id="option_value2{{$mcqs_count}}" name="option_value[]" value="{{$all_answers[1]->option_value}}"   class="form-control" placeholder="Option 2" aria-label="Option 2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="n-chk align-self-end">
                                <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                  <input type="radio" class="new-control-input"  id="option2{{$mcqs_count}}" value="2" name="option{{$mcqs_count}}"
                                   @if($all_answers[1]->is_true == 1) checked @endif >
                                  <span class="new-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                  <div class="input-group mb-4">


                    <input type="text" id="option_value3{{$mcqs_count}}" name="option_value[]"   value="{{$all_answers[2]->option_value}}"   class="form-control" placeholder="Option 3" aria-label="Option 3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="n-chk align-self-end">
                                <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                  <input type="radio" class="new-control-input" id="option3{{$mcqs_count}}" value="3"  name="option{{$mcqs_count}}"
                                  @if($all_answers[2]->is_true == 1) checked @endif   >
                                  <span class="new-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                  &nbsp;
                    <input type="text" id="option_value4{{$mcqs_count}}" name="option_value[]" value="{{$all_answers[3]->option_value}}"   class="form-control" placeholder="Option 4" aria-label="Option 4">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="n-chk align-self-end">
                                <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                  <input type="radio" class="new-control-input" id="option4{{$mcqs_count}}" value="4"  name="option{{$mcqs_count}}"
                                  @if($all_answers[3]->is_true == 1) checked @endif   >
                                  <span class="new-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

</div>

<div id="message{{$mcqs_count}}"></div>
</div> </div>
<svg  class="delete-element" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
</div>
{{-- MCQs Block End  --}}



<?php $mcqs_count++; ?>
@endforeach


</div>





<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6" style="text-align: center;">

        @if(Session::has('successMsg'))
        <div class="alert alert-success"> {{ Session::get('successMsg') }}</div>
      @endif
<button   type="button" class="btn btn-primary" id="add_new_row"   >
<svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
  &nbsp;  Add New Row
</button>

<button   type="button" class="btn btn-primary" id="create_quiz"   >
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
      &nbsp;  Create Quiz
    </button>

    </div>

    </div></div></div>



</form>







@endsection
