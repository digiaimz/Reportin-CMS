@extends('layouts.dawa_theme')
@section('clips_active_aria')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
Manage Users
@endsection
@section('loader')
 
@endsection
@section('pagelevel_scripts_headers')

<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">


<link href="{{asset('site/cropper/css/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('site/cropper/css/style-example.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('site/cropper/css/jquery.Jcrop.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('site/cropper/css/custom.css')}}" />

	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('site/tree/style.css')}}" />
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

<script src="{{asset('site/custom/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('site/custom/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('site/custom/plugins/input-mask/input-mask.js')}}"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('site/tree/comboTreePlugin.js')}}"></script>

<?php
//  GET Results usign PHP Query
$organization_list_php = '';
$division_list_php = '';
$department_list_php = '';


// set for organizations
   foreach ($organizations as $organization) {
       $organization_list_php = $organization_list_php ." { id: ".$organization->id.", 	title: '".$organization->name."'   },   ";
    }


    // set for divisions
    foreach ($organizations as $organization) {
	if (count($organization->divisions)  ) {
		$division_list_php = $division_list_php ."  	{ 	id: 0, title: '".$organization->name."', 	subs: [   ";

        foreach ($organization->divisions as $division) {
	$division_list_php = $division_list_php ."    { 	id: ".$division->id." , title: '".$division->name."'   },   ";
           }

$division_list_php = $division_list_php ."   	]   },  ";

                 }
                }


// set for Department
foreach ($organizations as $organization) {
	if (count($organization->divisions)  ) {

        $department_list_php = $department_list_php ."  	{ 	id: 0, title: '". $organization->name."', 	subs: [   ";
        foreach ($organization->divisions as $division) {

        $departments_ = $division->departments;

        if (count($departments_)  ) {
		$department_list_php = $department_list_php ."  	{ 	id: 0, title: '".$division->name."', 	subs: [   ";
        foreach ($departments_ as $department) {

	$department_list_php = $department_list_php ."    { 	id: ".$department->id." , title: '".$department->name."'   },   ";

	} // end while dept
    $department_list_php = $department_list_php ."   	]   },  ";
}
}
$department_list_php = $department_list_php ."   	]   },  ";
}
}





?>

<?php
echo '<script>

var orgnizations_list = [  '.$organization_list_php.' ];

</script>'

?>
<?php
echo '<script>

var divisions_list = [  '.$division_list_php.' ];

</script>'

?>
<?php
echo '<script>

var departments_list = [  '.$department_list_php.' ];

</script>'

?>


<Script>

    var organizations_combo = null;
    var divisions_combo = null;
    var departments_combo = null;

$(document).ready(function() {
    organizations_combo =  $('#organizations_set').comboTree({
  source : orgnizations_list,
  isMultiple: true,
			cascadeSelect: true,
			collapse: false ,
		    selectableLastNode:true ,
});
divisions_combo =  $('#divisions_set').comboTree({
  source : divisions_list,
  isMultiple: true,
			cascadeSelect: true,
			collapse: false ,
		    selectableLastNode:true ,
});
departments_combo =  $('#departments_set').comboTree({
  source : departments_list,
  isMultiple: true,
			cascadeSelect: true,
			collapse: false ,
		    selectableLastNode:true ,
});

});


