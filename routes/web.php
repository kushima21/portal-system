<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\UserController;

// Home / Default
Route::get('/', function () {
    return view('welcome');
});
Route::get('/default', function () {
    return view('layout.default');
});


// =========================
// SUBJECTS
// =========================
Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');


// =========================
// PROGRAMS
// =========================
Route::get('/programs', [ProgramController::class, 'index'])->name('program.index');
Route::post('/programs', [ProgramController::class, 'store'])->name('program.store');
Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/programs/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/programs/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::resource('programs', ProgramController::class);


// =========================
// CLASSROOMS
// =========================
Route::resource('classrooms', ClassroomController::class);


// =========================
// ENROLLMENTS
// =========================
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');


// =========================
// PERSONNEL
// =========================
Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.index');
Route::post('/personnel', [PersonnelController::class, 'store'])->name('personnel.store');
Route::put('/personnel/{personnel}', [PersonnelController::class, 'update'])->name('personnel.update');
Route::delete('/personnel/{personnel}', [PersonnelController::class, 'destroy'])->name('personnel.destroy');


// =========================
// USERS (NEW)
// =========================
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');