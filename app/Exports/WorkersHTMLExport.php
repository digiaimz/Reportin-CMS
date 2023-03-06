<?php

namespace App\Exports;

use App\User;
use App\Helpers\Helper;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;

class WorkersHTMLExport implements FromView , Responsable
{


    use Exportable;

    private $fileName = ' Workers.html';

    private $writerType = Excel::HTML;


    protected $id_dist;

    public function __construct($id_dist) {
        $this->id_dist = $id_dist;
     }


    public function view(): View
    {

        if (! Gate::allows('view-worker')) {
            abort(403);
        }
        if(!Auth::user()->is_designation_active  == 1 )
        {
            abort(403);
        }
        if(Auth::user()->user_type  != "staff" )
        {
            abort(403);
        }

            ini_set('memory_limit', '7024M');
            $users = null;


        // because every staff member is a forum level user



        if($this->id_dist !=  null &&   $this->id_dist != "all" )
        {
            $dist_id = -6;

            if(in_array($this->id_dist ,  Helper::getLevelIds('District')))
            {
                $dist_id = $this->id_dist;
            }

            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
            'wabastagans' , 'promoted_Workers'
            , 'added_Workers_by_refferal' , 'clips_views')
           ->whereIN('id_forum' , Helper::get_forums_access() )
           ->where('id_dist' ,  $dist_id )
           ->orderBy('id', 'DESC')
           ->latest()
           ->get();

        }

else{


        if(Helper::is_limted_user()=="yes")
        {
            if(
                Auth::user()->access_type == "District"
               || Auth::user()->access_type == "Zone"
                )
                {

            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
             'wabastagans' , 'promoted_Workers'
             , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->whereIN('id_dist' ,  Helper::getLevelIds('District') )
            ->orderBy('id', 'DESC')
            ->latest()
            ->get();
                }
                else
                {

                    $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
                     'wabastagans' , 'promoted_Workers'
                     , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->whereIN('id_mtsl' ,  Helper::getLevelIds('Tehsil') )
            ->orderBy('id', 'DESC')
            ->latest()
            ->get();
                }
        }
        else
        {
            $users = User::with('forum' , 'district' , 'district.zone' , 'tehsil' ,
             'wabastagans' , 'promoted_Workers'
             , 'added_Workers_by_refferal' , 'clips_views')
            ->whereIN('id_forum' , Helper::get_forums_access() )
            ->orderBy('id', 'DESC')
            ->latest()
            ->get();
        }

    }




        return view('exports.workers', [
            'users' => $users ,
            'count' => 1
        ]);
    }

}
