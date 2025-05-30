@extends('components.app')

@section('content')
<div class="">
    <div class="w-full">
        <div class="bg-white shadow sm:rounded-lg w-full">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah Penjaga Baru</h3>
                <form action="{{ route('penjaga.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="mt-1 focus:ring-[#572DFF] focus:border-[#572DFF] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2">
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 focus:ring-[#572DFF] focus:border-[#572DFF] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" class="mt-1 focus:ring-[#572DFF] focus:border-[#572DFF] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md  p-2">
                            @error('no_telepon')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#572DFF] hover:bg-[#4520cc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">Simpan</button>
                        <a href="{{ route('penjaga.index') }}" class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#572DFF]">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection