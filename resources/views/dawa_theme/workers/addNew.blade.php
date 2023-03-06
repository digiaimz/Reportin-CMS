@extends('layouts.dawa_theme')
{{-- dashboard_active --}}
@section('dashboard_active')
active
@endsection
{{-- dashboard_aria --}}
@section('dashboard_aria') aria-expanded="true" @endsection
{{-- title --}}
@section('title')
Add New Worker
@endsection
{{-- loader --}}
@section('loader')
<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
</div></div></div>
@endsection
{{-- pagelevel_scripts_headers --}}
@section('pagelevel_scripts_headers')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dawa_theme/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('dawa_theme/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('dawa_theme/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dawa_theme/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


@endsection



{{-- pagelevel_scripts_footer --}}
@section('pagelevel_scripts_footer')



    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
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
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dawa_theme/assets/js/scrollspyNav.js')}}"></script>

@endsection
{{-- content --}}
@section('content')






<style>
h4{
    font-size: 16px;
    font-weight: 700;
}
    </style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">








        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">



<div class="shortcode-content">

 <h3 style="font-size:16px;">  Add New Worker | Personal Information  </h3>
 <hr>
 <hr>

<!-----Row Start ----->
<div class="row">

<div class="col col_6_of_12">
	 
    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">Full Name ( مکمل نام )</span>
        </div>
        <input type="text" class="form-control" aria-label="Name(En)" >
      </div>
</div>

<div class="col col_6_of_12">
	 
    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">Father Name ( والد/ خاوند کا نام ) </span>
        </div>
        <input type="text" class="form-control" aria-label="Name(En)" >
      </div>
</div>



</div>
<!-----Row End ----->

<div style="clear:both;"></div><br>

<!-----Row Start ----->
<div class="row">

<div class="col col_6_of_12">

    <div class="input-group input-group  ">
        <div class="input-group-prepend">
          <span class="input-group-text"  >Set New Password ( نیا پاس ورڈ رکھیں ) </span>
        </div>
        <input type="text" class="form-control" aria-label="Name(En)" >
      </div>

 </div>

<div class="col col_6_of_12">

    <div class="input-group input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text"  >WhatsApp Number (وٹس ایپ نمبر)</span>
        </div>
        <input type="text" class="form-control" aria-label="Name(En)"  >
      </div>

 
 </div>

</div>
<!-----Row End ----->

<div style="clear:both;"></div><br>

<!-----Row Start ----->
<div class="row">

<div class="col col_6_of_12">
<label for="c_website" style="font-weight:600;" class="req"> Forum ( فورم ) </label>
	<select class="form-control select2" id="txt_Forum" name="txt_Forum" tabindex="5" autocomplete="off" required="">
		<option value="">Select Forum</option><option value="1">TMQ - Tehreek Minhaj-ul-Quran</option><option value="2">MWL - Minhaj-ul-Quran Woman League</option><option value="3">MYL - Minhaj-ul-Quran Youth League</option><option value="4">MUC  - Minhaj-ul-Quran Ulama Council</option><option value="5">MSM - Mustafvi Students Movement</option><option value="6">PAT - Pakistan Awami Tehreek</option>
	</select>
</div>


<div class="col col_6_of_12">
<label for="c_website" style="font-weight:600;" class="req"> District ( ضلع )</label>
	<select class="form-control select2" id="txt_District" name="txt_District" tabindex="6" autocomplete="off" required="" onchange="get_TehsilsbyDistrict(this.value)">
		<option value="">Select District</option><option value="180">بہاولنگر۔B - 	BAHAWALNAGAR B </option><option value="57">ایبٹ آباد - ABBOTTABAD </option><option value="131">استور - ASTOR </option><option value="1">اٹک - Attock </option><option value="155">اورکزئی ایجنسی - AURAKZAI AGENCY </option><option value="141">آواران - AWARAN </option><option value="35">بدین - BADEEN </option><option value="109">باغ - BAGH (A.K) </option><option value="178">بہاولپور ۔B - Bahalwalpur B </option><option value="179">بہاولپور ۔C - Bahalwalpur C </option><option value="2">بہاولنگر - BAHAWALNAGAR </option><option value="181">بہاولنگر۔C - BAHAWALNAGAR  C </option><option value="174">بہاولنگر-سی - BAHAWALNAGAR -c </option><option value="173">بہاولنگر- اے - BAHAWALNAGAR-A </option><option value="3">بہاولپور- اے - BAHAWALPUR- A </option><option value="171">بہاولپور بی - BAHAWALPUR- B </option><option value="172">بہاولپور -سی - BAHAWALPUR- C </option><option value="154">باجوڑ ایجنسی - BAJOR AGENCY </option><option value="58">بنوں - BANNU </option><option value="82">بارکھان - BARKHAN </option><option value="59">بٹگرام - BATGARAM </option><option value="4">بھکر - BHAKKAR </option><option value="110">بھمبر - BHIMBER (A.K) </option><option value="83">بولان - BOLAN </option><option value="60">بونیر - BUNER </option><option value="84">چاغی - CHAGHI </option><option value="5">چکوال - CHAKWAL </option><option value="61">چارسدہ - CHARSADAH </option><option value="133">چنیوٹ - CHINYOT </option><option value="62">چترال - CHITRAL </option><option value="6">ڈیرہ غازی خان - D.G.KHAN </option><option value="63">ڈیرہ اسماعیل خان - D.I.KHAN </option><option value="36">دادو - DADU </option><option value="70">دیر پائیں - DEER LOWER </option><option value="80">دیر بالا - DEER UPPER </option><option value="85">ڈیرہ بگٹی - DERA BUGTI </option><option value="122">دیامر - DIAMER </option><option value="156">دکی - DUKKI </option><option value="7">فیصل آباد - FAISALABAD </option><option value="123">گانچھے - GANKCHHE </option><option value="86">گوادر - GAWADAR </option><option value="124">غذر - GHIZER </option><option value="37">گھوٹکی - GHOTKI </option><option value="116">گلگت - GILGIT </option><option value="8">گوجرانولہ - GUJRANWALA </option><option value="9">گجرات - GUJRAT </option><option value="10">حافظ آباد - HAFIZABAD </option><option value="64">ہنگو - HANGU </option><option value="65">ہری پور - HARIPUR </option><option value="142">ہرنائی - HARNAI </option><option value="138">ہٹیاں بالا - HATTIAN BALA </option><option value="145">حویلی - HAVELI </option><option value="118">ہنزہ - HUNZA </option><option value="38">حیدر آباد - HYDERABAD </option><option value="11">اسلام آباد - ISLAMABAD </option><option value="39">جیکب آباد - JACOBABAD </option><option value="87">جعفرآباد - JAFFARABAD </option><option value="150">جڑانوالہ - JAHRAWALA </option><option value="40">جامشورو - JAMSHORO </option><option value="88">جھل مگسی - JHAL MAGSI </option><option value="12">جھنگ - JHANG </option><option value="13">جہلم - JHELUM </option><option value="41">کراچی - KARACHI </option><option value="66">کرک - KARAK </option><option value="42">کشمور - KASHMORE </option><option value="14">قصور-اے - KASUR-A </option><option value="165">قصور-بی - KASUR-B </option><option value="43">خیرپور میرس - KHAIRPUR MIRUS </option><option value="15">خانیوال-اے - KHANEWAL-A </option><option value="167">خانیوال-بی - KHANEWAL-B </option><option value="91">خاران - KHARAN </option><option value="137">خرمنگ - KHARMANG </option><option value="125">خیبر ایجنسی - KHAYBER AGENCY </option><option value="16">خوشاب - KHUSHAB </option><option value="92">خضدار - KHUZDAR </option><option value="67">کوہاٹ - KOHAT </option><option value="93">کوہلو - KOHLU </option><option value="111">کوٹلی - KOTLI (A.K) </option><option value="152">قرم ایجنسی - KURRAM AGENCY </option><option value="160">لاہور-1 - Lahore-1 </option><option value="161">لاہور-2 - Lahore-2 </option><option value="162">لاہور-3 - Lahore-3 </option><option value="163">لاہور-4 - Lahore-4 </option><option value="164">لاہور-5 - Lahore-5 </option><option value="17">لاہور-6 - Lahore-6 </option><option value="69">لکی مروت - LAKKI MARWAT </option><option value="44">لاڑکانہ - LARKANA </option><option value="94">لسبیلہ - LASBELA </option><option value="18">لیہ - LAYYAH </option><option value="148">لہڑی - LEHRI </option><option value="19">لودھراں - LODHRAN </option><option value="95">لورالائی - LORALAI </option><option value="139">لوئر کوہستان - LOWER KOHISTAN </option><option value="20">منڈی بہاؤالدین - M.B.DIN </option><option value="71">مالاکنڈ - MALAKAND </option><option value="72">مانسہرہ - MANSEHRA </option><option value="73">مردان - MARDAN </option><option value="96">مستونگ - MASTUNG </option><option value="45">مٹیاری - MATYARI </option><option value="121">میانوالی - MIANWALI </option><option value="112">میرپور - MIRPUR (A.K) </option><option value="182">میر پور خاص - Mirpur khas </option><option value="46">میرپور خاص - MIRPURKHAS </option><option value="153">مہمند ایجنسی - MOHMAND AGENCY </option><option value="21">ملتان-اے - MULTAN-A </option><option value="168">ملتان-بی - MULTAN-B </option><option value="169">ملتان-سی شجاع آباد - MULTAN-C Shujaabad </option><option value="97">موسیٰ خیل - MUSA KHEL </option><option value="113">مظفرآباد - MUZAFFARABAD </option><option value="22">مظفر گڑھ - MUZAFFARGARH </option><option value="119">نگر - NAGAR </option><option value="23">ننکانہ - NANKANA </option><option value="24">نارووال - NAROWAL </option><option value="98">نصیر آباد - NASEERABAD </option><option value="74">نوشہرہ - NAUSHEHRAH </option><option value="48">نواب شاہ  - NAWAB SHAH  </option><option value="132">نیلم - NEELAM </option><option value="151">نارتھ وزیرستان - NORTH WAZIRASTAN </option><option value="47">نوشہرو فیروز  - NOSHEHRO FEROZ </option><option value="99">نوشکی - NOSHKI </option><option value="25">اوکاڑہ - OKARA-A </option><option value="166">اوکاڑہ-بی - OKARA-B </option><option value="26">پاکپتن - PAKPATTAN </option><option value="100">پنجگور - PANJGUR </option><option value="75">پشاور - PESHAWAR </option><option value="101">پشین - PISHIN </option><option value="114">پونچھ - POUNCH (A.K) </option><option value="89">قلات - QALAT </option><option value="102">قلعہ عبداللہ - QALLA ABDULLAH </option><option value="103">قلعہ سیف للہ  - QALLA SAIFULLAH </option><option value="49">قمبر شہداد کوٹ - QAMBER SHEHDAD KOT </option><option value="104">کوئٹہ - QUETTA </option><option value="176">Rahim Yar Khan B - Rahim Yar Khan B </option><option value="177">Rahim Yar Khan C - Rahim Yar Khan C </option><option value="27">رحیم یارخان - RAHIMYAR KHAN </option><option value="28">راجن پور - RAJANPUR </option><option value="29">راولپنڈی - RAWALPINDI </option><option value="30">ساہیوال - SAHIWAL </option><option value="157">سجاول - SAJAWAL </option><option value="52">سکھر - SAKKAR </option><option value="50">سانگھڑ - SANGHAR </option><option value="120">سرگودھا - SARGODHA </option><option value="77">صوابی - SAWABI </option><option value="78">سوات - SAWAT </option><option value="76">شانگلہ - SHANGLA </option><option value="31">شیخوپورہ - SHEIKHUPURA </option><option value="135">شگر - SHIGAR </option><option value="51">شکار پور - SHIKARPUR </option><option value="143">شیرانی - SHIRANI </option><option value="32">سیالکوٹ - SIALKOT </option><option value="105">سبی - SIBI </option><option value="117">سکردو - SKARDU </option><option value="146">صحبت پور - SOHBAT PUR </option><option value="126">ساؤتھ وزیرستان - SOUTH WAZIRISTAN </option><option value="115">سدھنوتی - SUDHNOTI (A.K) </option><option value="149">سمندری - SUMANDRI </option><option value="33">ٹوبہ ٹیک سنگھ - T.T.SINGH </option><option value="53">ٹنڈو اللہ یار - TANDO ALLAHYAR </option><option value="54">ٹنڈو محمد خان - TANDO MUHAMMAD KHAN </option><option value="79">ٹانک - TANK </option><option value="55">تھرپارکر - THARPARKAR </option><option value="56">ٹھٹھہ - THATTA </option><option value="144">تورغر - TORGHAR </option><option value="90">تربت - Turbat </option><option value="128">عمر کوٹ - UMAR KOT </option><option value="147">اپر کوہستان - Upper Kohistan </option><option value="34">وہاڑی-اے - VEHARI-A </option><option value="170">وہاڑی-بی - VEHARI-B </option><option value="140">واشک - WASHUK </option><option value="106">ژوب - ZHOB </option><option value="107">زیارت - ZIARAT </option>
	</select>
</div>


</div>
<!-----Row End ----->

<div style="clear:both;"></div><br>

<!-----Row Start ----->
<div class="row">

<div id="getTehsilsbyDistrict">
<div class="col col_6_of_12">
 
    <label for="c_website" style="font-weight:600;" class="req"> (تحصیل / صوبائی حلقہ) Tehsil / Provincial Halaqa</label>
	<select class="form-control select2" id="txt_District" name="txt_District" tabindex="6" autocomplete="off" required="" onchange="get_TehsilsbyDistrict(this.value)">
		<option value="">Select Tehsil</option><option value="180">بہاولنگر۔B - 	BAHAWALNAGAR B </option><option value="57">ایبٹ آباد - ABBOTTABAD </option><option value="131">استور - ASTOR </option><option value="1">اٹک - Attock </option><option value="155">اورکزئی ایجنسی - AURAKZAI AGENCY </option><option value="141">آواران - AWARAN </option><option value="35">بدین - BADEEN </option><option value="109">باغ - BAGH (A.K) </option><option value="178">بہاولپور ۔B - Bahalwalpur B </option><option value="179">بہاولپور ۔C - Bahalwalpur C </option><option value="2">بہاولنگر - BAHAWALNAGAR </option><option value="181">بہاولنگر۔C - BAHAWALNAGAR  C </option><option value="174">بہاولنگر-سی - BAHAWALNAGAR -c </option><option value="173">بہاولنگر- اے - BAHAWALNAGAR-A </option><option value="3">بہاولپور- اے - BAHAWALPUR- A </option><option value="171">بہاولپور بی - BAHAWALPUR- B </option><option value="172">بہاولپور -سی - BAHAWALPUR- C </option><option value="154">باجوڑ ایجنسی - BAJOR AGENCY </option><option value="58">بنوں - BANNU </option><option value="82">بارکھان - BARKHAN </option><option value="59">بٹگرام - BATGARAM </option><option value="4">بھکر - BHAKKAR </option><option value="110">بھمبر - BHIMBER (A.K) </option><option value="83">بولان - BOLAN </option><option value="60">بونیر - BUNER </option><option value="84">چاغی - CHAGHI </option><option value="5">چکوال - CHAKWAL </option><option value="61">چارسدہ - CHARSADAH </option><option value="133">چنیوٹ - CHINYOT </option><option value="62">چترال - CHITRAL </option><option value="6">ڈیرہ غازی خان - D.G.KHAN </option><option value="63">ڈیرہ اسماعیل خان - D.I.KHAN </option><option value="36">دادو - DADU </option><option value="70">دیر پائیں - DEER LOWER </option><option value="80">دیر بالا - DEER UPPER </option><option value="85">ڈیرہ بگٹی - DERA BUGTI </option><option value="122">دیامر - DIAMER </option><option value="156">دکی - DUKKI </option><option value="7">فیصل آباد - FAISALABAD </option><option value="123">گانچھے - GANKCHHE </option><option value="86">گوادر - GAWADAR </option><option value="124">غذر - GHIZER </option><option value="37">گھوٹکی - GHOTKI </option><option value="116">گلگت - GILGIT </option><option value="8">گوجرانولہ - GUJRANWALA </option><option value="9">گجرات - GUJRAT </option><option value="10">حافظ آباد - HAFIZABAD </option><option value="64">ہنگو - HANGU </option><option value="65">ہری پور - HARIPUR </option><option value="142">ہرنائی - HARNAI </option><option value="138">ہٹیاں بالا - HATTIAN BALA </option><option value="145">حویلی - HAVELI </option><option value="118">ہنزہ - HUNZA </option><option value="38">حیدر آباد - HYDERABAD </option><option value="11">اسلام آباد - ISLAMABAD </option><option value="39">جیکب آباد - JACOBABAD </option><option value="87">جعفرآباد - JAFFARABAD </option><option value="150">جڑانوالہ - JAHRAWALA </option><option value="40">جامشورو - JAMSHORO </option><option value="88">جھل مگسی - JHAL MAGSI </option><option value="12">جھنگ - JHANG </option><option value="13">جہلم - JHELUM </option><option value="41">کراچی - KARACHI </option><option value="66">کرک - KARAK </option><option value="42">کشمور - KASHMORE </option><option value="14">قصور-اے - KASUR-A </option><option value="165">قصور-بی - KASUR-B </option><option value="43">خیرپور میرس - KHAIRPUR MIRUS </option><option value="15">خانیوال-اے - KHANEWAL-A </option><option value="167">خانیوال-بی - KHANEWAL-B </option><option value="91">خاران - KHARAN </option><option value="137">خرمنگ - KHARMANG </option><option value="125">خیبر ایجنسی - KHAYBER AGENCY </option><option value="16">خوشاب - KHUSHAB </option><option value="92">خضدار - KHUZDAR </option><option value="67">کوہاٹ - KOHAT </option><option value="93">کوہلو - KOHLU </option><option value="111">کوٹلی - KOTLI (A.K) </option><option value="152">قرم ایجنسی - KURRAM AGENCY </option><option value="160">لاہور-1 - Lahore-1 </option><option value="161">لاہور-2 - Lahore-2 </option><option value="162">لاہور-3 - Lahore-3 </option><option value="163">لاہور-4 - Lahore-4 </option><option value="164">لاہور-5 - Lahore-5 </option><option value="17">لاہور-6 - Lahore-6 </option><option value="69">لکی مروت - LAKKI MARWAT </option><option value="44">لاڑکانہ - LARKANA </option><option value="94">لسبیلہ - LASBELA </option><option value="18">لیہ - LAYYAH </option><option value="148">لہڑی - LEHRI </option><option value="19">لودھراں - LODHRAN </option><option value="95">لورالائی - LORALAI </option><option value="139">لوئر کوہستان - LOWER KOHISTAN </option><option value="20">منڈی بہاؤالدین - M.B.DIN </option><option value="71">مالاکنڈ - MALAKAND </option><option value="72">مانسہرہ - MANSEHRA </option><option value="73">مردان - MARDAN </option><option value="96">مستونگ - MASTUNG </option><option value="45">مٹیاری - MATYARI </option><option value="121">میانوالی - MIANWALI </option><option value="112">میرپور - MIRPUR (A.K) </option><option value="182">میر پور خاص - Mirpur khas </option><option value="46">میرپور خاص - MIRPURKHAS </option><option value="153">مہمند ایجنسی - MOHMAND AGENCY </option><option value="21">ملتان-اے - MULTAN-A </option><option value="168">ملتان-بی - MULTAN-B </option><option value="169">ملتان-سی شجاع آباد - MULTAN-C Shujaabad </option><option value="97">موسیٰ خیل - MUSA KHEL </option><option value="113">مظفرآباد - MUZAFFARABAD </option><option value="22">مظفر گڑھ - MUZAFFARGARH </option><option value="119">نگر - NAGAR </option><option value="23">ننکانہ - NANKANA </option><option value="24">نارووال - NAROWAL </option><option value="98">نصیر آباد - NASEERABAD </option><option value="74">نوشہرہ - NAUSHEHRAH </option><option value="48">نواب شاہ  - NAWAB SHAH  </option><option value="132">نیلم - NEELAM </option><option value="151">نارتھ وزیرستان - NORTH WAZIRASTAN </option><option value="47">نوشہرو فیروز  - NOSHEHRO FEROZ </option><option value="99">نوشکی - NOSHKI </option><option value="25">اوکاڑہ - OKARA-A </option><option value="166">اوکاڑہ-بی - OKARA-B </option><option value="26">پاکپتن - PAKPATTAN </option><option value="100">پنجگور - PANJGUR </option><option value="75">پشاور - PESHAWAR </option><option value="101">پشین - PISHIN </option><option value="114">پونچھ - POUNCH (A.K) </option><option value="89">قلات - QALAT </option><option value="102">قلعہ عبداللہ - QALLA ABDULLAH </option><option value="103">قلعہ سیف للہ  - QALLA SAIFULLAH </option><option value="49">قمبر شہداد کوٹ - QAMBER SHEHDAD KOT </option><option value="104">کوئٹہ - QUETTA </option><option value="176">Rahim Yar Khan B - Rahim Yar Khan B </option><option value="177">Rahim Yar Khan C - Rahim Yar Khan C </option><option value="27">رحیم یارخان - RAHIMYAR KHAN </option><option value="28">راجن پور - RAJANPUR </option><option value="29">راولپنڈی - RAWALPINDI </option><option value="30">ساہیوال - SAHIWAL </option><option value="157">سجاول - SAJAWAL </option><option value="52">سکھر - SAKKAR </option><option value="50">سانگھڑ - SANGHAR </option><option value="120">سرگودھا - SARGODHA </option><option value="77">صوابی - SAWABI </option><option value="78">سوات - SAWAT </option><option value="76">شانگلہ - SHANGLA </option><option value="31">شیخوپورہ - SHEIKHUPURA </option><option value="135">شگر - SHIGAR </option><option value="51">شکار پور - SHIKARPUR </option><option value="143">شیرانی - SHIRANI </option><option value="32">سیالکوٹ - SIALKOT </option><option value="105">سبی - SIBI </option><option value="117">سکردو - SKARDU </option><option value="146">صحبت پور - SOHBAT PUR </option><option value="126">ساؤتھ وزیرستان - SOUTH WAZIRISTAN </option><option value="115">سدھنوتی - SUDHNOTI (A.K) </option><option value="149">سمندری - SUMANDRI </option><option value="33">ٹوبہ ٹیک سنگھ - T.T.SINGH </option><option value="53">ٹنڈو اللہ یار - TANDO ALLAHYAR </option><option value="54">ٹنڈو محمد خان - TANDO MUHAMMAD KHAN </option><option value="79">ٹانک - TANK </option><option value="55">تھرپارکر - THARPARKAR </option><option value="56">ٹھٹھہ - THATTA </option><option value="144">تورغر - TORGHAR </option><option value="90">تربت - Turbat </option><option value="128">عمر کوٹ - UMAR KOT </option><option value="147">اپر کوہستان - Upper Kohistan </option><option value="34">وہاڑی-اے - VEHARI-A </option><option value="170">وہاڑی-بی - VEHARI-B </option><option value="140">واشک - WASHUK </option><option value="106">ژوب - ZHOB </option><option value="107">زیارت - ZIARAT </option>
	</select>
</div></div>

</div>
<!-----Row End ----->


<div style="clear:both;"></div> 

<!-----Row Start ----->

<!-----Row End ----->

<div style="clear:both;"></div> 

<div class="row" align="center">
	<div class="col col_12_of_12">
		<input type="submit" class="btn btn-success" id="submit_registration" name="submit_registration" value="Register" >
	</div>
</div>

<!-----Row End ----->

<!-- Entry title -->


</div>


            </div>
        </div>

    </div>

    </div>










@endsection
