
<div class="user-profile layout-spacing  @if(Auth::user()->user_type == 'worker')  fit_display  @endif">



    <div class="widget widget-activity-two  " style="height: auto;">

        <div class="widget-heading d-flex justify-content-between">
            <h5 class="">My Referral Link:</h5>
            <div>



            </div>
        </div>





        <div class="widget-content" style="display: flow-root;">
            <div  class="clipboard  " id="form_copy"  >
                <form     class="form-horizontal" onclick="myFunctionCopy()">
                    <input type="text"   disabled class="form-control mb-3  " id="input-copy"
                     value="{{route('dawati.form.view')}}/{{auth::user()->reffer_code}}" />


                    <a id="button_copy" class="mb-2   btn btn-primary"  onclick="myFunctionCopy()"   >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        Copy to Clipboard</a>


                        <div id="msg_copy" style="   display:none; color: green;" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                          Copied to Clipboard Successfully.
                        </div>




                </form>



            </div>



            <?php
          $message = urlencode("*Assalaamo Alaikum,*

".ucwords(strtolower(auth()->user()->name))." invited you to become a Mustafvi Worker to spread the message of Islam.

Please register yourself at
".route('dawati.form.view')."/".auth::user()->reffer_code);
            ?>
            <a id="mobile_referral_share_link"   href="whatsapp://send?text={!!$message!!}" data-action="share/whatsapp/share">
            <img style=" max-width: 95px;
            float: right;
            margin-top: -41px;"  src="{{asset('share-button/whatsapp-share-button.svg')}}" />


            </a>
            <a  id="web_referral_share_link"  target="_blank" href="https://web.whatsapp.com/send?phone&text={!!$message!!}" data-action="share/whatsapp/share">
                 <img style=" max-width: 95px;
                 float: right;
                 margin-top: -41px;"  src="{{asset('share-button/whatsapp-share-button.svg')}}" />    </a>


<style>


#web_referral_share_link {
        display: none;
        }
          #mobile_referral_share_link {
        display: block;
        }
      @media screen and (min-width: 580px) {
          #web_referral_share_link {
        display: block;
        }
          #mobile_referral_share_link {
        display: none;
        }
      }
      </style>



        </div>

    </div>


</div>

<script>
    let   myInterval_copy = null;
    var time_copy = 5;

    function myTimer() {


         if(time_copy < 1)
         {

            time_copy = 5;
            clearInterval(myInterval_copy);
            clearInterval(myInterval_copy);
            clearInterval(myInterval_copy);
            clearInterval(myInterval_copy);
            clearInterval(myInterval_copy);
           $('#msg_copy').hide();
            $('#button_copy').show();
         }
         else{
            time_copy--;
         }

    }


    </script>

 <script>

function startProcessCopy()
{
    $('#button_copy').hide();
    $('#msg_copy').show();
    myInterval_copy = setInterval(myTimer, 1000);
}

function myFunctionCopy() {
  /* Get the text field */
  var copyText = document.getElementById("input-copy");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  startProcessCopy();

}


     </script>

<style>
input[disabled], select[disabled], textarea[disabled], input[readonly], select[readonly], textarea[readonly] {
    cursor: grab;
    background-color: #f1f2f3!important;
    color: #7d7f88;
}
</style>
