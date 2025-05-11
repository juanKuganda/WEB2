<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    public function create()
    {
        return view('majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:majors,name',
            'code' => 'required|unique:majors,code',
            'description' => 'required',
        ]);

        Majors::create($validated);
        return redirect()->route('majors.index')->with('success', 'Major created successfully');
    }

    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.view', compact('major'));
    }

    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => "required|unique:majors,name,$id",
            'code' => "required|unique:majors,code,$id",
            'description' => 'required',
        ]);

        $major = Majors::findOrFail($id);
        $major->update($validated);

        return redirect()->route('majors.index')->with('success', 'Major updated successfully');
    }

    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully');
    }
}
