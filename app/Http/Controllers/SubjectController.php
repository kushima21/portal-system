<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    // Show subjects with search + pagination
    public function index(Request $request)
    {
        $search = $request->search;

        $subjects = Subject::when($search, function ($query) use ($search) {
            $query->where('subject_code', 'like', "%{$search}%")
                  ->orWhere('descriptive_title', 'like', "%{$search}%");
        })
        ->orderBy('subject_id', 'desc')
        ->paginate(10);

        return view('admin.subject', compact('subjects'));
    }

    // Store new subject
    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|string|max:50|unique:subjects,subject_code',
            'descriptive_title' => 'required|string|max:255',
        ]);

        Subject::create([
            'subject_code' => $request->subject_code,
            'descriptive_title' => $request->descriptive_title,
        ]);

        return redirect()->back()->with('success', 'Subject added successfully!');
    }

    // Update subject
    public function update(Request $request, Subject $subject)
    {
        $subject->update([
            'subject_code' => $request->subject_code,
            'descriptive_title' => $request->descriptive_title
        ]);

        return redirect()->back()->with('success', 'Subject updated successfully!');
    }

    // Delete subject
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->back()->with('success', 'Subject deleted successfully!');
    }
}