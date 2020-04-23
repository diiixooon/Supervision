<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to E-Logbook System';
        return view('pages.index', compact('title'));
    }

    public function studentlist(){
        $data = array(
            'title' => 'Studentlist',
            'studentlist' => ['Name', 'Matrix Number', 'Project Title']
        );
        return view('pages.studentlist')->with($data);
    }
}