</Script>







    <script src="{{asset('site/cropper/js/file-upload-with-preview.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/cropper/js/jquery.Jcrop.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/cropper/js/jquery.SimpleCropper.js')}}"></script>
   <script type="text/javascript" src="{{asset('site/cropper/js/custom.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function showAll(class_id){

        $('.'+class_id).show(500);
        $('#show'+class_id).hide();

    }
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

         table =  $('#datatable').DataTable({
            dom: 'Blfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
              responsive: true,
              processing: true,
              serverSide: false,
              ajax: "{{ route('manage-users.index') }}",
              columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'photograph', name: 'photograph'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'level_type', name: 'quantity'},

              {data: 'crated_by_name', name: 'created_by'},
              {data: 'updated_by_name', name: 'updated_by'},
              {data: 'action', name: 'action', orderable: false, searchable: false},

                    ]
                    ,
             order: [[0, 'asc']],
             lengthChange: false,
       });




      $('#productForm').submit(function (e) {
           e.preventDefault();

        //    if($('#level_type').val()== 3)
        //    {
        //     if( organizations_combo.getSelectedIds() != null){
        //       $('#selection_ids').val( organizations_combo.getSelectedIds().join(",").toString());
        //     }
        //    }
        //    if($('#level_type').val()== 4)
        //    {
        //     if( divisions_combo.getSelectedIds() != null){
        //         $('#selection_ids').val(   divisions_combo.getSelectedIds().join(",").toString());
        //     }
        //    }
        //    if($('#level_type').val()== 5)
        //    {
        //     if( departments_combo.getSelectedIds() != null){
        //         $('#selection_ids').val(   departments_combo.getSelectedIds().join(",").toString());
        //     }
        //    }




           $('#saveBtn').html('Sending...');
           $("#saveBtn").attr("disabled", true);
          $.ajax({
            data: new FormData(this),
            url: "{{ route('manage-users.store') }}",
            type: "POST",
            contentType: false,
            cache: false,
      processData: false,
            success: function (data) {
                console.log(  data);

                if(data.code ==  500)
                {
                    $('#create_msg').html(`<div class="alert alert-danger" role="alert">
  `+data.message+`
</div>`);


                }
                if(data.code ==  200)
                {
                    $('#create_msg').html(`<div class="alert alert-success" role="alert">
                        `+data.message+`
                        </div>`);

                    $('#productForm').trigger("reset");
                    $('.cropme').html('');
                    $('.base_path_img').val('');
                    $('.select2').change();

                }

                table.ajax.reload(null, false)
                $('#saveBtn').html( ` <i class="  fas fa-user-plus"></i>
                             Register User`);
                                 $("#saveBtn").attr("disabled", false);



            },
            error: function (data) {
                console.log('Error:', data);
                $("#saveBtn").attr("disabled", false);
                $('#saveBtn').html( ` <i class="  fas fa-user-plus"></i>
                             Register User`);
                $('#create_msg').html(`<div class="alert alert-danger" role="alert">
                    Something went wrong - Please Reload Page and Try again
                </div>`);
            }
        });
      });



              $('#EditproductForm').submit(function (e) {
                   e.preventDefault();
                   $("#editButton").attr("disabled", true);
                   $('#editButton').html('Sending...');
                  $.ajax({
                    data: new FormData(this),
                    url: "{{ route('manage-users.update_record') }}",
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
                    $('#edit_create_msg').html(`<div class="alert alert-success" role="alert">
                        `+data.message+`
                        </div>`);

                    // $('#EditproductForm').trigger("reset");
                    // $('.cropme').html('');
                    // $('#base_path_img').val('');
                    // $('.select2').change();

                }

                table.ajax.reload(null, false)
                $('#editButton').html( `<i class="fas fa-save"></i>
                Update
                                 Changes`);
                                 $("#editButton").attr("disabled", false);


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

     $('body').on('click', '.editProduct', function () {
        console.log("working");

        $('#editButton').val(`<i class="fas fa-save"></i> Update Changes`);
                  $('#EditproductForm').trigger("reset");
                    $('.cropme').html('');
                    $('.base_path_img').val('');
                    $('.select2').change();

          $('#edit_id').val($(this).attr('data-id'));
          $('#edit_name').val($(this).attr('data-name'));
          $('#edit_email').val($(this).attr('data-email'));
          $('#edit_cnic').val($(this).attr('data-cnic'));
          $('#edit_mobile').val($(this).attr('data-mobile'));

          let set_of_permissions = $(this).attr('data-access_ids').split(',');
          var permission= document.getElementsByClassName("edit_permission");

    for (var i =0; i < permission.length; i++){
        if (set_of_permissions.includes(permission[i].value))
        {
            permission[i].checked = true;
        }
        else
        {   permission[i].checked = false;   }
        }

          setVisibility('edit_div','hide_div');

        });

     $('body').on('click', '.deleteuser', function () {
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Selected User has been deleted.',
      'success'
    );

    window.location.href = '{{route("delete.user")}}/'+$(this).attr('data-id');

  }
})



        });





   function setVisibility(showID ,hide_class)
   {
    $('.'+hide_class).hide();
    $('#'+showID).show();

   }

</script>

<script>
    $(document).ready(function() {
        $('#level_type').change(  function() {

        //  $('.level_access_div').hide();

        //  if($(this).val() == 3 )
        //  {
        //     $('#3_level_access_div').show();
        //  }
        //    if($(this).val() == 4 )
        //  {
        //     $('#4_level_access_div').show();
        //  }
        //  if($(this).val() == 5 )
        //  {
        //     $('#5_level_access_div').show();
        //  }


        });
    });
    </script>


 

