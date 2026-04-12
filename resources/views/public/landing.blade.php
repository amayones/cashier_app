<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MahoraPOS — Sistem Kasir Modern untuk Bisnis Anda</title>
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

@include('components.public-navbar')

{{-- HERO --}}
<section class="pt-24 lg:pt-32 pb-16 lg:pb-24 px-6 bg-[#f8f8fc]">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

            {{-- Copy --}}
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 border border-indigo-100 rounded-full text-xs font-medium text-indigo-700 mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 inline-block"></span>
                    Versi 2.0 sudah tersedia
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-5">
                    Kasir Modern<br>untuk Bisnis Anda
                </h1>
                <p class="text-base text-gray-500 leading-relaxed mb-8 max-w-md">
                    Kelola penjualan, stok, dan laporan dari satu platform. Cepat, mudah, dan bisa diakses dari mana saja.
                </p>
                <div class="flex flex-wrap items-center gap-3 mb-8">
                    <a href="/register" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Coba Gratis 14 Hari
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="/pricing" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        Lihat Harga
                    </a>
                </div>
                <div class="flex flex-wrap items-center gap-5 text-xs text-gray-400">
                    @foreach(['Tanpa kartu kredit', 'Setup 5 menit', 'Cancel kapan saja'] as $item)
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- Mock UI --}}
            <div class="relative">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-xl p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-indigo-600 rounded-md flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">MahoraPOS</span>
                        </div>
                        <span class="text-xs px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded-full font-medium border border-emerald-100">Live</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        @foreach([['Indomie','3.500'],['Aqua','4.000'],['Teh Botol','5.000'],['Roti Tawar','12.000'],['Susu Ultra','6.500'],['Oreo','7.500']] as $p)
                        <div class="bg-gray-50 rounded-xl p-2.5 text-center hover:bg-indigo-50 border border-transparent hover:border-indigo-100 transition-colors cursor-pointer">
                            <p class="text-[11px] font-medium text-gray-700 truncate">{{ $p[0] }}</p>
                            <p class="text-[11px] text-indigo-600 font-semibold mt-0.5">Rp {{ $p[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                        <div class="flex justify-between text-xs text-gray-400 mb-1"><span>Subtotal</span><span>Rp 20.500</span></div>
                        <div class="flex justify-between text-xs text-gray-400 mb-2.5"><span>PPN 11%</span><span>Rp 2.255</span></div>
                        <div class="flex justify-between text-sm font-semibold text-gray-900 border-t border-gray-200 pt-2.5 mb-3">
                            <span>Total</span><span class="text-indigo-600">Rp 22.755</span>
                        </div>
                        <button class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition-colors">Bayar Sekarang</button>
                    </div>
                </div>

                {{-- Floating badges: hidden di mobile agar tidak overflow --}}
                <div class="hidden sm:flex absolute -top-4 -right-4 bg-white rounded-xl border border-gray-100 shadow-lg px-3.5 py-2.5 items-center gap-2.5">
                    <div class="w-7 h-7 bg-emerald-50 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400">Transaksi</p>
                        <p class="text-xs font-semibold text-gray-800">+38 hari ini</p>
                    </div>
                </div>
                <div class="hidden sm:flex absolute -bottom-4 -left-4 bg-white rounded-xl border border-gray-100 shadow-lg px-3.5 py-2.5 items-center gap-2.5">
                    <div class="w-7 h-7 bg-indigo-50 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400">Omzet Hari Ini</p>
                        <p class="text-xs font-semibold text-gray-800">Rp 4.250.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STATS --}}
<section class="py-12 border-y border-gray-100 bg-white">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 text-center">
        @foreach([['5.000+','Toko Aktif'],['2 Juta+','Transaksi/Bulan'],['99.9%','Uptime SLA'],['< 5 Menit','Setup Awal']] as [$v,$l])
        <div>
            <p class="text-xl sm:text-2xl font-bold text-indigo-600 mb-1">{{ $v }}</p>
            <p class="text-xs sm:text-sm text-gray-400">{{ $l }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR --}}
