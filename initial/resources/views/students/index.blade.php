<x-default-layout title="Student" section_title="Students">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="flex">
        <a href="{{ route('students.add') }}"
           class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Student</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead> 
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Student ID Numbers</th>
                    <th class="py-3 px-6 text-center">Gender</th>
                    <th class="py-3 px-6 text-center">Majors</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($students as $student)                    
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration  }}</td>
                    <td class="py-3 px-6 text-left">{{ $student->name }}</td>
                    <td class="py-3 px-6 text-center">{{ $student->student_id_number }}</td>
                    <td class="py-3 px-6 text-center">{{ $student->gender }}</td>
                    <td class="py-3 px-6 text-center">{{ $student->majors->name }}</td>
                    <td class="py-3 px-6 text-center">{{ $student->status }}</td>
                    <td class="py-3 px-6 flex justify-center gap-1">
                        <a href="{{ route('students.show', $student->id) }}"
                           class="bg-blue-50 border border-blue-500 p-2 inline-block">
                            <i class="ph ph-eye block text-blue-500"></i>
                        </a>
                        <a href="{{ route('students.edit', $student->id) }}"
                           class="bg-yellow-50 border border-yellow-500 p-2 inline-block">
                            <i class="ph ph-note-pencil block text-yellow-500"></i>
                        </a>
                        <form onsubmit="return confirm('Are you sure you want to delete this student?')"
                        action="{{ route('students.destroy', $student->id) }}" method="POST">
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
                        No Students found
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>
