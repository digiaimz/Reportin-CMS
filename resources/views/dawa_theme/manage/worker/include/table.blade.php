<style>
.table > tbody > tr > td {
    border: none;
    color: #888ea8;
    font-size: 16px;
    letter-spacing: 0px !important;
}
.country-custom{
    background-color: rgba(0, 0, 0, 0.05);
    padding: 7px;
    color: black;
    padding-right: 0px;

}
.flag-custom{
    display: inline-block;
}





    </style>

<div class="table-responsive" style="width:100%; ">
    <table  class="table table-hover html5-extension" style="width:100%"   >
        <thead>
            <tr>

                 <th style="width: 15%;">Sr#</th>

                 @if($is_full_page =="no")
                 <th>Name / District</th>
                 @else

                 <th>Name</th>
                   <th>Whatsapp#  </th>
                   <th>District  </th>
                  <th>Tehsil</th>
                 <th>Gender</th>
                 @endif




                <th>Date</th>


            </tr>
        </thead>


        @if(count($wabastagans) > 0)

        <tbody id="myTable" >
             <?php
               $i=1;
             ?>
            @foreach($wabastagans as $wabastagan)
            <tr style="cursor: pointer;" class="edit-wabastahan-row" id={{"list".$i}} data-id ="{{$wabastagan->id}}" >
                <td  style="    width: 15%;"> {{$i}}</td>


 @if($is_full_page =="no")
                <td>  {{$wabastagan->name}} <br>
                    {{-- name --}}

                    <?php $country = json_decode($wabastagan->country );

                    if(!isset($country->iso2)) {

                        $country = json_decode(`{"name":"Invalid (‫پاکستان‬‎)","iso2":"pk","dialCode":"00","priority":0,"areaCodes":null}`);

                    }

                    ?>

                    @if($country->iso2 == "pk")
                    {!! $wabastagan->district!=null ? $wabastagan->district->dist_name : '<span style="color: red;">Please Update</span>' !!}

                    @else
                    <span class="badge badge-default" style="color: black;">Country:</span>
                   {{$country->name}}
                    @endif

                    {{-- district --}}


               </td>
   @else
                 <td>  {{$wabastagan->name}}
                    {{-- name --}}
                </td>
                <td>   <?php $country = json_decode($wabastagan->country );  ?>



                    <span class="country-custom">
                     <div class="iti__flag flag-custom iti__{{ $country->iso2 }} "  ></div>
                      <span style="    vertical-align: top;"> +{{ $country->dialCode }}</span>
                    </span>
                     &nbsp;{{$wabastagan->whatsapp}}

               </td>

             @if($country->iso2 == "pk")
             <td>
                {!! $wabastagan->district!=null ? $wabastagan->district->dist_name : '<span style="color: red;">Please Update</span>' !!}
               </td>
               <td>
                {!! $wabastagan->tehsil!=null ? $wabastagan->tehsil->tsl_name : '<span style="color: red;">Please Update</span>' !!}
                  </td>
             @else
                <td>
                <span class="badge badge-default" style="color: black;">Country:</span>
                 {{$country->name}}
                </td>
                 <td>--- </td>
             @endif
                 <td>   {{$wabastagan->gender}}   </td>
  @endif






                <td>

                    {{  Carbon\Carbon::parse($wabastagan->created_at)->format('d-M') }}
                    <br>
                    {{ \Carbon\Carbon::parse($wabastagan->created_at)->format('H:i:s') }}
                </td>

            </tr>


            <?php
            if ($i==5 && $is_full_page == "no")
                 {
                        break;
                      }
            ?>




            <?php
              $i++;
            ?>
            @endforeach
        </tbody>




        @else
        <tbody>



        </tbody>
        @endif



        <tfoot>
            <tr>
                <th>Sr#</th>

                @if($is_full_page =="no")
                <th>Name / District</th>
                @else
                <th>Name</th>
                 <th>Whatsapp#  </th>
                 <th>District  </th>
                 <th>Tehsil</th>
                <th>Gender</th>
                @endif

                <th>Date</th>

            </tr>
        </tfoot>
    </table>
</div>
