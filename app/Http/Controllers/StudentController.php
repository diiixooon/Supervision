<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Supervisor;
class StudentController extends Controller
{
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
        $sv->lat = $request->input('lat');
        $sv->lng = $request->input('lng');
        $sv->update();

        return redirect('/profile')->with('success', 'Update success');
    }
    public function userprofile()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $data = array(
            'user' => $user,
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
    public function location()
    {
        $sv = Supervisor::where('super_matrik_id','=', Auth::guard('web')->user()->super_matrik_id)->get();
        $data = array(
            'sv' => $sv,
        );
        return view('profile.location')->with($data);
    }

}
