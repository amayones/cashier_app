<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar — MahoraPOS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased">
<div class="min-h-screen flex">

    {{-- Left panel --}}
    <div class="hidden lg:flex lg:w-5/12 bg-gradient-to-br from-blue-700 to-indigo-800 flex-col justify-between p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        </div>
        <a href="/" class="flex items-center gap-2.5 relative z-10">
            <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <span class="font-bold text-white text-xl">MahoraPOS</span>
        </a>
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 rounded-full text-xs font-semibold text-blue-100 mb-5">
                🎉 Trial 14 hari gratis, tanpa kartu kredit
            </div>
            <h2 class="text-3xl font-extrabold text-white mb-4 leading-tight">Mulai perjalanan<br>bisnis Anda hari ini</h2>
            <p class="text-blue-100 text-sm leading-relaxed mb-8">Daftar dalam 2 menit dan langsung gunakan semua fitur MahoraPOS secara gratis selama 14 hari.</p>
            <div class="bg-white/10 rounded-2xl p-5 border border-white/20">
                <p class="text-xs font-bold text-blue-200 uppercase tracking-wide mb-3">Yang Anda dapatkan di Trial:</p>
                <div class="space-y-2.5">
                    @foreach(['Akses semua fitur Pro','3 kasir aktif','500 produk','Laporan lengkap','Support via chat','QRIS & semua metode bayar'] as $item)
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-sm text-blue-100">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <p class="text-blue-200 text-xs relative z-10">Sudah dipercaya oleh <span class="font-bold text-white">5.000+</span> pemilik toko di Indonesia</p>
    </div>

    {{-- Right panel --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12 overflow-y-auto">
        <div class="w-full max-w-md">
            <a href="/" class="flex items-center gap-2 mb-8 lg:hidden">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></div>
                <span class="font-bold text-gray-900 text-lg">MahoraPOS</span>
            </a>
            <div class="mb-8">
                <h1 class="text-2xl font-extrabold text-gray-900">Buat akun gratis</h1>
                <p class="text-gray-500 mt-1 text-sm">Trial 14 hari, tidak perlu kartu kredit</p>
            </div>
            <form action="#" method="POST" class="space-y-4" x-data="{showPass:false,plan:'trial'}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" placeholder="Budi Santoso" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" placeholder="nama@toko.com" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Toko <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <input type="text" name="store_name" placeholder="Toko Mahora Jaya" class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input :type="showPass?'text':'password'" name="password" placeholder="Min. 8 karakter"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400 pr-12"/>
                        <button type="button" @click="showPass=!showPass" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Paket Awal</label>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach([['trial','Trial','14 hari gratis'],['basic','Basic','Rp 99rb/bln'],['pro','Pro','Rp 249rb/bln']] as [$val,$label,$sub])
                        <label class="cursor-pointer">
                            <input type="radio" name="plan" value="{{ $val }}" class="sr-only" @change="plan='{{ $val }}'"/>
                            <div :class="plan==='{{ $val }}'?'border-blue-500 bg-blue-50 text-blue-700':'border-gray-200 text-gray-600 hover:border-gray-300'"
                                 class="border-2 rounded-xl p-3 text-center transition-all">
                                <p class="text-sm font-bold">{{ $label }}</p>
                                <p class="text-[10px] mt-0.5 opacity-70">{{ $sub }}</p>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-start gap-2.5">
                    <input type="checkbox" id="terms" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 mt-0.5 shrink-0"/>
                    <label for="terms" class="text-sm text-gray-600 leading-relaxed">
                        Saya setuju dengan <a href="/pricing" class="text-blue-600 hover:underline font-medium">Syarat & Ketentuan</a> dan <a href="/pricing" class="text-blue-600 hover:underline font-medium">Kebijakan Privasi</a>.
                    </label>
                </div>
                <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition-colors shadow-sm shadow-blue-200 flex items-center justify-center gap-2">
                    Buat Akun Gratis
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
            </form>
            <p class="text-center text-sm text-gray-500 mt-6">
                Sudah punya akun? <a href="/login" class="text-blue-600 font-semibold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
