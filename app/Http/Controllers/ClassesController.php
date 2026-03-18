<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ClassesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // DISPLAY ALL CLASSES
    public function index()
    {
        $classes = Classes::with(['teacher', 'classroom', 'subject'])->latest()->get();
        $teachers = User::all();            
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('classes.classes', compact('classes', 'teachers', 'classrooms', 'subjects'));
    }

    // STORE NEW CLASS
    public function store(Request $request)
    {
        $request->validate([
            'descriptive_title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'user_id' => 'required|exists:users,user_id',
            'classroom_id' => 'required|exists:classrooms,classroom_id',
            'subject_id' => 'required|exists:subjects,subject_id',
        ]);

        $class = Classes::create([
            'descriptive_title' => $request->descriptive_title,
            'schedule' => $request->schedule,
            'teacher_id' => $request->user_id, 
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'class_id' => $class->class_id,
                    'descriptive_title' => $class->descriptive_title,
                    'schedule' => $class->schedule,
                    'teacher_id' => $class->teacher_id,
                    'teacher_name' => $class->teacher->name ?? '',
                    'classroom_id' => $class->classroom_id,
                    'subject_id' => $class->subject_id,
                ]
            ]);
        }

        return redirect()->back()->with('success', 'Class added successfully.');
    }

    // UPDATE EXISTING CLASS
    public function update(Request $request, $class_id)
    {
        $request->validate([
            'descriptive_title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'user_id' => 'required|exists:users,user_id',
            'classroom_id' => 'required|exists:classrooms,classroom_id',
            'subject_id' => 'required|exists:subjects,subject_id',
        ]);

        $class = Classes::findOrFail($class_id);
        $class->update([
            'descriptive_title' => $request->descriptive_title,
            'schedule' => $request->schedule,
            'teacher_id' => $request->user_id,
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->back()->with('success', 'Class updated successfully.');
    }

    // DELETE CLASS
    public function destroy($class_id)
    {
        $class = Classes::findOrFail($class_id);
        $class->delete();

        return redirect()->back()->with('success', 'Class deleted successfully.');
    }
}