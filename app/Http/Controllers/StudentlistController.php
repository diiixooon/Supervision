<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studentlist;
use DB;

class StudentlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //$studentlists = Studentlist::all();
        //return Studentlist::where('name', 'Yip Wai Jun')->get();
        $studentlists = Studentlist::orderBy('name','asc')->paginate(10);
        return view('studentlist.index')->with('studentlist', $studentlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'matrices_number' => 'required',
            'name' => 'required',
            'project_title' => 'required',
            'description' => 'required'
        ]);
        
        //Create Student
        $studentlist = new Studentlist;
        $studentlist->matrices_number = $request->input('matrices_number');
        $studentlist->name = $request->input('name');
        $studentlist->project_title = $request->input('project_title');
        $studentlist->description = $request->input('description');
        $studentlist->save();

        return redirect('/studentlists')->with('success', 'Student Created');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentlist = Studentlist::find($id);
        return view('studentlist.show')->with('studentlist', $studentlist);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentlist = Studentlist::find($id);
        return view('studentlist.edit')->with('studentlist', $studentlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'matrices_number' => 'required',
            'name' => 'required',
            'project_title' => 'required',
            'description' => 'required'
        ]);
        
        //Update Student
        $studentlist = Studentlist::find($id);
        $studentlist->matrices_number = $request->input('matrices_number');
        $studentlist->name = $request->input('name');
        $studentlist->project_title = $request->input('project_title');
        $studentlist->description = $request->input('description');
        $studentlist->save();

        return redirect('/studentlists')->with('success', 'Student Project Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentlist = Studentlist::find($id);
        $studentlist->delete();
        return redirect('/studentlists')->with('success', 'Student Removed');
    }
}
