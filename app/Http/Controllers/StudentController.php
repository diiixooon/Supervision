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
        $sv->update();

        return redirect('/profile')->with('success', 'Update success');
    }


}
