
 <style>

    a[rel="tag"] {
        display: inline-block;
        position:relative;
        padding: .7em;
        padding-left: 24px;

        background: #8dc63f;
        color: #ffffff;
        text-decoration:none;
        font-weight: bold;
        font-size: small;
        margin: 0 5px 5px 0px;
    }

    a[rel="tag"]:hover {
        background:#b30;
        color:white;
    }

    a[rel="tag"]:focus {
        background:#b30;
        color:white;
    }
    a[rel="tag"]{
        cursor:pointer;
    }
    .ticket-active{
        background:#b30 !important;
        color:white  !important;
    }

    a[rel="tag"]:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index:1;

        background: -moz-radial-gradient(.6em .6em, circle, white .55em, rgba(255,255,255,0) .6em) -.6em -.6em,
                    -moz-radial-gradient(1em 50%, circle, white .35em, rgba(255,255,255,0) .4em),
                    -moz-radial-gradient(1em 47%, circle, rgba(0,0,0,.4) .4em, transparent .43em);
        background: -o-radial-gradient(.6em .6em, circle, white .55em, rgba(255,255,255,0) .6em) -.6em -.6em,
                    -o-radial-gradient(1em 50%, circle, white .35em, rgba(255,255,255,0) .4em),
                    -o-radial-gradient(1em 47%, circle, rgba(0,0,0,.4) .4em, transparent .43em);
        background: -ms-radial-gradient(.6em .6em, circle, white .55em, rgba(255,255,255,0) .6em) -.6em -.6em,
                    -ms-radial-gradient(1em 50%, circle, white .35em, rgba(255,255,255,0) .4em),
                    -ms-radial-gradient(1em 47%, circle, rgba(0,0,0,.4) .4em, transparent .43em);
        background: -webkit-radial-gradient(.6em .6em, circle, white .55em, rgba(255,255,255,0) .6em) -.6em -.6em,
                    -webkit-radial-gradient(1em 50%, circle, white .35em, rgba(255,255,255,0) .4em),
                    -webkit-radial-gradient(1em 47%, circle, rgba(0,0,0,.4) .4em, transparent .43em);
    }

    a[rel="tag"]:after {
        content: '';
        position:absolute;
        top:.25em;
        right:.25em;
        bottom:.25em;
        left:.25em;
        border: 1px rgba(0,0,0,.3) dashed;
        outline: 1px rgba(255,255,255,.5) dashed;
    }
    .green-tick{ border: 1px solid black;
    position: absolute;
    top: 11px;
    left: 5px;
    border-radius: 50%;
    color: white;
    background-color: #0a9c0a;
    z-index: 2;
    padding: 2px;}
        </style>
 <div class="tab-content" id="simpletabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


        <div @if($is_full_page == "no") hidden @endif  style="font-size:11px;">
            <span id="category-list-broadcast" data-id="{{$Category_index}}">
<a  rel="tag" onclick="loadWabastaganList('all' , '{{$is_full_page}}')" data-category="All"
class="@if(strtolower($Category_index) =='all' )ticket-active @endif">All - ({{$total_wabastagan}})</a>


<?php
$j=0;
?>
@foreach($categories as $category)
<span style="position: relative;">
<a  rel="tag" onclick="loadWabastaganList('{{$category->cate_id }}' , '{{$is_full_page}}')" data-category="{{$category->cate_id }}"
    class="@if($Category_index ==$category->cate_id)ticket-active @endif"
    >

{{-- green tick  --}}
@if($category->is_authenticated == 1 )
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
class="feather feather-check green-tick"  ><polyline points="20 6 9 17 4 12"></polyline></svg>
@endif
<?php
$total_count = \App\Helpers\Helper::get_total_wabastagan( $wabastagans_temp , $category->cate_id );
?>

{{-- green tick  --}}
{{ $category->category_name}} - ({{$total_count}})
@if($category->is_authenticated != 1 && $total_count == 0)
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
@endif
</a>

@if($category->is_authenticated != 1 && $total_count == 0)


<button class="delete-category" data-id="{{$category->cate_id}}" style="
    position: absolute;
    cursor: help;
    top: -6px;
    right: 20px;
    z-index: 4;
    border-radius: 50%;
">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2" style="
    /* color: white; */
    /* background-color: #ff000000; */
    color: #ff5555;
"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" style="
    /* color: red; */
"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
</button>
@endif
</span>
   {{-- end for each --}}
   <?php
$j++;
?>
@endforeach
            </span>
