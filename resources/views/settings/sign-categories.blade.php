@extends('layouts.dawa_theme')
@section('broadcastlist_active_aria')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
Manage Groups
@endsection
@section('loader')
 
@endsection
@section('pagelevel_scripts_headers')
 
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">


@endsection

@section('pagelevel_scripts_footer')



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('site/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset('site/assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});


</script>



<style>

   .dt-buttons {
float: left;
margin-bottom: 5px;
    }
</style>


<script type="text/javascript">

var table = null;

    $(document).ready( function () {

       $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

         table =  $('#datatable_categories').DataTable({
            dom: 'Blfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
              responsive: true,
              processing: true,
              serverSide: false,
              ajax: "{{ route('manage-groups.index') }}",
              columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'admins', name: 'admins'},
              {data: 'status', name: 'status'},
              {data: 'crated_by_name', name: 'crated_by_name'},
              {data: 'updated_by_name', name: 'updated_by_name'},
              {data: 'action', name: 'action', orderable: false, searchable: false},

                    ]
                    ,
             order: [[0, 'asc']],
             lengthChange: false,
       });



       $('#createNewProduct').click(function () {
          $('#saveBtn').val("Save Changes");
          $('#productForm').trigger("reset");
          $('.js-example-basic-multiple').change()
          $('#modelHeading').html("Create New   Group");
          $('#ajaxModel').modal('show');
      });


      $('#productForm').submit(function (e) {
           e.preventDefault();
           $('#saveBtn').html('Sending...');
          $.ajax({
            data: new FormData(this),
            url: "{{ route('manage-groups.store') }}",
            type: "POST",
            contentType: false,
            cache: false,
      processData: false,
            success: function (data) {

                if(data.code ==  500)
                {
                    $('#create_msg').html(`<div class="alert alert-danger" role="alert">
  `+data.message+`
</div>`);


                }
                if(data.code ==  200)
                {
                    $('#productForm').trigger("reset");
                    $('#create_msg').html(`<div class="alert alert-success" role="alert">
  `+data.message+`
</div>`);
$('.select2').change();

                }
                table.ajax.reload(null, false)
                $('#saveBtn').html('Save Chanegs');


                // $('#productForm').trigger("reset");
                // $('#ajaxModel').modal('hide');
                // table.draw();

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
                $('#create_msg').html(`<div class="alert alert-danger" role="alert">
                    Something went wrong - Please Reload Page and Try again
                </div>`);
            }
        });
      });


      $('body').on('click', '.editProduct', function () {
        console.log("working");


        var csvString =  $(this).attr('data-admins');
        var valuesArray = csvString.split(",");

        $('#editButton').val("Update Changes");
          $('#EditproductForm').trigger("reset");
          $('#EditmodelHeading').html("Update   Group");
          $('#edit_id').val($(this).attr('data-id'));
          $('#admins_edit').val(valuesArray).trigger('change');
          $('#edit_name').val($(this).attr('data-name'));
          $('#edit_status').val($(this).attr('data-status')).change();
          $('#EditajaxModel').modal('show');
        });

              $('#EditproductForm').submit(function (e) {
                   e.preventDefault();
                   $('#editButton').html('Sending...');
                  $.ajax({
                    data: new FormData(this),
                    url: "{{ route('manage-groups.update_record') }}",
                    type: "POST",
                    contentType: false,
                    cache: false,
              processData: false,
                    success: function (data) {

                        if(data.code ==  500)
                        {
                            $('#edit_create_msg').html(`<div class="alert alert-danger" role="alert">
          `+data.message+`
        </div>`);


                        }
                        if(data.code ==  200)
                        {

                        $('#EditajaxModel').modal('hide');
                        $('#EditproductForm').trigger("reset");
                        $('.js-example-basic-multiple').change()

                        }
                        table.ajax.reload(null, false)
                        $('#editButton').html('Update Changes');


                        // table.draw();

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#editButton').html('Update Changes');
                        $('#edit_create_msg').html(`<div class="alert alert-danger" role="alert">
                            Something went wrong - Please Reload Page and Try again
                     </div>`);
                    }
                });
              });




   });
   </script>





 
 

@endsection
@section('content')

 




    
<?php

$admins = App\User::where('level_type' , 2)->get();

?>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">

        <div>
 
            <nav class="breadcrumb-two" aria-label="breadcrumb" style="width: 100%">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">
                        <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Home
                    </a></li>
        
                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                 Manage Groups </a></li>
                </ol>
            </nav>
        
            <a  style="  float: right;
            margin-top: -57px;
          }"  class="btn btn-success"    href="javascript:void(0)" id="createNewProduct">
                <i class="fas fa-plus-square"   aria-hidden="true"></i>
        
               Create New Group</a>
        
            </div>
        

        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable_categories"  class="table table-striped table-bordered second" style="width:100%">
                                               <thead class="bg-light">
                                                            <tr>
                                                                <th>Sr#</th>
                                                                <th>Name</th>
                                                                <th>Admins</th>
                                                                <th>Status</th>
                                                                <th>Created By</th>
                                                                <th>Updated By</th>
                                                                <th>Action</th>
                                                            </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">

                        Create New Group

                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Name:</label>
                            <div class="col-sm-12">
                                <input   autocomplete="off" type="text" class="form-control"
                                 id="name" name="name" placeholder="Enter Name"
                                 value="" maxlength="100" required="">



                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Select Campaign Admins:</label>
                            <div class="col-sm-12">
                                <select  required name="admins[]" class="js-example-basic-multiple" multiple="multiple" style="width:100%;">
                                    @foreach ($admins as $admin )
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                  </select>
                                  <span id="create_msg">
                                </span>
                            </div>
                        </div>


                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                            Changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit    Group  --}}

    <div class="modal fade" id="EditajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="EditmodelHeading">

                        Update   Group

                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form id="EditproductForm" name="EditproductForm" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Name:</label>
                            <div class="col-sm-12">
                                <input  autocomplete="off" type="number" style="display:none;" class="form-control"
                                id="edit_id" name="edit_id" placeholder="Enter Name"
                                value="" maxlength="100" required="" />
                                <input autocomplete="off" type="text" class="form-control"
                                 id="edit_name" name="edit_name" placeholder="Enter Name"
                                 value="" maxlength="100" required="" />

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Select Campaign Admins:</label>
                            <div class="col-sm-12">
                                <select  id="admins_edit" required name="admins[]" class="js-example-basic-multiple" multiple="multiple" style="width:100%;">
                                    @foreach ($admins as $admin )
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                  </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Status:</label>
                            <div class="col-sm-12">

                                <select style="cursor:pointer;" class="form-control" id="edit_status" name="edit_status">
                                <option value="1" >Active</option>
                                <option value="0" >In-Active</option>
                                </select>

                                <span id="edit_create_msg">
                                </span>

                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="editButton" value="create">Update
                            Changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- end edit  Group --}}

</div>
   

@endsection
