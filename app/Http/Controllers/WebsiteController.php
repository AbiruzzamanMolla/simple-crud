<?php

namespace App\Http\Controllers;

use App\Models\Distict;
use App\Models\Student;
use App\Models\Upzilla;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $students = Student::with('division', 'distict', 'upzilla')->latest()->paginate(10);
        return view('index', ['students' => $students]);
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
