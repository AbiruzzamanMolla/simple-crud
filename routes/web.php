<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $students = Student::with('division', 'distict', 'upzilla')->latest()->paginate(10);
    return view('index', ['students' => $students]);
});

Route::resource('students', StudentController::class)->except([
    'index', 'show'
]);
