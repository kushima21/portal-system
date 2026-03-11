<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::orderBy('id','desc')->get();
        return view('enrollment.enrollment', compact('enrollments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        Enrollment::create($request->only('academic_year','status'));

        return redirect()->back()->with('success','Enrollment added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'academic_year' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->only('academic_year','status'));

        return redirect()->back()->with('success','Enrollment updated successfully.');
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->back()->with('success','Enrollment deleted successfully.');
    }
}