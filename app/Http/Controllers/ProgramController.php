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

    public function edit($id) {
        // example edit function
        $program = Program::findOrFail($id);
        return view('program.edit', compact('program'));
    }

    public function destroy($id) {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('program.program')->with('success', 'Program deleted.');
    }
}
