<?php

namespace App\Http\Controllers\Wabastagan;

use App\CDR;
use App\User;
use App\Complain;
use App\Wabastagan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendResponseRequest;

class ManageComplain extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cdr_report(Request $request)
    { 
        return view('dawa_theme.complain.list'  );

    } 


  



    public function getCdrData(Request $request)
    {
        $columns = ['calldate', 'dcontext', 'src', 'dst', 'duration', 'disposition', 'recordingfile'];
    
        $cdrData = CDR::select($columns)
        ->when($request->dcontext, function ($query, $dcontext) {
            if ($dcontext === 'from-trunk') {
                return $query->where('dcontext', '=', 'from-trunk');
            } else {
                return $query->where('dcontext', '!=', 'from-trunk');
            }
        })
        ->when($request->src, function ($query, $src) {
            return $query->where('src', 'like', '%'.$src.'%');
        })
        ->when($request->dst, function ($query, $dst) {
            return $query->where('dst', 'like', '%'.$dst.'%');
        })
        ->when($request->duration, function ($query, $duration) {
            return $query->where('duration', 'like', '%'.$duration.'%');
        })
        ->when($request->disposition, function ($query, $disposition) {
            return $query->where('disposition', 'like', '%'.$disposition.'%');
        })
        ->when($request->recordingfile, function ($query, $recordingfile) {
            return $query->where('recordingfile', 'like', '%'.$recordingfile.'%');
        })
        ->when($request->start_date && $request->end_date, function ($query) use ($request) {
            $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
            return $query->whereBetween('calldate', [$start_date, $end_date]);
        })
        ->orderBy($request->columns[$request->order[0]['column']]['data'], $request->order[0]['dir'])
        ->paginate($request->length, ['*'], 'page', $request->start / $request->length + 1);
    
 
    
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $cdrData->total(),
            'recordsFiltered' => $cdrData->total(),
            'data' => $cdrData->items(),
        ]);
    }





    





    
    public function getNotifications(Request $request)
    {

$requests = Auth::user()->received_requests;

 $notifications =  auth::user()->unreadNotifications ;



        return response()->json([
            'status'=>'ok',
            'total_request'=>count($requests),
            'total_notify'=>count($notifications),
         'view'=> view('dawa_theme.header.inner')->render()
    ]);
    }
    public function markAsRead(Request $request)
    {
        DB::table('notifications')->where('notifiable_id',Auth::id())->delete();
        return response()->json(['status'=>'worker'  ]);

    }
    public function complain(Request $request)
    {
        if($request->button == "allow")
        {
            $complain =Complain::find($request->request_id);
            if($complain != null)
            {

                $invity = Wabastagan::find($complain->wabastagan_id);
                $invity->user_id = $complain->from_user ; // new assign
                $invity->created_at = now() ;
                $invity->updated_at = now() ;
                $invity->categories = null ;
                $invity->save() ;

                $complain->is_resolved = 1;
                $complain->solve_by = Auth::id();
                $complain->save();
                $user = User::find($complain->from_user);

                $user->notify(new SendResponseRequest($complain->id));
                return response()->json(['status'=>"allow"]);



            }

        }
        else if($request->button == "cancel")
        {
            $complain =Complain::find($request->request_id);
            if($complain != null)
            {
                $complain->is_resolved = -1;
                $complain->solve_by = Auth::id();
                $complain->save();
                $user = User::find($complain->from_user);

                $user->notify(new SendResponseRequest($complain->id));
                return response()->json(['status'=>"cancel"]);
            }


        }
        return response()->json(['status'=>"error"]);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
