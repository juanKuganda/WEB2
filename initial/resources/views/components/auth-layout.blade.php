@props(["title", "section_title" => "Menu", "section_description" => ""])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }}</title>
</head>
<body class="bg-zinc-100">
    <main class="flex items-center justify-center min-h-svh">
        <div class="space-y-6 p-6 max-w-[30rem] w-full">
            <div class="flex items-center justify-center gap-2">
                <i class="ph ph-student inline-block text-xl bg-zinc-900 text-white p-1 rounded-b-md"></i>
                <p class="font-semibold text-sm">Student Management</p>
            </div>
            <div
                class="flex flex-col items-center justify-center gap-4 w-full border border-zinc-300 rounded-md shadow-md bg-white p-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-bold text-center">{{ $title }}</h2>
                    <p class="text-sm text-center text-zinc-500">{{ $section_description }}</p>
                </div>
                <div class="h-[1px] bg-zinc-300 w-full"></div>
                {{ $slot }}
            </div>
        </div>
        </div>
    </main>
</body>
</html>