<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
      return view('dawa_theme.help.index');
    }
    public function getHelp(Request $request)
    {
        if($request->id =="mobile")
        {
            return response()->json(['status'=>'ok' ,
         'view'=> view('dawa_theme.help.include.mobile-view')->render()]);
        }
        return response()->json(['status'=>'ok' ,
         'view'=> view('dawa_theme.help.include.web-view')->render()]);
    //   return view('dawa_theme.help.index');
    }
}
