@extends('layouts.dawa_theme')
@section('dashboard_active')
active
@endsection
@section('dashboard_aria') aria-expanded="true" @endsection

@section('title')
My-Profile
@endsection
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
@section('pagelevel_scripts_headers')
  <link href="{{asset('dawa_theme/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/assets/css/widgets/modules-widgets.css')}}" >

  @endsection

@section('pagelevel_scripts_footer')

@endsection
@section('content')
<style>
.col-md-3{
    float:left;
}
.col-md-4{
    float:left;
}
    </style>

<div class="layout-px-spacing">


    <div class="tab-content widget-content widget-content-area"  >
        <div class="tab-pane" id="home">
        <div class="m-l-40">Muhammad Zubair Akhtar Abbas
            <p>zubairakhtar115@gmail.com</p>
            <div class="m-t-20 row">
                <img class="col-md-3 col-xs-12" src="Photos/Admin/MUHAMMAD-ZUBAIR_11.png" alt="">
            </div>
        </div>
        <hr>

        <table class="color-table table-bordered primary-table table table-hover">
        <tbody><tr>
            <th> Sr# </th>
            <th> IP address </th>
            <th> Browser </th>
            <th> Dated </th>
        </tr>
        <tr>
            <td style="text-align:center;">1</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>04:09 pm (about 14 seconds ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">2</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>10:23 am (about 22 days ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">3</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>12:53 pm (about 23 days ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">4</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>04:22 pm (about 28 days ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">5</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>10:47 am (about 28 days ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">6</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>01:12 pm (about 29 days ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">7</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>03:35 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">8</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>10:53 am (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">9</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>12:49 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">10</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome91.0.4472.</td>
            <td>10:54 am (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">11</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>10:42 am (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">12</td>
            <td style="text-align:left;">::1</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>04:47 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">13</td>
            <td style="text-align:left;">72.255.7.133</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>10:53 am (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">14</td>
            <td style="text-align:left;">72.255.51.49</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>04:41 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">15</td>
            <td style="text-align:left;">116.58.42.135</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>04:38 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">16</td>
            <td style="text-align:left;">116.58.42.135</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>03:30 pm (about 1 month ago)</td>
        </tr>
        <tr>
            <td style="text-align:center;">17</td>
            <td style="text-align:left;">72.255.7.133</td>
            <td style="text-align:left;">Google Chrome90.0.4430.</td>
            <td>01:42 pm (about 1 month ago)</td>
        </tr>
        </tbody>
        </table>
        </div>
        <!-----------------Form Start--------------->
        <div class="tab-pane active" id="settings">
            <form class="form-horizontal" action="profile.php?id=11" method="post" id="addNewUsr" enctype="multipart/form-data">

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="req">User ID#</label>
                        <input type="text" class="form-control" id="emply_no" name="emply_no" value="Dawat-10011" placeholder="Enter Number" required="" autocomplete="off" readonly="">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="req"> User Role </label>
                        <select class="form-control" id="emply_type" name="emply_type" style="width:100%" autocomplete="off" required="" readonly=""><option value="1" selected="">Administrator</option><option value="2">Markazi</option><option value="3">Province</option><option value="4">Zone</option><option value="5">Division</option><option value="6">District</option><option value="7">Tehsil</option><option value="8">UC</option><option value="9">Unit</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="req"> WhatsApp# </label>
                        <input type="text" class="form-control" id="emply_username"
                        name="emply_username" value="(323)-488-1706"
                        placeholder="Enter Username" required="" autocomplete="off" readonly="">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> Slug </label>
                        <input type="password" class="form-control" id="emply_userpass"
                         name="emply_userpass" placeholder="Dawat-10011" autocomplete="off" readonly="">
                    </div>
                </div>

        <div style="clear:both;"></div>



            <div class="col-md-4">
                <div class="form-group">
                    <label class="req">Full Name</label>
                    <input type="text" class="form-control" id="emply_fullname" name="emply_fullname" value="Muhammad Zubair " placeholder="Enter Full Name" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="req">Father Name</label>
                    <input type="text" class="form-control" id="emply_fullname" name="emply_fullname" value=" Akhtar Abbas" placeholder="Enter Full Name" required="" autocomplete="off">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label> MemberShip# </label>
                    <input type="text" class="form-control" id="emply_fathername" name="emply_fathername" value="001" placeholder="Enter Father Name" autocomplete="off">
                </div>
            </div>

        <div style="clear:both;"></div>


            <div class="col-md-3">
                <div class="form-group">
                    <label> District </label>
                    <select class="form-control" id="emply_gender" name="emply_gender"
                     style="width:100%" autocomplete="off"><option value="Male"
                     selected="">Chose..</option><option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label> Tehsil </label>
                    <select class="form-control" id="emply_gender" name="emply_gender"
                     style="width:100%" autocomplete="off"><option value="Male"
                     selected="">Chose..</option><option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label> UC </label>
                    <select class="form-control" id="emply_gender" name="emply_gender"
                     style="width:100%" autocomplete="off"><option value="Male"
                     selected="">Chose..</option><option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label> Unit </label>
                    <select class="form-control" id="emply_gender" name="emply_gender"
                     style="width:100%" autocomplete="off"><option value="Male"
                     selected="">Chose..</option><option value="Female">Female</option>
                    </select>
                </div>
            </div>




        <div style="clear:both;"></div>


        <div class="col-md-3">
            <div class="form-group">
                <label> Forum </label>
                <select class="form-control" id="emply_gender" name="emply_gender"
                 style="width:100%" autocomplete="off"><option value="Male"
                 selected="">Chose..</option><option value="Female">Female</option>
                </select>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label> Email </label>
                    <input type="email" class="form-control"
                    id="emply_email" name="emply_email"
                     value="zubairakhtar115@gmail.com" placeholder="Enter Email" autocomplete="off">
                </div>
            </div>


        <div class="col-md-3">
            <div class="form-group">
                <label> Default Dashboard </label>
                <select class="form-control" id="emply_gender" name="emply_gender"
                 style="width:100%" autocomplete="off"><option value="Male"
                 selected="">Chose..</option><option value="Female">Female</option>
                </select>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label style="font-weight:700;"> Photo  </label>
                    <input type="file" class="form-control" id="emply_photo" name="emply_photo" autocomplete="off">
                </div>
            </div>

        <div style="clear:both;"></div>




            <div class="form-actions" align="center" style="margin-top:50px;">
                <a href="administrators.php" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes"> <i class="fa fa-check"></i> Update Profile </button>
            </div>



            </form>
        </div>
        <!-----------------Form Start--------------->
        </div>


    {{-- <h1>
        <a href="" class="typewrite" data-period="2000"
        data-type='[ "یہ پیج ترقی پذیر ہے۔ برائے مہربانی بعد میں واپس آجائیں۔  ",
        "This Page is Under Development. Please Come Back Later.", "یہ پیج ترقی پذیر ہے۔ برائے مہربانی بعد میں واپس آجائیں۔", "Hi, This Page is Under Development." ]'>
          <span class="wrap"></span>
        </a>
      </h1> --}}
<script>

var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };

    </script>



    <div hidden class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Info</h3>
                        <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="text-center user-info">
                        <img src="{{asset('dawa_theme/assets/img/user.png')}}" alt="avatar">
                        <p class="">{{Auth::user()->name}}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">

                                <li class="contacts-block__item">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        Jimmy@gmail.com
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    +92(323)4881-706
                                </li>
                                <li class="contacts-block__item">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="work-experience layout-spacing ">

                <div class="widget-content widget-content-area">

                    <h3 class="">Designation History </h3>

                    <div class="timeline-alter">

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">04 Mar 2009</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Netfilx Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">25 Apr 2014</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Google Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">04 Apr 2018</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Design Reset Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="work-experience layout-spacing ">

                <div class="widget-content widget-content-area">

                    <h3 class="">Activity Logs </h3>

                    <div class="timeline-alter">

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">04 Mar 2009</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Netfilx Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">25 Apr 2014</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Google Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">04 Apr 2018</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Design Reset Inc.</p>
                                <p>Designer Illustrator</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">






            <div class="bio layout-spacing ">
                <div
                style="    padding: 30px;"
                class="widget-content widget-content-area widget widget-account-invoice-one">


                    <div class="">

                        <div class="widget-heading">
                            <h5 class="">Account Info</h5>
                            {{-- user access level --}}
{{-- user access level --}}

<b style="font-weight: 700;color:black;">Access Level:</b>

<ul style="list-style-type:none;" id="myUL">
    <li><span class="caret">Punjab</span>
      <ul class="nested">
        <li>Lahore</li>
        <li>Gujrawala</li>
        <li><span class="caret">ABC</span>
          <ul class="nested">
            <li>Thehsil One</li>
            <li>Tehsil Two</li>
            <li><span class="caret">UC One</span>
              <ul class="nested">
                <li>Unit One</li>
                <li>Unit Two</li>
                <li>Unit Three</li>
                <li>Unit Four</li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>


{{-- user access level --}}
{{-- user access level --}}

                        </div>

                        <div class="widget-content">
                            <div class="invoice-box">

                                <div class="acc-total-info">
                                    <h5></h5>
                                    <p style="color:#009688"> </p>
                                </div>

                                <div class="inv-detail">
                                    <div class="info-detail-1">
                                        <p>User Name:</p>
                                        <p>Muhammad Zubair</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Father Name:</p>
                                        <p>Akhtar Abbas</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>CNIC:</p>
                                        <p>35202-0887605-7</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Blood Group:</p>
                                        <p>B+</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>User Name:</p>
                                        <p>zubair327</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>DOB:</p>
                                        <p>12-May-1998</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Join Date:</p>
                                        <p>1-june-2021</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Country:</p>
                                        <p>Pakistan</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>City:</p>
                                        <p>Lahore</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>District:</p>
                                        <p>Punjab</p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Forum:</p>
                                        <p>MIB</p>
                                    </div>

                                    <div class="info-detail-2">
                                        <p>Status:</p>
                                        <p>Active</p>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>













                    <h3 class="">Postal Address</h3>

                    <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>

                    <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula scelerisque vulputate.</p>
                    <h3 class="">Remarks</h3>

                    <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>

                    <p>By : Mr Zubair</p>


<br>
<br>
                </div>
            </div>

        </div>




    </div>
    </div>


@endsection
