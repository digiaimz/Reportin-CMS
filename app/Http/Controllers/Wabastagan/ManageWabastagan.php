<?php

namespace App\Http\Controllers\Wabastagan;

use App\BroadcastListCategory;
use App\User;
use App\Tehsil;
use App\Complain;
use App\District;
use App\Wabastagan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\InvitedComplain;
use App\Wabastagan_Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ManageWabastagan extends Controller
{

    function getTehsil(Request $request)
{

    $tehsils = Tehsil::where('id_dist' , $request->dist_id)->where('tsl_shown' , 1)->orderBy('tsl_name', 'ASC')->get();

    if(count($tehsils) == 0 )
    {
        return view('dawa_theme.manage.worker.include.tehsil_view_temp');
    }
    else
    {
    return view('dawa_theme.manage.worker.include.tehsil_view' , ['tehsils'=> $tehsils  ])->render();
    }

}




function appendWabastagan(Request $request)
{
    $wabsantagan = Wabastagan::find($request->id);
    if($wabsantagan !=null)
    {
        return response()->json(['status'=>'found' ,'wabsantagan'=> $wabsantagan
    ]);
    }
    return response()->json(['status'=>'not-found' ]);
}
function createNewCategoryForBroadCastList(Request $request)
    {
    $categoryName =trim($request->categoryName);
    if(DB::table('dawa_broadcast_categories')
        ->where('category_name' , $categoryName)
        ->where('user_id' , Auth::id())
        ->count() == 0)
        {
            $category = new BroadcastListCategory();
            $category->category_name =  $categoryName;
            $category->user_id = Auth::id();
            $category->year = date('Y');
             if($category->save())
             {
                 return response()->json(['status'=>'save'
                 , 'id' => $category->cate_id
             ]);

             }
             return response()->json(['status'=>'error']);
        }

      return response()->json(['status'=>'alerady-created']);

    }
function saveNewWabastagan(Request $request)
    {

        $record=null;
        $worker=null;
        $number_match= false;
        // return response()->json(['status'=> $request->countryData]);
        if($request->click_id =="edit-wabastagan")
        {
          $number =  Wabastagan::find((int)$request->wabastagan_id)->whatsapp;

        //   return response()->json(['status'=>$number]);
          if( $request->whatsapp == $number)
          {
            $record = null;
            $worker = null;
            $number_match = true;
          }
          else
          {
            $record = DB::table('wabastagans')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
            $worker = DB::table('users')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
            $number_match = true;
          }

        }



        if($request->click_id =="save-wabastagan")
        {
            $record = DB::table('wabastagans')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
            $worker = DB::table('users')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
        }


if( $worker == null)
{
    if($record == null )
    {

        $name = trim($request->name);
        $District = trim($request->District);
        $Tehsil = trim($request->Tehsil);
        $Gender =  $request->Gender;
        $whatsapp = trim($request->whatsapp);
if($name != null && $name != "" &&
$District != null && $District != "" &&
$Tehsil != null && $Tehsil != "" &&
$Gender != null && $Gender != "" &&
$whatsapp != null && $whatsapp != ""   )
{
    $Wabastagan = null;
    if($number_match)
    {
        $Wabastagan =  Wabastagan::find($request->wabastagan_id);
    }
    else
    {
        $Wabastagan = new Wabastagan();
    }


        $Wabastagan->name	=  $name;
        $Wabastagan->country	= $request->countryData;
        $Wabastagan->whatsapp	=  $whatsapp;
        $Wabastagan->id_dist	=  $District;
        $Wabastagan->id_tehsil	=  $Tehsil;
        $Wabastagan->categories	=  $request->categories;
        $Wabastagan->gender	    =  $Gender;
        $Wabastagan->user_id	=  Auth::id();
        $Wabastagan->id_forum_user	=  Auth::user()->id_forum;
        $Wabastagan->rafaqat_number	=   $request->rafaqat_number;
        $Wabastagan->remarks	=   $request->remarks;
        $Wabastagan->activities	=   $request->activities_wabasta;

       if($Wabastagan->save())
       {
        if($request->click_id =="edit-wabastagan")
        {
            return response()->json(['status'=>'update' , 'click' =>$request->click_id , 'remarks' =>$request->remarks   ]);
        }
        else
        {
           return response()->json(['status'=>'save' , 'click' =>$request->click_id   ]);}
        }
           else
       {return response()->json(['status'=>'error' , 'click' =>$request->click_id ]);}

}
else
{
    return response()->json(['status'=>$request->Gender]);
    return response()->json(['status'=>'error' , 'click' =>$request->click_id ]);
}

    }
    else
    {


            if($record->user_id == Auth::id() )
        {
            return response()->json(['status'=>'you' , 'click' =>$request->click_id ]);
        }
        else
        {

            $complain_ = DB::table('complains')
            ->where('from_user' , Auth::id())
            ->where('wabastagan_id' , $record->id)
            ->first();
            if($complain_ == null)
            {

            return response()->json(['status'=>'another' , 'click' =>$request->click_id ]);
            }
            else

            {
                return response()->json(['status'=>'complainRegister' , 'click' =>$request->click_id ]);
            }



        }


    }
}
else
{
    return response()->json(['status'=>'worker' , 'click' =>$request->click_id ]);
}



    }
function getNewWabastagan(Request $request)
    {

        $record=null;
        $worker=null;
        // return response()->json(['status'=> $request->countryData]);
        if($request->click_id =="edit-wabastagan")
        {
          $number =  Wabastagan::find((int)$request->wabastagan_id)->whatsapp;

        //   return response()->json(['status'=>$number]);
          if( $request->whatsapp == $number)
          {
            $record = null;
            $worker = null;
          }
          else
          {
            $record = DB::table('wabastagans')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
            $worker = DB::table('users')
            ->where('whatsapp' , $request->whatsapp)
            ->first();

          }

        }

        if($request->click_id =="save-wabastagan")
        {
            $record = DB::table('wabastagans')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
            $worker = DB::table('users')
            ->where('whatsapp' , $request->whatsapp)
            ->first();
        }


if( $worker == null)
{
    if($record == null )
    {

        return response()->json(['status'=>'200' , 'click' =>$request->click_id ]);
    }
    else
    {


            if($record->user_id == Auth::id() )
        {
            return response()->json(['status'=>'you' , 'click' =>$request->click_id ]);
        }
        else
        {

            $complain_ = DB::table('complains')
            ->where('from_user' , Auth::id())
            ->where('wabastagan_id' , $record->id)
            ->first();
            if($complain_ == null)
            {

            return response()->json(['status'=>'another' , 'click' =>$request->click_id ]);
            }
            else

            {
                return response()->json(['status'=>'complainRegister' , 'click' =>$request->click_id ]);
            }

            return response()->json(['status'=>'200' , 'click' =>$request->click_id ]);

        }

        return response()->json(['status'=>'200' , 'click' =>$request->click_id ]);
    }
}
else
{
    return response()->json(['status'=>'worker' , 'click' =>$request->click_id ]);
}



    }

function saveNewComplain(Request $request)
    {

        $record = DB::table('wabastagans')
        ->where('whatsapp' , $request->whatsapp)
        ->first();
        $complain_ = DB::table('complains')
        ->where('from_user' , Auth::id())
        ->where('wabastagan_id' , $record->id)
        ->first();


        if($complain_ == null)
        {
            // submit complain
            // submit complain

            $complain = trim($request->complain);

            if(
$complain != null && $complain != "")
           {
        $new_complain = new Complain();

        $new_complain->title	=  "Request For Release Duplicate Invity";
        $new_complain->from_user	=  Auth::id();
        $new_complain->to_user	=  $record->user_id	;
        $new_complain->wabastagan_id	=  $record->id;
        $new_complain->complain	= trim($request->complain);
        $new_complain->is_resolved	=  0;
        $new_complain->save();

        //notify user
        //  Notification::send(User::find($record->user_id), new InvitedComplain($new_complain) );
        //notify user

        return response()->json(['status'=>'complain'  ]);
}
else
{
    return response()->json(['status'=>'error']);
}



            // submit complain
            // submit complain
        }
        else
        {

            return response()->json(['status'=>'complainRegister']);

        }


    }

    public function getTable(Request $request)
    {
        $District = District::orderBy('dist_name', 'ASC')->get();

        return  view('dawa_theme.manage.worker.wabastagan_table', ['Districts'=> $District ])->render();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function refreshToken(Request $request)
    {
        session()->regenerate();
        return response()->json([
           "token"=>csrf_token()],
         200);
    }
    public function loadWabastaganList(Request $request)
    {
          $wabastagans = Auth::user()->wabastagans;
          $wabastagans_temp = $wabastagans;
          $total = count($wabastagans);

           $index = strtolower($request->index);
   if(strtolower($index) !="all")
   {
           $filtered = $wabastagans->filter(function ($value ) use ($index) {

      if($value->categories == null) {   return false;  }
       $categories =  explode(",",$value->categories);
       foreach($categories as $id)
       {
         if($id == $index)  {return true;}
        }
       return false;

    });

    $wabastagans = $filtered->all();
   }


          $categories = BroadcastListCategory::where('user_id',Auth::id())->orderBy('ordering', 'ASC')->get();
        return view('dawa_theme.manage.worker.include.wabastagan_list'
        ,
        [
            'categories'=> $categories ,
            'wabastagans'=> $wabastagans ,
            'Category_index' => $index ,
            'total_wabastagan' => $total ,
            'wabastagans_temp'=>$wabastagans_temp ,
            'is_full_page'=>$request->is_full_page


        ]
        )->render();
      }
    public function deletewabastagan(Request $request)
    {
        $wabastagan = Wabastagan::find( $request->id);
        if($wabastagan!=null)
        {
            $wabastagan->delete();
            return response()->json(['status'=>'true']);
        }
        return response()->json(['status'=>'false']);
    }
    public function deleteCategory(Request $request)
    {
        $category = BroadcastListCategory::find( $request->id);
        if($category!=null)
        {
            $category->delete();
            return response()->json(['status'=>'delete']);
        }
        return response()->json(['status'=>'false']);
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
