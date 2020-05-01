<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Discussion;
use App\Appointment;
use App\Calendar as DBCalendar;
use App\Studentlist;
use App\Supervisor;
use App\User;
use Auth;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class CommentController extends Controller
{
    public function __construct()
    {
        if(Auth::guard('web')->check())
        {
            $this->middleware('guest:web', ['only' => ['discussion']]);
        }
        elseif (Auth::guard('supervisor')->check())
        {
            $this->middleware('guest:supervisor', ['only' => ['svdisucssion', 'studentlist']]);
        }
    }
    public function studentlist()
    {
        if(Auth::guard('supervisor')->check())
        {
            $studentlist = Studentlist::where('super_matrik_id','=',Auth::guard('supervisor')->user()->super_matrik_id)->get();
            $data = array(
                'studentlist' => $studentlist,
            );
            return view('comment.index')->with($data);
        }
        
    }
    public function svdiscussion($matrices_number)
    {
        if (Auth::guard('supervisor')->check())
        {
            $sv = Supervisor::find(Auth::guard('supervisor')->user()->id);
            $discuss = Discussion::where('student_id','=',$matrices_number)->get();
            $calendars = DBCalendar::where('matrik_id','=',$matrices_number)->get();
            $calendar = [];
            foreach($calendars as $row)
            {
                $calendar[] = \Calendar::event(
                    $row->title,
                    false,
                    new \DateTime($row->start_date),
                    new \DateTime($row->end_date),
                    $row->id, //optional event ID
                    [
                        'color'=> $row->color,
                    ]
                );
            }
            $calendar = \Calendar::addEvents($calendar); 
            $data = array(
                'sv' => $sv,
                'discuss' => $discuss,
                'calendar' => $calendar,
            );
            return view('comment.svdiscussion')->with($data);

        }
    }
    public function discussion()
    {
        if(Auth::guard('web')->check())
        {
            $user = User::find(Auth::user()->id);
            $discuss  = Discussion::where('student_id','=',$user->matrik_id)->where('supervisor_id','=',$user->super_matrik_id)->get();
            $data = array(
                'user' => $user,
                'discuss' => $discuss,
            );
            
        return view('comment.discussion')->with($data);
        }       
       
    }
    public function create()
    {
        $user = User::get();
        return view('comment.create')->with('user', $user);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'body' => 'required'
        ]);

        if(Auth::guard('supervisor')->check())
        {
            $sv = Supervisor::find(Auth::guard('supervisor')->user()->id);
            // dd($sv);
            $discuss = new Discussion;
            $discuss->student_id = $request->input('student');
            $discuss->supervisor_id = $sv->super_matrik_id;
            $discuss->body = $request->input('body');
            $discuss->subject = $request->input('subject');
            $discuss->save();
            return redirect('/supervisor/discussion')->with('success','Discussion created');
        }
        else
        {
            $user = User::find(Auth::user()->id);
            $discuss = new Discussion;
            $discuss->student_id = $user->matrik_id;
            $discuss->supervisor_id = $user->super_matrik_id;
            $discuss->body = $request->input('body');
            $discuss->subject = $request->input('subject');
            $discuss->save();
            return redirect('/discussion')->with('success','Discussion created');
        }
       
      
        
        
    }
    public function post($id,$student_id)
    {
        // dd($discussion_id);
        $discuss = Discussion::find($id);
        // dd($discuss);
        $comment = Comment::where('discussion_id','=',$discuss->id)->get();
        // dd($comment);
        $data = array(
            'discuss' => $discuss,
            'comment' => $comment,
        );
        return view('comment.post')->with($data);
    }

    public function storecomment($id,$student_id, Request $request)
    {
        $comment =  new Comment;
        $discuss = Discussion::find($id);
        $comment->discussion_id = $discuss->id;
        if(Auth::guard('supervisor')->check())
        {
            $comment->commenter_id = Auth::guard('supervisor')->user()->super_matrik_id;
            
            // dd($comment->commenter_id);
            
        }
        else
        {
            $comment->commenter_id = Auth::guard('web')->user()->matrik_id;
            // dd($comment->commenter_id);
        }
        $comment->comment = $request->input('comment');
        $comment->save();

        return back();
        
    }
    public function deletecomment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
    public function calendar()
    {
        $calendars = DBCalendar::all();
        $calendar = [];
        foreach($calendars as $row)
        {
            $calendar[] = \Calendar::event(
                $row->title,
                true,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]      
            ); 
        }
        $calendar = \Calendar::addEvents($calendar);
        return view('comment.test')->with('calendar',$calendar);
    }
}
