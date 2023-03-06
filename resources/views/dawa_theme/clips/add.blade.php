@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('clips_active')
active
@endsection
{{-- dashboard_aria --}}
@section('clips_active_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
@lang('Add New Clip')
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')

<script src="https://cdn.tiny.cloud/1/g58ogmgjt39o7khu54qd47z1i6ahhcrv6yhxkgfudq7twher/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link  href="{{asset('dawa_theme/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">

   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" type="text/css"  href="{{asset('dawa_theme/plugins/select2/select2.min.css')}}" >
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
    content_css: 'css/content.css' ,
    content_style: "body {   font-family: Arial; }"

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
@endsection
{{-- content --}}
@section('content')



<div class="layout-px-spacing"  >

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
                @lang('Add New Clip') </a></li>
        </ol>
    </nav>

 <hr>

 @if (session('msg'))
    <div class="alert alert-success">
       @lang(session('msg'))   <a href="{{route('view.clips.manage')}}"> @lang('View Clips') </a>
    </div>
@endif

<form method="POST" autocomplete="off" action="{{route('store.new.clip')}}"  >

    @csrf
<!-----Row Start ----->
<div class="row">

<div class="col mb-4 col-md-6 col-sm-12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('Clip') <small>#</small> </span>
        </div>
        <input type="number"  autocomplete="off"  value="{{old('Clip_Id')}}" name="Clip_Id" class="form-control" aria-label="Name(En)" >
      </div>
      @error('Clip_Id')
      <div class="alert alert-danger">@lang($message)</div>
  @enderror


</div>

<div class="col mb-4 col-md-6 col-sm-12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('Speech#')  &nbsp; </span>
        </div>
        <input type="text" name="Speech_Id"   autocomplete="off"  value="{{old('Speech_Id')}}" class="form-control" aria-label="Name(En)" >
      </div>
      @error('Speech_Id')
      <div class="alert alert-danger">@lang($message) </div>
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
        <input type="text" name="Title"  autocomplete="off"  value="{{old('Title')}}"  class="form-control" aria-label="Name(En)" >
      </div>

      @error('Title')
      <div class="alert alert-danger">@lang($message)</div>
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
        <input type="text" name="Youtube_Link"  autocomplete="off"  value="{{old('Youtube_Link')}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('Youtube_Link')
      <div class="alert alert-danger">@lang($message)</div>
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
            &nbsp;  @lang('Video Download Link') </span>
        </div>
        <input type="text" name="video_download_link"  autocomplete="off"  value="{{old('video_download_link')}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('video_download_link')
      <div class="alert alert-danger">@lang($message)</div>
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
            &nbsp;  @lang('Audio Dowload Link') </span>
        </div>
        <input type="text" name="audio_download_link"  autocomplete="off"  value="{{old('audio_download_link')}}"   class="form-control" aria-label="Name(En)" >
      </div>
      @error('audio_download_link')
      <div class="alert alert-danger">@lang($message)</div>
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
        value="{{old('Date_And_Time')}}"    class="form-control flatpickr flatpickr-input active"
         type="text" placeholder="Select Date and time..">
    </div>

    @error('Date_And_Time')
    <div class="alert alert-danger">@lang($message)</div>
@enderror
 </div>
<div class="col mb-4 col-md-6 col-sm-6">

    <label style="    color: black;">@lang('Status:')</label>

    <div class="form-group mb-0">

        <select class="basic" name="status" >
             <option value="1" selected > @lang('Active')</option>
             <option value="0" > @lang('In-Active')</option>
        </select>

    </div>

    @error('status')
    <div class="alert alert-danger">@lang($message)</div>
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
        <input type="number"   autocomplete="off"   value="{{old('Minutes_Short' , 0 )}}"  name="Minutes_Short"  class="form-control" aria-label="Name(En)"  >
      </div>

      @error('Minutes_Short')
      <div class="alert alert-danger">@lang($message)</div>
  @enderror


 </div>



 <div class="col mb-4 col-md-6 col-sm-12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text"  >@lang('Minutes') <small> @lang('(Long)')</small></span>
        </div>
        <input type="number"    autocomplete="off"     value="{{old('Minutes_Long' , 0 )}}"   name="Minutes_Long"   class="form-control" aria-label="Name(En)"  >
      </div>
      @error('Minutes_Long')
      <div class="alert alert-danger">@lang($message)</div>
  @enderror

 </div>



 </div>

<!-----Row Start ----->
<div class="row">


    <div class="col mb-4 col-md-12 col-sm-12">

       <div class="input-group  " style="display: block;">
           <div class="input-group-prepend">
             <span class="input-group-text">@lang('Discription') </span>
           </div>
           <textarea class="form-control mytextarea" rows="12"   autocomplete="off"  name="discription"  aria-label="With textarea">{{old('discription')}}</textarea>
         </div>

         @error('discription')
         <div class="alert alert-danger">@lang($message)</div>
     @enderror
    </div>

   </div>
   <!-----Row End ----->

 <!-----Row Start ----->
 <div class="row">

 <div class="col mb-4 col-md-12 col-sm-12">

    <div class="input-group  ">
        <div class="input-group-prepend" style="display: block;">
          <span class="input-group-text">@lang('Remarks') </span>
        </div>
        <textarea class="form-control mytextarea"  rows="12"  autocomplete="off"  name="remarks"  aria-label="With textarea">{{old('remarks')}}</textarea>
      </div>

      @error('remarks')
      <div class="alert alert-danger">@lang($message)</div>
  @enderror
 </div>
 </div>




<!-----Row End ----->

<div style="clear:both;"></div><br>


<div class="row" align="center">
	<div class="col col-md-12">
		<button type="submit" class="btn btn-primary" id="submit_registration"   >

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
          &nbsp;  Add New Clip
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





















@endsection