@endsection
@section('content')

<style>
.h5, h5 {
  font-size: 17px;
}
    </style>

 
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    {{-- <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">@</span></span>
        <input type="text" placeholder="Username" class="form-control">
    </div> --}}

    <nav class="breadcrumb-two" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">
                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Home
            </a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
         Manage Users  </a></li>
        </ol>
    </nav>

    <div class="row hide_div" id="edit_div"  style="display: none;">

         
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div>
                <h5 class="card-header">Edit User</h5>
                <a onclick="setVisibility('view_div','hide_div')" style="float: right;
                margin-top: -43px;"   class="btn btn-primary"    href="javascript:void(0)" id="createNewProduct">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                    View All Users
              </a>
                </div>
                <div class="card-body">



                    <form id="EditproductForm" name="EditproductForm" class="form-horizontal">
                        <input  autocomplete="off" type="number" style="display:none;" class="form-control"
                        id="edit_id" name="edit_id"
                        value="" maxlength="100" required="" />
                        {{-- row start  --}}







                                {{-- row start  --}}
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="col-12 control-label">First and Last Name Of User:<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Name:</span></span>
                   <input type="text"  name="name" autocomplete="off" id="edit_name" placeholder="" required class="form-control">
               </div>

                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="name" class="col-12 control-label">Email <small>( Must be unique )</small> :<span style="color: red;">*</span></label>
                                           <div class="col-sm-12">
                                               <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Email:</span></span>
                      <input type="email" name="email"  id="edit_email"   autocomplete="off" placeholder="" class="form-control">
                  </div>

                                       </div>
                                       </div>
                                    </div>
                                    </div>
                                    {{-- row end --}}
                                    {{-- row start  --}}
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="col-md-12"  style="display:none;">
                                       <div class="form-group">
                                           <label for="name" class="col-12 control-label">CNIC:</label>
                                           <div class="col-sm-12">
                                               <input    autocomplete="off" type="text" class="form-control cnic"
                                                id="edit_cnic" name="cnic" placeholder=""
                                                value="" maxlength="100"  />



                                       </div>
                                       </div>
                                       </div>
                                       <div class="col-md-12" style="display:none;">
                                       <div class="form-group">
                                           <label for="name" class="col-12 control-label">Mobile#</label>
                                           <div class="col-sm-12" style="display: flex;">
                                               <div>
                                               <img loading="lazy" src="https://www.countryflags.com/wp-content/uploads/pakistan-flag-png-xl.png" style="width: 49px;" />

                                           </div>


                                           <div style="width: 100%; Position: relative;">
                                               <input    style="padding-left:33px;" autocomplete="off" type="text" class="form-control phone"
                                                id="edit_mobile" name="mobile" placeholder=""
                                                value=""   >
                                                <span style="position: absolute;
                                                top: 7px;
                                                left: 5px;">+92 </span>
                                              </div>
                                          </div>
                                       </div>
                                       </div>

                                       {{-- row end --}}

                            {{-- row start --}}
                            <style>

                               .svg{
                                   position: absolute;
                                   /* float: right; */
                                   top: 10px;
                                   right: 11px;
                                   cursor: pointer;
                                   color: gray;
                               }
                               . {
                                   padding-right: 48px;
                               }
                                      </style>

