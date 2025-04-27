<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query()->withCount('peminjaman');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('no_telepon', 'like', "%{$search}%");
            });
        }

        $anggota = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggota,email',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'tanggal_registrasi' => 'required|date',
        ]);

        Anggota::create($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Anggota $anggotum)
    {
        $anggotum->load([
            'peminjaman' => function ($query) {
                $query->with('buku')->orderBy('created_at', 'desc');
            }
        ]);

        return view('anggota.show', compact('anggotum'));
    }

    public function edit(Anggota $anggotum)
    {
        return view('anggota.edit', compact('anggotum'));
    }

    public function update(Request $request, Anggota $anggotum)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggota,email,' . $anggotum->id_anggota . ',id_anggota',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'tanggal_registrasi' => 'required|date',
        ]);

        $anggotum->update($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggotum)
    {
        $activePeminjaman = $anggotum->peminjaman()
            ->where('status_peminjaman', 'dipinjam')
            ->count();

        if ($activePeminjaman > 0) {
            return redirect()->route('anggota.index')
                ->with('error', 'Tidak dapat menghapus anggota dengan peminjaman aktif.');
        }

        $anggotum->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