<svg data-toggle="modal" data-target="#loginModal" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="23" height="23"
viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        </div>
        <script>
            $(document).ready(function(){
              $("a[rel=tag]").click(function(){
               $('a[rel=tag]').removeClass('ticket-active');
               $(this).addClass('ticket-active');
              });
            });
            </script>




                                    <!-- Modal -->
                                    <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content" id="create-category-model-body">

                                            <div class="modal-header" id="loginModalLabel">
                                              <h6 class="modal-title">Create New Tag</h6>
                                              <button id="close-create-new-category-button" type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                            <div class="modal-body">
                                              <form class="mt-0"  autocomplete="off" action="javascript:void(0);" >

                                                <div class="form-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                  <input autocomplete="off" type="text" class="form-control mb-2"
                                                   id="inputcategoryname" placeholder="Tag Name"
                                                   maxlength="25" minlength="3" required
                                                   />
                                                   <b id="category-required" class="category-msgs" style=" display:none;color: red;">
                                                     <small>Its required</small><br>
                                                  </b>
                                                  <b id="category-min-character" class="category-msgs" style=" display:none;color: red;">
                                                    <small>Please Enter Minimum 3 Characters.</small><br>
                                                 </b>
                                                  <b id="category-alerady-created" class="category-msgs" style=" display:none;color: red;">
                                                    <small>Alerady Created</small><br>
                                                 </b>
                                                </div>

                                                <div class="social">
                                                    <a data-dismiss="modal" aria-hidden="true" href="javascript:void(0);" class="btn  social-github ">
                                                         <span class="brand-name">Cancel</span></a>

                                                    <button id="create-new-category"type="button"  class="btn  btn-outline-dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                           <span id="create-new-category-button" class="brand-name">Create</span></button>
                                                </div>
                                              </form>
                                              <script>
                                                $(document).ready(function(){
                                                    const uppercaseWords = str => str.replace(/^(.)|\s+(.)/g, c => c.toUpperCase());
                                                    $("#inputcategoryname").keyup(function(){
                                                        $(this).val(uppercaseWords($(this).val()));
                                                    });
                                                  $("#create-new-category").click(function(){

                                                    $('.category-msgs').hide();

                                                       if($("#inputcategoryname").val().trim() !=  null
                                                         &&
                                                         $("#inputcategoryname").val().trim() !=  '')
                                                       {
                                                          if($("#inputcategoryname").val().length > 2)
                                                          {
                                                            var  categoryName =$("#inputcategoryname").val().trim();

                                                            $("#create-category-model-body").LoadingOverlay("show");
                                                            $("#create-new-category-button").html('Please Wait...');

                                                                // save using ajax
                                                                // save using ajax
          var data_var = {
                          categoryName:  $("#inputcategoryname").val().trim()
                  };

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
               type:'POST',
               url:"<?php echo route('create.new.category.for.broadcast.list'); ?>" ,
               data: data_var ,
               success:function(data){

                   if(data.status == "save")
                   {
                       console.log(data);
                    appendOnListAndProcessEnd(data_var.categoryName , true , true , data.id);
                   }
                 else  if(data.status == "alerady-created")
                   {
                       // alerady created
                    $('#category-alerady-created').show();
                    appendOnListAndProcessEnd(null , true , false);
                   }

                   else
                   {
                    appendOnListAndProcessEnd(null , true , false);
                   alert( 'Uncaught Error');

                   }

               }

               ,
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);

            appendOnListAndProcessEnd(null , true , false);
            if(msg!= true)
            {
                    alert(msg);
            }

    },
            });


                                                                // save using ajax
                                                                // save using ajax



                                                          }
                                                          else
                                                          {

                                                    $('#category-min-character').show();
                                                            // plz enter minimum 3 character
                                                          }
                                                       }
                                                       else
                                                       {
                                                        $('#category-required').show();
                                                        // show its required field
                                                       }
                                                  });


                                                });

                                                function appendOnListAndProcessEnd(categoryName , processEnd , appendEnd , category_id = 0)
                                                {
                                                    if(processEnd)
                                                    {

                                                        $("#create-category-model-body").LoadingOverlay("hide");
                                                            $("#create-new-category-button").html('Create');
                                                    }
                                                    if(appendEnd)
                                                    {
                                                  $('#category-list-broadcast').append('<a   rel="tag" onclick="loadWabastaganList('+"'"+category_id+"' , '{{$is_full_page}}' "+')" data-category= "'+categoryName+'" >'+categoryName+'</a>');
                                                  $('#broadcast_category').append('<option   value="'+category_id+'">'+categoryName+'</option>');
                                                // loadWabastaganList();
                                                $("a[rel=tag]").each(function(){
                                                                if($(this).hasClass('ticket-active'))
                                                                {
                                                                    loadWabastaganList($(this).attr('data-category') , '{{$is_full_page}}');
                                                                }

                                                                });

                                                //   $("a[rel=tag]").click(function(){
                                                //                 $('a[rel=tag]').removeClass('ticket-active');
                                                //                 $(this).addClass('ticket-active');
                                                //                 });
                                                                $("#inputcategoryname").val('');
                                                                $("#close-create-new-category-button").click();
                                                    }
                                                }
                                                </script>





                                            </div>

                                          </div>
                                        </div>
                                      </div>


 
    @include('dawa_theme.manage.worker.include.table' , ['wabastagans' => $wabastagans,
    'is_full_page' => $is_full_page])

    </div>

    <div class="tab-pane fade show  " id="hometwo" role="tabpanel" aria-labelledby="hometwo-tabs">

        @include('dawa_theme.manage.worker.include.emptyTable' , ['id' => 'table2022'] )


    </div>
    <div class="tab-pane fade show  " id="homethree" role="tabpanel" aria-labelledby="homethree-tabs">
        @include('dawa_theme.manage.worker.include.emptyTable' , ['id' => 'table2023'])
    </div>
    <div class="tab-pane fade show  " id="homefour" role="tabpanel" aria-labelledby="homefour-tabs">

        @include('dawa_theme.manage.worker.include.emptyTable' , ['id' => 'table2024'])
    </div>
    <div class="tab-pane fade show  " id="homefive" role="tabpanel" aria-labelledby="homefive-tabs">


        @include('dawa_theme.manage.worker.include.emptyTable' , ['id' => 'table2025'])

    </div>



    </div>

    <script>

