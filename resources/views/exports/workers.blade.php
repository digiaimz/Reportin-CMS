<table id="table-worker" class="table table-hover non-hover cell-border  display responsive nowrap" style="width:100%">
    <thead>
        <tr  >
            <th style="   text-align: center;">Sr#</th>
            <th>Date / Time</th>
            <th>Name</th>

            <th>Forum</th>
            <th>Zone</th>
            <th>District</th>
            <th>Tehsil</th>
            <th>WhatsApp</th>
            <th>Email</th>
            <th>@lang('Listed')</th>
            <th>@lang('Referral')</th>
            <th>@lang('Promoted')</th>
            <th>@lang('Clips Views')</th>



        </tr>

    </thead>

    <tbody  >




        @foreach ($users as $user )




             <tr   >
            <td style="   text-align: center;">{{$count}}</td>
            <td> {{\Carbon\Carbon::parse($user->created_at)->format('d-M-Y')}}  <br /> <span>
                {{\Carbon\Carbon::parse($user->created_at)->format('H:i:s')}}</span></td>
            <td>
                               <div class="user-meta-info name-img"  >
                                   <span class="user-name" user-name=" ">

                                 @if(trim($user->name) != '')
                                    {{$user->name }}
                                   @else
                                   {{"N/A"}}
                                   @endif
                               </span>  </div>
        </td>

            <td>
               <span class="user-forum"  >

                                @if(trim($user->forum) != null)
                              {{ $user->forum->frm_code  }}
                              @else
                              {{ "N/A" }}
                              @endif
                           </span>
                        </td>
                        <td>
                            @if(trim($user->district) != null)
                            {{ $user->district->zone->zone_name  }}
                            @else
                            {{ "N/A" }}
                            @endif

                        </td>
            <td>
                @if(trim($user->district) != null)
                {{ $user->district->dist_name  }}
                @else
                {{ "N/A" }}
                @endif

            </td>
            <td>@if(trim($user->tehsil) != null)
                {{ $user->tehsil->tsl_name  }}
                @else
                {{ "N/A" }}
                @endif</td>
            <td>@if(trim($user->whatsapp) != null)
                {{ $user->whatsapp  }}
                @else
                {{ "N/A" }}
                @endif</td>
            <td>@if(trim($user->email) != null)
                {{ $user->email  }}
                @else
                {{ "N/A" }}
                @endif</td>
            <td>
               <span class="black" style="font-size: 20px;    margin-left: 16px;">


                                   @if($user->wabastagans != null)
                                   {{ count($user->wabastagans) }}
                                   @else
                                   0
                                   @endif
            </td>
            <td> <span class="black" style="font-size: 20px;    margin-left: 16px;">


                                @if($user->added_Workers_by_refferal != null)

                                {{   count($user->added_Workers_by_refferal)   }}
                                @else
                                0
                                @endif

                              </span></td>


            <td> <span class="black" style="font-size: 20px;    margin-left: 16px;">


                @if($user->promoted_Workers != null)
                {{   count($user->promoted_Workers) }}
                               @else
                               0
                               @endif

                            </span> </td>
            <td>  <span class="black" style="font-size: 20px;    margin-left: 16px;">

                              @if($user->clips_views != null)

                           {{  count($user->clips_views->groupBy('clip_id')) }}
                           @else
                            0
                            @endif
                              </span>



        </tr>
        <?php
         $count++;
        ?>
        @endforeach

    </tbody>

</table>
