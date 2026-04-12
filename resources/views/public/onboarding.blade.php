<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setup Toko — MahoraPOS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased min-h-screen">

{{-- Top bar --}}
<div class="fixed top-0 inset-x-0 z-50 bg-white border-b border-gray-100 h-14 flex items-center justify-between px-6">
    <div class="flex items-center gap-2">
        <div class="w-7 h-7 bg-blue-600 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <span class="font-bold text-gray-900">MahoraPOS</span>
    </div>
    <span class="text-xs text-gray-400">Butuh bantuan? <a href="#" class="text-blue-600 font-medium hover:underline">Hubungi kami</a></span>
</div>

<div class="pt-14 min-h-screen flex flex-col"
     x-data="{
        step: 1,
        totalSteps: 4,
        plan: 'pro',
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
    <div class="h-1 bg-gray-100">
        <div class="h-full bg-blue-600 transition-all duration-500" :style="`width:${progress}%`"></div>
    </div>

    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12">
        <div class="w-full max-w-lg">

            {{-- Step indicator --}}
            <div class="flex items-center justify-center gap-2 mb-8">
                @for($i = 1; $i <= 4; $i++)
                <div class="flex items-center gap-2">
                    <div :class="{
                            'bg-blue-600 text-white border-blue-600': step === {{ $i }},
                            'bg-green-500 text-white border-green-500': step > {{ $i }},
                            'bg-white text-gray-400 border-gray-200': step < {{ $i }}
                         }"
                         class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition-all duration-300">
                        <span x-show="step <= {{ $i }}">{{ $i }}</span>
                        <svg x-show="step > {{ $i }}" x-cloak class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                    @if($i < 4)
                    <div :class="step > {{ $i }} ? 'bg-green-400' : 'bg-gray-200'"
                         class="w-12 h-0.5 transition-all duration-300"></div>
                    @endif
                </div>
                @endfor
            </div>

            {{-- Step labels --}}
            <div class="flex justify-between text-[10px] font-semibold text-gray-400 mb-8 px-1">
                @foreach(['Pilih Paket','Info Toko','Logo & Tampilan','Konfirmasi'] as $label)
                <span :class="step === {{ $loop->iteration }} ? 'text-blue-600' : ''" class="transition-colors">{{ $label }}</span>
                @endforeach
            </div>

            {{-- ── STEP 1: PILIH PAKET ──────────────────── --}}
            <div x-show="step===1" x-cloak
                 x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Pilih Paket Anda</h2>
                    <p class="text-gray-500 text-sm mt-2">Mulai dengan trial gratis 14 hari. Upgrade kapan saja.</p>
                </div>

                <div class="space-y-3">
                    @php
                    $planOptions = [
                        ['val'=>'trial', 'name'=>'Trial',  'price'=>'Gratis',       'period'=>'14 hari',    'color'=>'amber',  'features'=>['1 kasir','50 produk','Fitur dasar']],
                        ['val'=>'basic', 'name'=>'Basic',  'price'=>'Rp 99.000',    'period'=>'/bulan',     'color'=>'blue',   'features'=>['3 kasir','500 produk','Laporan lengkap','Export Excel']],
                        ['val'=>'pro',   'name'=>'Pro',    'price'=>'Rp 249.000',   'period'=>'/bulan',     'color'=>'purple', 'features'=>['10 kasir','Produk unlimited','Grafik & analitik','API Access','Export PDF'],'popular'=>true],
                    ];
                    $planRing = ['amber'=>'ring-amber-400 border-amber-300 bg-amber-50','blue'=>'ring-blue-500 border-blue-300 bg-blue-50','purple'=>'ring-purple-500 border-purple-300 bg-purple-50'];
                    $planDef  = ['amber'=>'border-gray-200 bg-white','blue'=>'border-gray-200 bg-white','purple'=>'border-gray-200 bg-white'];
                    $planBadge= ['amber'=>'bg-amber-100 text-amber-700','blue'=>'bg-blue-100 text-blue-700','purple'=>'bg-purple-100 text-purple-700'];
                    @endphp
                    @foreach($planOptions as $po)
                    <label class="cursor-pointer block">
                        <input type="radio" name="plan" value="{{ $po['val'] }}" class="sr-only" @change="plan='{{ $po['val'] }}'"/>
                        <div :class="plan==='{{ $po['val'] }}' ? 'ring-2 {{ $planRing[$po['color']] }}' : '{{ $planDef[$po['color']] }} hover:border-gray-300'"
                             class="border-2 rounded-2xl p-4 transition-all duration-200 relative">
                            @if(isset($po['popular']))
                            <span class="absolute -top-2.5 right-4 text-[10px] font-bold px-2.5 py-0.5 bg-purple-600 text-white rounded-full">⭐ Populer</span>
                            @endif
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div :class="plan==='{{ $po['val'] }}' ? 'border-{{ $po['color'] }}-500 bg-{{ $po['color'] }}-500' : 'border-gray-300 bg-white'"
                                         class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-all shrink-0">
                                        <div :class="plan==='{{ $po['val'] }}' ? 'opacity-100' : 'opacity-0'" class="w-2 h-2 rounded-full bg-white transition-opacity"></div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm font-bold text-gray-900">{{ $po['name'] }}</p>
                                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full {{ $planBadge[$po['color']] }}">{{ $po['price'] }}{{ $po['period'] }}</span>
                                        </div>
                                        <div class="flex flex-wrap gap-x-3 gap-y-0.5 mt-1">
                                            @foreach($po['features'] as $feat)
                                            <span class="text-xs text-gray-400">✓ {{ $feat }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- ── STEP 2: INFO TOKO ────────────────────── --}}
            <div x-show="step===2" x-cloak
                 x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Informasi Toko</h2>
                    <p class="text-gray-500 text-sm mt-2">Lengkapi detail toko Anda untuk memulai.</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Toko <span class="text-red-500">*</span></label>
                        <input x-model="storeName" type="text" placeholder="Contoh: Toko Mahora Jaya"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jenis Usaha <span class="text-red-500">*</span></label>
                        <select x-model="storeType" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 text-gray-700">
                            <option value="" disabled selected>Pilih jenis usaha...</option>
                            @foreach(['Minimarket / Toko Kelontong','Warung Makan / Restoran','Toko Pakaian / Fashion','Toko Elektronik','Apotek / Toko Kesehatan','Toko Bangunan','Lainnya'] as $type)
                            <option>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor HP</label>
                            <input type="tel" placeholder="0812-3456-7890"
                                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kota</label>
                            <input type="text" placeholder="Jakarta"
                                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Toko</label>
                        <textarea rows="2" placeholder="Jl. Raya No. 12, Jakarta Selatan"
                                  class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 placeholder-gray-400 resize-none"></textarea>
                    </div>
                </div>
            </div>

            {{-- ── STEP 3: LOGO & TAMPILAN ──────────────── --}}
            <div x-show="step===3" x-cloak
                 x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Logo & Tampilan</h2>
                    <p class="text-gray-500 text-sm mt-2">Upload logo toko dan pilih warna tema.</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-5">
                    {{-- Logo upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Logo Toko</label>
                        <div class="flex items-start gap-5">
                            {{-- Preview --}}
                            <div class="shrink-0">
                                <div x-show="!preview"
                                     class="w-24 h-24 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-3xl font-extrabold shadow-md"
                                     x-text="storeName ? storeName.charAt(0).toUpperCase() : 'T'">
                                </div>
                                <div x-show="preview" x-cloak class="relative w-24 h-24">
                                    <img :src="preview" class="w-24 h-24 rounded-2xl object-cover border-2 border-gray-200 shadow-md"/>
                                    <button type="button" @click="preview=null"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 shadow">✕</button>
                                </div>
                            </div>
                            {{-- Upload area --}}
                            <div class="flex-1">
                                <label class="block cursor-pointer">
                                    <input type="file" accept="image/*" class="hidden" @change="handleFile($event)"/>
                                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:border-blue-300 hover:bg-blue-50/50 transition-colors">
                                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                        <p class="text-xs font-semibold text-gray-500">Klik untuk upload</p>
                                        <p class="text-[10px] text-gray-400 mt-0.5">PNG, JPG · Maks. 2MB</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Warna tema --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Warna Tema</label>
                        <div class="flex items-center gap-3" x-data="{themeColor:'blue'}">
                            @foreach(['blue'=>'bg-blue-600','purple'=>'bg-purple-600','green'=>'bg-green-600','rose'=>'bg-rose-500','amber'=>'bg-amber-500','gray'=>'bg-gray-700'] as $color => $bg)
                            <button type="button" @click="themeColor='{{ $color }}'"
                                    :class="themeColor==='{{ $color }}' ? 'ring-2 ring-offset-2 ring-{{ $color }}-500 scale-110' : 'hover:scale-105'"
                                    class="w-9 h-9 rounded-xl {{ $bg }} transition-all duration-150 shadow-sm">
                            </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Pesan struk --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pesan Footer Struk</label>
                        <input type="text" placeholder="Terima kasih telah berbelanja!" value="Terima kasih telah berbelanja!"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50"/>
                    </div>
                </div>
            </div>

            {{-- ── STEP 4: KONFIRMASI ───────────────────── --}}
            <div x-show="step===4" x-cloak
                 x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <div class="text-center mb-8">
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Konfirmasi Setup</h2>
                    <p class="text-gray-500 text-sm mt-2">Periksa kembali informasi toko Anda sebelum memulai.</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-5">
                    {{-- Summary header --}}
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center text-white text-2xl font-extrabold shrink-0"
                             x-text="storeName ? storeName.charAt(0).toUpperCase() : 'T'">
                        </div>
                        <div>
                            <p class="text-white font-bold text-lg" x-text="storeName || 'Nama Toko'"></p>
                            <p class="text-blue-100 text-xs mt-0.5" x-text="storeType || 'Jenis usaha belum dipilih'"></p>
                        </div>
                    </div>

                    {{-- Summary items --}}
                    <div class="divide-y divide-gray-50">
                        @php
                        $summaryItems = [
                            ['label'=>'Paket', 'xText'=>"plan === 'trial' ? 'Trial (14 hari gratis)' : plan === 'basic' ? 'Basic — Rp 99.000/bln' : 'Pro — Rp 249.000/bln'"],
                            ['label'=>'Nama Toko', 'xText'=>"storeName || '—'"],
                            ['label'=>'Jenis Usaha', 'xText'=>"storeType || '—'"],
                            ['label'=>'Logo', 'xText'=>"preview ? 'Sudah diupload ✓' : 'Menggunakan inisial toko'"],
                        ];
                        @endphp
                        @foreach($summaryItems as $item)
                        <div class="flex items-center justify-between px-6 py-3.5">
                            <span class="text-sm text-gray-500">{{ $item['label'] }}</span>
                            <span class="text-sm font-semibold text-gray-800" x-text="{{ $item['xText'] }}"></span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Checklist --}}
                <div class="bg-green-50 border border-green-100 rounded-2xl p-5 mb-5">
                    <p class="text-sm font-bold text-green-800 mb-3">✅ Yang akan disiapkan otomatis:</p>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['Akun kasir pertama','Kategori produk dasar','Template laporan','Pengaturan pajak (PPN 11%)','Metode pembayaran','Struk digital'] as $item)
                        <div class="flex items-center gap-2 text-xs text-green-700">
                            <svg class="w-3.5 h-3.5 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ── NAVIGATION BUTTONS ───────────────────── --}}
            <div class="flex items-center justify-between mt-8">
                <button @click="prev" x-show="step > 1" x-cloak
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors bg-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali
                </button>
                <div x-show="step === 1" class="text-xs text-gray-400">Langkah 1 dari 4</div>

                <button x-show="step < 4" @click="next"
                        class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors shadow-sm shadow-blue-200 ml-auto">
                    Lanjut
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>

                <a x-show="step === 4" href="/dashboard"
                   class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-green-600 hover:bg-green-700 rounded-xl transition-colors shadow-sm shadow-green-200 ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    Mulai Gunakan MahoraPOS
                </a>
            </div>

            {{-- Step counter --}}
            <p class="text-center text-xs text-gray-400 mt-4" x-text="`Langkah ${step} dari 4`"></p>

        </div>
    </div>
</div>

</body>
</html>
