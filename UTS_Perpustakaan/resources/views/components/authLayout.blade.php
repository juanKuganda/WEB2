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
    <title>{{ $title }} - Perpustakaan</title>
</head>
<body class="bg-zinc-100">
    <main class="flex items-center justify-center w-full h-screen">
        <div class="p-10 w-full h-screen flex justify-around items-center">
            <div class="items-center gap-2 flex-col hidden md:flex"">
                <img src="{{ asset('logo.png') }}" alt="" class="size-72">
            </div>
            <div
                class="flex justify-center gap-4 min-w-96 border border-zinc-300 rounded-md shadow-md bg-white h-fit">
                <div class="w-full p-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>