<x-default-layout title="Pakaian" section_title="Pakaian">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="flex">
        <a href="{{ route('Pakaian.add') }}"
           class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Pakaian</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead> 
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">id_pakaian</th>
                    <th class="py-3 px-6 text-center">Nama Pakain</th>
                    <th class="py-3 px-6 text-center">Jenis</th>
                    <th class="py-3 px-6 text-center">Ukuran</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($pakaian as $pakaians)                    
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration  }}</td>
                    <td class="py-3 px-6 text-left">{{ $pakaians->id_pakaian }}</td>
                    <td class="py-3 px-6 text-center">{{ $pakaians->nama_pakaian }}</td>
                    <td class="py-3 px-6 text-center">{{ $pakaians->jenis }}</td>
                    <td class="py-3 px-6 text-center">{{ $pakaians->ukuran }}</td>
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
