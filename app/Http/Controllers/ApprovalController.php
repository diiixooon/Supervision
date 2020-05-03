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
                $approval->d1_approve = false;
                $approval->d1_decline = false;
                $approval->d1declinemessage = '';
                
            break;
            case '2':
                $approval->d2 = true;
                $approval->d2_document = $fypdocumentNameToStore;
                $approval->d2_approve = false;
                $approval->d2_decline = false;
                $approval->d2declinemessage = '';
            break;
            case '3':
                $approval->d3 = true;
                $approval->d3_document = $fypdocumentNameToStore;
                $approval->d3_approve = false;
                $approval->d3_decline = false;
                $approval->d3declinemessage = '';
            break;
            case '4':
                $approval->d4 = true;
                $approval->d4_document = $fypdocumentNameToStore;
                $approval->d4_approve = false;
                $approval->d4_decline = false;
                $approval->d4declinemessage = '';
            break;
            case '5':
                $approval->d5 = true;
                $approval->d5_document = $fypdocumentNameToStore;
                $approval->d5_approve = false;
                $approval->d5_decline = false;
                $approval->d5declinemessage = '';
            break;
            case '6':
                $approval->d6 = true;
                $approval->d6_document = $fypdocumentNameToStore;
                $approval->d6_approve = false;
                $approval->d6_decline = false;
                $approval->d6declinemessage = '';
            break;
            case '7':
                $approval->d7 = true;
                $approval->d7_document = $fypdocumentNameToStore;
                $approval->d7_approve = false;
                $approval->d7_decline = false;
                $approval->d7declinemessage = '';
            break;
        }
        $approval->update();

        return back()->with('success', 'Upload successfully');
        

    }
    public function form()
    {

        $approvallist  = Approval::where('matrik_id', '=' , Auth::user()->matrik_id)->get();
        foreach($approvallist as $item)
        {
            $id = $item->id; 
        }
        $approval = Approval::find($id);
        return view('comment.upload')->with('approval', $approval);
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
        $approvallist  = Approval::where('matrik_id', '=' , $matrik_id)->get();
        foreach($approvallist as $item)
        {
            $id = $item->id; 
        }
        $approval = Approval::find($id);
        $data = array(
            'approval' => $approval,
            'matrik_id' => $matrik_id,
        );
        return view('comment.judge')->with($data);
    }
    public function approvalfunc($id, Request $request)
    {
        $approval = Approval::find($id);
        switch($request->input('hiddentext'))
        {
            case '1':
                if ($request->input('d1approvebtn') == "approve" && $approval->d1_approve == false)
                {
                    $approval->d1_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d1declinebtn') == "decline" && $approval->d1_decline == false)
                {
                    $this->validate($request, [
                        'd1declinemessage' => 'required|min:12'
                    ]);
                    $approval->d1_decline = true;
                    $approval->d1declinemessage = $request->input('d1declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '2':
                if ($request->input('d2approvebtn') == "approve" && $approval->d2_approve == false)
                {
                    $approval->d2_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d2declinebtn') == "decline" && $approval->d2_decline == false)
                {
                    $this->validate($request, [
                        'd2declinemessage' => 'required|min:12'
                    ]);
                    $approval->d2_decline = true;
                    $approval->d2declinemessage = $request->input('d2declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '3':
                if ($request->input('d3approvebtn') == "approve" && $approval->d3_approve == false)
                {
                    $approval->d3_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d3declinebtn') == "decline" && $approval->d3_decline == false)
                {
                    $this->validate($request, [
                        'd3declinemessage' => 'required|min:12'
                    ]);
                    $approval->d3_decline = true;
                    $approval->d3declinemessage = $request->input('d3declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '4':
                if ($request->input('d4approvebtn') == "approve" && $approval->d4_approve == false)
                {
                    $approval->d4_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d4declinebtn') == "decline" && $approval->d4_decline == false)
                {
                    $this->validate($request, [
                        'd4declinemessage' => 'required|min:12'
                    ]);
                    $approval->d4_decline = true;
                    $approval->d4declinemessage = $request->input('d4declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '5':
                if ($request->input('d5approvebtn') == "approve" && $approval->d5_approve == false)
                {
                    $approval->d5_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d5declinebtn') == "decline" && $approval->d5_decline == false)
                {
                    $this->validate($request, [
                        'd5declinemessage' => 'required|min:12'
                    ]);
                    $approval->d5_decline = true;
                    $approval->d5declinemessage = $request->input('d5declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '6':
                if ($request->input('d6approvebtn') == "approve" && $approval->d6_approve == false)
                {
                    $approval->d6_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d6declinebtn') == "decline" && $approval->d6_decline == false)
                {
                    $this->validate($request, [
                        'd6declinemessage' => 'required|min:12'
                    ]);
                    $approval->d6_decline = true;
                    $approval->d6declinemessage = $request->input('d6declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
            case '7':
                if ($request->input('d7approvebtn') == "approve" && $approval->d7_approve == false)
                {
                    $approval->d7_approve = true;
                    $approval->update();
                    return back()->with('success', 'Event Approved');
                }
                elseif ($request->input('d7declinebtn') == "decline" && $approval->d7_decline == false)
                {
                    $this->validate($request, [
                        'd7declinemessage' => 'required|min:12'
                    ]);
                    $approval->d7_decline = true;
                    $approval->d7declinemessage = $request->input('d7declinemessage');
                    $approval->update();
                    return back()->with('success', 'Event Declined');
                }
            break;
        }
    }
}
