<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PersonnelController;

// Home / Default
Route::get('/', function () {
    return view('welcome');
});
Route::get('/default', function () {
    return view('layout.default');
});

// Subjects
Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');

// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('program.index');
Route::post('/programs', [ProgramController::class, 'store'])->name('program.store');
Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/programs/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/programs/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::resource('programs', ProgramController::class);

// Classrooms
Route::resource('classrooms', ClassroomController::class);

// Enrollments
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');

// Personnel
Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.index');       // List all
Route::post('/personnel', [PersonnelController::class, 'store'])->name('personnel.store');      // Add new
Route::put('/personnel/{personnel}', [PersonnelController::class, 'update'])->name('personnel.update');  // Update
Route::delete('/personnel/{personnel}', [PersonnelController::class, 'destroy'])->name('personnel.destroy'); // Delete