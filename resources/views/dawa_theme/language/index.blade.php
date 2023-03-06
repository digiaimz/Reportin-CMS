@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('language_active')
active
@endsection
{{-- language_aria --}}
@section('language_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Manage Languages
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
<style>
.layout-top-spacing{

    min-height: inherit;
}
</style>

@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')

@endsection
{{-- content --}}
@section('content')

<style>

    @media screen and (max-width: 480px) {
      .breadcrumb-two {
      display: none;
      }
      .w-1\/2 {
       width: 100%;
      }
    }
    </style>
<nav class="breadcrumb-two" aria-label="breadcrumb" style="    position: absolute;
/* top: -6px; */
left: 72px;
top: 83px;">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{route('home')}}">
                                      <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                      Home
                                  </a></li>

                                  <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                    Languages & Translation</a></li>
                              </ol>
                          </nav>
<iframe src="{{url('/languages')}}" style="    border: 0px;min-height: inherit;
width: 100%;" title="Manage Languages">
</iframe>

@endsection