{{--
                               <div class="col-md-12">
                               <div class="form-group">
                                   <label for="name" class="col-12 control-label">Password <small>(Must be at least 6 characters )</small><span style="color: red;">*</span></label>
                                   <div class="col-sm-12">
                                       <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Password:</span></span>
              <input type="password" min="6" max="16" id="password" name="password" required  autocomplete="off"   placeholder="" class="form-control">
              <svg class="svg" onclick="ManagePassword('password')"
              xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"   class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
           </div>

                               </div>
                               </div>
                               </div> --}}
                                       </div>


                               <div class="col-md-6" style="display:none;">

                                   <div class="custom-file-container    " data-upload-id="myFirstImage" style="padding:5px;">
                                       <label>Upload (New Picture) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>


                                        <input name="base_path_img" style="display: none;" value="" class="base_path_img"  />
                                       <div class="simple-cropper-images">



                                           <div class="cropme" style="width:150px; height:150px;    background-size: contain;"></div>
                                           </div>
                                               </div>

                               </div>


                           </div>
                           {{-- row end --}}



                           <div class="row   "  style="display:none;" >
                               <div class="col-md-12" style="text-align: center;">
                                   <hr>
                               <h5  >Assign Permissions</h5>
                               <hr>
                               </div>


           {{-- Permissions set  --}}
           {{-- Permissions set  --}}



               <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

                   <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Printable Signs </strong></label>


                                                    <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="1" style="user-select: auto;">&nbsp;View</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="2" style="user-select: auto;">&nbsp;Create</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="3" style="user-select: auto;">&nbsp;Update</label>
                               </div>


                  </div>


                  <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

                   <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Pictogram Library</strong></label>


                                                    <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="4" style="user-select: auto;">&nbsp;View</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="5" style="user-select: auto;">&nbsp;Create</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="6" style="user-select: auto;">&nbsp;Update</label>
                               </div>


                  </div>

                  <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

                   <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage News</strong></label>

                   <div class="checkbox" style="user-select: auto;">
                       <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="7" style="user-select: auto;">&nbsp;View</label>
                   </div>


                                       <div class="checkbox" style="user-select: auto;">
                       <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="8" style="user-select: auto;">&nbsp;Create</label>
                   </div>


                                       <div class="checkbox" style="user-select: auto;">
                       <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="9" style="user-select: auto;">&nbsp;Update</label>
                   </div>


                  </div>






           {{-- Permissions set  --}}
           {{-- Permissions set  --}}

           <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

               <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage Users</strong></label>


                                                <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="10" style="user-select: auto;">&nbsp;View</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="11" style="user-select: auto;">&nbsp;Create</label>
                               </div>


                                                   <div class="checkbox" style="user-select: auto;">
                                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="12" style="user-select: auto;">&nbsp;Update</label>
                               </div>

              </div>

              <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

               <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage Media</strong></label>


               <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="13" style="user-select: auto;">&nbsp;View</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="14" style="user-select: auto;">&nbsp;Create</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="15" style="user-select: auto;">&nbsp;Update</label>
               </div>


              </div>



           {{-- Permissions set  --}}
           {{-- Permissions set  --}}


           <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

               <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Ads Settings</strong></label>


               <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="16" style="user-select: auto;">&nbsp;View</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="17" style="user-select: auto;">&nbsp;Create</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="18" style="user-select: auto;">&nbsp;Update</label>
               </div>


              </div>



           {{-- Permissions set  --}}
           {{-- Permissions set  --}}


           <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

               <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">General Settings</strong></label>


               <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="19" style="user-select: auto;">&nbsp;View</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="20" style="user-select: auto;">&nbsp;Create</label>
               </div>


                                   <div class="checkbox" style="user-select: auto;">
                   <label style="user-select: auto;"><input name="permission[]" class="edit_permission" type="checkbox" value="21" style="user-select: auto;">&nbsp;Update</label>
               </div>


              </div>







           {{-- Permissions set  --}}
           {{-- Permissions set  --}}


         </div>




                {{-- row end --}}

                 <div class="row ">
                             <div class="col-md-12">
                                 <span id="edit_create_msg">
                                 </span>
                             </div>
               </div>
               <div class="row border-top">

                         <div class="  col-md-12 mt-2 " style="text-align: center;">

                             <button type="submit "   class="btn btn-primary" id="editButton" >
                             <i class="fas fa-save"></i>
                             Update
                                 Changes
                             </button>
                         </div>




               </div>

                     </form>



                </div>
             </div>
        </div>
    </div>






    <div class="row hide_div" id="create_div"  style="display: none;">

         
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div>
                <h5 class="card-header">Create New User</h5>
                <a onclick="setVisibility('view_div','hide_div')" style="float: right;
                margin-top: -43px;"  class="btn btn-primary"    href="javascript:void(0)" id="createNewProduct">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                View All Users
          </a>
                </div>
                <div class="card-body">



                    <form id="productForm" name="productForm" class="form-horizontal">

                         {{-- row start  --}}
                         <div class="row">
                         <div class="col-md-6">
                         <div class="form-group">
                             <label for="name" class="col-12 control-label">First and Last Name Of User:<span style="color: red;">*</span></label>
                             <div class="col-sm-12">
                                 <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Name:</span></span>
        <input type="text"  name="name" autocomplete="off" id="name" placeholder="" required class="form-control">
    </div>

                         </div>
                         </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-12 control-label">Email <small>( Must be unique )</small> :<span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Email:</span></span>
           <input type="email" name="email"  id="email"   autocomplete="off" placeholder="" class="form-control">
       </div>

                            </div>
                            </div>
                         </div>
                         </div>
                         {{-- row end --}}
                         {{-- row start  --}}
                         <div class="row">
                            <div class="col-md-6" >
                            <div class="col-md-12" style="display:none;">
                            <div class="form-group">
                                <label for="name" class="col-12 control-label">CNIC:</label>
                                <div class="col-sm-12">
                                    <input    autocomplete="off" type="text" class="form-control cnic"
                                     id="cnic" name="cnic" placeholder=""
                                     value="" maxlength="100"  />



                            </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="display:none;">
                            <div class="form-group">
                                <label for="name" class="col-12 control-label">Mobile#</label>
                                <div class="col-sm-12" style="display: flex;">
                                    <div>
                                    <img loading="lazy" src="https://www.countryflags.com/wp-content/uploads/pakistan-flag-png-xl.png" style="width: 49px;" />

                                </div>


                                <div style="width: 100%; Position: relative;">
                                    <input    style="padding-left:33px;" autocomplete="off" type="text" class="form-control phone"
                                     id="mobile" name="mobile" placeholder=""
                                     value=""   >
                                     <span style="position: absolute;
                                     top: 7px;
                                     left: 5px;">+92 </span>
                                   </div>
                               </div>
                            </div>
                            </div>

                            {{-- row end --}}

                 {{-- row start --}}
                 <style>

                    .svg{
                        position: absolute;
                        /* float: right; */
                        top: 10px;
                        right: 11px;
                        cursor: pointer;
                        color: gray;
                    }
                    . {
                        padding-right: 48px;
                    }
                           </style>


                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="col-12 control-label">Password <small>(Must be at least 6 characters )</small><span style="color: red;">*</span></label>
                        <div class="col-sm-12">
                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Password:</span></span>
   <input type="password" min="6" max="16" id="password" name="password" required  autocomplete="off"   placeholder="" class="form-control">
   <svg class="svg" onclick="ManagePassword('password')"
   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"   class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
