<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelController extends Controller
{
    public function index()
    {
        $personnels = Personnel::latest()->get();
        return view('personnel.personnel', compact('personnels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'personel_id' => 'required|unique:personnels,personel_id',
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required',
            'email' => 'required|email',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
        ]);

        Personnel::create($request->all());

        return redirect()->route('personnel.index')->with('success', 'Personnel added successfully.');
    }

    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required',
            'email' => 'required|email',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnel.index')->with('success', 'Personnel updated successfully.');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        return redirect()->route('personnel.index')->with('success', 'Personnel deleted successfully.');
    }
}