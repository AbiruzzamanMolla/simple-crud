<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::resource('students', StudentController::class)->except([
    'index', 'show'
]);

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/ajax/distict/{id}', [WebsiteController::class, 'getDistict']);
Route::get('/ajax/upzilla/{id}', [WebsiteController::class, 'getUpzilla']);
