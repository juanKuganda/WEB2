@extends('components.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Peminjaman</h1>
        <a href="{{ route('peminjaman.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#572DFF] hover:bg-[#4520cc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Peminjaman
        </a>
    </div>
    
    <!-- Search and Filter -->
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 mb-6">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-lg leading-6 font-medium text-gray-900">Cari Peminjaman</h2>
            </div>
        </div>
        <div class="mt-4">
            <form action="{{ route('peminjaman.index') }}" method="GET" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700">Cari</label>
                    <div class="mt-1">
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" placeholder="Nama Anggota atau Judul Buku">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <select id="status" name="status" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3">
                            <option value="">Semua</option>
                            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="date_range" class="block text-sm font-medium text-gray-700">Rentang Tanggal</label>
                    <div class="mt-1 flex space-x-2">
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3">
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3">
                    </div>
                </div>
                <div class="sm:col-span-1 flex items-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#572DFF] hover:bg-[#4520cc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF] w-full justify-center">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Peminjaman Table -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Anggota
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Buku
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Pinjam
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Kembali
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($peminjaman as $pinjam)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-[#572DFF] flex items-center justify-center text-white font-medium">
                                                {{ substr($pinjam->anggota->nama, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $pinjam->anggota->nama }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                ID: {{ $pinjam->anggota->id_anggota }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $pinjam->buku->judul }}</div>
                                    <div class="text-sm text-gray-500">{{ $pinjam->buku->penulis }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $pinjam->tanggal_pinjam->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $pinjam->tanggal_kembali ? $pinjam->tanggal_kembali->format('d M Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pinjam->status_peminjaman == 'dipinjam')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Dipinjam
                                    </span>
                                    @elseif($pinjam->status_peminjaman == 'dikembalikan')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Dikembalikan
                                    </span>
                                    @elseif($pinjam->status_peminjaman == 'terlambat')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Terlambat
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if($pinjam->status_peminjaman == 'dipinjam' || $pinjam->status_peminjaman == 'terlambat')
                                    <a href="{{ route('peminjaman.return', $pinjam->id_peminjaman) }}" class="text-[#FFC107] hover:text-[#e6af06] mr-3">
                                        Kembalikan
                                    </a>
                                    @endif
                                    <a href="{{ route('peminjaman.show', $pinjam->id_peminjaman) }}" class="text-[#572DFF] hover:text-[#4520cc] mr-3">
                                        Lihat
                                    </a>
                                    <a href="{{ route('peminjaman.edit', $pinjam->id_peminjaman) }}" class="text-[#572DFF] hover:text-[#4520cc] mr-3">
                                        Edit
                                    </a>
                                    <form action="{{ route('peminjaman.destroy', $pinjam->id_peminjaman) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $peminjaman->links() }}
    </div>
</div>
@endsection
