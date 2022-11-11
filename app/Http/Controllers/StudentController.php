<?php

namespace App\Http\Controllers;

use App\Models\Distict;
use App\Models\Division;
use App\Models\Student;
use App\Models\Upzilla;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('action.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
            'distict_id' => 'required',
            'upzilla_id' => 'required',
        ]);

        Student::create([
            'name' => $request->name,
            'upzilla_id' => $request->upzilla_id,
            'distict_id' => $request->distict_id,
            'division_id' => $request->division_id,
        ]);
        session()->flash('success', 'Student Created!');
        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $divisions = Division::all();
        $disticts = Distict::where('division_id', $student->division_id)->get();
        $upzillas = Upzilla::where('distict_id', $student->distict_id)->get();
        return view('action.edit', compact('student', 'divisions', 'disticts', 'upzillas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
            'distict_id' => 'required',
            'upzilla_id' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'upzilla_id' => $request->upzilla_id,
            'distict_id' => $request->distict_id,
            'division_id' => $request->division_id,
        ]);
        session()->flash('success', 'Student Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $data = $student->delete();
        if($data) session()->flash('success', 'Student Deleted!');
        $msg = $data ? 'Student deleted successfully' : 'Student Deleting Failed!';
        return response()->json([
            'message' => $msg,
            'success' => $data
        ]);
    }
    public function getDistict($id)
    {
        $disticts = Distict::where('division_id', $id)->get();
        return response()->json($disticts);
    }
    public function getUpzilla($id)
    {
        $upzillas = Upzilla::where('distict_id', $id)->get();
        return response()->json($upzillas);
    }
}