$(document).ready(function(){
  $("#delete-wabastagan-button").click(function(){


    swal({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    deleteWabastagan($(this).attr('data-id') ,  $(this).attr('row-element') );

  } else {

  }
});


  });
});
$(document).ready(function(){
  $(".delete-category").click(function(){

    swal({
  title: "Delete Category ?",
  text: "You won't be able to revert this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      var element = $(this);

    $('#broadcast_category').children().each(function(){
        console.log($(this).val() +"   "+element.attr('data-id'));
    if($(this).val() == element.attr('data-id')  ){
        $(this).remove();
        deleteCategory(element.attr('data-id'));
    element.parent().remove();
    }


  });


  } else {

  }
});


  });
});



$(document).ready(function(){
  $(".edit-wabastahan-row").click(function(){
    renewForm();

    $('#triger-add-whatsapp-number').click();
    $('.edit-number-show').show();
    $('.edit-number-hide').hide();
// set delete button value and row  id  on row click
      $('#delete-wabastagan-button').attr('data-id' , $(this).attr('data-id') );
      $('#delete-wabastagan-button').attr('row-element' , $(this).attr('id') );
    appendEditWabastaganData($(this).attr('data-id'));
    $(".activities").show();

  });
});


function appendEditWabastaganData(wabsatagan_id)
{
    $("#add-new-wabastagan").LoadingOverlay("show");
    $("#edit-wabastagan").prop('disabled' , true);

$.ajax({
type:'GET',
url: "{{ route('append.wabastagan.for.edit') }}?id="+wabsatagan_id ,

success:function(data){


if(data.status =="not-found")
{
    $('#close-new-wabastagan-model').click();
    swal("System Catch Error!", "Somthing went Wrong try again latter");
}
else if(data.status =="found")
{
    // console.log(data.wabsantagan);

     $("#rafaqat_number").val(data.wabsantagan.rafaqat_number);
     $("#remarks").val(data.wabsantagan.remarks);
     $("#txt_FullName").val(data.wabsantagan.name);
      $("#txt_District").val(data.wabsantagan.id_dist).change();
      if(data.wabsantagan.id_dist==null || data.wabsantagan.id_dist==0 )
      {

        $("#tehsil-component").html('<select disabled  class="form-control   " id="txt_Tehsil" name="txt_District"  autocomplete="off" required=""  ><option value="" selected>No (تحصیل / صوبائی حلقہ) Found</option></select>');
       $("#tehsil-component").show();

      }
      id_tehsil_for_eidt_wabastagan = data.wabsantagan.id_tehsil;
     $("#txt_Tehsil").val(id_tehsil_for_eidt_wabastagan).change();
    // $("#txt_Gender").val(data.wabsantagan.gender).change();
    if(data.wabsantagan.gender=="Male"){$("#txt_Gender_Male").prop('checked',true).change();}
    if(data.wabsantagan.gender=="Female"){$("#txt_Gender_FeMale").prop('checked',true).change();}

    if(data.wabsantagan.categories!= null && data.wabsantagan.categories.trim() != "")
    {
    $('#broadcast_category').val(data.wabsantagan.categories.split(",")).change();
    }
    if(data.wabsantagan.activities!= null && data.wabsantagan.activities.trim() != "")
    {

        var current_activities =  data.wabsantagan.activities.split(",");

        $(".selections").find('.item').each(function(){

            if(current_activities.includes($(this).attr('data-value')))
        {
          $(this).find('input').click();
        }

               });



    }

    iti.setNumber("+"+JSON.parse(data.wabsantagan.country).dialCode+data.wabsantagan.whatsapp);

    if(JSON.parse(data.wabsantagan.country).dialCode == "92")
    {
        district_required = true;
    $("#txt_District_div").show();
    }
    else
    {

        district_required = false;
    $("#txt_District_div").hide();
    $("#tehsil-component").hide();
    }

      $("#txt_whatsapp").val(data.wabsantagan.whatsapp);

}
else
{
    swal("System Catch Error!", "Somthing went Wrong try again latter");
}

$("#add-new-wabastagan").LoadingOverlay("hide");
$("#edit-wabastagan").prop('disabled' , false);
},
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);
        $("#add-new-wabastagan").LoadingOverlay("hide");
        $("#edit-wabastagan").prop('disabled' , false);
            if(msg!= true)
            {
                    alert(msg);
            }

    },


});

}

