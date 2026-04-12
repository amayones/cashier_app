<footer class="bg-gray-950 text-gray-400">
    <div class="max-w-6xl mx-auto px-6 py-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-white text-base">MahoraPOS</span>
                </div>
                <p class="text-sm leading-relaxed mb-4">Sistem kasir modern berbasis cloud untuk bisnis ritel Indonesia.</p>
                <div class="flex items-center gap-2">
                    @foreach(['M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z', 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z M4 6a2 2 0 100-4 2 2 0 000 4z'] as $icon)
                    <a href="/" class="w-8 h-8 rounded-lg bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $icon }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>
            @php
            $cols = [
                'Produk'     => ['/pricing' => 'Harga', '/#fitur' => 'Fitur', '/register' => 'Daftar', '/login' => 'Masuk'],
                'Perusahaan' => ['/' => 'Beranda', '/pricing' => 'Tentang', '/register' => 'Karir', '/pricing' => 'Blog'],
                'Dukungan'   => ['/login' => 'Login', '/register' => 'Daftar', '/onboarding' => 'Setup', '/settings' => 'Pengaturan'],
            ];
            @endphp
            @foreach($cols as $title => $links)
            <div>
                <p class="text-sm font-semibold text-white mb-3">{{ $title }}</p>
                <ul class="space-y-2">
                    @foreach($links as $href => $link)
                    <li><a href="{{ $href }}" class="text-sm hover:text-white transition-colors">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs">&copy; {{ date('Y') }} MahoraPOS. All rights reserved.</p>
            <div class="flex items-center gap-4 text-xs">
                <a href="/pricing" class="hover:text-white transition-colors">Privasi</a>
                <a href="/pricing" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="/register" class="hover:text-white transition-colors">Daftar</a>
            </div>
        </div>
    </div>
</footer>
