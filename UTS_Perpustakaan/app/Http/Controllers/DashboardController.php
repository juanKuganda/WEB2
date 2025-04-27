<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = Anggota::count();
        $totalBuku = Buku::count();
        $activePeminjaman = Peminjaman::where('status_peminjaman', 'dipinjam')->orWhere('status_peminjaman', 'terlambat')->count();

        $recentPeminjaman = Peminjaman::with(['anggota', 'buku'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $popularBuku = Buku::withCount('peminjaman as peminjaman_count')
            ->orderBy('peminjaman_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalAnggota',
            'totalBuku',
            'activePeminjaman',
            'recentPeminjaman',
            'popularBuku'
        ));
    }
}