</div>

                    </div>
                    </div>
                    </div>
                            </div>
                    <script>
                        function ManagePassword(id) {

                            var x = document.getElementById(id);

                          if (x.type === "password") {
                            x.type = "text";

                          } else {
                            x.type = "password";
                          }

                        }
                        </script>

                    <div class="col-md-6" style="display:none;">

                        <div class="custom-file-container    " data-upload-id="myFirstImage" style="padding:5px;">
                            <label>Upload (New Picture) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>


                             <input name="base_path_img" style="display: none;" value="" class="base_path_img"  />
                            <div class="simple-cropper-images">



                                <div class="cropme" style="width:150px; height:150px;    background-size: contain;"></div>
                                </div>
                                    </div>

                    </div>


                </div>
                {{-- row end --}}

                <div class="row   "  >
                    <div class="col-md-12" style="text-align: center;">
                        <hr>
                    <h5  >Access Level</h5>
                    <hr>
                    </div>


                    <div class="col-md-6"  >
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Select Level:<span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select style="cursor:pointer;width:100%;" class="form-control select2"  required id="level_type" name="level_type">

                                    @foreach (App\Helpers\Helper::AllLevels() as  $level)
                                    @if( $level->id > Auth::user()->level_type)
                                    <option value="{{$level->id}}"  >{{$level->name}}</option>
                                    @endif
                                    @endforeach
                                    </select>




                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="display:none;">
                    <div class="form-group">
                        <div class="col-sm-12 level_access_div" id="3_level_access_div" style="display:none;">
                            <label for="name" class=" control-label">Select Organizations:<span style="color: red;">*</span></label>
                           <input  type="text" id="organizations_set" autocomplete="off" name="organizations_set" placeholder="Select Organization" />

                        </div>
                        <div class="col-sm-12 level_access_div" id="4_level_access_div" style="display:none;">
                            <label for="name" class=" control-label">Select Divisions:<span style="color: red;">*</span></label>
                        <input   type="text" id="divisions_set" autocomplete="off" name="divisions_set" placeholder="Select Division" />

                        </div>
                        <div class="col-sm-12 level_access_div" id="5_level_access_div" style="display:none;">
                            <label for="name" class=" control-label">Select Departments:<span style="color: red;">*</span></label>
                        <input  type="text" id="departments_set" autocomplete="off" name="departments_set" placeholder="Select Department" />

                        </div>

                        <input  type="text" style="display:none;" id="selection_ids" name="selection_ids" />
                </div>
            </div>
                  </div>
                {{-- row end --}}

                <div class="row   " style="display:none;">
                    <div class="col-md-12" style="text-align: center;">
                        <hr>
                    <h5  >Assign Permissions</h5>
                    <hr>
                    </div>




