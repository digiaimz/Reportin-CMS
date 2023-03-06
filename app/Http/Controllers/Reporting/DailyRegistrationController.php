<?php

namespace App\Http\Controllers\Reporting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DailyRegistrationController extends Controller
{
    public function index()
    {
        if (! Gate::allows('View-Daily-Registration')) {
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

      return view('dawa_theme.reporting.daily_registration');
    }
}
