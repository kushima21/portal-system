<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index() {
        $programs = Program::all();
        return view('program.program', compact('programs'));
    }

    public function store(Request $request) {
        $request->validate([
            'year_level' => 'required|string|max:255',
            'year_category' => 'required|string|max:255',
        ]);
        Program::create($request->only(['year_level', 'year_category']));
        return redirect()->route('programs.index')->with('success', 'Program added successfully.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'year_level' => 'required|string|max:255',
            'year_category' => 'required|string|max:255',
        ]);
        $program = Program::findOrFail($id);
        $program->update($request->only(['year_level', 'year_category']));
        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy($id) {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}