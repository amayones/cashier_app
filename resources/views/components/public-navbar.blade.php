<header x-data="{open:false}" class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        <a href="/" class="flex items-center gap-2 shrink-0">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shadow-sm shadow-blue-200">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <span class="font-bold text-gray-900 text-lg tracking-tight">MahoraPOS</span>
        </a>

        <nav class="hidden md:flex items-center gap-1">
            @foreach(['/' => 'Home', '/pricing' => 'Harga', '#fitur' => 'Fitur', '/login' => 'Masuk'] as $url => $label)
                <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">{{ $label }}</a>
            @endforeach
        </nav>

        <div class="hidden md:flex items-center gap-2">
            <a href="/login" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-600 transition-colors">Masuk</a>
            <a href="/register" class="px-4 py-2 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm">Coba Gratis</a>
        </div>

        <button @click="open=!open" class="md:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">
            <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden border-t border-gray-100 bg-white px-6 py-4 space-y-1">
            @foreach(['/' => 'Home', '/pricing' => 'Harga', '#fitur' => 'Fitur'] as $url => $label)
                <a href="{{ $url }}" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">{{ $label }}</a>
            @endforeach
            <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                <a href="/login"    class="block px-3 py-2 text-sm font-semibold text-center text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">Masuk</a>
                <a href="/register" class="block px-3 py-2 text-sm font-bold text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">Coba Gratis</a>
            </div>
    </div>
</header>
