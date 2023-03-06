@extends('layouts.dawa_theme')
@section('clips_active')
active
@endsection
@section('clips_active_aria') aria-expanded="true" @endsection

@section('title')
Clips
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >
    <link  href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}"rel="stylesheet" type="text/css" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}
  {{-- <script src="{{asset('dawa_theme/assets/js/sweetalert.min.js')}}" ></script> --}}
  <link href="{{asset('dawa_theme/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100%;
    height: 100%;}
    </style>

 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@endsection

@section('pagelevel_scripts_footer')
<script src="{{asset('dawa_theme/assets/js/elements/tooltip.js')}}" ></script>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [

                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "order": [[ 0, "desc" ]] ,
        "stripeClasses": [],
        "lengthMenu": [ 20, 50 ,100 , 500],
        "pageLength": 100
    } );
</script>


<script>
    $('.video-row').click(function () {

        var src= null;
        if($(this).attr('data-type') == "facebook")
        {
  src = 'https://www.facebook.com/plugins/video.php?href='+$(this).attr('data-link')+'&show_text=true&appId';
        }
        else{
            src = 'https://www.youtube.com/embed/'+$(this).attr('data-link');
        }

        $('#video-title').html($(this).attr('data-title'));
        $('#videoMedia1').modal('show');
        $('#youtube-video').attr({
            'src': src,
            'width': '800',
            'height': '415',
            'allow': 'encrypted-media'
        }).css('border', '0');
    });
    // $('#vimeo-video-link').click(function () {
    //     var src = 'https://player.vimeo.com/video/1084537';
    //     $('#videoMedia2').modal('show');
    //     $('<iframe>').attr({
    //         'src': src,
    //         'width': '560',
    //         'height': '315',
    //         'allow': 'encrypted-media'
    //     }).css('border', '0').appendTo('#videoMedia2 .video-container');
    // });
    $('#videoMedia1 button, #videoMedia2 button').click(function () {
        $('#videoMedia1 iframe, #videoMedia2 iframe').removeAttr('src');
    });
</script>

@endsection
@section('content')

<style>
.table > tbody > tr > td {
    border: none;
    color: #000000;
    font-size: 21px;
    letter-spacing: 0px;
    font-family: Calibri;
    cursor: pointer;
}
.title-link{
    display: inline-block;
    vertical-align: bottom;
    padding-left:10px;
}
.light-color{
    color: #a8a9b0;
}
</style>

  <!-- Modal -->
  <div class="modal fade" id="videoMedia1" tabindex="-1" role="dialog" aria-labelledby="videoMedia1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="videoMedia1Label"
             ">



               <span id="video-title"> </span>  :<b>
                عنوان
              </b>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18">
                  </line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="video-container">
                    <iframe id="youtube-video"  style="width: -webkit-fill-available;width: -moz-available;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="layout-px-spacing  ">

    <div class="row  " id="cancel-row"  >




        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4  ">
                    <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12   " >
                        <nav class="breadcrumb-two" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">
                                    <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    Home
                                </a></li>

                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                    Manage Clips</a></li>
                            </ol>
                        </nav>
                    </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12   " >


                  @can('Create-Clips')

                  <a href="{{route('add.new.clip')}}">
                    <button class="btn btn-primary" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        &nbsp; Add New Clip</button>
                    </a>
                    @endcan



                    </div>
                    </div>

                   @can('View-Clips')


                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>

                                <th>Clip#</th>
                                <th>Date / Time </th>
                                <th>Speech#</th>
                                <th>Statistics</th>

                                <th>Title / URL</th>
                                <th>Download</th>

                                <th>Action</th>



                            </tr>
                        </thead>

                        <tbody>


                            @if(count($clips)>0 )

                            @foreach ( $clips as $clip )
                            <tr>


                            <td>{{$clip->clip_id}}</td>
                            <td>
                                {{\Carbon\Carbon::parse($clip->datetime)->format('d-M ')}}
                               <br>
                               <span  class="light-color">
                               {{\Carbon\Carbon::parse($clip->datetime)->format(' H:i')}}
                               </span>
                            </td>
                            <td>{{$clip->speech_id}}</td>

                            <td>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                 {{count($clip->views)}}
                                 <br>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                                 {{count($clip->videos)}}

                                 <br>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                              {{count($clip->audios)}}



                                </td>

                            <td>


                               @if((strpos($clip->youtube_link, 'fb.com') !== false))
                               <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                               width="96" height="96"
                               viewBox="0 0 48 48"
                               style=" fill:#000000;"><linearGradient id="awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0d61a9"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path><path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path><path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"></path></svg>
                           @else
                           <img
                           loading="lazy"
                           src="https://img.youtube.com/vi/{{str_replace("https://youtu.be/","",$clip->youtube_link)}}/hqdefault.jpg" style="max-height: 80px;max-width:80px;" />

                           @endif

                @can('Edit-Clips')


                 <a class="title-link" href="{{route('edit.clip' , ['id'=> $clip->id])}}">
                     {{$clip->title}}
                            <br>
                           <span class="light-color" style=' font-size: 18px;   font-family: "Titillium Web", sans-serif;'> {{$clip->youtube_link}}
                           </span>
                        </a>
                        @endcan
                            </td>


                            <td>
                                @if($clip->audio_download_link != null && trim($clip->audio_download_link) != "" )
                                <a target="_blank"  href="{{$clip->audio_download_link}}" >
                                    <img style="max-width:25px;" class="share_button_audio" src="{{asset('share-button/audio.png')}}" />
                                </a>
                                @else
                                    ---
                                  @endif
                                  @if($clip->video_download_link != null && trim($clip->video_download_link) != "" )
                                <a  target="_blank"   href="{{$clip->video_download_link}}" >
                                    <img  style="max-width:40px;"  class="share_button_video" src="{{asset('share-button/video.png')}}" />
                                </a>
                                @else
                                ---
                                    @endif
                                </td>





 <td>
    @can('Edit-Clips')

                                @if((strpos($clip->youtube_link, 'fb.com') !== false))
                                <span  class="video-row" data-type="facebook" data-title="{{$clip->title}}" data-link="{{$clip->youtube_link}}"
                                    style='font-family: "Titillium Web", sans-serif;font-size: 16px;'   >
                                @else
                                <span class="video-row"  data-type="youtube"  data-title="{{$clip->title}}"
                                    style='font-family: "Titillium Web", sans-serif;font-size: 16px;'
                                    data-link="{{str_replace("https://youtu.be/","",$clip->youtube_link)}}">
                                @endif


                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                </span>



                                 <a class="title-link" href="{{route('edit.clip' , ['id'=> $clip->id])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>


@endcan


                            </td>





                            </tr>






                            @endforeach

                            @else
                            <tr>


                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>




                        </tr>
                            @endif



                        </tbody>
                        <tbody>
                            <tr>

                                <th>Clip#</th>
                                <th>Date /  Time </th>
                                <th>Speech#</th>
                                <th>Statistics</th>

                                <th>Title  /  URL</th>
                                <th>Download</th>

                                <th>Action</th>




                            </tr>
                        </tbody>
                    </table>
                    @endcan
                    <script>
                        function go(url) {
                          window.open(url);
                        }
                        </script>
                </div>
            </div>
        </div>

    </div>

    </div>




@endsection
