<?php

namespace App\Http\Controllers;

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
        $discuss  = Discussion::where('matrik_id','=',$user->matrik_id)->get();
        $data = array(
            'user' => $user,
            'discuss' => $discuss,
        );
        return view('comment.discussion');
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
        $discuss->super_matrik_id = $user->super_matrik_id;
        $discuss->body = $request->input('body');
        $discuss->subject = $request->input('subject');
        $discuss->save();
    }
}
