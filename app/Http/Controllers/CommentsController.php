<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment= new Comment();
        $comment->comment=$request->input('comment');
        $comment->save();

        return back();
    }
    public function create(){
        $comments=Comment::all();
        return view('front')->with('comments',$comments);
    }
    public function display(){
        $comments = Comment::all();
        return view('/dashboard')->with('comments', $comments);
    }
}
