<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function show($id)
    {
        $project = Studentlist::find($id);
        return view('project.show')->with('project', $project);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
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

}
