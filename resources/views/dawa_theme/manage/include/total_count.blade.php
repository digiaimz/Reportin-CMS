  <div class="row analytics">

   <?php

        $date_range = \Carbon\Carbon::now()->subDays(7)->format('d-M-Y')." to ".\Carbon\Carbon::now()->subDays(1)->format('d-M-Y') ;

    ?>


    <link  href="{{asset('dawa_theme/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dawa_theme/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">

<style>
    .flatpickr-input[readonly] {
    cursor: pointer;

    background-color: #f1f2f3!important;
    color: #2f2f2f;
}
.form-group label, label {
    font-size: 15px;
    color: #878b9c;
    letter-spacing: 1px;
}

</style>


    <div  id="regdiv" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" @cannot('View-Daily-Registration')
                hidden
    @endcannot>

    @include('dawa_theme.manage.include.include.registration'  , ['is_page'=>$is_page])
    <script>  var dates = []; </script>

    @include('dawa_theme.manage.include.chart.worker_registration' , ['is_page'=>$is_page] )

    <style>
    .widget-five .w-content {
    text-align: center;
    height: 100%;
    padding: 5px;
}
    </style>

    </div>

</div>



<script src="{{asset('dawa_theme/plugins/flatpickr/flatpickr.js')}}"></script>

<script>
$(document).ready(function(){

    var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range",
    dateFormat: "d-M-Y",
});
});

</script>






