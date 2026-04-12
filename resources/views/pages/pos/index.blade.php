@extends('layouts.app')
@section('title','POS — Kasir')
@section('mainClass','p-0 overflow-hidden')
@section('content')
@php
$cats=['Semua','Minuman','Makanan','Snack','Rokok','Lainnya'];
$products=[
    ['id'=>1, 'name'=>'Indomie Goreng',    'price'=>3500,  'cat'=>'Makanan', 'stock'=>48,  'e'=>'🍜'],
    ['id'=>2, 'name'=>'Aqua 600ml',        'price'=>4000,  'cat'=>'Minuman', 'stock'=>120, 'e'=>'💧'],
    ['id'=>3, 'name'=>'Teh Botol Sosro',   'price'=>5000,  'cat'=>'Minuman', 'stock'=>60,  'e'=>'🍵'],
    ['id'=>4, 'name'=>'Roti Tawar Sari',   'price'=>12000, 'cat'=>'Makanan', 'stock'=>15,  'e'=>'🍞'],
    ['id'=>5, 'name'=>'Susu Ultra 250ml',  'price'=>6500,  'cat'=>'Minuman', 'stock'=>30,  'e'=>'🥛'],
    ['id'=>6, 'name'=>'Chitato',           'price'=>9500,  'cat'=>'Snack',   'stock'=>24,  'e'=>'🥔'],
    ['id'=>7, 'name'=>'Pocari Sweat',      'price'=>8000,  'cat'=>'Minuman', 'stock'=>5,   'e'=>'🥤'],
    ['id'=>8, 'name'=>'Oreo Original',     'price'=>7500,  'cat'=>'Snack',   'stock'=>40,  'e'=>'🍪'],
    ['id'=>9, 'name'=>'Marlboro Merah',    'price'=>28000, 'cat'=>'Rokok',   'stock'=>10,  'e'=>'🚬'],
    ['id'=>10,'name'=>'Good Day',          'price'=>4500,  'cat'=>'Minuman', 'stock'=>50,  'e'=>'☕'],
    ['id'=>11,'name'=>'Beng-Beng',         'price'=>3500,  'cat'=>'Snack',   'stock'=>60,  'e'=>'🍫'],
    ['id'=>12,'name'=>'Kacang Garuda',     'price'=>8000,  'cat'=>'Snack',   'stock'=>22,  'e'=>'🥜'],
];
$cart=[
    ['name'=>'Indomie Goreng',  'price'=>3500,  'qty'=>3],
    ['name'=>'Aqua 600ml',      'price'=>4000,  'qty'=>2],
    ['name'=>'Teh Botol Sosro', 'price'=>5000,  'qty'=>1],
];
$sub=array_sum(array_map(fn($i)=>$i['price']*$i['qty'],$cart));
$tax=(int)($sub*0.11);
$total=$sub+$tax;
@endphp

