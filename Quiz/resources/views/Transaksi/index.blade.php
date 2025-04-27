<x-default-layout title="Transaksi" section_title="Transaksi">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead> 
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">id_pembeli</th>
                    <th class="py-3 px-6 text-left">id_pakaian</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($transaksi as $bill)                    
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration  }}</td>
                    <td class="py-3 px-6 text-left">{{ $bill->id_pembeli }}</td>
                    <td class="py-3 px-6 text-left">{{ $bill->id_pakaian }}</td>
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
                        Tidak ada Transaksi
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>
