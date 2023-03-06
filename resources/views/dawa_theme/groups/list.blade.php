@extends('layouts.dawa_theme')
@section('complein_active')
active
@endsection
@section('complain_aria') aria-expanded="true" @endsection

@section('title')
Groups List
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
   <!-- BEGIN PAGE LEVEL STYLES -->
   <link href="{{asset('dawa_theme/assets/css/apps/mailing-chat.css')}}"  rel="stylesheet" type="text/css" />
   <!-- END PAGE LEVEL STYLES -->
  
@endsection

@section('pagelevel_scripts_footer')

   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="{{asset('dawa_theme/assets/js/apps/mailbox-chat.js')}}" ></script>
   <!-- END PAGE LEVEL SCRIPTS -->

@endsection
@section('content') 
<style>
.row { 
    display: block;
}
    </style>
 @include('dawa_theme.groups.include.chat')
 
@endsection
