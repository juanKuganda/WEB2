<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use Illuminate\Http\Request;

class pembelicontroller extends Controller
{
    public function index()
    {
        $pembeli = pembeli::all();
        return view('Pembeli.index', compact('pembeli'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pembeli' => 'required|string|unique:pembeli,id_pembeli|max:10',
            'nama' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'alamat' => 'required|string',
        ]);

        pembeli::create($validated);

        return redirect()->route('Pembeli.index')->with('success', 'Pembeli created successfully');
    }
}
