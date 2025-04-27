@extends('components.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Edit Buku</h1>
        <div class="flex space-x-2">
            <a href="{{ route('buku.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-[#572DFF] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
            <a href="{{ route('buku.show', $buku->id_buku) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-[#572DFF] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
                Lihat Detail
            </a>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Ada kesalahan pada input Anda</h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <div class="mt-1">
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <div class="mt-1">
                            <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                        <div class="mt-1">
                            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <div class="mt-1">
                            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" min="1800" max="{{ date('Y') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="jumlah_tersedia" class="block text-sm font-medium text-gray-700">Jumlah Tersedia</label>
                        <div class="mt-1">
                            <input type="number" name="jumlah_tersedia" id="jumlah_tersedia" value="{{ old('jumlah_tersedia', $buku->jumlah_tersedia) }}" min="0" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#572DFF] hover:bg-[#4520cc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
