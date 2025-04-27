<x-default-layout title="Pembeli" section_title="Pembeli">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="flex">
        <a href="{{ route('Pembeli.add') }}"
           class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Pembeli</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead> 
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">id_pembeli</th>
                    <th class="py-3 px-6 text-center">Nama Pembeli</th>
                    <th class="py-3 px-6 text-center">Gender</th>
                    <th class="py-3 px-6 text-center">Alamat</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($pembeli as $pembelian)                    
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration  }}</td>
                    <td class="py-3 px-6 text-left">{{ $pembelian->id_pembeli }}</td>
                    <td class="py-3 px-6 text-center">{{ $pembelian->nama }}</td>
                    <td class="py-3 px-6 text-center">{{ $pembelian->gender }}</td>
                    <td class="py-3 px-6 text-center">{{ $pembelian->alamat }}</td>
                    <td class="py-3 px-6 flex justify-center gap-1">
                     
                        <form onsubmit="return confirm('Are you sure you want to delete this student?')"
                        action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="bg-red-50 border cursor-pointer border-red-500 p-2">
                                <i class="ph ph-trash-simple block text-red-500"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                    <td class="py-4 text-center text-zinc-500" colspan="7">
                        Tidak ada pakaian
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>
