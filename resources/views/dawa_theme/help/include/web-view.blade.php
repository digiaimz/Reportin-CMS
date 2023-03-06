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
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: -webkit-fill-available;
    height: -webkit-fill-available;
    background-color: #000;
}

</style>


<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100%;
        height: 100%;}
        .light-color{
        color: #a8a9b0;
    }
    .title-link{
        display: inline-block;
        vertical-align: bottom;
    }
    .layout-top-spacing{
    display: block;
    }
    #cancel-row{
    display: block;
    }



    /* header */

    .material-icons {
      color: rgb(96, 96, 96);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 70px;
      padding: 15px;
    }

    .header__left {
      display: flex;
      align-items: center;
    }

    .header__left img {
      width: 100px;
      margin-left: 15px;
    }

    .header i {
      padding: 0 7px;
      cursor: pointer;
    }

    .header__search form {
      border: 1px solid #ddd;
      height: 35px;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .header__search input {
      width: 500px;
      padding: 10px;
      margin: 0;
      border-radius: 0;
      border: none;
      height: 100%;
    }

    .header__search button {
      padding: 0;
      margin: 0;
      height: 100%;
      border: none;
      border-radius: 0;
    }

    /* Sidebar */
    .mainBody {
      height: calc(100vh - 70px);
      display: flex;
      overflow: hidden;
    }

    .sidebar {
      height: 100%;
      width: 230px;
      background-color: white;
      overflow-y: scroll;
    }

    .sidebar__categories {
      width: 100%;
      display: flex;
      flex-direction: column;
      margin-bottom: 15px;
      margin-top: 15px;
    }

    .sidebar__category {
      display: flex;
      align-items: center;
      padding: 12px 25px;
    }

    .sidebar__category span {
      margin-left: 15px;
    }

    .sidebar__category:hover {
      background: #e5e5e5;
      cursor: pointer;
    }

    .sidebar::-webkit-scrollbar {
      display: none;
    }

    hr {
      height: 1px;
      background-color: #e5e5e5;
      border: none;
    }

    /* videos */

    .videos {
      background-color: #f9f9f9;
      width: 100%;
      height: 100%;
      padding: 15px 15px;
      border-top: 1px solid #ddd;

    }

    .videos__container {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .video {
      width: 310px;

      margin-bottom: 30px;
    }

    .video__thumbnail {
      width: 100%;
      height: 170px;
    }

    .video__thumbnail img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }

    .author img {
      object-fit: cover;
      border-radius: 50%;
      height: 40px;
      width: 40px;
      margin-right: 10px;
    }

    .video__details {
      display: flex;
      margin-top: 10px;
    }

    .title {
      display: flex;
      flex-direction: column;
    }

    .title h3 {
      color: rgb(3, 3, 3);
      line-height: 18px;
      font-size: 14px;
      margin-bottom: 6px;
    }

    /* .title a,
    span {
      text-decoration: none;
      color: rgb(96, 96, 96);
      font-size: 14px;
    } */

    h1 {
      font-size: 20px;
      margin-bottom: 10px;
      color: rgb(3, 3, 3);
    }

    @media (max-width: 425px) {
      .header__search {
        display: none;
      }

      .header__icons .material-icons {
        display: none;
      }

      .header__icons .display-this {
        display: inline;
      }

      .sidebar {
        display: none;
      }
    }

    @media (max-width: 768px) {
      .header__search {
        display: none;
      }

      .sidebar {
        display: none;
      }

      .show-sidebar {
        display: inline;
        position: fixed;
        top: 4.4rem;
        height: auto;
      }
    }

    @media (max-width: 941px) {
      .header__search input {
        width: 300px;
      }
    }
    .row {

    display: block;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
    </style>

     <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<script>


$(document).ready(function(){
    $('.img-res').click(function () {
        $('#close_video').click(function () {
        $('#youtube-video').attr({
            'src': '',
            'width': '800',
            'height': '415',
            'allow': 'encrypted-media'
        }).css('border', '0');
    });

        var src= null;
        if($(this).attr('data-type') == "facebook")
        {
  src = 'https://www.facebook.com/plugins/video.php?href='+$(this).attr('data-link')+'&show_text=true&appId';
        }
        else{
            src = 'https://www.youtube.com/embed/'+$(this).attr('data-link');
        }

        $('#video-title').html($(this).attr('data-title'));
        $('#videoMedia1').modal('show');
        $('#youtube-video').attr({
            'src': src,
            'width': '800',
            'height': '415',
            'allow': 'encrypted-media'
        }).css('border', '0');


    });
});



</script>


 <!-- Modal -->
 <div class="modal fade" id="videoMedia1" tabindex="-1" role="dialog" aria-labelledby="videoMedia1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="videoMedia1Label"
             >



               <span id="video-title"> </span>

                <button id="close_video" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18">
                  </line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="video-container">
                    <iframe id="youtube-video"  style="width: -webkit-fill-available;width: -moz-available;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


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
            <div class="col-lg-12  col-md-12 col-sm-12      "  >


                <style>
/* .img-res{
    width: -webkit-fill-available;
    display: inherit;
    margin: 0px 10px 0px 10px;
    height: 77%;} */
.video-thumb{width:100%; text-align: center;}
.video-thumb:after
{
    display: none;
}
.author img {
    object-fit: cover;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    margin-right: 10px;
    display: inline-block;
}

                </style>



              <div class="widget_title  "><h3 style="font-size:16px;  ">- Software Tutorials </h3></div>






  <!-- Main Body Starts -->


    <!-- Videos Section -->
    <div class="videos">


        <div class="videos__container">

          <?php $i=0; ?>






          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;"    data-type="youtube" data-title="Step 1: How To Register" data-link="9f-3BKs7lA8"  >


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/9f-3BKs7lA8/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    Step 1: How To Register

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->
          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;"    data-type="youtube" data-title="Step 2: Update 100% Profile" data-link="o35m-VbdAzY" >


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/o35m-VbdAzY/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    Step 2:  Update 100% Profile

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->
          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;"    data-type="youtube" data-title="Step 3: Add To Broadcast List" data-link="VDBzdug-6sY">


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/VDBzdug-6sY/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    Step 3:  Add To Broadcast List

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->

           <!-- Single Video starts -->


           <div class="video video-row img-res" style="cursor: pointer;"    data-type="youtube" data-title="Progress Of Mustafvi Workers" data-link="eKOkwHRWYCw">


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/eKOkwHRWYCw/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    Progress Of Mustafvi Workers

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->

           <!-- Single Video starts -->


           <div class="video video-row img-res" style="cursor: pointer;"    data-type="youtube" data-title="Progress Of Mustafvi Workers" data-link="G1j8m7vJRh8">


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/G1j8m7vJRh8/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    How to Reset Password

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->



        </div>
      </div>


    <!-- Main Body Ends -->



              <div class="widget_title  mt-4"><h3 style="font-size:16px;    "



                >- WhatsApp Tutorials </h3></div>




  <!-- Main Body Starts -->


    <!-- Videos Section -->
    <div class="videos">


        <div class="videos__container">

          <?php $i=0; ?>






          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;"      data-type="youtube" data-title="How to Create Broadcast List In Whatsapp" data-link="_E-WFp4e_Ys" >


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/_E-WFp4e_Ys/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    How to Create Broadcast List In Whatsapp

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->
          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;"   data-type="youtube" data-title="How to Use Broadcast List In Whatsapp" data-link="66Jo9CN1s7s">


            <div class="video__thumbnail">
   <img
              loading="lazy"
              src="https://img.youtube.com/vi/66Jo9CN1s7s/hqdefault.jpg"
              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    How to Use Broadcast List In Whatsapp

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->
          <!-- Single Video starts -->


            <div class="video video-row img-res" style="cursor: pointer;" data-type="youtube" data-title="How to Use Broadcast List In Whatsapp" data-link="cKA_6zYq1xw"  >


            <div class="video__thumbnail">
   <img  src="https://img.youtube.com/vi/cKA_6zYq1xw/hqdefault.jpg"
              loading="lazy"

              />
                  </div>
            <div class="video__details">
              <div class="author">

                <img   src="{{asset('dawa_theme/assets/featured.jpg')}}" alt="" />
              </div>
              <div class="title">
                <h3 class="urdu">
                    Difference Between Whatsapp Group and Broadcast List

                </h3>
                <a href=""  style="color: #3f3f3f;">
                    Minhaj-ul-Quran International <i class="fa fa-check-circle" style="
                  font-size: 19px;"></i></a>

                <span>


              </div>
            </div>
          </div>
          <!-- Single Video Ends -->


        </div>
      </div>


    <!-- Main Body Ends -->








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
