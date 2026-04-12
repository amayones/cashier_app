<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harga — MahoraPOS</title>
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

{{-- HEADER --}}
<section class="pt-24 lg:pt-32 pb-14 px-6 bg-[#f8f8fc] text-center">
    <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">Harga</p>
    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">Harga yang Transparan</h1>
    <p class="text-sm text-gray-400 max-w-md mx-auto">Pilih paket yang sesuai kebutuhan. Upgrade atau downgrade kapan saja.</p>
</section>

{{-- PRICING CARDS --}}
<section class="py-16 px-6 bg-white">
    <div class="max-w-5xl mx-auto">
        @php
        $plans = [
            ['name'=>'Basic','desc'=>'Untuk toko kecil yang baru mulai','price'=>99000,'popular'=>false,'cta'=>'Mulai Basic','features'=>[
                ['ok'=>true, 'text'=>'3 kasir aktif'],
                ['ok'=>true, 'text'=>'500 produk'],
                ['ok'=>true, 'text'=>'Laporan harian & bulanan'],
                ['ok'=>true, 'text'=>'QRIS & Tunai'],
                ['ok'=>true, 'text'=>'Export Excel'],
                ['ok'=>false,'text'=>'API Access'],
                ['ok'=>false,'text'=>'Multi cabang'],
                ['ok'=>false,'text'=>'Priority support'],
            ]],
            ['name'=>'Pro','desc'=>'Untuk bisnis yang sedang berkembang','price'=>249000,'popular'=>true,'cta'=>'Mulai Pro','features'=>[
                ['ok'=>true, 'text'=>'10 kasir aktif'],
                ['ok'=>true, 'text'=>'Produk unlimited'],
                ['ok'=>true, 'text'=>'Laporan + grafik lengkap'],
                ['ok'=>true, 'text'=>'Semua metode pembayaran'],
                ['ok'=>true, 'text'=>'Export PDF & Excel'],
                ['ok'=>true, 'text'=>'API Access'],
                ['ok'=>false,'text'=>'Multi cabang'],
                ['ok'=>false,'text'=>'Dedicated support'],
            ]],
            ['name'=>'Enterprise','desc'=>'Untuk jaringan toko & franchise','price'=>0,'popular'=>false,'cta'=>'Hubungi Sales','ctaHref'=>'#','custom'=>true,'features'=>[
                ['ok'=>true,'text'=>'Kasir unlimited'],
                ['ok'=>true,'text'=>'Produk unlimited'],
                ['ok'=>true,'text'=>'Laporan custom'],
                ['ok'=>true,'text'=>'Semua metode pembayaran'],
                ['ok'=>true,'text'=>'Export semua format'],
                ['ok'=>true,'text'=>'Full API Access'],
                ['ok'=>true,'text'=>'Multi cabang unlimited'],
                ['ok'=>true,'text'=>'Dedicated account manager'],
            ]],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
            @foreach($plans as $plan)
                <x-pricing-card
                    :name="$plan['name']"
                    :desc="$plan['desc']"
                    :price="$plan['price']"
                    :popular="$plan['popular']"
                    :cta="$plan['cta']"
                    :ctaHref="$plan['ctaHref'] ?? '/register'"
                    :custom="$plan['custom'] ?? false"
                    :features="$plan['features']"
                />
            @endforeach
        </div>
        <p class="text-center text-xs text-gray-400 mt-8">
            Semua paket termasuk <span class="font-medium text-gray-600">14 hari trial gratis</span>. Tidak perlu kartu kredit.
        </p>
    </div>
</section>

{{-- COMPARISON TABLE --}}
<section class="py-16 px-6 bg-[#f8f8fc]">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">Perbandingan</p>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Perbandingan Lengkap</h2>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="border-b border-gray-100">
                    <tr class="bg-gray-50">
                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider w-1/2">Fitur</th>
                        @foreach(['Basic','Pro','Enterprise'] as $h)
                        <th class="px-4 py-4 text-center text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $h }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                    $rows = [
                        ['Jumlah Kasir',      '3',      '10',       'Unlimited'],
                        ['Jumlah Produk',     '500',    'Unlimited','Unlimited'],
                        ['Laporan Penjualan', '✓',      '✓',        '✓'],
                        ['Export Excel',      '✓',      '✓',        '✓'],
                        ['Export PDF',        '—',      '✓',        '✓'],
                        ['QRIS & Tunai',      '✓',      '✓',        '✓'],
                        ['Transfer Bank',     '—',      '✓',        '✓'],
                        ['API Access',        '—',      '✓',        '✓'],
                        ['Multi Cabang',      '—',      '—',        '✓'],
                        ['SLA Uptime',        '99.5%',  '99.9%',    '99.99%'],
                        ['Support',           'Email',  'Chat 24/7','Dedicated'],
                    ];
                    @endphp
                    @foreach($rows as $row)
                    <tr class="hover:bg-gray-50/60 transition-colors">
                        <td class="px-5 py-3.5 text-gray-600 font-medium">{{ $row[0] }}</td>
                        @foreach([$row[1],$row[2],$row[3]] as $val)
                        <td class="px-4 py-3.5 text-center">
                            @if($val==='✓')
                                <svg class="w-4 h-4 text-emerald-500 mx-auto" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            @elseif($val==='—')
                                <span class="text-gray-200">—</span>
                            @else
                                <span class="text-gray-700 font-medium">{{ $val }}</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-16 px-6 bg-white">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">FAQ</p>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Pertanyaan Umum</h2>
        </div>
        <div class="space-y-2" x-data="{open:null}">
            @php
            $faqs = [
                ['q'=>'Apakah ada biaya setup?',                    'a'=>'Tidak ada biaya setup. Anda hanya membayar biaya langganan bulanan sesuai paket yang dipilih.'],
                ['q'=>'Bisakah saya upgrade atau downgrade paket?', 'a'=>'Ya, Anda bisa upgrade atau downgrade kapan saja. Perubahan berlaku di siklus tagihan berikutnya.'],
                ['q'=>'Apakah data saya aman?',                     'a'=>'Data Anda dienkripsi dan disimpan di server yang aman. Kami melakukan backup otomatis setiap hari.'],
                ['q'=>'Bagaimana cara pembayaran langganan?',       'a'=>'Kami menerima transfer bank, kartu kredit/debit, dan QRIS. Tagihan dikirim via email setiap bulan.'],
                ['q'=>'Apakah bisa digunakan offline?',             'a'=>'Mode offline tersedia untuk paket Pro dan Enterprise. Data tersinkronisasi otomatis saat koneksi kembali.'],
            ];
            @endphp
            @foreach($faqs as $i => $faq)
            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <button @click="open==={{ $i }}?open=null:open={{ $i }}"
                        class="w-full flex items-center justify-between px-5 py-4 text-left hover:bg-gray-50 transition-colors">
                    <span class="text-sm font-medium text-gray-800">{{ $faq['q'] }}</span>
                    <svg class="w-4 h-4 text-gray-400 shrink-0 transition-transform duration-200"
                         :class="open==={{ $i }}&&'rotate-180'"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open==={{ $i }}" x-cloak
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     class="px-5 pb-4 pt-3 text-sm text-gray-400 leading-relaxed border-t border-gray-100">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 px-6 bg-indigo-600">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3">Masih ragu? Coba dulu gratis!</h2>
        <p class="text-indigo-200 text-sm mb-8">14 hari trial penuh, tanpa kartu kredit, cancel kapan saja.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="/register" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-600 text-sm font-semibold rounded-lg hover:bg-indigo-50 transition-colors">
                Mulai Trial Gratis
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="/login" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-medium text-white border border-white/30 rounded-lg hover:bg-white/10 transition-colors">
                Sudah punya akun? Masuk
            </a>
        </div>
    </div>
</section>

@include('components.public-footer')
</body>
</html>