<div x-data="{tab:'Semua',pay:false,method:'cash',cash:''}" class="flex h-full overflow-hidden">

    {{-- ── KIRI: PRODUK ──────────────────────────────── --}}
    <div class="flex flex-col flex-1 min-w-0 border-r border-gray-200 bg-slate-50">

        {{-- Topbar --}}
        <div class="px-5 py-3.5 bg-white border-b border-gray-200 flex items-center gap-3 shrink-0">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Cari produk atau scan barcode..."
                       class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div class="text-right shrink-0 hidden lg:block">
                <p class="text-xs font-semibold text-gray-700">Shift Pagi</p>
                <p class="text-xs text-gray-400">Kasir: Budi · 08:00</p>
            </div>
        </div>

        {{-- Category tabs --}}
        <div class="px-5 py-2.5 bg-white border-b border-gray-200 flex items-center gap-1.5 overflow-x-auto shrink-0">
            @foreach($cats as $cat)
            <button @click="tab='{{ $cat }}'"
                    :class="tab==='{{ $cat }}'?'bg-blue-600 text-white border-blue-600':'bg-white text-gray-500 border-gray-200 hover:border-blue-300 hover:text-blue-600'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-lg border transition-colors whitespace-nowrap">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        {{-- Product grid --}}
        <div class="flex-1 overflow-y-auto p-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($products as $p)
                <button class="bg-white rounded-xl border border-gray-100 shadow-sm p-3.5 text-left hover:border-blue-400 hover:shadow-md active:scale-95 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-xl mb-2.5 group-hover:bg-blue-100 transition-colors">{{ $p['e'] }}</div>
                    <p class="text-sm font-semibold text-gray-800 leading-tight line-clamp-2 mb-1">{{ $p['name'] }}</p>
                    <p class="text-xs font-bold text-blue-600">Rp {{ number_format($p['price'],0,',','.') }}</p>
                    <div class="mt-1.5 flex items-center justify-between">
                        <span class="text-[10px] text-gray-400">Stok: {{ $p['stock'] }}</span>
                        @if($p['stock']<=10)<span class="text-[10px] px-1.5 py-0.5 bg-red-50 text-red-500 rounded font-semibold">Menipis</span>@endif
                    </div>
                </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── KANAN: CART ────────────────────────────────── --}}
    <div class="w-80 xl:w-96 flex flex-col bg-white shrink-0">

        {{-- Cart header --}}
        <div class="px-5 py-3.5 border-b border-gray-200 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <p class="text-sm font-bold text-gray-800">Keranjang</p>
                <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full font-bold">{{ count($cart) }}</span>
            </div>
            <button class="text-xs text-red-500 hover:text-red-700 font-medium hover:bg-red-50 px-2 py-1 rounded-lg transition-colors">Kosongkan</button>
        </div>

        {{-- Invoice no --}}
        <div class="px-5 py-2 bg-gray-50 border-b border-gray-100 shrink-0">
            <p class="text-xs text-gray-400">No. Invoice: <span class="font-semibold text-gray-600">INV-{{ date('Ymd') }}-039</span></p>
        </div>

        {{-- Cart items --}}
        <div class="flex-1 overflow-y-auto px-4 py-3 space-y-2">
            @foreach($cart as $item)
            <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 border border-gray-100 group">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $item['name'] }}</p>
                    <p class="text-xs text-blue-600 font-medium mt-0.5">Rp {{ number_format($item['price'],0,',','.') }}</p>
                </div>
                <div class="flex items-center gap-1.5 shrink-0">
                    <button class="w-6 h-6 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm font-bold flex items-center justify-center transition-colors">−</button>
                    <span class="w-6 text-center text-sm font-bold text-gray-800">{{ $item['qty'] }}</span>
                    <button class="w-6 h-6 rounded-md bg-blue-100 hover:bg-blue-200 text-blue-700 text-sm font-bold flex items-center justify-center transition-colors">+</button>
                </div>
                <div class="text-right shrink-0 w-20">
                    <p class="text-sm font-bold text-gray-900">Rp {{ number_format($item['price']*$item['qty'],0,',','.') }}</p>
                    <button class="text-[10px] text-red-400 hover:text-red-600 mt-0.5 opacity-0 group-hover:opacity-100 transition-opacity">Hapus</button>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Summary + Bayar --}}
        <div class="border-t border-gray-200 px-5 py-4 space-y-2 shrink-0">
            <div class="flex justify-between text-sm text-gray-500"><span>Subtotal</span><span class="font-medium text-gray-700">Rp {{ number_format($sub,0,',','.') }}</span></div>
            <div class="flex justify-between text-sm text-gray-500"><span>PPN 11%</span><span class="font-medium text-gray-700">Rp {{ number_format($tax,0,',','.') }}</span></div>
            <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                <span class="text-base font-bold text-gray-900">Total</span>
                <span class="text-xl font-extrabold text-blue-600">Rp {{ number_format($total,0,',','.') }}</span>
            </div>
            <button @click="pay=true"
                    class="w-full mt-2 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-base rounded-xl transition-colors flex items-center justify-center gap-2 shadow-sm shadow-blue-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Bayar Sekarang
            </button>
        </div>
    </div>

    {{-- ── MODAL PEMBAYARAN ────────────────────────────── --}}
    <div x-show="pay" x-cloak @keydown.escape.window="pay=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div x-show="pay"
             x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             @click="pay=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

        <div x-show="pay"
             x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">

            {{-- Modal header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div><p class="text-base font-bold text-gray-900">Pembayaran</p><p class="text-xs text-gray-400 mt-0.5">INV-{{ date('Ymd') }}-039</p></div>
                <button @click="pay=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="px-6 py-5">
                {{-- Total --}}
                <div class="bg-blue-50 rounded-xl px-5 py-4 text-center mb-5 border border-blue-100">
                    <p class="text-xs font-semibold text-blue-500 uppercase tracking-wide">Total Tagihan</p>
                    <p class="text-3xl font-extrabold text-blue-700 mt-1">Rp {{ number_format($total,0,',','.') }}</p>
                    <p class="text-xs text-blue-400 mt-1">{{ count($cart) }} item · PPN sudah termasuk</p>
                </div>

                {{-- Metode --}}
                <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2.5">Metode Pembayaran</p>
                <div class="grid grid-cols-2 gap-2.5 mb-5">
                    @foreach([['cash','Tunai','M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],['qris','QRIS','M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M11 3H9C8.4 3 8 3.4 8 4v1H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-2V4c0-.6-.4-1-1-1h-2z']] as [$val,$label,$icon])
                    <button @click="method='{{ $val }}'"
                            :class="method==='{{ $val }}'?'border-blue-500 bg-blue-50 text-blue-700':'border-gray-200 text-gray-500 hover:border-gray-300'"
                            class="flex items-center gap-2.5 px-4 py-3 rounded-xl border-2 font-semibold text-sm transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                        {{ $label }}
                    </button>
                    @endforeach
                </div>

                {{-- Cash panel --}}
                <div x-show="method==='cash'" x-cloak class="space-y-3">
                    <div>
                        <label class="text-xs font-semibold text-gray-500 block mb-1.5">Uang Diterima</label>
                        <input x-model="cash" type="text" placeholder="Masukkan jumlah uang..."
                               class="w-full px-4 py-3 text-lg font-bold border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900"/>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach(['50000','75000','100000','150000','200000','500000'] as $nom)
                        <button @click="cash='{{ $nom }}'" class="py-2 text-xs font-semibold bg-gray-50 hover:bg-blue-50 hover:text-blue-700 border border-gray-200 hover:border-blue-300 rounded-lg transition-colors">
                            Rp {{ number_format((int)$nom,0,',','.') }}
                        </button>
                        @endforeach
                    </div>
                    <div class="bg-green-50 border border-green-100 rounded-xl px-4 py-3 flex items-center justify-between">
                        <span class="text-sm font-semibold text-green-700">Kembalian</span>
                        <span class="text-xl font-extrabold text-green-700"
                              x-text="parseInt(cash)||0 >= {{ $total }} ? 'Rp '+(parseInt(cash)-{{ $total }}).toLocaleString('id-ID') : '—'">
                        </span>
                    </div>
                </div>

                {{-- QRIS panel --}}
                <div x-show="method==='qris'" x-cloak class="flex flex-col items-center gap-3">
                    <div class="w-44 h-44 bg-gray-100 rounded-2xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center gap-2 p-4">
                        <div class="grid grid-cols-7 gap-0.5">
                            @for($r=0;$r<7;$r++) @for($c=0;$c<7;$c++)
                            <div class="w-4 h-4 rounded-sm {{ (($r<2||$r>4)&&($c<2||$c>4))||($r==3&&$c==3)?'bg-gray-800':'bg-gray-200' }}"></div>
                            @endfor @endfor
                        </div>
                        <p class="text-[9px] text-gray-400 font-medium">SCAN UNTUK BAYAR</p>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-amber-600 bg-amber-50 px-3 py-2 rounded-lg border border-amber-100">
                        <svg class="w-3.5 h-3.5 shrink-0 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Menunggu pembayaran...
                    </div>
                    <p class="text-xs text-gray-400 text-center">GoPay · OVO · Dana · ShopeePay</p>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 pb-5 flex gap-2.5">
                <button @click="pay=false" class="flex-1 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-colors">Batal</button>
                <button class="flex-1 py-3 bg-green-600 hover:bg-green-700 text-white font-bold text-sm rounded-xl transition-colors flex items-center justify-center gap-2 shadow-sm shadow-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    Konfirmasi Bayar
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
