<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | SBK Admin Panel</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo-sbk.png') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-900" x-data="{ sidebarOpen: false }">

    {{-- ===== SIDEBAR ===== --}}
    {{-- Overlay mobile --}}
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-30 lg:hidden"
        style="display: none;">
    </div>

    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 h-full w-64 bg-sbk-black z-40 flex flex-col transition-transform duration-300 lg:translate-x-0">

        {{-- Logo --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
            <img src="{{ asset('images/logo-sbk.png') }}" alt="SBK" class="h-10 w-auto brightness-0 invert">
            <div>
                <p class="font-heading font-bold text-white text-xs leading-tight">SASTRA BHINNEKA</p>
                <p class="font-heading font-bold text-sbk-red text-xs leading-tight">ADMIN PANEL</p>
            </div>
        </div>

        {{-- Nav Menu --}}
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">

            {{-- Dashboard --}}
            <a href="{{ url('/admin') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            {{-- Label --}}
            <p class="text-gray-600 text-xs uppercase tracking-widest font-bold px-3 pt-4 pb-1">Konten Website</p>

            {{-- Pengaturan Beranda --}}
            <a href="{{ route('admin.homepage.edit') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.homepage.*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Pengaturan Beranda
            </a>

            {{-- Layanan --}}
            <a href="{{ url('/admin/services') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/services*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                Layanan
            </a>

            {{-- Portofolio --}}
            <a href="{{ url('/admin/portfolios') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/portfolios*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Portofolio
            </a>

            {{-- Klien --}}
            <a href="{{ url('/admin/clients') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/clients*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Klien
            </a>

            {{-- Blog --}}
            <a href="{{ url('/admin/posts') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/posts*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Blog
            </a>

            {{-- Testimoni --}}
            <a href="{{ url('/admin/testimonials') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/testimonials*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                Testimoni
            </a>

            {{-- Pesan Masuk --}}
            <a href="{{ url('/admin/contacts') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                    {{ request()->is('admin/contacts*') ? 'bg-sbk-red text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Pesan Masuk
            </a>

        </nav>

        {{-- Bottom: lihat website + logout --}}
        <div class="px-4 py-4 border-t border-white/10 space-y-1">
            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:bg-white/10 hover:text-white transition-all duration-200">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                Lihat Website
            </a>

            <form action="{{ url('/admin/logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:bg-red-600/20 hover:text-red-400 transition-all duration-200">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN AREA ===== --}}
    <div class="lg:ml-64 min-h-screen flex flex-col">

        {{-- Top bar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-20">
            {{-- Hamburger (mobile) --}}
            <button @click="sidebarOpen = !sidebarOpen" type="button"
                class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- Page title --}}
            <h1 class="font-heading font-bold text-gray-900 text-base lg:text-lg">
                @yield('title', 'Admin Panel')
            </h1>

            {{-- User info --}}
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-sbk-red rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </span>
                </div>
                <span class="hidden sm:block text-sm font-semibold text-gray-700">
                    {{ auth()->user()->name ?? 'Admin' }}
                </span>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-white border-t border-gray-200 px-6 py-4 text-center">
            <p class="text-xs text-gray-400">&copy; {{ date('Y') }} PT Sastra Bhinneka Karya &mdash; Admin Panel</p>
        </footer>

    </div>

    @stack('scripts')
</body>

</html>