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
            // dd($matrices_number);
            $sv = Supervisor::find(Auth::guard('supervisor')->user()->id);
            $discuss = Discussion::where('student_id','=',$matrices_number)->get();
            $calendars = DBCalendar::where('matrik_id','=',$matrices_number)->where('approve','=','1')->get();
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
                'matrices_number' => $matrices_number,
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
            $calendars = DBCalendar::where('matrik_id','=',$user->matrik_id)->where('approve','=', 1)->get();
            $calendar = [];
            foreach($calendars as $row)
            {
                $calendar[] = \Calendar::event(
                    $row->event_name,
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
                'user' => $user,
                'discuss' => $discuss,
                'calendar' => $calendar,
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
            $discuss->student_id = $request->input('matrik_id');
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
    public function post($id)
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
    public function svcreate($matrices_number)
    {
        return view('comment.create')->with('matrices_number', $matrices_number);
    }
    public function appointment()
    {
        return view('comment.adddate');
    }
    public function storeappointment(Request $request)
    {
        $calendar = new DBCalendar;
        $calendar->event_name = $request->input('event_name');
        $calendar->color = $request->input('color');
        $calendar->start_date = $request->input('start_date');
        $calendar->end_date = $request->input('end_date');
        $calendar->matrik_id = Auth::user()->matrik_id;
        $calendar->super_matrik_id = Auth::user()->super_matrik_id;
        $calendar->declinemessage = '';
        $calendar->save();

        return redirect('/discussion')->with('success','Calendar added');
        
    }
    public function approvaldateform($matrices_number)
    {
        // dd($matrices_number);
        $calendar = DBCalendar::where('matrik_id','=',$matrices_number)->get();
        $user_id = User::where('matrik_id' , '=', $matrices_number)->get();
        foreach($user_id as $item)
        {
            $user = $item->name;
        }
        // dd($user);
        $data = array (
            'calendar' => $calendar,
            'user' => $user,
            'matrices_number' => $matrices_number,
        );
        return view('comment.approvaldate')->with($data);
    }
    public function approvaldate($id, Request $request)
    {
        $calendar = DBCalendar::find($id);

        if ($request->input('approvebtn') == "approve" && $calendar->approve == false)
        {
            $calendar->approve = true;
            $calendar->update();
            return back()->with('success', 'Event Approved');
        }
        elseif ($request->input('declinebtn') == "decline" && $calendar->decline == false)
        {
            $this->validate($request, [
                'declinemessage' => 'required|min:12'
            ]);
            $calendar->decline = true;
            $calendar->declinemessage = $request->input('declinemessage');
            $calendar->update();
            return back()->with('success', 'Event Declined');
        }
    }
    public function status()
    {
        $calendar = DBCalendar::where('matrik_id','=',Auth::user()->matrik_id)->get();
        // dd($calendar);
        $data = array(
            'calendar' => $calendar,
        );
        return view('comment.status')->with($data);
    }
    public function editapproval($id)
    {
        $calendar = DBCalendar::find($id);
        return view('comment.editdate')->with('calendar',$calendar);
    }
    public function updateappointment($id, Request $request)
    {
        $calendar = DBCalendar::find($id);
        $calendar->event_name = $request->input('event_name');
        $calendar->color = $request->input('color');
        $calendar->start_date = $request->input('start_date');
        $calendar->end_date = $request->input('end_date');
        $calendar->matrik_id = Auth::user()->matrik_id;
        $calendar->super_matrik_id = Auth::user()->super_matrik_id;
        if($calendar->decline == 1)
        {
            $calendar->declinemessage = '';
            $calendar->decline = false;
        }
        $calendar->save();

        return redirect('/discussion')->with('success','Calendar added');
        
    }
    public function deleteappointment($id)
    {
        // dd('test');
        $calendar = DBCalendar::find($id);
        $calendar->delete();
        return back()->with('error', 'Appointment removed');
    }
}