function deleteWabastagan(id ,element)
{
    $('#close-new-wabastagan-model').click();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var data_var = {  id: Number(id)     };
$.ajax({
type:'POST',
url: "{{ route('delete.wabastagan') }}" ,
data: data_var ,
success:function(data){

if (data.status == "true")
{
    total_wabastagan--;
                    remaining++;


                    simple_pie.updateSeries([ total_wabastagan ,remaining]);

    $('#'+element).hide(500);
    SnackBar({
                            message: "<em>Congratulation<em>!. Record Deleted Successfully!",
                                status: "info",
                                icon: "danger" ,
                                fixed: true
                        });
}
else
{
    swal("System Catch Error!", "Somthing went Wrong try again latter");
}


},
               error: function (jqXHR, exception) {
        var msg = AjaxError(jqXHR, exception);
            process_end();
            if(msg!= true)
            {
                    alert(msg);
            }

    },


});

}
</script>
<script>
    $('.zero-config').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [ 10, 20, 50 , 100 , 150 , 200 , 500],
        "pageLength": 20
    });

</script>

<style>
.aa{
    padding: 11px;
}
</style>
@if($is_full_page == "no")

<script>

    $(document).ready(function(){


// $('.dataTables_filter').parent().addClass('col-md-3');
// $('.dataTables_filter').parent().removeClass('col-md-6');

// $('.dt-buttons').parent().addClass('col-md-9');
// $('.dt-buttons').parent().removeClass('col-md-6');

} );

</script>
@else

<script>

    $(document).ready(function(){



    $('.html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-12"B><"col-md-12"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-12"i><"col-md-12"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn  aa broadcast-list-copy-button' },
                { extend: 'csv', className: 'btn  aa broadcast-list-copy-button-csv' },
                { extend: 'excel', className: 'btn  aa broadcast-list-copy-button-excel' ,

                customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                // Loop over the cells in column `C`
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    var text = $('is t', this).text();

                    $('is t', this).text(text.replace(/ /g,'') )
                    // if ( $('is t', this).text() == 'New York' ) {
                    //     $(this).attr( 's', '20' );
                    // }
                });
                // Loop over the cells in column `C`
                $('row c[r^="G"]', sheet).each( function () {
                    // Get the value
                    var text = $('is t', this).text();

                    $('is t', this).text(text.replace(/ /g,'') )
                    // if ( $('is t', this).text() == 'New York' ) {
                    //     $(this).attr( 's', '20' );
                    // }
                });
                // Loop over the cells in column `D`
                $('row c[r^="D"]', sheet).each( function () {
                    // Get the value
                    var text = $('is t', this).text();

                    $('is t', this).text(text.replace(/ /g,'') )
                    // if ( $('is t', this).text() == 'New York' ) {
                    //     $(this).attr( 's', '20' );
                    // }
                });
            }
            },
                { extend: 'print', className: 'btn aa' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50 , 100],
        "pageLength": 10
    } );

// $('.dataTables_filter').parent().addClass('col-md-3');
// $('.dataTables_filter').parent().removeClass('col-md-6');

// $('.dt-buttons').parent().addClass('col-md-9');
// $('.dt-buttons').parent().removeClass('col-md-6');

} );

</script>

@endif

<script>

 $(document).ready(function(){
$('.broadcast-list-copy-button').click(function(){

    SnackBar({
                            message: " Record has Copied in your Clipboard. <em>Successfully<em>!",
                                status: "success",

                                fixed: true ,


                        });
});
$('.broadcast-list-copy-button-csv').click(function(){


    SnackBar({
                            message: "   File Downloaded. <em>Successfully<em>!",
                                status: "success",
                                fixed: true,

                        });
});
$('.broadcast-list-copy-button-excel').click(function(){


    SnackBar({
                            message: "   File Downloaded. <em>Successfully<em>!",
                                status: "success",
                                fixed: true

                        });
});
});


</script>
<style>
    .dt-buttons .dt-button {

    margin: 13px 0px 0px 0px;
}
.js-snackbar-container--top-right {
    top: 57px !important;}
    </style>
