<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::latest()->get();
        return view('classrooms.classroom', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year_level' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'year_level_category' => 'required|string|in:Junior High,Senior High',
            'adviser' => 'required|string|max:255',
        ]);

        Classroom::create($request->all());

        return redirect()->back()->with('success', 'Classroom added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'year_level' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'year_level_category' => 'required|string|in:Junior High,Senior High',
            'adviser' => 'required|string|max:255',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());

        return redirect()->back()->with('success', 'Classroom updated successfully.');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->back()->with('success', 'Classroom deleted successfully.');
    }
}