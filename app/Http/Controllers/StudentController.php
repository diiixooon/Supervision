<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Supervisor;
use App\Studentlist;

class StudentController extends Controller
{
    public function __construct()
    {
        if(Auth::guard('web')->check())
        {
            $this->middleware('auth:supervisor', ['only'=>['profile','edit','editform']]);
        }
        if(Auth::guard('supervisor')->check())
        {
            
            $this->middleware('auth:web', ['only'=>['userprofile','useredit','userprofileedit']]);
        }
    }
    //need to move to supervisor
    public function profile()
    {
        $sv = Supervisor::find(Auth::guard('supervisor')->user()->id);
        $user = User::get();
        $data = array(
            'sv' => $sv,
            'user' => $user,
        );
        return view('profile.index')->with($data);
    }

    public function edit($id)
    {
        $sv = Supervisor::find($id);
        $user = User::get();
        $data = array(
            'user' => $user,
            'sv' => $sv,
        );
        return view('profile.edit')->with($data);
    }
    public function editform($id, Request $request)
    {
        $sv = Supervisor::find($id);
        $sv->name = $request->input('name');
        $sv->super_matrik_id = $request->input('matrik_number');
        $sv->contact = $request->input('contact');
        $sv->room_location = $request->input('room_location');
        $sv->lat = $request->input('lat');
        $sv->lng = $request->input('lng');
        $sv->update();

        return redirect('/profile')->with('success', 'Update success');
    }
    //supervisor end

    public function userprofile()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $project = Studentlist::where("matrices_number", "=" , Auth::guard('web')->user()->matrik_id)->get();
        foreach($project as $item){
            $project_description = $item->description;
            $project_title = $item->project_title;
        }
        // dd($project_title);
        
        $data = array(
            'user' => $user,
            'project_title' => $project_title,
            'project_description' => $project_description,
        );
        return view('profile.userprofile')->with($data);
    }
    public function useredit($id)
    {
        $user = User::find($id);
        return view('profile.userprofileedit')->with('user',$user);
    }
    public function userprofileedit($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->matrik_id = $request->input('matrik_number');
        $user->save();
        return redirect('/userprofile')->with('success', 'Update success');
    }
    public function svlocation()
    {
        $sv = Supervisor::where('super_matrik_id' ,'=' , Auth::user()->super_matrik_id)->get();
        $data = array(
            'sv' => $sv,
        );
        return view('location.svlocation')->with($data);
    }
    public function userfyp()
    {
        $studentlist = Studentlist::where("matrices_number",'=', Auth::guard('web')->user()->matrik_id)->get();
        foreach($studentlist as $item)
        {
            $student = $item->id; 
            $svid = $item->super_matrik_id;
        }
        $sv = Supervisor::where('super_matrik_id','=', $svid)->get();
        foreach($sv as $svid)
        {
            $newsvid = $svid->id;
        }
        $svprofile = Supervisor::find($newsvid);
        $profile = Studentlist::find($student);
        $data = array(
            'sv_name' => $svprofile->name,
            'project_title' => $profile->project_title,
            'project_description' => $profile->description,
        );
        return view('profile.userfyp')->with($data);
    }

}
