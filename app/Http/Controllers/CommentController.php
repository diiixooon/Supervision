<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Discussion;
use App\Supervisor;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function discussion()
    {
        $user = User::find(Auth::user()->id);
        $discuss  = Discussion::where('student_id','=',$user->matrik_id)->where('supervisor_id','=',$user->super_matrik_id)->get();
        $data = array(
            'user' => $user,
            'discuss' => $discuss,
        );
        return view('comment.discussion')->with($data);
    }
    public function create()
    {
        return view('comment.create');
    }
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request,[
            'subject' => 'required',
            'body' => 'required'
        ]);

        $discuss = new Discussion;
        $discuss->student_id = $user->matrik_id;
        $discuss->supervisor_id = $user->super_matrik_id;
        $discuss->body = $request->input('body');
        $discuss->subject = $request->input('subject');
        $discuss->save();
        
        return redirect('/discussion')->with('success','Discussion created');
    }
    public function post($id,$student_id)
    {
        // dd($discussion_id);
        $discuss = Discussion::find($id);
        // dd($discuss);
        $comment = Comment::where('student_id' ,'=', $student_id)->get();
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
        $comment->student_id = $discuss->student_id;
        $comment->supervisor_id = $discuss->supervisor_id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return back();
        
    }
}
