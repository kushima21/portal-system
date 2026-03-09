<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/default', function () {
    return view('layout.default');
});



Route::get('/subject', function () {
    return view('admin.subject');
});


Route::get('/subject', [SubjectController::class,'index'])->name('subject.index');
Route::post('/subject', [SubjectController::class,'store'])->name('subject.store');
Route::put('/subject/{subject}', [SubjectController::class,'update'])->name('subject.update');
Route::delete('/subject/{subject}', [SubjectController::class,'destroy'])->name('subject.destroy');