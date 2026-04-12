<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — MahoraPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        *{font-family:'Inter',sans-serif}
        [x-cloak]{display:none!important}
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
<div class="min-h-screen flex">

    {{-- Left panel --}}
    <div class="hidden lg:flex lg:w-[45%] bg-indigo-600 flex-col justify-between p-12">
        <a href="/" class="flex items-center gap-2">
            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <span class="font-semibold text-white text-[15px]">MahoraPOS</span>
        </a>

        <div>
            <h2 class="text-3xl font-bold text-white mb-4 leading-tight">Kelola toko Anda<br>lebih cerdas & efisien</h2>
            <p class="text-indigo-200 text-sm leading-relaxed mb-8">Sistem kasir modern dengan laporan real-time, manajemen stok otomatis, dan dukungan QRIS.</p>
            <div class="space-y-3">
                @foreach(['POS cepat & mudah digunakan','Laporan penjualan real-time','Dukungan QRIS & semua metode bayar','Akses dari mana saja, kapan saja'] as $item)
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-indigo-300 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-indigo-100 text-sm">{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center gap-3">
            <div class="flex -space-x-2">
                @foreach(['BS','SR','HG','AP'] as $av)
                <div class="w-8 h-8 rounded-full bg-white/20 border-2 border-indigo-600 flex items-center justify-center text-[10px] font-semibold text-white">{{ $av }}</div>
                @endforeach
            </div>
            <p class="text-indigo-200 text-xs">Bergabung dengan <span class="font-semibold text-white">5.000+</span> pemilik toko</p>
        </div>
    </div>

    {{-- Right panel --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12 bg-[#f8f8fc]">
        <div class="w-full max-w-sm">

            {{-- Mobile logo --}}
            <a href="/" class="flex items-center gap-2 mb-8 lg:hidden">
                <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-900 text-[15px]">MahoraPOS</span>
            </a>

            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Selamat datang kembali</h1>
                <p class="text-gray-400 mt-1 text-sm">Masuk ke akun MahoraPOS Anda</p>
            </div>

            <form action="#" method="POST" class="space-y-4" x-data="{showPass:false}">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" placeholder="nama@toko.com" autocomplete="email"
                           class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 transition"/>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                        <a href="/login" class="text-xs text-indigo-600 hover:underline">Lupa password?</a>
                    </div>
                    <div class="relative">
                        <input :type="showPass?'text':'password'" name="password" placeholder="••••••••"
                               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 pr-11 transition"/>
                        <button type="button" @click="showPass=!showPass"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-500 transition-colors">
                            <svg x-show="!showPass" class="w-4.5 h-4.5" style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="showPass" x-cloak class="w-4.5 h-4.5" style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember"
                           class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"/>
                    <label for="remember" class="text-sm text-gray-500">Ingat saya selama 30 hari</label>
                </div>

                <button type="submit"
                        class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition-colors flex items-center justify-center gap-2">
                    Masuk ke Dashboard
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
                <div class="relative flex justify-center">
                    <span class="bg-[#f8f8fc] px-3 text-xs text-gray-400">atau masuk dengan</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                @foreach([['Google','M12.545 10.239v3.821h5.445c-.712 2.315-2.647 3.972-5.445 3.972a6.033 6.033 0 110-12.064c1.498 0 2.866.549 3.921 1.453l2.814-2.814A9.969 9.969 0 0012.545 2C7.021 2 2.543 6.477 2.543 12s4.478 10 10.002 10c8.396 0 10.249-7.85 9.426-11.748l-9.426-.013z'],['Facebook','M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z']] as [$name,$icon])
                <button class="flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $icon }}"/>
                    </svg>
                    {{ $name }}
                </button>
                @endforeach
            </div>

            <p class="text-center text-sm text-gray-400 mt-6">
                Belum punya akun? <a href="/register" class="text-indigo-600 font-medium hover:underline">Daftar gratis</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
