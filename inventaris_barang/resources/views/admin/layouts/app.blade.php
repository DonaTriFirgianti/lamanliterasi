<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-pink-50 text-gray-800" x-data="{ sidebarOpen: localStorage.getItem('sidebar') === 'open' }"
    x-init="$watch('sidebarOpen', value => localStorage.setItem('sidebar', value ? 'open' : 'closed'))">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-purple-100 shadow-lg fixed w-full z-20 border-b border-pink-200 bg-opacity-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-2">
                        <!-- Hamburger Button -->
                        <button x-show="!sidebarOpen" @click="sidebarOpen = true"
                            class="p-2 text-purple-600 hover:text-purple-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <!-- Close Button (X) -->
                        <button x-show="sidebarOpen" @click="sidebarOpen = false"
                            class="p-2 text-purple-600 hover:text-purple-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Logo -->
                        <div class="flex items-center">
                            <a href="{{ route('admin.dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-purple-200" />
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-purple-600 bg-pink-100 hover:bg-pink-200 focus:outline-none transition">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside
            class="fixed left-0 mt-16 h-full bg-pink-100 border-r border-pink-200 shadow-md transform transition-all duration-300 z-10 overflow-hidden"
            :class="sidebarOpen ? 'w-64 translate-x-0' : '-translate-x-full w-0'">

            <nav class="p-4 overflow-y-auto h-[calc(100vh-4rem)]">
                <ul class="space-y-2 text-purple-700">
                    @php
                        $routes = [
                            ['name' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                            ['name' => 'Manajemen Barang', 'route' => 'admin.items.index', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                            ['name' => 'Kategori', 'route' => 'admin.categories.index', 'icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
                            ['name' => 'Supplier', 'route' => 'admin.suppliers.index', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                            ['name' => 'Transaksi', 'route' => 'admin.transactions.index', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z']
                        ];
                    @endphp

                    @foreach($routes as $r)
                                    <li>
                                        <a href="{{ route($r['route']) }}" class="flex items-center p-3 rounded-lg transition group 
                                            {{ request()->routeIs(Str::replaceLast('.index', '.*', $r['route']))
                        ? 'bg-pink-200 text-purple-700'
                        : 'hover:bg-pink-200 text-purple-600' }}">
                                            <svg class="w-5 h-5 mr-3 {{ request()->routeIs(Str::replaceLast('.index', '.*', $r['route'])) ? 'text-purple-700' : 'text-purple-400' }}"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $r['icon'] }}" />
                                            </svg>
                                            <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0'"
                                                class="transition-opacity duration-300 whitespace-nowrap">{{ $r['name'] }}</span>
                                        </a>
                                    </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="pt-20 p-6 transition-all duration-300 bg-white shadow-inner rounded-tl-3xl min-h-screen"
            :class="sidebarOpen ? 'ml-64' : 'ml-0'">
            <div class="max-w-7xl mx-auto">
                <!-- @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif -->

                @yield('content')
            </div>
        </main>

        <script src="https://unpkg.com/feather-icons"></script>
        @stack('scripts')
    </div>
</body>

</html>