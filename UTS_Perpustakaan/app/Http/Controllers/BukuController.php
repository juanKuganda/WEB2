<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('penerbit', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun_terbit', $request->input('tahun'));
        }

        if ($request->filled('availability')) {
            if ($request->input('availability') == 'available') {
                $query->where('jumlah_tersedia', '>', 0);
            } else {
                $query->where('jumlah_tersedia', 0);
            }
        }

        $buku = $query->orderBy('judul')->paginate(10);

        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('store')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1800|max:' . date('Y'),
            'jumlah_tersedia' => 'required|integer|min:0',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        $buku->load([
            'peminjaman' => function ($query) {
                $query->with('anggota')->orderBy('created_at', 'desc');
            }
        ]);

        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }
    
    public function update(Request $request, Buku $buku)
    {

        if (!Gate::allows('edit')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1800|max:' . date('Y'),
            'jumlah_tersedia' => 'required|integer|min:0',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        if (!Gate::allows('destroy')) {
            abort(403, 'Unauthorized action.');
        }
        $activePeminjaman = $buku->peminjaman()
            ->where('status_peminjaman', 'dipinjam')
            ->count();

        if ($activePeminjaman > 0) {
            return redirect()->route('buku.index')
                ->with('error', 'Tidak dapat menghapus buku dengan peminjaman aktif.');
        }

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
