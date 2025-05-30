<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('show')) {
            abort(403, 'Unauthorized action.');
        }
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
        if (!Gate::allows('store')) {
            abort(403, 'Unauthorized action.');
        }
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('store')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggota,email',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'tanggal_registrasi' => 'required|date',
            'password' => 'required',
        ]);

        // Buat anggota
        Anggota::create($validated);

        // Buat user dengan password yang di-hash
        User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Anggota $anggotum)
    {
        if (!Gate::allows('show')) {
            abort(403, 'Unauthorized action.');
        }
        $anggotum->load([
            'peminjaman' => function ($query) {
                $query->with('buku')->orderBy('created_at', 'desc');
            }
        ]);

        return view('anggota.show', compact('anggotum'));
    }

    public function edit(Anggota $anggotum)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Unauthorized action.');
        }
        return view('anggota.edit', compact('anggotum'));
    }

    public function update(Request $request, Anggota $anggotum)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Unauthorized action.');
        }
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

    public function destroy(Anggota $anggotum, User $user)
    {
        if (!Gate::allows('destroy')) {
            abort(403, 'Unauthorized action.');
        }

        // Cek peminjaman aktif
        $activePeminjaman = $anggotum->peminjaman()
            ->where('status_peminjaman', 'dipinjam')
            ->count();

        if ($activePeminjaman > 0) {
            return redirect()->route('anggota.index')
                ->with('error', 'Tidak dapat menghapus anggota dengan peminjaman aktif.');
        }

        // Cari user dengan email yang sama
        $user = User::where('email', $anggotum->email)->first();

        if ($user) {
            // Jika user yang dihapus adalah user yang sedang login
            if (Auth::user() && Auth::user()->id === $user->id) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();
            }

            // Hapus user
            $user->delete();
        }

        // Hapus anggota
        $anggotum->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
