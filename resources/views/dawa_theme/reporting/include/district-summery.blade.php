<div class="row analytics">

    <style>
              .wid-top{
                  margin-top: 20px;
              }
              .layout-px-spacing > .row
  {
      display:block;
  }

              </style>
              <style>
                  .blockui-growl-message {
                      display: none;
                      text-align: left;
                      padding: 15px;
                      background-color: #455a64;
                      color: #fff;
                      border-radius: 3px;
                  }
                  .blockui-animation-container { display: none; }
                  .multiMessageBlockUi {
                      display: none;
                      background-color: #455a64;
                      color: #fff;
                      border-radius: 3px;
                      padding: 15px 15px 10px 15px;
                  }
                  .multiMessageBlockUi i { display: block }
              </style>
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}" >

               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12   layout-spacing">
                  <div class="widget widget-account-invoice-two" style="    background: #fff;">
                      <div class="widget-content">

                          <nav class="breadcrumb-two" aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{route('home')}}">
                                      <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                      Home
                                  </a></li>

                                  <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                                      District Summery

                                      @if(App\Helpers\Helper::is_forum_level_user())   | {{App\Helpers\Helper::get_forum_name() }}  @endif
                                     </a></li>
                              </ol>
                          </nav>


                          <div class="d-flex justify-content-between">
                              <h6 style="    font-size: 17px;
                              display: block;
                              color: #0e1726;
                              font-weight: 600;
                              margin-bottom: 0;">District Summery - Filter :
                              <div id="custom-loader-for-loadwabastagan" class="loader-custom"  style="display: none;"></div>
                              </h6>



                          </div>
  <br>

                          <label style="color: black;">Select Zone:</label>
                          <select id="zones" class="form-control basic" multiple="multiple">

                            <?php  

$zones = null;
                            // because every staff member is a forum level user

 if(\App\Helpers\Helper::is_limted_user()=="yes")
        {
            
           
             $zones = \App\Zone::whereIn('id_zone', \App\Helpers\Helper::getLevelIds('Zone') )->get();   
                
        }
        else
        { 
            $zones = \App\Zone::get();    
        }



                            $i=0;   

                            ?>

                              @foreach ( $zones as $zone )
                            <option @if(  $i==0 ) selected
                                @endif value="{{$zone->id_zone}}" >{{$zone->zone_name}}</option>
                             <?php   $i++;   

                            ?>
                              @endforeach

                          </select>

                          <b  id="error" style="color: red; display: none; ">Please Select Minimum One Zone </b>
                  <div style="text-align: right;">

                          <button id="filter-result-button" style="text-align: right;" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>


                              <span id="button-text">
                              Filter Results
                              </span>

                  </div>
                  <script>
                  $(document).ready(function(){
                  $('#filter-result-button').click(function(){
                      $('#error').hide();
                      var zones = $('#zones').val().toString();
                      if(zones == '')
                      {
                          $('#error').show();
                           return true;
                      }

                      startProcess();
                      GetResults(zones);






                  });


                  $('#filter-result-button').click();
                  });
                  function startProcess()
                  {

                      $('#button-text').html('Please Wait...');
                      $('#filter-result-button').prop('disabled',true);
                      $('#district-graph').html('');
                      $('#district-stats').html('');


                  $('#graph-block').show();



                  $('#stat-block').show();


                  }
                  function endProcess()
                  {
                      $('#button-text').html('Filter Results');
                      $('#filter-result-button').prop('disabled',false);

                  $('#graph-block').hide();
                    $('#stat-block').hide();

                  }


              function GetResults(zones)
  {



  $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
  var data_var = {  zones: zones  };
  $.ajax({
  type:'POST',
  url: "{{ route('get.reporting.district.summery') }}" ,
  data: data_var ,
  success:function(data){

   console.log(data);
   if(data.status == "ok")
   {
      $('#district-graph').html(data.view_graph);
      $('#district-stats').html(data.view_stat);
      endProcess();

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



                      </div>
                  </div>
            </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12   layout-spacing" >
                  <div class="widget widget-account-invoice-two" style="    background: #fff;">
                      <div class="widget-content"  >
                          <div class="d-flex justify-content-between">
                              <h6 style="    font-size: 17px;
                              display: block;
                              color: #0e1726;
                              font-weight: 600;
                              margin-bottom: 0;">  Graphical Representation :
                              <div id="custom-loader-for-loadwabastagan" class="loader-custom"  style="display: none;"></div>
                              </h6>

                          </div>
                          <div id="stat-block">

                            <br>
                <div class="animated-background">
                    <div class="background-masker btn-divide-left"></div>
                  </div>

                <div class="animated-background">
                    <div class="background-masker btn-divide-left"></div>
                  </div>

                <div class="animated-background">
                    <div class="background-masker btn-divide-left"></div>
                  </div>

                <div class="animated-background">
                    <div class="background-masker btn-divide-left"></div>
                  </div>


                          </div>
                          <div id="district-graph"></div>




              </div>
              </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12   layout-spacing" >
                  <div class="widget widget-account-invoice-two" style="    background: #fff;">
                      <div class="widget-content"  >
                          <div class="d-flex justify-content-between">
                              <h6 style="    font-size: 17px;
                              display: block;
                              color: #0e1726;
                              font-weight: 600;
                              margin-bottom: 0;">Stats Report   @if(App\Helpers\Helper::is_forum_level_user())   | {{App\Helpers\Helper::get_forum_name() }}  @endif:
                              <div id="custom-loader-for-loadwabastagan" class="loader-custom"  style="display: none;"></div>
                              </h6>

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
                              </style>

                          <div  id="graph-block"  >
                              <br>
                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>

                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>

                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>

                            <div class="animated-background">
                                <div class="background-masker btn-divide-left"></div>
                              </div>


                          </div>
                          <div  id="district-stats"></div>



              </div>
              </div>
              </div>









      </div>
