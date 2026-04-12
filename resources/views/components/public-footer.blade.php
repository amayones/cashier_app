<footer class="bg-gray-950 text-gray-500">
    <div class="max-w-5xl mx-auto px-6 py-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-white text-[15px]">MahoraPOS</span>
                </div>
                <p class="text-sm leading-relaxed">Sistem kasir modern berbasis cloud untuk bisnis ritel Indonesia.</p>
            </div>
            @php
            $cols = [
                'Produk'     => ['/pricing' => 'Harga', '/#fitur' => 'Fitur', '/register' => 'Daftar'],
                'Perusahaan' => ['/' => 'Beranda', '/pricing' => 'Tentang', '/pricing' => 'Blog'],
                'Dukungan'   => ['/login' => 'Login', '/register' => 'Daftar', '/onboarding' => 'Setup'],
            ];
            @endphp
            @foreach($cols as $title => $links)
            <div>
                <p class="text-xs font-semibold text-gray-300 uppercase tracking-wider mb-4">{{ $title }}</p>
                <ul class="space-y-2.5">
                    @foreach($links as $href => $link)
                    <li><a href="{{ $href }}" class="text-sm hover:text-white transition-colors">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs">&copy; {{ date('Y') }} MahoraPOS. All rights reserved.</p>
            <div class="flex items-center gap-5 text-xs">
                <a href="/pricing" class="hover:text-white transition-colors">Privasi</a>
                <a href="/pricing" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
