<?php

namespace App\Http\Controllers;

use App\Clip;
use App\ClipView;
use App\ClipQuestion;
use App\MCQsEvaluation;
use App\ClipQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClipController extends Controller
{
    function save_quiz_result(Request $request)
    {

        $questions = ClipQuestion::where('clip_id' , $request->clip_id)->get()->pluck('id');


        $results = explode(',' , $request->result);
        $i= 0 ;
        foreach ($results as $result) {
           $evaluation = new MCQsEvaluation();
           $evaluation->clip_id = $request->clip_id;
           $evaluation->user_id = Auth::id();
           $evaluation->answer = $result;
           $evaluation->question_id = $questions[$i];
           $evaluation->save();
           $i++;
        }
       return "Ok";


    }

    function store_clip_questions(Request $request)
    {
        if(ClipQuestion::where('clip_id', $request['clip_id'])->exists() )
        {
            ClipQuestion::where('clip_id', $request['clip_id'])->delete();
        }
         unset($request['_token']);
         $clip_id = $request['clip_id'];
         unset($request['clip_id']);
         $questions = $request['question'];
         unset($request['question']);
         $option_values = $request['option_value'];
         unset($request['option_value']);
         $trueAnswers = $request->all();
        //  dd($trueAnswers);

         $i =0;


         foreach ($questions as $question_statement)
         {
            $question = new ClipQuestion();
            $question->question = $question_statement;
            $question->clip_id = $clip_id ;
            $question->added_by = Auth::id();
            // dd($question );
            $question->save();
            // dd($trueAnswers );
            $answer_position = array_shift($trueAnswers);
         for ($j=1 ; $j < 5 ; $j++)
         {
            $answer = new ClipQuestionAnswer();
            $answer->question_id = $question->id;
            $answer->option_value = $option_values[$i];
           if((int)$answer_position == $j){$answer->is_true = 1;}
           $answer->save();
             $i ++;
         }
        }

        return back()->with( 'successMsg' , "Quiz Published Successfully" );


    }
    function index()
    {
        $clips = Clip::with('myview' , 'views' , 'audios' , 'videos' , 'my_evaluation' , 'questions' , 'questions.answers')->where('status',1)->orderBy('datetime','desc')->where('datetime', '<=' ,  now() )->paginate(15);

        return view('dawa_theme.clips.index' , ['clips' => $clips]);
    }
    function indexManage()
    {

        if (! Gate::allows('manage-clips')) {
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

        $clips = Clip::orderBy('datetime','desc')->get();

        return view('dawa_theme.clips.indexManage' , ['clips' => $clips]);
    }
    function addNew()
    {

        return view('dawa_theme.clips.add'  );
    }
    function edit(Request $request , $id)
    {
        $clip = Clip::find($id);
        return view('dawa_theme.clips.edit' , ['clip' => $clip] );
    }

    function editStore(Request $request  , $id)
    {
        $request->validate([
            'Clip_Id' => 'required|integer|unique:clips,clip_id,'.$id,
            'Title' => 'required|max:500|unique:clips,title,'.$id,
            // 'Youtube_Link' => 'required|active_url|unique:clips,youtube_link,'.$id,
            'Date_And_Time' => 'required',
            'Minutes_Short' => 'required|integer',
            'Minutes_Long' => 'required|integer|gte:Minutes_Short',
            'status' => 'required',

        ]);
        $clip =  Clip::find($id);
        $clip->id_update = Auth::id();
        $clip->clip_id = $request->Clip_Id;
        $clip->speech_id = $request->Speech_Id;
        $clip->title = $request->Title;
        $clip->long_ = $request->Minutes_Long;
        $clip->short_ = $request->Minutes_Short;
        $clip->status = $request->status;
        $clip->youtube_link = trim($request->Youtube_Link);
        $clip->video_download_link = trim($request->video_download_link);
        $clip->audio_download_link = trim($request->audio_download_link);
        $clip->remarks = $request->remarks;
        $clip->datetime = \Carbon\Carbon::parse($request->Date_And_Time);
        $clip->description = $request->discription;

        $clip->save();
        // return back()->with('msg' , 'New Clip has been Published Successfully');
        return redirect()->route('view.clips.manage');
    }

    function store(Request $request)
    {

        $request->validate([
            'Clip_Id' => 'required|integer|unique:clips,clip_id',
            'Title' => 'required|max:500|unique:clips,title',
            // 'Youtube_Link' => 'required|active_url|unique:clips,youtube_link',
            'Date_And_Time' => 'required',
            'Minutes_Short' => 'required|integer',
            'Minutes_Long' => 'required|integer|gte:Minutes_Short',
            'status' => 'required',

        ]);

        $clip = new Clip();
        $clip->id_add = Auth::id();
        $clip->clip_id = $request->Clip_Id;
        $clip->speech_id = $request->Speech_Id;
        $clip->title = $request->Title;
        $clip->status = $request->status;
        $clip->long_ = $request->Minutes_Long;
        $clip->short_ = $request->Minutes_Short;
        $clip->youtube_link = trim($request->Youtube_Link);
        $clip->video_download_link = trim($request->video_download_link);
        $clip->audio_download_link = trim($request->audio_download_link);
        $clip->remarks = $request->remarks;
        $clip->description = $request->discription;
        $clip->datetime = \Carbon\Carbon::parse($request->Date_And_Time);

        $clip->save();
return back()->with('msg' , 'New Clip has been Published Successfully');

    }
    public function getClip(Request $request)
    {
        return response()->json(['status'=>'ok' , 'view'=> view('dawa_theme.manage.worker.include_once.get-clip')->render()]);

    }
  
  
    public function add_to_watch_clip(Request $request)
    {
        if(Auth::check())
        {
        $clip_view =  ClipView::where('user_id',Auth::id())
                               ->where('action' , 'view')
                              ->where('clip_id',$request->clip_id)->first();
            if($clip_view == null)
            {
                $new_view =  new ClipView();
                $new_view->user_id  = Auth::id();
                $new_view->clip_id  =$request->clip_id;
                $new_view->save();

             return response()->json(['status'=>'add' ,'total'=> ClipView::
                                        where('clip_id',$request->clip_id)->count() ]);
            }

            return response()->json(['status'=>'alerady' ,'clip_id'=> $request->clip_id ]);

        }

        return response()->json(['status'=>'notconnect' ,'clip_id'=> $request->clip_id ]);

    }


    public function add_to_download_clip(Request $request)
    {
        if(Auth::check())
        {
        // $clip_view =  ClipView::where('user_id',Auth::id())
        //                       ->where('clip_id',$request->clip_id)->first();
        //     if($clip_view == null)
        //     {
                $new_view =  new ClipView();
                $new_view->user_id  = Auth::id();
                $new_view->clip_id  =$request->clip_id;
                $new_view->action  =$request->action;
                $new_view->save();

             return response()->json(['status'=>'add' ,'total'=> ClipView::
                                        where('clip_id',$request->clip_id)->count() ]);
            // }

            // return response()->json(['status'=>'alerady' ,'clip_id'=> $request->clip_id ]);

        }

        return response()->json(['status'=>'notconnect' ,'clip_id'=> $request->clip_id ]);

    }

}
