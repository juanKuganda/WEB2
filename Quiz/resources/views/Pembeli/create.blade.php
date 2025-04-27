<x-default-layout title="Pembeli" section_title="Add new pembeli">
    <div class="grid grid-cols-3">
        <form action="{{ route('Pembeli.store') }}" method="POST"
              class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
            @csrf
            @method("POST")

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="nama">Nama Pembeli</label>
                    <input type="text" id="nama" name="nama"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="Nama pembeli" />
                    @error('nama')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="id_pembeli">Kode Pembeli</label>
                    <input type="text" id="id_pembeli" name="id_pembeli"
                           class="px-3 py-2 border border-zinc-300 bg-slate-50"
                           placeholder="Code Pembeli (e.g., A1***)" />
                                  @error('id_pembeli')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                           class="px-3 py-2 border border-zinc-300 bg-slate-50"
                           placeholder="alamat (e.g., T-Shirt)" />
                                  @error('alamat')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                </div>
                  <div class="flex flex-col gap-2">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender"
                            class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                        <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Pilih gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="self-end flex gap-2">
                <a href="{{ route('Pembeli.index') }}"
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
