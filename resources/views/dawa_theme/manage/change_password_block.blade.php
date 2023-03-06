
 <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/build/css/intlTelInput.css')}}" >
 <script src="{{asset('dawa_theme/build/js/intlTelInput.js')}}"></script>
 <script src="{{asset('dawa_theme/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
 <script src="{{asset('dawa_theme/plugins/input-mask/input-mask.js')}}"></script>
<div class="widget widget-activity-two mb-4" style="height: auto;">
    <script>
        var manage_user_id = null;
        var auth_user_id = {{Auth::id()}};
       </script>
    <div class="widget-heading">
        <h5 class="">Change Worker Password
        </h5>
        <h6><small> {{\App\Helpers\Helper::get_forum_name()}}
            @if(\App\Helpers\Helper::is_limted_user()=="yes")    >
            @if(Auth::user()->access_type != 'Zone') {{Auth::user()->access_type}}: @endif{{\App\Helpers\Helper::get_level_name()}}
            @endif </small></h6>


    </div>


    <style>
        .table > tbody > tr > td {
            border: none;
            color: #000000;
            font-size: 13px;

        }
        .aaa{
            padding: 9px;
            margin-right: 0px;
        }
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: -17px;

        }
        .cursor{ cursor: pointer;}
        </style>

<style>

.img-resp {
border: 1px solid #dee2e6;
max-width: 55px;
max-height: 55px;
border-radius: 9px;
}
.name-img {
display: inline-block;
 vertical-align: middle;
}

    </style>

<div class="widget-content">

        <div class="row">



                <div class="col-xl-12 col-lg-12 col-sm-12   ">
                    <div style="    padding-left: 21px;">
                        <input value="{{old('whatsapp')}}"  id="whatsapp" name="whatsapp"
                                             type="tel" class="form-control     "
                                             placeholder=""  required  autocomplete="off"  />

                                             <button style="float: right;" id="get_worker_button" class="btn btn-primary mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                                               <span id="button_for_worker_filter" > Get Worker </span></button>
        </div>
                    </div>
                </div>

                <hr>

                <div class="col-xl-12 col-lg-12 col-sm-12   ">
                    <div class=" ">
                        <div class="table-responsive mb-4  ">

                            <table class="table chaghe table-bordered data-table">
                                <thead>
                                    <tr style="    background: rgb(0 0 0 / 7%);">
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">NAME / WhatsApp</th>


                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">NAME / WhatsApp</th>



                                    </tr>
                                </tfoot>
                            </table>



                            <script type="text/javascript">
                                $(function () {

                                    var img_path = "{{asset('')}}";

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                  });

                                  var table_change = $('.chaghe').DataTable({
                                    dom: '<"row"<"col-md-12"<"row"<"col-md-8"l><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-12"i><"col-md-12"p>>> >',

                        "oLanguage": {

                            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            "sSearchPlaceholder": "Search...",
                           "sLengthMenu": "Results :  _MENU_",
                        },
                        "stripeClasses": [],
                        "lengthMenu": [ 10 , 20, 50 ,100 , 500],
                        "pageLength": 10,
                        "order": [[ 0, "desc" ]] ,
                                      processing: true,
                                      serverSide: false,

                          ajax: {
                       url: "{{ route('manage.workers.change.password') }}",
                       type: 'GET',
                            },
                            "deferRender": true,
                            "createdRow": function( row, data, dataIndex ) {

            $(row).attr("data-id", data.id);
            $(row).attr("data-name", data.name);
            $(row).attr("data-image", img_path+data.photo);
            $(row).addClass("cursor");


            $(row).click(function() {

            $('#login_button').attr('data-id' , $(this).attr('data-id'));
            $('#password').val('');
            $('.msg').hide();
            $('#manage_worker_name').html($(this).attr('data-name'));
            manage_user_id= $(this).attr('data-id');
            $('#manage_worker_image').attr('src', $(this).attr('data-image'));
            $("#open_manage_worder").click();
            });


            // if ( data[4] == "A" ) {
            //   $(row).addClass( 'important' );
            // }
            },
                                    deferRender: true,
                                      columns: [
                                           {data: 'value' },
                                      {data: 'name_picture' }
                                      ]
                                  });
                                //   setInterval( function () {
                                //     table_change.ajax.reload( null, false ); // user paging is not reset on reload
                                //     }, 20000 );



                                });
                              </script>








                        </div>
                    </div>
                </div>




        </div>



    </div>
<script>


var iti = null;
 var input_whatsapp = document.querySelector("#whatsapp");



    $(document).ready(function(){



iti = window.intlTelInput(input_whatsapp, {
 allowDropdown: true,

 excludeCountries: ["il"],
initialCountry: "pk",

hiddenInput: "full_number",

separateDialCode: true,
utilsScript: "{{asset('dawa_theme/build/js/utils.js')}}",
});

input_whatsapp.addEventListener("countrychange", function( ) {

setPlaceHolder();
document.getElementById('whatsapp').value = "";
});



setTimeout(function(){  setPlaceHolder( ); }, 1000);
document.getElementById('whatsapp').placeholder= "(301)-234-5678";
$('#whatsapp').inputmask('(999)-999-9999');
});


function setPlaceHolder(country=null)
{

if(document.getElementById('whatsapp').placeholder == "301 2345678" ||
document.getElementById('whatsapp').placeholder == "(301)-234-5678"  || country=="pk")
{
document.getElementById('whatsapp').placeholder= "(301)-234-5678";
}
else
{

}
 $("#whatsapp").inputmask({mask:document.getElementById('whatsapp').placeholder.replace(/[0-9]/g, "9")});

}


</script>




