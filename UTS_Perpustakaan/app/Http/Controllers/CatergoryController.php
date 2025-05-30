<?php

namespace App\Http\Controllers;

// use App\Models\Buku;

use App\Models\Buku;
use App\Models\Catergory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CatergoryController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $categories = Catergory::withCount('buku')->orderBy('name')->get();
        return view('category.index', compact('categories', 'totalBuku'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('store')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:catergories,name',
        ]);

        Catergory::create($validated);

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy(Catergory $category)
    {
        if (!Gate::allows('destroy')) {
            abort(403, 'Unauthorized action.');
        }
        if ($category->buku()->count() > 0) {
            return redirect()->route('category.index')
                ->with('error', 'Tidak dapat menghapus kategori yang masih memiliki buku.');
        }

        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