<section id="fitur" class="py-24 px-6 bg-[#f8f8fc]">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">Fitur Unggulan</p>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Semua yang Anda Butuhkan</h2>
            <p class="text-gray-400 mt-3 max-w-md mx-auto text-sm">Dari kasir hingga laporan, semua tersedia dalam satu platform.</p>
        </div>
        @php
        $features = [
            ['icon'=>'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z','title'=>'POS Super Cepat','desc'=>'Antarmuka kasir yang intuitif. Proses transaksi hanya dalam hitungan detik.'],
            ['icon'=>'M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M11 3H9C8.4 3 8 3.4 8 4v1H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-2V4c0-.6-.4-1-1-1h-2z','title'=>'Pembayaran QRIS','desc'=>'Terima pembayaran dari semua dompet digital. GoPay, OVO, Dana, ShopeePay.'],
            ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','title'=>'Laporan Real-time','desc'=>'Pantau omzet, laba, dan performa kasir kapan saja. Export PDF & Excel.'],
            ['icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2','title'=>'Manajemen Stok','desc'=>'Notifikasi otomatis saat stok menipis. Riwayat pergerakan barang tercatat rapi.'],
            ['icon'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','title'=>'Multi Kasir & Role','desc'=>'Atur hak akses per role. Owner, Admin, Kasir, dan Gudang punya tampilan berbeda.'],
            ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','title'=>'Multi Tenant SaaS','desc'=>'Satu platform untuk banyak toko. Kelola semua cabang dari satu dashboard.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($features as $f)
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-indigo-100 hover:shadow-sm transition-all">
                <div class="w-9 h-9 rounded-lg bg-indigo-50 flex items-center justify-center mb-4">
                    <svg class="w-4.5 h-4.5 text-indigo-600" style="width:18px;height:18px" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-900 mb-1.5">{{ $f['title'] }}</h3>
                <p class="text-sm text-gray-400 leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="py-24 px-6 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">Cara Kerja</p>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-10 lg:mb-14">Mulai dalam 3 Langkah</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach([['1','Daftar Akun','Buat akun gratis dalam 2 menit. Tidak perlu kartu kredit.'],['2','Setup Toko','Tambahkan produk, atur kasir, dan konfigurasi pembayaran.'],['3','Mulai Jualan','Langsung gunakan POS untuk transaksi pertama Anda hari ini.']] as [$n,$t,$d])
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center text-sm font-semibold mb-4">{{ $n }}</div>
                <h3 class="text-sm font-semibold text-gray-900 mb-2">{{ $t }}</h3>
                <p class="text-sm text-gray-400 leading-relaxed">{{ $d }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIAL --}}
<section class="py-24 px-6 bg-[#f8f8fc]">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">Testimoni</p>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Dipercaya Ribuan Pemilik Toko</h2>
        </div>
        @php
        $testimonials = [
            ['name'=>'Budi Santoso',   'role'=>'Pemilik Minimarket',     'av'=>'BS','text'=>'MahoraPOS benar-benar mengubah cara saya mengelola toko. Laporan harian langsung bisa saya cek dari HP.'],
            ['name'=>'Siti Rahayu',    'role'=>'Owner Warung Makan',     'av'=>'SR','text'=>'QRIS-nya sangat membantu! Pelanggan bisa bayar pakai GoPay atau OVO. Omzet naik 30% sejak pakai MahoraPOS.'],
            ['name'=>'Hendra Gunawan', 'role'=>'Manager Toko Elektronik','av'=>'HG','text'=>'Fitur multi-kasir dan laporan per shift sangat berguna untuk toko saya yang punya 5 kasir.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($testimonials as $t)
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <div class="flex items-center gap-0.5 mb-4">
                    @for($i=0;$i<5;$i++)
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-sm text-gray-500 leading-relaxed mb-5">"{{ $t['text'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-semibold shrink-0">{{ $t['av'] }}</div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $t['name'] }}</p>
                        <p class="text-xs text-gray-400">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 px-6 bg-indigo-600">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Siap Modernisasi Toko Anda?</h2>
        <p class="text-indigo-200 mb-8">Bergabung dengan 5.000+ pemilik toko. Gratis 14 hari, tanpa kartu kredit.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="/register" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-600 text-sm font-semibold rounded-lg hover:bg-indigo-50 transition-colors">
                Mulai Gratis Sekarang
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="/pricing" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-medium text-white border border-white/30 rounded-lg hover:bg-white/10 transition-colors">
                Lihat Paket Harga
            </a>
        </div>
    </div>
</section>

@include('components.public-footer')
</body>
</html>
