<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MahoraPOS — Sistem Kasir Modern untuk Bisnis Anda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-white text-gray-900 antialiased">

@include('components.public-navbar')

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="pt-32 pb-20 px-6 bg-gradient-to-br from-slate-50 via-blue-50/30 to-white relative overflow-hidden">
    <div class="absolute top-24 right-0 w-[500px] h-[500px] bg-blue-100 rounded-full blur-3xl opacity-30 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-indigo-100 rounded-full blur-3xl opacity-20 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-full text-xs font-semibold text-blue-700 mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse inline-block"></span>
                    Baru · Versi 2.0 sudah tersedia 🎉
                </div>
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-5">
                    Sistem Kasir Modern<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">untuk Bisnis Anda</span>
                </h1>
                <p class="text-lg text-gray-500 leading-relaxed mb-8 max-w-lg">
                    Kelola penjualan, stok, dan laporan bisnis dari satu platform. Cepat, mudah, dan bisa diakses dari mana saja.
                </p>
                <div class="flex flex-wrap items-center gap-3 mb-8">
                    <a href="/register" class="inline-flex items-center gap-2 px-6 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-colors shadow-lg shadow-blue-200">
                        Coba Gratis 14 Hari
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="/pricing" class="inline-flex items-center gap-2 px-6 py-3.5 text-gray-700 font-semibold border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                        Lihat Harga
                    </a>
                </div>
                <div class="flex flex-wrap items-center gap-5 text-sm text-gray-400">
                    @foreach(['Tanpa kartu kredit', 'Setup 5 menit', 'Cancel kapan saja'] as $item)
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- Mock POS UI --}}
            <div class="relative">
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 p-5 relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-blue-600 rounded-md flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <span class="text-sm font-bold text-gray-800">MahoraPOS</span>
                        </div>
                        <span class="text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded-full font-semibold">● Live</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        @foreach([['🍜','Indomie','3.500'],['💧','Aqua','4.000'],['🍵','Teh Botol','5.000'],['🍞','Roti Tawar','12.000'],['🥛','Susu Ultra','6.500'],['🍪','Oreo','7.500']] as $p)
                        <div class="bg-gray-50 rounded-xl p-2.5 text-center hover:bg-blue-50 border border-transparent hover:border-blue-200 transition-colors cursor-pointer">
                            <div class="text-xl mb-1">{{ $p[0] }}</div>
                            <p class="text-[10px] font-semibold text-gray-700 truncate">{{ $p[1] }}</p>
                            <p class="text-[10px] text-blue-600 font-bold">Rp {{ $p[2] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                        <div class="flex justify-between text-xs text-gray-500 mb-1"><span>Subtotal</span><span>Rp 20.500</span></div>
                        <div class="flex justify-between text-xs text-gray-500 mb-2.5"><span>PPN 11%</span><span>Rp 2.255</span></div>
                        <div class="flex justify-between text-sm font-bold text-gray-900 border-t border-gray-200 pt-2.5 mb-3"><span>Total</span><span class="text-blue-600">Rp 22.755</span></div>
                        <button class="w-full py-2.5 bg-blue-600 text-white text-xs font-bold rounded-lg">Bayar Sekarang</button>
                    </div>
                </div>
                <div class="absolute -top-5 -right-5 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-2.5 flex items-center gap-2.5 z-20">
                    <div class="w-8 h-8 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    </div>
                    <div><p class="text-[10px] text-gray-400">Transaksi</p><p class="text-xs font-bold text-gray-800">+38 hari ini</p></div>
                </div>
                <div class="absolute -bottom-5 -left-5 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-2.5 flex items-center gap-2.5 z-20">
                    <div class="w-8 h-8 bg-blue-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div><p class="text-[10px] text-gray-400">Omzet Hari Ini</p><p class="text-xs font-bold text-gray-800">Rp 4.250.000</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── STATS ─────────────────────────────────────────────── --}}
<section class="py-12 border-y border-gray-100">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
        @foreach([['5.000+','Toko Aktif'],['2 Juta+','Transaksi/Bulan'],['99.9%','Uptime SLA'],['< 5 Menit','Setup Awal']] as [$v,$l])
        <div><p class="text-3xl font-extrabold text-blue-600 mb-1">{{ $v }}</p><p class="text-sm text-gray-500">{{ $l }}</p></div>
        @endforeach
    </div>
</section>

{{-- ── FITUR ─────────────────────────────────────────────── --}}
<section id="fitur" class="py-20 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Fitur Unggulan</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Semua yang Anda Butuhkan</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto text-sm">Dari kasir hingga laporan, semua tersedia dalam satu platform yang mudah digunakan.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @php
            $features = [
                ['icon'=>'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z','c'=>'blue','title'=>'POS Super Cepat','desc'=>'Antarmuka kasir yang intuitif. Proses transaksi hanya dalam hitungan detik.'],
                ['icon'=>'M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M11 3H9C8.4 3 8 3.4 8 4v1H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-2V4c0-.6-.4-1-1-1h-2z','c'=>'purple','title'=>'Pembayaran QRIS','desc'=>'Terima pembayaran dari semua dompet digital. GoPay, OVO, Dana, ShopeePay.'],
                ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','c'=>'green','title'=>'Laporan Real-time','desc'=>'Pantau omzet, laba, dan performa kasir kapan saja. Export PDF & Excel.'],
                ['icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2','c'=>'amber','title'=>'Manajemen Stok','desc'=>'Notifikasi otomatis saat stok menipis. Riwayat pergerakan barang tercatat rapi.'],
                ['icon'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','c'=>'rose','title'=>'Multi Kasir & Role','desc'=>'Atur hak akses per role. Owner, Admin, Kasir, dan Gudang punya tampilan berbeda.'],
                ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','c'=>'indigo','title'=>'Multi Tenant SaaS','desc'=>'Satu platform untuk banyak toko. Kelola semua cabang dari satu dashboard.'],
            ];
            $fc=['blue'=>['ib'=>'bg-blue-50','it'=>'text-blue-600'],'purple'=>['ib'=>'bg-purple-50','it'=>'text-purple-600'],'green'=>['ib'=>'bg-green-50','it'=>'text-green-600'],'amber'=>['ib'=>'bg-amber-50','it'=>'text-amber-600'],'rose'=>['ib'=>'bg-rose-50','it'=>'text-rose-600'],'indigo'=>['ib'=>'bg-indigo-50','it'=>'text-indigo-600']];
            @endphp
            @foreach($features as $f)
            @php $c=$fc[$f['c']]; @endphp
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md hover:-translate-y-0.5 transition-all">
                <div class="w-11 h-11 rounded-xl {{ $c['ib'] }} {{ $c['it'] }} flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-2">{{ $f['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── HOW IT WORKS ──────────────────────────────────────── --}}
<section class="py-20 px-6 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Cara Kerja</span>
        <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-12">Mulai dalam 3 Langkah</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([['1','Daftar Akun','Buat akun gratis dalam 2 menit. Tidak perlu kartu kredit.','bg-blue-600'],['2','Setup Toko','Tambahkan produk, atur kasir, dan konfigurasi pembayaran.','bg-purple-600'],['3','Mulai Jualan','Langsung gunakan POS untuk transaksi pertama Anda hari ini.','bg-green-600']] as [$n,$t,$d,$bg])
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 {{ $bg }} text-white rounded-2xl flex items-center justify-center text-lg font-extrabold mb-4 shadow-lg">{{ $n }}</div>
                <h3 class="text-base font-bold text-gray-900 mb-2">{{ $t }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $d }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── TESTIMONIAL ───────────────────────────────────────── --}}
<section class="py-20 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Testimoni</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Dipercaya Ribuan Pemilik Toko</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @php
            $testimonials = [
                ['name'=>'Budi Santoso','role'=>'Pemilik Minimarket','av'=>'BS','c'=>'bg-blue-600','text'=>'MahoraPOS benar-benar mengubah cara saya mengelola toko. Laporan harian langsung bisa saya cek dari HP.'],
                ['name'=>'Siti Rahayu','role'=>'Owner Warung Makan','av'=>'SR','c'=>'bg-purple-600','text'=>'QRIS-nya sangat membantu! Pelanggan bisa bayar pakai GoPay atau OVO. Omzet naik 30% sejak pakai MahoraPOS.'],
                ['name'=>'Hendra Gunawan','role'=>'Manager Toko Elektronik','av'=>'HG','c'=>'bg-green-600','text'=>'Fitur multi-kasir dan laporan per shift sangat berguna untuk toko saya yang punya 5 kasir. Highly recommended!'],
            ];
            @endphp
            @foreach($testimonials as $t)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0;$i<5;$i++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor
                </div>
                <p class="text-sm text-gray-600 leading-relaxed mb-5">"{{ $t['text'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full {{ $t['c'] }} text-white flex items-center justify-center text-xs font-bold shrink-0">{{ $t['av'] }}</div>
                    <div><p class="text-sm font-semibold text-gray-800">{{ $t['name'] }}</p><p class="text-xs text-gray-400">{{ $t['role'] }}</p></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── CTA ───────────────────────────────────────────────── --}}
<section class="py-20 px-6 bg-gradient-to-br from-blue-600 to-indigo-700 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-3xl mx-auto text-center relative z-10">
        <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Siap Modernisasi Toko Anda?</h2>
        <p class="text-blue-100 text-lg mb-8">Bergabung dengan 5.000+ pemilik toko. Gratis 14 hari, tanpa kartu kredit.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="/register" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
                Mulai Gratis Sekarang
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="/pricing" class="inline-flex items-center gap-2 px-8 py-3.5 text-white font-semibold border-2 border-white/30 rounded-xl hover:bg-white/10 transition-colors">
                Lihat Paket Harga
            </a>
        </div>
    </div>
</section>

@include('components.public-footer')
</body>
</html>
