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

$count_user = 0;
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
           $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
           \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
           ->whereIN('id_dist' ,  \App\Helpers\Helper::getLevelIds('District') )
           ->pluck('id')->toArray()
           )->count();


            }
               else
               {
                   $all_users_global = \App\User::whereIN('id_forum' , \App\Helpers\Helper::get_forums_access() )
           ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
           ->count();
$all_wabastagans_global =  \App\Wabastagan::whereIN('user_id' ,
           \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
           ->whereIN('id_mtsl', \App\Helpers\Helper::getLevelIds('Tehsil'))
           ->pluck('id')->toArray()
           )->count();


               }
       }
       else
       {
           $all_users_global =  \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )
           ->count();
// start query optimized
           if(count(\App\Helpers\Helper::get_forums_access()) == 8)
           {
               $all_wabastagans_global = \App\Wabastagan::count();
           }
           else
           {
               $all_wabastagans_global = \App\Wabastagan::whereIN('user_id' ,
               \App\User::whereIN('id_forum' ,  \App\Helpers\Helper::get_forums_access() )->pluck('id')->toArray()
               )
               ->count();

           }
           // end query optimized




       }

       // get workers and wabastagans
       // get workers and wabastagans


       $count_user =  $all_users_global ;
           $count_wabstagans =    $all_wabastagans_global  ;


   ?>
