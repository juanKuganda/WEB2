<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-900">
                <div class="flex items-center h-16 px-4 bg-gray-800">
                    <div class="flex items-center">
                        <img src="{{ asset('logo.png') }}" alt="logo" class="h-10 w-10 ">
                        <span class="ml-2 text-white font-semibold text-lg">Perpustakaan</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <div class="space-y-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                            Dashboard
                        </a>
                        
                        <a href="{{ route('anggota.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('anggota.*') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            Anggota
                        </a>
                        <a href="{{ route('buku.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('buku.*') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                            </svg>
                            Buku
                        </a>
                        <a href="{{ route('category.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('category.*') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <i class="ph ph-list-dashes w-5 mr-3 "></i>
                            Category
                        </a>
                        <a href="{{ route('peminjaman.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('peminjaman.*') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            Peminjaman
                        </a>
                        <a href="{{ route('penjaga.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('penjaga.*') ? 'bg-[#572DFF] text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            <i class="ph ph-users w-5 mr-3 "></i>
                            Penjaga
                        </a>
                    </div>
                </div>
            
            </div>
        </div>
        
        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navbar -->
            <div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200" x-data="{ open: false }">
                <div class="ml-auto relative" x-data="{ profileOpen: false }">
                    <button  @click="profileOpen = !profileOpen"
                class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-100 group border border-neutral-300 cursor-pointer">
                    <i class="ph ph-user-circle block text-black text-2xl"></i>
                    <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                </button>
        
                <div x-show="profileOpen" 
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border">
                    <a href="{{ route('profile.index') }}" 
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Profile Settings
                    </a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" 
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
                <!-- Mobile menu button -->
                <button type="button" class="md:hidden text-gray-500 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#572DFF]">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                
                
            </div>
            
            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50 overflow-x-hidden">
                <!-- Flash Messages -->
                @include('components.flash-message')
                
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
