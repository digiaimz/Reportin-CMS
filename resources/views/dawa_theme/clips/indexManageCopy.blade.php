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
                                <th>Date</th>
                                <th>Time </th>
                                <th>Speech#</th>

                                <th>Clips Views</th>
                                <th>Video Download</th>
                                <th>Audio Download</th>

                                <th>Title </th>
                                <th>URL </th>
                                <th>Long</th>
                                <th>Short</th>


                            </tr>
                        </thead>

                        <tbody>


                            @if(count($clips)>0 )

                            @foreach ( $clips as $clip )
                            <tr>





                            <td>{{$clip->clip_id}}</td>
                            <td>
                                {{\Carbon\Carbon::parse($clip->datetime)->format('d-M ')}}
                            </td>
                            <td>
                               {{\Carbon\Carbon::parse($clip->datetime)->format(' H:i')}}

                            </td>
                            <td>{{$clip->speech_id}}</td>

                            <td>{{count($clip->views)}}</td>
                            <td>{{count($clip->videos)}}</td>
                            <td>{{count($clip->audios)}}</td>
                            <td>  {{$clip->title}}</td>
                            <td> {{$clip->youtube_link}}</td>
                            <td> {{$clip->long_}}</td>
                            <td> {{$clip->short_}}</td>



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
