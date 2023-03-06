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
<link rel="stylesheet" type="text/css" href="{{asset('siteassets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
<link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dawa_theme/assets/css/components/tabs-accordian/custom-accordions.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('pagelevel_scripts_footer')

<script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('dawa_theme/assets/js/components/ui-accordions.js')}}"></script>
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
 $('#createNewProduct').click(function () {
          $('#saveBtn').val("Save Changes");
          $('#productForm').trigger("reset");
          $('.js-example-basic-multiple').change()
          $('#modelHeading').html("Create New Campaign");
          $('#ajaxModel').modal('show');
      });
      $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });


      $('#productForm').submit(function (e) {
           e.preventDefault();
           $('#saveBtn').html('Sending...');
          $.ajax({
            data: new FormData(this),
            url: "{{ route('manage-groups.compaign.store') }}",
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
window.location.reload();

                }

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


        $('#editButton').val("Update Changes");
          $('#EditproductForm').trigger("reset");
          $('#EditmodelHeading').html("Update  Campaign");
          $('#edit_id').val($(this).attr('data-id'));
          $('#edit_name').val($(this).attr('data-name'));
          $('#EditajaxModel').modal('show');
        });



        $('#EditproductForm').submit(function (e) {
                   e.preventDefault();
                   $('#editButton').html('Sending...');
                  $.ajax({
                    data: new FormData(this),
                    url: "{{ route('manage-groups.compaign.update') }}",
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
                        window.location.reload();

                        }
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





</script>

 
<script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
    
    
 </script>
    
     
    <script type="text/javascript">
    
    var table = null;
    
        $(document).ready( function () {
    
           $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
    
           
            $('body').on('click', '.createNewProduct2', function () {

                 console.log($(this).attr('data-campaign'));
            
              $('#saveBtn2').val("Save Changes");
              $('#productForm2').trigger("reset");
              $('.js-example-basic-multiple').change();
              $('#modelHeading2').html("Create New  Queue");
              $('#campaign_id').val($(this).attr('data-campaign'));
              $('#ajaxModel2').modal('show');

          });
    
    
          $('#productForm2').submit(function (e) {
               e.preventDefault();
               $('#saveBtn2').html('Sending...');
              $.ajax({
                data: new FormData(this),
                url: "{{ route('manage-groups.store.queue') }}",
                type: "POST",
                contentType: false,
                cache: false,
          processData: false,
                success: function (data) {
    
                    if(data.code ==  500)
                    {
                        $('#create_msg2').html(`<div class="alert alert-danger" role="alert">
      `+data.message+`
    </div>`);
    
    
                    }
                    if(data.code ==  200)
                    {
                        var id_get =  "tbody"+$('#campaign_id').val();
                        if(Number($("#"+id_get).attr('data-count')) == 1)
                        {
                         $("#"+id_get).append(data.row);
                        }
                        else{
                            $("#"+id_get).html(data.row);
                        }
                        $('#productForm2').trigger("reset");
                        $('.js-example-basic-multiple').change();
                        $('#create_msg2').html(`<div class="alert alert-success" role="alert">
      `+data.message+`
    </div>`);
    $('.select2').change();
    
                    } 
                    $('#saveBtn2').html('Save Chanegs');
    
    
                    // $('#productForm').trigger("reset");
                    // $('#ajaxModel').modal('hide');
                    // table.draw();
    
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn2').html('Save Changes');
                    $('#create_msg2').html(`<div class="alert alert-danger" role="alert">
                        Something went wrong - Please Reload Page and Try again
                    </div>`);
                }
            });
          });
    
    
          $('body').on('click', '.editProduct2', function () {
            console.log("working");
     
            var csvString =  $(this).attr('data-agents');
            var valuesArray = csvString.split(",");
    
            $('#editButton2').val("Update Changes");
              $('#EditproductForm2').trigger("reset");
              $('#EditmodelHeading2').html("Update   Group");
              $('#edit_id2').val($(this).attr('data-id'));
              $('#admins_edit2').val(valuesArray).trigger('change');
              $('#edit_name2').val($(this).attr('data-name'));
              $('#campaign_id2').val($(this).attr('data-campaign'));
              $('#edit_status2').val($(this).attr('data-status')).change();
              $('#EditajaxModel2').modal('show');
            });
    
                  $('#EditproductForm2').submit(function (e) {
                       e.preventDefault();
                       $('#editButton2').html('Sending...');
                      $.ajax({
                        data: new FormData(this),
                        url: "{{ route('manage-groups.update_record.queue') }}",
                        type: "POST",
                        contentType: false,
                        cache: false,
                  processData: false,
                        success: function (data) {
    
                            if(data.code ==  500)
                            {
                                $('#edit_create_msg2').html(`<div class="alert alert-danger" role="alert">
              `+data.message+`
            </div>`);
    
    
                            }
                            if(data.code ==  200)
                            {
                            var id_get =  "tbody"+$('#campaign_id2').val();
                            $("#"+id_get).replaceWith(data.row);
                            $('#EditajaxModel2').modal('hide');
                            $('#EditproductForm2').trigger("reset");
                            $('.js-example-basic-multiple').change()
    
                            } 
                            $('#editButton2').html('Update Changes');
    
    
                            // table.draw();
    
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            $('#editButton2').html('Update Changes');
                            $('#edit_create_msg2').html(`<div class="alert alert-danger" role="alert">
                                Something went wrong - Please Reload Page and Try again
                         </div>`);
                        }
                    });
                  });
    
    
    
    
       });
       </script>
    

   

@endsection
 
@section('content')
<style>
    .editproduct2{
    
        border: 1px solid gray;
    }.h5, h5 {
  font-size: 15px;
}
        </style>



<?php

$admins = App\User::where('level_type' , 4)->get();

?>

 

 

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">



                <div>
                     
                    <nav class="breadcrumb-two" aria-label="breadcrumb" style="width: 100%">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">
                                <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Dashboard
                            </a></li>
                
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage-groups.index')}}">{{ $group_get->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Group</li>
                        </ol>
                    </nav>
                 
                
                    </div>








                <div class="card-body">
                    <div >


                        <?php


$myArr = [ ];

                        foreach(  explode(",",$group_get->admins) as $id)
                        {
                            array_push($myArr,\App\Helpers\Helper::getUserName($id));
                        }


                        ?>



<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

    <div class="section-block" style="margin-left: 17px;">
        <h5 class="section-title">Group Name: <span style="    color: #929292;"> {{ $group_get->name }} </span></h5>
        <h5 class="section-title">Managing By : <span style="    color: #929292;"> {{implode(' | ', $myArr)}} </span></h5>
       
    </div>

</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="text-align: right;">

    <button id="createNewProduct" style="    margin-top: 13px;
    margin-right: 14px;" type="button" class="btn btn-success mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Create New Campaign</button>

</div>
</div>





                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >

 
 

 


    <div  id="toggleAccordion" >


<?php

$compaigns = App\Campaign::where('group_id' , $group_get->id )->get();

?>

@if(count($compaigns) > 0)

@foreach ($compaigns  as  $compaign)



            <div class="card mb-2">
                
                <div class="card-header" id="headingSeven{{$compaign->id}}" style="    display: flex;
                justify-content: space-between;">


<section class="mb-0 mt-0" style="width: 100%;">
    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#collapseSeven{{$compaign->id}}" aria-expanded="false" aria-controls="collapseSeven{{$compaign->id}}">
        {{$compaign->name}}  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
    </div>


    
  </section>
  <a
  data-id="{{$compaign->id}}"
  data-name="{{$compaign->name}}"
  class="btn btn-light editProduct"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> Edit</a>
 
                </div>
                <div id="collapseSeven{{$compaign->id}}" class="collapse" aria-labelledby="headingSeven{{$compaign->id}}" data-parent="#toggleAccordion" style="">
                    <div class="card-body">




                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Name</th>
                                        <th>Agents</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Created by</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                           
                            <?php

                            $queues = App\Queuee::with('created_by_user')->where('campaign_id' ,$compaign->id )->get();
                            
                            ?>
                            
                              @if(count($queues) > 0)
                              <tbody id="tbody{{$compaign->id}}" data-count="1">
                                <?php $i=1; ?>
                              @foreach ($queues  as  $queue)
                              <?php

$agents = "";
       $myArr = [ ];

                        foreach(  explode(",", $queue->agents) as $id)
                        {
                            array_push($myArr,\App\Helpers\Helper::getUserName($id));
                        }

                        $agents=   implode(' | ', $myArr);  


                              ?>
                              
                                 <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $queue->name }}</td>
                                    <td>{{ $agents }}</td>
                                    <td>   @if($queue->status == 1)
                                
                                 <span class="badge badge-pill badge-success">Active</span> 
                                
                                 @else
                                
                                   <span class="badge badge-pill badge-danger">In-Active</span> 
                                @endif</td>
                                    <td>{{ $queue->created_at }}</td>
                                    <td>{{ $queue->created_by_user->name }}</td>
                                    <td><button
                                        data-id="{{ $queue->id }}" 
                                        data-name="{{ $queue->name }}" 
                                        data-campaign= "{{ $compaign->id }}"
                                        data-status="{{ $queue->status }}" data-agents="{{ $queue->agents }}" type="button" class="btn btn-light editProduct2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> Edit</button></td>
                                </tr>
                               
                               <?php $i++; ?>
                                @endforeach
                                @else
                                <tbody id="tbody{{$compaign->id}}" data-count="0"> 
                                <tr>
                                    <td colspan="5" style="text-align: center;">No Record Found</td>
                                   
                                </tr>
                                
                                @endif
                                
                               </tbody>
                            </table>
                       


                           
                        <br>
                        <a  data-campaign="{{$compaign->id}}"  href="javascript:void(0)" class="btn btn-secondary createNewProduct2"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Queue</a>
                    </div>
                </div>
            </div>

  @endforeach
@else

<hr>
<h3 style="text-align: center;">No Record Found</h3>
<hr>

@endif




    </div>







                        </div>






                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end total earned   -->
        <!-- ============================================================== -->


        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading">

                            Create New Campaign

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

                                     <span id="create_msg">
                                    </span>

                                </div>
                            </div>

                            <input style="display:none;"   autocomplete="off" type="text"   name="group_id"
                            value="{{$group_get->id}}"  required="">



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
                                id="edit_id" name="id" placeholder="Enter Name"
                                value="" maxlength="100" required="" />
                                <input autocomplete="off" type="text" class="form-control"
                                 id="edit_name" name="name" placeholder="Enter Name"
                                 value="" maxlength="100" required="" />

                                 <span id="edit_create_msg">
                                </span>
                            </div>
                        </div>
                        <input style="display:none;"   autocomplete="off" type="text"   name="group_id"
                        value="{{$group_get->id}}"  required="">


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

 


    <div class="modal fade" id="ajaxModel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading2">

                        Create New Queue    

                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form id="productForm2" name="productForm2" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Name:</label>
                            <div class="col-sm-12">
                                <input   autocomplete="off" type="text" class="form-control"
                                 id="name2" name="name2" placeholder="Enter Name"
                                 value="" maxlength="100" required="">
                              
                                 <input  style="display: none;"  id="campaign_id"    type="text"  name="campaign_id"   required="">
  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Select Agents:</label>
                            <div class="col-sm-12">
                                <select  required name="admins[]" class="js-example-basic-multiple" multiple="multiple" style="width:100%;">
                                    @foreach ($admins as $admin )
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                  </select>
                                  <span id="create_msg2">
                                </span>
                            </div>
                        </div>


                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn2" value="create">Save
                            Changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit    Group  --}}

    <div class="modal fade" id="EditajaxModel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="EditmodelHeading2">

                        Update   Queue

                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form id="EditproductForm2" name="EditproductForm2" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Name:</label>
                            <div class="col-sm-12">
                                <input  autocomplete="off" type="number" style="display:none;" class="form-control"
                                id="edit_id2" name="edit_id2" placeholder="Enter Name"
                                value="" maxlength="100" required="" />
                                <input autocomplete="off" type="text" class="form-control"
                                 id="edit_name2" name="edit_name2" placeholder="Enter Name"
                                 value="" maxlength="100" required="" />

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Select Agents:</label>
                            <div class="col-sm-12">
                                <select  id="admins_edit2" required name="admins[]" class="js-example-basic-multiple" multiple="multiple" style="width:100%;">
                                    @foreach ($admins as $admin )
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                  </select>

                            </div>
                        </div>
                        <input  style="display: none;"  id="campaign_id2"    type="text"  name="campaign_id"   required="">
  

                        <div class="form-group">
                            <label for="name" class="col-12 control-label">Status:</label>
                            <div class="col-sm-12">

                                <select style="cursor:pointer;" class="form-control" id="edit_status2" name="edit_status2">
                                <option value="1" >Active</option>
                                <option value="0" >In-Active</option>
                                </select>

                                <span id="edit_create_msg2">
                                </span>

                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="editButton2" value="create">Update
                            Changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
