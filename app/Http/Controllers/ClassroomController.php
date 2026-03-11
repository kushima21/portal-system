<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    // Display all classrooms
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.classroom', compact('classrooms'));
    }

    // Store new classroom
    public function store(Request $request)
    {
        $request->validate([
            'year_level' => 'required|string',
            'section' => 'required|string',
            'year_level_category' => 'required|string',
            'adviser' => 'required|string',
        ]);

        // Check if classroom already exists
        $exists = Classroom::where('year_level', $request->year_level)
            ->where('section', $request->section)
            ->where('year_level_category', $request->year_level_category)
            ->exists();

        if ($exists) {
            return redirect()->route('classrooms.index')
                ->with('error', 'Classroom already exists.');
        }

        Classroom::create($request->only('year_level','section','year_level_category','adviser'));

        return redirect()->route('classrooms.index')->with('success', 'Classroom added successfully.');
    }

    // Update existing classroom
    public function update(Request $request, $id)
    {
        $request->validate([
            'year_level' => 'required|string',
            'section' => 'required|string',
            'year_level_category' => 'required|string',
            'adviser' => 'required|string',
        ]);

        // Check for duplicate when updating (exclude current record)
        $exists = Classroom::where('year_level', $request->year_level)
            ->where('section', $request->section)
            ->where('year_level_category', $request->year_level_category)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->route('classrooms.index')
                ->with('error', 'Another classroom with the same details already exists.');
        }

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->only('year_level','section','year_level_category','adviser'));

        return redirect()->route('classrooms.index')->with('success', 'Classroom updated successfully.');
    }

    // Delete classroom
    public function destroy($id)
    {
        Classroom::findOrFail($id)->delete();
        return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully.');
    }
}