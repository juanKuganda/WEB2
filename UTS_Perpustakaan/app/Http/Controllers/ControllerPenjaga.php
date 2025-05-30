<?php

namespace App\Http\Controllers;

use App\Models\Penjaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ControllerPenjaga extends Controller
{
    public function index()
    {
        $penjaga = Penjaga::orderBy('nama')->get();
        return view('penjaga.index', compact('penjaga'));
    }

    public function create()
    {
        return view('penjaga.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('store')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penjaga,email',
            'no_telepon' => 'required|string|max:15',
        ]);

        Penjaga::create($validated);

        return redirect()->route('penjaga.index')
            ->with('success', 'Data penjaga berhasil ditambahkan.');
    }

    public function show(Penjaga $penjaga)
    {
        $penjaga->get();
        return view('penjaga.show', compact('penjaga'));
    }

    public function edit(Penjaga $penjaga)
    {
        return view('penjaga.edit', compact('penjaga'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Unauthorized action.');
        }
    
        $penjaga = Penjaga::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penjaga,email,' . $id,
            'no_telepon' => 'required|string|max:15',
        ]);
    
        $penjaga->update($validated);
    
        return redirect()->route('penjaga.index')
            ->with('success', 'Data penjaga berhasil diperbarui.');
    }

    public function destroy(Penjaga $penjaga)
    {
        if (!Gate::allows('destroy')) {
            abort(403, 'Unauthorized action.');
        }

        $penjaga->delete();

        return redirect()->route('penjaga.index')
            ->with('success', 'Data penjaga berhasil dihapus.');
    }
}