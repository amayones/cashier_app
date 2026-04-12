<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setup Toko — MahoraPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        *{font-family:'Inter',sans-serif}
        [x-cloak]{display:none!important}
    </style>
</head>
<body class="bg-[#f8f8fc] text-gray-900 antialiased min-h-screen">

{{-- Top bar --}}
<div class="fixed top-0 inset-x-0 z-50 bg-white border-b border-gray-100 h-14 flex items-center justify-between px-6">
    <a href="/" class="flex items-center gap-2">
        <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center">
            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <span class="font-semibold text-gray-900 text-[15px]">MahoraPOS</span>
    </a>
    <span class="text-xs text-gray-400">Butuh bantuan? <a href="#" class="text-indigo-600 font-medium hover:underline">Hubungi kami</a></span>
</div>

<div class="pt-14 min-h-screen flex flex-col"
     x-data="{
        step: 1,
        totalSteps: 4,
        plan: 'trial',
        storeName: '',
        storeType: '',
        preview: null,
        handleFile(e) {
            const f = e.target.files[0];
            if (!f) return;
            const r = new FileReader();
            r.onload = ev => this.preview = ev.target.result;
            r.readAsDataURL(f);
        },
        next() { if (this.step < this.totalSteps) this.step++ },
        prev() { if (this.step > 1) this.step-- },
        get progress() { return ((this.step - 1) / (this.totalSteps - 1)) * 100 }
     }">

    {{-- Progress bar --}}
    <div class="h-0.5 bg-gray-100">
        <div class="h-full bg-indigo-600 transition-all duration-500" :style="`width:${progress}%`"></div>
    </div>

    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12">
        <div class="w-full max-w-lg">

            {{-- Step indicator --}}
            <div class="flex items-center justify-center gap-2 mb-6">
                @for($i = 1; $i <= 4; $i++)
                <div class="flex items-center gap-2">
                    <div :class="{
                            'bg-indigo-600 text-white border-indigo-600': step === {{ $i }},
                            'bg-emerald-500 text-white border-emerald-500': step > {{ $i }},
                            'bg-white text-gray-300 border-gray-200': step < {{ $i }}
                         }"
                         class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-semibold transition-all duration-300">
                        <span x-show="step <= {{ $i }}">{{ $i }}</span>
                        <svg x-show="step > {{ $i }}" x-cloak class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    @if($i < 4)
                    <div :class="step > {{ $i }} ? 'bg-emerald-400' : 'bg-gray-200'"
                         class="w-10 h-0.5 transition-all duration-300"></div>
                    @endif
                </div>
                @endfor
            </div>

            {{-- Step labels --}}
            <div class="flex justify-between text-[10px] font-medium text-gray-400 mb-8 px-1">
                @foreach(['Pilih Paket','Info Toko','Logo & Tampilan','Konfirmasi'] as $label)
                <span :class="step === {{ $loop->iteration }} ? 'text-indigo-600 font-semibold' : ''" class="transition-colors">{{ $label }}</span>
                @endforeach
            </div>

            {{-- STEP 1: PILIH PAKET --}}
            <div x-show="step===1" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-x-4"
                 x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Pilih Paket Anda</h2>
                    <p class="text-gray-400 text-sm mt-1.5">Mulai dengan trial gratis 14 hari. Upgrade kapan saja.</p>
                </div>

                <div class="space-y-3">
                    @php
                    $planOptions = [
                        ['val'=>'trial','name'=>'Trial', 'price'=>'Gratis',     'period'=>'14 hari', 'features'=>['1 kasir','50 produk','Fitur dasar']],
                        ['val'=>'basic','name'=>'Basic', 'price'=>'Rp 99.000',  'period'=>'/bulan',  'features'=>['3 kasir','500 produk','Laporan lengkap','Export Excel']],
                        ['val'=>'pro',  'name'=>'Pro',   'price'=>'Rp 249.000', 'period'=>'/bulan',  'features'=>['10 kasir','Produk unlimited','Grafik & analitik','API Access'],'popular'=>true],
                    ];
                    @endphp
                    @foreach($planOptions as $po)
                    <label class="cursor-pointer block">
                        <input type="radio" name="plan" value="{{ $po['val'] }}" class="sr-only" @change="plan='{{ $po['val'] }}'"/>
                        <div :class="plan==='{{ $po['val'] }}' ? 'border-indigo-500 bg-indigo-50/50' : 'border-gray-200 bg-white hover:border-gray-300'"
                             class="border rounded-xl p-4 transition-all duration-200 relative">
                            @if(isset($po['popular']))
                            <span class="absolute -top-2.5 right-4 text-[10px] font-semibold px-2.5 py-0.5 bg-indigo-600 text-white rounded-full">Populer</span>
                            @endif
                            <div class="flex items-center gap-3">
                                <div :class="plan==='{{ $po['val'] }}' ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300 bg-white'"
                                     class="w-4 h-4 rounded-full border-2 flex items-center justify-center transition-all shrink-0">
                                    <div :class="plan==='{{ $po['val'] }}' ? 'opacity-100' : 'opacity-0'"
                                         class="w-1.5 h-1.5 rounded-full bg-white transition-opacity"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <p class="text-sm font-semibold text-gray-900">{{ $po['name'] }}</p>
                                        <span class="text-xs text-gray-400">{{ $po['price'] }}{{ $po['period'] }}</span>
                                    </div>
                                    <div class="flex flex-wrap gap-x-3 gap-y-0.5">
                                        @foreach($po['features'] as $feat)
                                        <span class="text-xs text-gray-400">· {{ $feat }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- STEP 2: INFO TOKO --}}
            <div x-show="step===2" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-x-4"
                 x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Informasi Toko</h2>
                    <p class="text-gray-400 text-sm mt-1.5">Lengkapi detail toko Anda untuk memulai.</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Toko <span class="text-red-400">*</span></label>
                        <input x-model="storeName" type="text" placeholder="Contoh: Toko Mahora Jaya"
                               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 transition"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Usaha <span class="text-red-400">*</span></label>
                        <select x-model="storeType"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-700 transition">
                            <option value="" disabled selected>Pilih jenis usaha...</option>
                            @foreach(['Minimarket / Toko Kelontong','Warung Makan / Restoran','Toko Pakaian / Fashion','Toko Elektronik','Apotek / Toko Kesehatan','Toko Bangunan','Lainnya'] as $type)
                            <option>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nomor HP</label>
                            <input type="tel" placeholder="0812-3456-7890"
                                   class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 transition"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Kota</label>
                            <input type="text" placeholder="Jakarta"
                                   class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 transition"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Toko</label>
                        <textarea rows="2" placeholder="Jl. Raya No. 12, Jakarta Selatan"
                                  class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-300 resize-none transition"></textarea>
                    </div>
                </div>
            </div>

            {{-- STEP 3: LOGO & TAMPILAN --}}
            <div x-show="step===3" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-x-4"
                 x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Logo & Tampilan</h2>
                    <p class="text-gray-400 text-sm mt-1.5">Upload logo toko dan pilih warna tema.</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Logo Toko</label>
                        <div class="flex items-start gap-4">
                            <div class="shrink-0">
                                <div x-show="!preview"
                                     class="w-20 h-20 rounded-xl bg-indigo-600 flex items-center justify-center text-white text-2xl font-bold"
                                     x-text="storeName ? storeName.charAt(0).toUpperCase() : 'T'">
                                </div>
                                <div x-show="preview" x-cloak class="relative w-20 h-20">
                                    <img :src="preview" class="w-20 h-20 rounded-xl object-cover border border-gray-200"/>
                                    <button type="button" @click="preview=null"
                                            class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 text-white rounded-full flex items-center justify-center text-[10px] hover:bg-red-600">✕</button>
                                </div>
                            </div>
                            <label class="flex-1 cursor-pointer">
                                <input type="file" accept="image/*" class="hidden" @change="handleFile($event)"/>
                                <div class="border-2 border-dashed border-gray-200 rounded-xl p-5 text-center hover:border-indigo-300 hover:bg-indigo-50/30 transition-colors">
                                    <svg class="w-7 h-7 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    <p class="text-xs font-medium text-gray-500">Klik untuk upload</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">PNG, JPG · Maks. 2MB</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Warna Tema</label>
                        <div class="flex items-center gap-2.5" x-data="{themeColor:'indigo'}">
                            @foreach(['indigo'=>'bg-indigo-600','blue'=>'bg-blue-500','violet'=>'bg-violet-600','emerald'=>'bg-emerald-500','rose'=>'bg-rose-500','gray'=>'bg-gray-700'] as $color => $bg)
                            <button type="button" @click="themeColor='{{ $color }}'"
                                    :class="themeColor==='{{ $color }}' ? 'ring-2 ring-offset-2 ring-{{ $color }}-500 scale-110' : 'hover:scale-105'"
                                    class="w-8 h-8 rounded-lg {{ $bg }} transition-all duration-150">
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Pesan Footer Struk</label>
                        <input type="text" placeholder="Terima kasih telah berbelanja!" value="Terima kasih telah berbelanja!"
                               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"/>
                    </div>
                </div>
            </div>

            {{-- STEP 4: KONFIRMASI --}}
            <div x-show="step===4" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-x-4"
                 x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Konfirmasi Setup</h2>
                    <p class="text-gray-400 text-sm mt-1.5">Periksa kembali informasi toko Anda sebelum memulai.</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden mb-4">
                    <div class="bg-indigo-600 px-6 py-5 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-white text-xl font-bold shrink-0"
                             x-text="storeName ? storeName.charAt(0).toUpperCase() : 'T'">
                        </div>
                        <div>
                            <p class="text-white font-semibold" x-text="storeName || 'Nama Toko'"></p>
                            <p class="text-indigo-200 text-xs mt-0.5" x-text="storeType || 'Jenis usaha belum dipilih'"></p>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-50">
                        @php
                        $summaryItems = [
                            ['label'=>'Paket',      'xText'=>"plan === 'trial' ? 'Trial (14 hari gratis)' : plan === 'basic' ? 'Basic — Rp 99.000/bln' : 'Pro — Rp 249.000/bln'"],
                            ['label'=>'Nama Toko',  'xText'=>"storeName || '—'"],
                            ['label'=>'Jenis Usaha','xText'=>"storeType || '—'"],
                            ['label'=>'Logo',       'xText'=>"preview ? 'Sudah diupload' : 'Menggunakan inisial toko'"],
                        ];
                        @endphp
                        @foreach($summaryItems as $item)
                        <div class="flex items-center justify-between px-6 py-3.5">
                            <span class="text-sm text-gray-400">{{ $item['label'] }}</span>
                            <span class="text-sm font-medium text-gray-800" x-text="{{ $item['xText'] }}"></span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-5 mb-4">
                    <p class="text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-3">Yang akan disiapkan otomatis</p>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['Akun kasir pertama','Kategori produk dasar','Template laporan','Pengaturan pajak (PPN 11%)','Metode pembayaran','Struk digital'] as $item)
                        <div class="flex items-center gap-2 text-xs text-emerald-700">
                            <svg class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="flex items-center justify-between mt-8">
                <button @click="prev" x-show="step > 1" x-cloak
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors bg-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </button>
                <div x-show="step === 1" class="text-xs text-gray-400">Langkah 1 dari 4</div>

                <button x-show="step < 4" @click="next"
                        class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors ml-auto">
                    Lanjut
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>

                <a x-show="step === 4" href="/dashboard"
                   class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Mulai Gunakan MahoraPOS
                </a>
            </div>

            <p class="text-center text-xs text-gray-400 mt-4" x-text="`Langkah ${step} dari 4`"></p>

        </div>
    </div>
</div>

</body>
</html>
