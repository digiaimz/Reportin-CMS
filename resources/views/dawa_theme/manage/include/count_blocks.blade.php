{{-- end row  --}}

<div class="row analytics">



    {{-- //php code --}}
    {{-- //php code --}}


    <?php

        $total_designatories = 0;


        if(\App\Helpers\Helper::is_limted_user() == "yes")
            {

                if(
                    Auth::user()->access_type == "District"
                   || Auth::user()->access_type == "Zone"
                    )
                    {

                        $total_designatories = \App\User::has('place_of_designation')
                ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
                ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
                ->count();

                    }
                    else
                    {
                        $total_designatories = \App\User::has('place_of_designation')
                ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
                ->whereIN('id_mtsl' ,  \App\Helpers\Helper::getLevelIds('Tehsil') )
                ->count();


                    }
            }
            else
            {
                $total_designatories = \App\User::has('place_of_designation')
                ->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
                ->count();

            }


    //    $total_designatories = \App\PlaceOfDesignation::count();
    //    $total_designatories = \App\PlaceOfDesignation::whereHas('designation', function ($query) {
    //         $query->whereIN('forum_id',  \App\Helpers\Helper::get_forums_access());
    //     })->count();





        $post_fix = \App\Helpers\Helper::get_forum_name();
            if(\App\Helpers\Helper::is_limted_user()=="yes")
    {
        $post_fix .=  " > ";
                if(Auth::user()->access_type != 'Zone')
                {  $post_fix .= Auth::user()->access_type.": ";
       }
       $post_fix .=\App\Helpers\Helper::get_level_name();
    }


    ?>





    <?php
    $all_users_global = null;
    $all_wabastagans_global = null;
    $all_users_global_active = 0;

    $count_user = 0;
    $active_users = 0;
    $count_wabstagans = 0;
    $extra = "";

    // because every staff member is a forum level user

     // get workers and wabastagans
     // get workers and wabastagans

           if(\App\Helpers\Helper::is_limted_user()=="yes")
           {
               $extra = "  ";
               if(
                   Auth::user()->access_type == "District"
                  || Auth::user()->access_type == "Zone"
                   )
                   {

                       $all_users_global =  \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
               ->count();
            //            $all_users_global_active =  \App\User::has('wabastagans_registration')->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            //    ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
            //    ->count();
               $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
               \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
               ->pluck('id')->toArray()  )->count();

               $all_users_global_active = \App\Wabastagan::distinct()
                   ->whereIN('user_id' ,
               \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
               ->pluck('id')->toArray()  )
                ->count('user_id');

                }
                   else
                   {
                       $all_users_global = \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
               ->count();
            //     $all_users_global_active = \App\User::has('wabastagans_registration')->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
            //    ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
            //    ->count();
    $all_wabastagans_global =  \App\Wabastagan::whereIN('user_id' ,
               \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
               ->pluck('id')->toArray()
               )->count();

               $all_users_global_active = \App\Wabastagan::distinct()
                   ->whereIN('user_id' ,
               \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
               ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
               ->pluck('id')->toArray()
               )
                                 ->count('user_id');

                   }
           }
           else
           {
            $all_users_global = \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )  ->count();
            // $all_users_global_active = \App\User::has('wabastagans_registration')->whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )  ->count();

    // start query optimized
               if(count(\App\Helpers\Helper::get_forums_access()) == 8)
               {
                   $all_wabastagans_global = \App\Wabastagan::count();
                   $all_users_global_active = \App\Wabastagan::distinct()
                                 ->count('user_id');
               }
               else
               {
                //    $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
                //    \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )->pluck('id')->toArray()
                //    )
                //    ->count();
                   $all_wabastagans_global = \App\Wabastagan::whereIN('id_forum_user' ,  \App\Helpers\Helper::get_forums_access() )
                   ->count();
                   $all_users_global_active = \App\Wabastagan::distinct()
                   ->whereIN('id_forum_user' ,  \App\Helpers\Helper::get_forums_access() )
                                 ->count('user_id');

               }
               // end query optimized

           }

           // get workers and wabastagans
           // get workers and wabastagans

           $count_user =  $all_users_global ;
           $active_users =  $all_users_global_active ;
           $count_wabstagans =    $all_wabastagans_global  ;

           // for block link
           $myTeam_link = route('make.my.team');

       ?>


    {{-- //php code --}}
    {{-- //php code --}}

        {{-- Designatories --}}
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
        hidden
            @endcannot>
               @include('dawa_theme.includes.total_widget' ,

               ["en_title" => "Dignitaries" ,
                "ur_title" => $post_fix,
                "total" => $total_designatories,
                "svg" => '
                <svg style="height: 24px;width:24px; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                ',
                 "link" =>  $myTeam_link
               ] )
        </div>


        {{-- Workers  --}}
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
    hidden
        @endcannot>
            @include('dawa_theme.includes.total_widget',

            ["en_title" => "Registered Workers  ".$extra ,
             "ur_title" => $post_fix,
             "total" =>   number_format(  $count_user ),
             "svg" => '       <svg style="height: 24px;width:24px; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 ',
             "link" => route('manage.workers')
            ] )
            </div>


            {{-- extra workers 2 blocks  --}}
            {{-- extra workers 2 blocks  --}}





        {{-- Active Workers  --}}
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
        hidden
            @endcannot>
                @include('dawa_theme.includes.total_widget',

                ["en_title" => "Active Workers  ".$extra ,
                 "ur_title" => $post_fix,
                 "total" =>   number_format(  $active_users ),
                 "svg" => '       <svg style="height: 24px;width:24px; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                     ',
                 "link" => route('manage.workers')
                ] )
                </div>



                @if($active_users == 0)
            {{-- Active Workers Average  --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
        hidden
            @endcannot>
                @include('dawa_theme.includes.total_widget',

                ["en_title" => "Average Active".$extra ,
                 "ur_title" => $post_fix,
                 "total" =>   0,
                 "svg" => '          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                     ',
                 "link" => '#'
                ] )
                </div>
                @else
       {{-- Active Workers Average  --}}
       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
       hidden
           @endcannot>
               @include('dawa_theme.includes.total_widget',

               ["en_title" => "Active Ratio".$extra ,
                "ur_title" => $post_fix,
                "total" =>  number_format(  ( $active_users * 100 ) / $count_user  , 2 )."%",
                "svg" => '          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                    ',
                "link" => '#'
               ] )
               </div>

                @endif







            {{-- extra workers 2 blocks  --}}
            {{-- extra workers 2 blocks  --}}










               {{-- Listed  --}}

               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
               hidden
                   @endcannot>
               @include('dawa_theme.includes.total_widget' ,

               ["en_title" => "Wabasta  ".$extra,
                "ur_title" => $post_fix,
                "total" =>  number_format(  $count_wabstagans )  ,
                "svg" => '
                <svg  style="height: 24px;width:24px; "  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                ',
                "link" => "#"
               ] )
               </div>


               {{-- Average  --}}

               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing fit_display" @cannot('View-Count-Blocks')
               hidden
                   @endcannot>

            @if($count_user == 0)



               @include('dawa_theme.includes.total_widget' ,

               ["en_title" => "Average  ".$extra,
                "ur_title" => $post_fix,
                "total" =>  0,
                "svg" => '
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                ',
                "link" => "#"
               ] )

    @else


    @include('dawa_theme.includes.total_widget' ,

    ["en_title" => "Average  ".$extra,
     "ur_title" => $post_fix,
     "total" =>  number_format( $count_wabstagans / $count_user  , 2 ),
     "svg" => '
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
     ',
     "link" => "#"
    ] )


    @endif

               </div>




      </div>
      {{-- end row --}}




                <style>
                .wid-top{
                    margin-top: 20px;
                }
                </style>








    {{-- end if is_page --}}

