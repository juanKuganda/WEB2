<x-default-layout title="Pakaian" section_title="Add new pakaian">
    <div class="grid grid-cols-3">
        <form action="{{ route('Pakaian.store') }}" method="POST"
              class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
            @csrf
            @method("POST")

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="nama_pakaian">Name Pakaian</label>
                    <input type="text" id="nama_pakaian" name="nama_pakaian"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="Nama pakaian" />
                    @error('name')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="id_pakaian">Kode Pakaian</label>
                    <input type="text" id="id_pakaian" name="id_pakaian"
                           class="px-3 py-2 border border-zinc-300 bg-slate-50"
                           placeholder="Code Pakaian (e.g., A1***)" />
                                  @error('id_pakaian')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="jenis">Jenis</label>
                    <input type="text" id="jenis" name="jenis"
                           class="px-3 py-2 border border-zinc-300 bg-slate-50"
                           placeholder="jenis (e.g., T-Shirt)" />
                                  @error('jenis')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>
                  <div class="flex flex-col gap-2">
                    <label for="ukuran">Ukuran</label>
                    <select name="ukuran" id="ukuran"
                            class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                        <option value="" disabled {{ old('ukuran') == '' ? 'selected' : '' }}>Pilih Ukuran</option>
                        <option value="XL" {{ old('ukuran') == 'XL' ? 'selected' : '' }}>XL</option>
                        <option value="L" {{ old('ukuran') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="M" {{ old('ukuran') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="S" {{ old('ukuran') == 'S' ? 'selected' : '' }}>S</option>
                    </select>
                    @error('ukuran')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="self-end flex gap-2">
                <a href="{{ route('Pakaian.index') }}"
                   class="bg-slate-50 border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Cancel</span>
                </a>

                <button type="submit"
                        class="bg-blue-50 border border-blue-500 text-blue-500 px-3 py-2 flex items-center gap-2 cursor-pointer">
                    <i class="ph ph-floppy-disk block text-blue-500"></i>
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
