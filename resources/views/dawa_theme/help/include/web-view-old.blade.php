
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('video/assets/css/main.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel2@2.2.2/dist/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link  href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}"rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


<style>

.layout-px-spacing > .row
{
    display:block;
}
 .widget_title {
    background-color: #eee;
    height: 15px;
    line-height: 15px;
    margin-bottom: 15px;

}
  .widget_title h3 {
    font-weight: 700;
    padding-right: 10px;
    font-size: 15px;
    height: 15px;
    line-height: 15px;
    text-transform: uppercase;
    background-color: #fff;
    display: inline-block;
    margin: 0;
}
 .owl-item {
    cursor: pointer;
    padding: 5px;

}


@media screen and (min-width: 480px) {
    .content-row{
    padding:   55px 85px 0px 85px;
}
}


</style>



<div class="layout-px-spacing">

    <div class="row  " id="cancel-row"    >

        <div class="col-xl-12 col-lg-12 col-sm-12   ">
            <div class="widget-content widget-content-area br-6">

                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">
                            <svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Home
                        </a></li>

                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="    color: #007bff;">
                      Help </a></li>
                    </ol>
                </nav>



    <div class=" "  >


        <div class="row content-row"   >



            <!-- player wrapper -->
            <div class="col-lg-6  col-md-6 col-sm-12      "  >
                <div class="widget_title  "><h3 style="font-size:16px;  ">- Software Tutorials </h3></div>

                <div class="carousel__wrap mt-3">
                  <div class="owl-carousel">
                    <div data-video="9f-3BKs7lA8" class="item video-thumb active ">
                      <img
                        src="https://img.youtube.com/vi/9f-3BKs7lA8/hqdefault.jpg"
                      />
                    <b style="letter-spacing: 0px;"> Step 1:<br> How To Register </b>
                    </div>
                    <div data-video="o35m-VbdAzY" class="item video-thumb">
                      <img
                        src="https://img.youtube.com/vi/o35m-VbdAzY/hqdefault.jpg"
                      />
                      <b style="letter-spacing: 0px;">  Step 2:<br> Update 100% Profile</b>
                    </div>
                    <div data-video="VDBzdug-6sY" class="item video-thumb">
                      <img
                        src="https://img.youtube.com/vi/VDBzdug-6sY/hqdefault.jpg"
                      />
                      <b style="letter-spacing: 0px;">   Step 3:<br> Add To Broadcast List</b>
                    </div>


                  </div>
                </div>


         <div class="widget_title  mt-4 "><h3 style="font-size:16px;    "



            >- WhatsApp Tutorials </h3></div>


         <div class="carousel__wrap mt-3">
            <div class="owl-carousel">
              <div data-video="_E-WFp4e_Ys" class="item video-thumb  ">
                <img
                  src="https://img.youtube.com/vi/_E-WFp4e_Ys/hqdefault.jpg"
                />
              <b style="letter-spacing: 0px;">How to Create Broadcast List In Whatsapp  </b>
          </div>
              <div data-video="66Jo9CN1s7s" class="item video-thumb   ">
                <img
                  src="https://img.youtube.com/vi/66Jo9CN1s7s/hqdefault.jpg"
                />
              <b style="letter-spacing: 0px;">How to Use Broadcast List In Whatsapp  </b>
          </div>
              <div data-video="cKA_6zYq1xw" class="item video-thumb   ">
                <img
                  src="https://img.youtube.com/vi/cKA_6zYq1xw/hqdefault.jpg"
                />
              <b style="letter-spacing: 0px;">Difference Between Whatsapp Group and Broadcast List  </b>
          </div>

            </div>
          </div>





            </div>






              <div class="col-lg-6  col-md-6 col-sm-12      "  >

              <div class="embed__container">
                <div id="player" style="border: 0.5px solid gray;min-height:500px;"></div>
              </div>


            </div>

        </div>
      </div>





            </div>
        </div>

    </div>

    </div>



 <!-- main scripts -->
 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/owl.carousel2@2.2.2/dist/owl.carousel.min.js"></script>
 <script src="{{asset('video/assets/js/main.js')}}"></script>
