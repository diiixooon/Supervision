<?php

namespace App\Http\Controllers;

use App\Approval;
use Illuminate\Http\Request;
use Auth;
use App\User;

class GraphController extends Controller
{
    public function index()
    {
        $student = User::where('super_matrik_id','=', Auth::guard('supervisor')->user()->super_matrik_id)->get();
        $approval = Approval::where('super_matrik_id','=')
        $data = [
            'student' => $student,
            'approval' => $approval,
        ];  
          
        
        return view('analytic')->with($data);
    }
}
