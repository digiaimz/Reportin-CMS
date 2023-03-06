<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;
use App\BroadcastListCategory;
use Illuminate\Support\Facades\Auth;

class BroadcastListController extends Controller
{
    public function index()
    {
        $District = District::orderBy('dist_name', 'ASC')->get();
        $categories = BroadcastListCategory::where('user_id',Auth::id())->orderBy('ordering', 'ASC')->get();
        $wabastagans = Auth::user()->wabastagans;
        $wabastagans_temp = $wabastagans;


        return view('dawa_theme.broadcast-list.broadcast-list', [
            'Districts'=> $District ,
            'categories'=> $categories ,
            'wabastagans'=> $wabastagans ,
            'total_wabastagan' => count($wabastagans),
            'wabastagans_temp'=>$wabastagans_temp


        ]);
    }
}
