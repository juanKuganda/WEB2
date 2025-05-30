@extends('components.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Tambah Anggota Baru</h1>
        <a href="{{ route('anggota.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-[#572DFF] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
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
        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <div class="mt-1">
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="no_telepon" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                        <div class="mt-1">
                            <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="tanggal_registrasi" class="block text-sm font-medium text-gray-700">Tanggal Registrasi</label>
                        <div class="mt-1">
                            <input type="date" name="tanggal_registrasi" id="tanggal_registrasi" value="{{ old('tanggal_registrasi', date('Y-m-d')) }}" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <div class="mt-1">
                            <textarea name="alamat" id="alamat" rows="3" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password" class="shadow-sm focus:ring-[#572DFF] focus:border-[#572DFF] block w-full sm:text-sm border-gray-300 rounded-md p-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#572DFF] hover:bg-[#4520cc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
