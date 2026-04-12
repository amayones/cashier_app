@extends('layouts.app')
@section('title','Inventori')
@section('header','Inventori')
@section('subheader','Monitor dan kelola stok produk.')
@section('actions')
    <button x-data @click="$dispatch('open-modal',{name:'stockIn'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Stok Masuk
    </button>
    <button x-data @click="$dispatch('open-modal',{name:'stockOut'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors">
        Stok Keluar
    </button>
@endsection
@section('content')
@php
$stats=[
    ['label'=>'Total SKU','value'=>'124','icon'=>'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4','color'=>'blue'],
    ['label'=>'Stok Menipis','value'=>'8','icon'=>'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z','color'=>'amber'],
    ['label'=>'Stok Habis','value'=>'3','icon'=>'M6 18L18 6M6 6l12 12','color'=>'rose'],
    ['label'=>'Nilai Stok','value'=>'Rp 12.4jt','icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z','color'=>'green'],
];
$stocks=[
    ['name'=>'Indomie Goreng','sku'=>'SKU-001','current'=>142,'min'=>20,'in'=>200,'out'=>58,'status'=>'Aman'],
    ['name'=>'Aqua 600ml','sku'=>'SKU-002','current'=>88,'min'=>30,'in'=>150,'out'=>62,'status'=>'Aman'],
    ['name'=>'Teh Botol Sosro','sku'=>'SKU-003','current'=>5,'min'=>20,'in'=>100,'out'=>95,'status'=>'Menipis'],
    ['name'=>'Chitato Original','sku'=>'SKU-004','current'=>0,'min'=>10,'in'=>50,'out'=>50,'status'=>'Habis'],
    ['name'=>'Pocari Sweat','sku'=>'SKU-005','current'=>34,'min'=>15,'in'=>80,'out'=>46,'status'=>'Aman'],
    ['name'=>'Mie Sedaap Soto','sku'=>'SKU-006','current'=>12,'min'=>20,'in'=>120,'out'=>108,'status'=>'Menipis'],
];
$logs=[
    ['time'=>'10:30','type'=>'in','product'=>'Indomie Goreng','qty'=>'+50','by'=>'Admin','note'=>'Restock dari supplier'],
    ['time'=>'09:15','type'=>'out','product'=>'Teh Botol Sosro','qty'=>'-12','by'=>'Kasir Budi','note'=>'Penjualan POS'],
    ['time'=>'08:45','type'=>'in','product'=>'Aqua 600ml','qty'=>'+100','by'=>'Admin','note'=>'Restock bulanan'],
    ['time'=>'Kemarin','type'=>'out','product'=>'Chitato Original','qty'=>'-5','by'=>'Kasir Sari','note'=>'Penjualan POS'],
    ['time'=>'Kemarin','type'=>'adj','product'=>'Pocari Sweat','qty'=>'-2','by'=>'Admin','note'=>'Koreksi stok'],
];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
    @foreach($stats as $s)
        <x-card :title="$s['label']" :value="$s['value']" :color="$s['color']" :icon="$s['icon']"/>
    @endforeach
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
    {{-- Tabel Stok --}}
    <div class="xl:col-span-2">
        <x-table :headers="['Produk','SKU','Stok','Min','Masuk','Keluar','Status']">
            <x-slot name="caption">
                <p class="text-sm font-bold text-gray-800">Monitor Stok</p>
                <div class="flex gap-2">
                    <input type="text" placeholder="Cari produk..." class="text-xs px-3 py-1.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </x-slot>
            @foreach($stocks as $s)
            @php
            $sc=['Aman'=>'bg-green-100 text-green-700','Menipis'=>'bg-amber-100 text-amber-700','Habis'=>'bg-red-100 text-red-700'];
            $pct=$s['current']>0?min(100,round($s['current']/$s['min']*50)):0;
            $bc=$s['status']==='Aman'?'bg-green-500':($s['status']==='Menipis'?'bg-amber-500':'bg-red-500');
            @endphp
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-3 font-semibold text-gray-800">{{ $s['name'] }}</td>
                <td class="px-5 py-3 text-xs font-mono text-gray-400">{{ $s['sku'] }}</td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <span class="font-bold {{ $s['current']===0?'text-red-500':($s['current']<=$s['min']?'text-amber-500':'text-gray-800') }}">{{ $s['current'] }}</span>
                        <div class="w-16 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full {{ $bc }} rounded-full" style="width:{{ $pct }}%"></div>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-3 text-gray-500">{{ $s['min'] }}</td>
                <td class="px-5 py-3 text-green-600 font-semibold">+{{ $s['in'] }}</td>
                <td class="px-5 py-3 text-red-500 font-semibold">-{{ $s['out'] }}</td>
                <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $sc[$s['status']] }}">{{ $s['status'] }}</span></td>
            </tr>
            @endforeach
        </x-table>
    </div>

    {{-- Log Mutasi --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm font-bold text-gray-800 mb-4">Riwayat Mutasi</p>
        <div class="space-y-3">
            @foreach($logs as $l)
            @php $lc=['in'=>['dot'=>'bg-green-500','badge'=>'bg-green-100 text-green-700','label'=>'Masuk'],'out'=>['dot'=>'bg-red-500','badge'=>'bg-red-100 text-red-700','label'=>'Keluar'],'adj'=>['dot'=>'bg-amber-500','badge'=>'bg-amber-100 text-amber-700','label'=>'Koreksi']]; @endphp
            <div class="flex items-start gap-3 pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                <div class="mt-1.5 w-2 h-2 rounded-full shrink-0 {{ $lc[$l['type']]['dot'] }}"></div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $l['product'] }}</p>
                        <span class="text-sm font-bold {{ $l['type']==='in'?'text-green-600':'text-red-500' }} shrink-0">{{ $l['qty'] }}</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $l['note'] }}</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] text-gray-400">{{ $l['time'] }}</span>
                        <span class="text-[10px] px-1.5 py-0.5 rounded {{ $lc[$l['type']]['badge'] }} font-semibold">{{ $lc[$l['type']]['label'] }}</span>
                        <span class="text-[10px] text-gray-400">{{ $l['by'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Modal Stok Masuk --}}
@push('modals')
<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='stockIn'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Stok Masuk</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Produk</label>
                <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Pilih produk...</option>
                    <option>Indomie Goreng</option>
                    <option>Aqua 600ml</option>
                    <option>Teh Botol Sosro</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Jumlah</label>
                    <input type="number" placeholder="0" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Harga Beli</label>
                    <input type="number" placeholder="0" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Supplier</label>
                <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Pilih supplier...</option>
                    <option>PT Indofood</option>
                    <option>CV Maju Jaya</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Catatan</label>
                <textarea rows="2" placeholder="Catatan opsional..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button @click="show=false" class="flex-1 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                <button class="flex-1 py-2.5 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endpush
@endsection