{{-- Permissions set  --}}
{{-- Permissions set  --}}



    <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

        <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Printable Signs</strong></label>


                                         <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="1" style="user-select: auto;">&nbsp;View</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="2" style="user-select: auto;">&nbsp;Create</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="3" style="user-select: auto;">&nbsp;Update</label>
                    </div>


       </div>


       <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

        <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Pictogram Library</strong></label>


                                         <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="4" style="user-select: auto;">&nbsp;View</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="5" style="user-select: auto;">&nbsp;Create</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="6" style="user-select: auto;">&nbsp;Update</label>
                    </div>


       </div>

       <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

        <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage News</strong></label>

        <div class="checkbox" style="user-select: auto;">
            <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="7" style="user-select: auto;">&nbsp;View</label>
        </div>


                            <div class="checkbox" style="user-select: auto;">
            <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="8" style="user-select: auto;">&nbsp;Create</label>
        </div>


                            <div class="checkbox" style="user-select: auto;">
            <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="9" style="user-select: auto;">&nbsp;Update</label>
        </div>


       </div>






{{-- Permissions set  --}}
{{-- Permissions set  --}}

<div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

    <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage Users</strong></label>


                                     <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="10" style="user-select: auto;">&nbsp;View</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="11" style="user-select: auto;">&nbsp;Create</label>
                    </div>


                                        <div class="checkbox" style="user-select: auto;">
                        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="12" style="user-select: auto;">&nbsp;Update</label>
                    </div>

   </div>

   <div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

    <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Manage Media</strong></label>


    <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="13" style="user-select: auto;">&nbsp;View</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="14" style="user-select: auto;">&nbsp;Create</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="15" style="user-select: auto;">&nbsp;Update</label>
    </div>


   </div>



{{-- Permissions set  --}}
{{-- Permissions set  --}}


<div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

    <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">Ads Settings</strong></label>


    <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="16" style="user-select: auto;">&nbsp;View</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="17" style="user-select: auto;">&nbsp;Create</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="18" style="user-select: auto;">&nbsp;Update</label>
    </div>


   </div>



{{-- Permissions set  --}}
{{-- Permissions set  --}}


<div class="col-lg-4  col-md-4 col-sm-12 mt-3 " style="user-select: auto;">

    <label for="permissions" style="user-select: auto;"><strong style="user-select: auto;">General Settings</strong></label>


    <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="19" style="user-select: auto;">&nbsp;View</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="20" style="user-select: auto;">&nbsp;Create</label>
    </div>


                        <div class="checkbox" style="user-select: auto;">
        <label style="user-select: auto;"><input name="permission[]" type="checkbox" checked value="21" style="user-select: auto;">&nbsp;Update</label>
    </div>


   </div>







{{-- Permissions set  --}}
{{-- Permissions set  --}}








                  </div>





                 <div class="row ">
                             <div class="col-md-12">
                                 <span id="create_msg">
                                 </span>
                             </div>
               </div>
               <div class="row border-top">

                         <div class="  col-md-12 mt-2 " style="text-align: center;">

                             <button type="submit "   class="btn btn-primary" id="saveBtn" value="create">
                             <i class="  fas fa-user-plus"></i>
                             Register User
                             </button>
                         </div>




               </div>

                     </form>



                </div>
             </div>
        </div>
    </div>






    <div class="row hide_div" id="view_div" >

         
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    <div class="card">
        
        <div style=" ">
        <h5 class="card-header">Users List - All Users</h5>
        <a style="float: right;
        margin-top: -43px;" onclick="setVisibility('create_div','hide_div')"  class="btn btn-success"    href="javascript:void(0)" id="createNewProduct">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            Register New User
      </a>    
    
    </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable"  class="table table-striped table-bordered second" style="width:100%">
                                               <thead class="bg-light">
                                                            <tr>


                                                                <th>Sr#</th>
                                                                <th>Picture</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Level Type</th>


                                                                <th>Created By</th>
                                                                <th>Updated By</th>
                                                                <th >Action</th>
                                                            </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
        </div>
    </div>


</div>
 

@endsection
