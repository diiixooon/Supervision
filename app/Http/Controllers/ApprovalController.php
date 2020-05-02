<?php

namespace App\Http\Controllers;

use App\Approval;
use App\Studentlist;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'document' => 'required',
            'fypdocument' => 'required|max:1000000',
        ]);
        if($request->hasFile('fypdocument'))
        {
            // get file name with the extension
            $fypdocumentWithExt = $request->file('fypdocument')->getClientOriginalName();   
            // get file name
            $fypdocument = pathinfo($fypdocumentWithExt, PATHINFO_FILENAME);
            // get the file extension
            $fypdocumentextension = $request->file('fypdocument')->getClientOriginalExtension();
            // file name to store
            $fypdocumentNameToStore  = $fypdocument.'_'.time().'.'.$fypdocumentextension;
            //Upload image 
            $path = $request->file('fypdocument')->storeAs('public/fypdocument',$fypdocumentNameToStore);
        }

        $user = User::find(Auth::user()->id);
        $approval = Approval::find(Auth::user()->id);
        $approval->matrik_id = $user->matrik_id;
        switch($request->input('document'))
        {
            case '1':
                $approval->d1 = true;
                $approval->d1_document = $fypdocumentNameToStore;
            break;
            case '2':
                $approval->d2 = true;
                $approval->d2_document = $fypdocumentNameToStore;
            break;
            case '3':
                $approval->d3 = true;
                $approval->d3_document = $fypdocumentNameToStore;
            break;
            case '4':
                $approval->d4 = true;
                $approval->d4_document = $fypdocumentNameToStore;
            break;
            case '5':
                $approval->d5 = true;
                $approval->d5_document = $fypdocumentNameToStore;
            break;
            case '6':
                $approval->d6 = true;
                $approval->d6_document = $fypdocumentNameToStore;
            break;
            case '7':
                $approval->d7 = true;
                $approval->d7_document = $fypdocumentNameToStore;
            break;
        }
        $approval->update();

        return back()->with('success', 'Upload successfully');
        

    }
    public function form()
    {
        return view('comment.upload');
    }
    public function svtable()
    {
        $studentlist = Studentlist::get();
        $data = array(
            'studentlist' => $studentlist,
        );
        return view('comment.approval')->with($data);
    }
    public function documentprofile($matrik_id)
    {
        $approval = Approval::where('matrik_id', '=', $matrik_id)->get();
        // dd($approval);
        $data = array(
            'approval' => $approval
        );
        return view('comment.judge')->with($data);
    }
}
