

@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('manage_activities_active')
active
@endsection
{{-- dashboard_aria --}}
@section('manage_activities_area') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Manage Activities
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')



    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <script>

    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>


    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });

          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('ajaxActivities.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'urdu_name', name: 'urdu_name'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

          $('#createNewActivity').click(function () {
              $('#saveBtn').val("Create Activity");
              $('#product_id').val('');
              $('#productForm').trigger("reset");
              $('#modelHeading').html("Create New Activity");
              $('#ajaxModel').modal('show');
          });

          $('body').on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ route('ajaxActivities.index') }}" +'/' + product_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Activity");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#urdu_name').val(data.urdu_name);
            })
         });

          $('#saveBtn').click(function (e) {
              e.preventDefault();

      var  flag = false;

              if($('#name').val().trim() == "" || $('#name').val() == null)
              {
                  $('#name').addClass('is-invalid');
                  $('#name').next().html('its required filed.');
                  flag = true;
              }
              else{
                  $('#name').removeClass('is-invalid');
                  $('#name').next().html('');
              }
              if($('#urdu_name').val().trim() == "" || $('#urdu_name').val() == null)
              {
                  $('#urdu_name').addClass('is-invalid');
                  $('#urdu_name').next().html('its required filed.');
                  flag = true;

              }
              else{
                  $('#urdu_name').removeClass('is-invalid');
                  $('#urdu_name').next().html('');
              }

              if(flag)
              {
                  return true;
              }


              $(this).html('Sending..');

              $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('ajaxActivities.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                    $('#saveBtn').html('Save Changes');

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                    window.location.reload();

                }
            });
          });

          $('body').on('click', '.changestatus', function () {

              var product_id = $(this).data("id");

              $.ajax({
                  type: "DELETE",
                  url: "{{ route('ajaxActivities.store') }}"+'/'+product_id,
                  success: function (data) {
                      table.draw();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      window.location.reload();
                  }
              });
          });

        });
      </script>

@endsection
{{-- content --}}
@section('content')






<style>
h4{
    font-size: 16px;
    font-weight: 700;
}
.table > tbody > tr > td {
    border: none;
    color: #000000;
    font-size: 16px;
    letter-spacing: 1px;
}
    </style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">




        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">



            <div class="widget-content widget-content-area br-6">

                <div class="row">

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12   ">
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">
                                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Home
                            </a></li>
                            <li class="breadcrumb-item  " aria-current="page"><a href="javascript:void(0);"  >
                                Selection </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                               Manage Activities </a></li>
                        </ol>
                    </nav>
                </div>
                @can('create-activity' )

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12   ">
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewActivity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Create New Activity</a>
                </div>

                @endcan

                </div>


                <div class="table-responsive mb-4 mt-4">


                    <div class="container">

                        @can('view-activity' )
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Urdu-Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        @endcan
                    </div>



                </div>
            </div>
        </div>

    </div>

    </div>



    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form   autocomplete="off" id="productForm" name="productForm" class="form-horizontal">
                       <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Activity Name</label>
                            <div class="col-12">
                                <input type="text"  autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="200" required="">
                                <span style="color: red;" ></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="urdu_name" class="col-12 control-label">Urdu name</label>
                            <div class="col-12">
                                <input type="text"  autocomplete="off"  class="form-control" id="urdu_name" name="urdu_name" placeholder="Enter Urdu Name" value="" maxlength="200" required="">
                                <span style="color: red;" ></span>
                            </div>
                        </div>


                        <div class="col-sm-offset-2 col-12">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<style>
.layout-top-spacing{
    display: block;
}
td{
    font-family: Calibri;
}
</style>



@endsection
