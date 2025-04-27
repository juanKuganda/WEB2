<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['anggota', 'buku']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('anggota', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhereHas('buku', function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status_peminjaman', $request->input('status'));
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal_pinjam', [
                Carbon::parse($request->input('start_date'))->startOfDay(),
                Carbon::parse($request->input('end_date'))->endOfDay()
            ]);
        }

        $peminjaman = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::where('jumlah_tersedia', '>', 0)->get();

        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:buku,id_buku',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $buku = Buku::findOrFail($validated['id_buku']);
        if ($buku->jumlah_tersedia <= 0) {
            return redirect()->back()
                ->with('error', 'Buku tidak tersedia untuk dipinjam.')
                ->withInput();
        }

        $validated['status_peminjaman'] = 'dipinjam';

        $peminjaman = Peminjaman::create($validated);

        $buku->decrement('jumlah_tersedia');

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['anggota', 'buku']);

        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:buku,id_buku',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan,terlambat',
        ]);

        if ($peminjaman->id_buku != $validated['id_buku']) {
            $oldBuku = Buku::findOrFail($peminjaman->id_buku);
            $oldBuku->increment('jumlah_tersedia');

            $newBuku = Buku::findOrFail($validated['id_buku']);
            $newBuku->decrement('jumlah_tersedia');
        }

        if ($peminjaman->status_peminjaman != 'dikembalikan' && $validated['status_peminjaman'] == 'dikembalikan') {
            $buku = Buku::findOrFail($validated['id_buku']);
            $buku->increment('jumlah_tersedia');
        }

        if ($peminjaman->status_peminjaman == 'dikembalikan' && $validated['status_peminjaman'] != 'dikembalikan') {
            $buku = Buku::findOrFail($validated['id_buku']);
            $buku->decrement('jumlah_tersedia');
        }

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status_peminjaman != 'dikembalikan') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            $buku->increment('jumlah_tersedia');
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function return(Peminjaman $peminjaman)
    {
        $buku = Buku::findOrFail($peminjaman->id_buku);

        $peminjaman->update([
            'status_peminjaman' => 'dikembalikan',
            'tanggal_kembali' => Carbon::now(),
        ]);

        $buku->increment('jumlah_tersedia');

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}
