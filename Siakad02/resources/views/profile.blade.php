<x-default-layout title="Dashboard" section_title="Dashboard">
    <div class="flex flex-col md:w-1/2 lg:w-1/2 gap-4 px-6 py-4 bg-white border border-t-4 border-zinc-300 shadow col-span-3 md:col-span-2" >
        <div class="flex flex-col gap-2">
            <div class="font-semibold">Name</div>
            <div class="px-3 py-2 border border-zinc-300">{{ $user->name }}</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="font-semibold">Email</div>
            <div class="px-3 py-2 border border-zinc-300">{{ $user->email }}</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="font-semibold">Role</div>
            <div class="px-3 py-2 border border-zinc-300">{{ $user->role }}</div>
        </div>
        <form action="{{ route("auth.logout") }}" method="POST" class="self-end mt-4">
            @csrf
            @method("POST")
            <button type="submit" class="bg-red-500 border text-white px-3 py-2 text-center gap-2 cursor-pointer mt-4">
                <span>Logout</span>
            </button>

        </form>

    </div>
</x-default-layout>
