<?php

namespace App\Http\Controllers;

use App\Models\pakaian;
use Illuminate\Http\Request;

class pakaiancontroller extends Controller
{
    public function index()
    {
        $pakaian = pakaian::all();
        return view('Pakaian.index', compact('pakaian'));
    }
 public function store(Request $request)    
{
    $validated = $request->validate([
        'id_pakaian' => 'required|string|unique:pakaian,id_pakaian|max:10',
        'nama_pakaian' => 'required|string',
        'jenis' => 'required|string',
        'ukuran' => 'required|in:XL,L,S,M',
    ]);
    // dd($validated);
    pakaian::create($validated);

    return redirect()->route('Pakaian.index')->with('success', 'Pakaian created successfully');
}

}
