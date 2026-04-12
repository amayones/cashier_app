@extends('layouts.app')
@section('title','Shift')
@section('header','Shift')
@section('subheader','Kelola kas buka/tutup dan setoran kasir.')
@section('actions')
    <button x-data @click="$dispatch('open-modal',{name:'bukaShift'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition-colors">
        Buka Shift
    </button>
    <button x-data @click="$dispatch('open-modal',{name:'tutupShift'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors">
        Tutup Shift
    </button>
@endsection
@section('content')
@php
$currentShift=['kasir'=>'Budi Santoso','start'=>'08:00','modal'=>'Rp 500.000','trx'=>22,'total'=>'Rp 1.840.000','status'=>'Aktif'];
$shifts=[
    ['id'=>'SHF-025','kasir'=>'Budi Santoso','date'=>'25 Jul 2025','start'=>'08:00','end'=>'16:00','modal'=>'Rp 500.000','total'=>'Rp 1.840.000','trx'=>22,'status'=>'Aktif'],
    ['id'=>'SHF-024','kasir'=>'Sari Dewi','date'=>'25 Jul 2025','start'=>'16:00','end'=>'22:00','modal'=>'Rp 300.000','total'=>'Rp 2.410.000','trx'=>16,'status'=>'Selesai'],
    ['id'=>'SHF-023','kasir'=>'Budi Santoso','date'=>'24 Jul 2025','start'=>'08:00','end'=>'16:00','modal'=>'Rp 500.000','total'=>'Rp 1.620.000','trx'=>19,'status'=>'Selesai'],
    ['id'=>'SHF-022','kasir'=>'Sari Dewi','date'=>'24 Jul 2025','start'=>'16:00','end'=>'22:00','modal'=>'Rp 300.000','total'=>'Rp 1.980.000','trx'=>14,'status'=>'Selesai'],
    ['id'=>'SHF-021','kasir'=>'Budi Santoso','date'=>'23 Jul 2025','start'=>'08:00','end'=>'16:00','modal'=>'Rp 500.000','total'=>'Rp 2.100.000','trx'=>25,'status'=>'Selesai'],
];
$setoran=[
    ['time'=>'10:30','kasir'=>'Budi','amount'=>'Rp 500.000','note'=>'Setoran pertama'],
    ['time'=>'13:00','kasir'=>'Budi','amount'=>'Rp 750.000','note'=>'Setoran siang'],
    ['time'=>'09:00','kasir'=>'Sari','amount'=>'Rp 400.000','note'=>'Setoran pagi'],
];
@endphp

{{-- Shift Aktif --}}
<div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl p-5 mb-5 text-white">
    <div class="flex items-start justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-white animate-pulse inline-block"></span>
                <span class="text-sm font-semibold opacity-90">Shift Aktif Sekarang</span>
            </div>
            <p class="text-2xl font-bold">{{ $currentShift['kasir'] }}</p>
            <p class="text-sm opacity-80 mt-1">Mulai: {{ $currentShift['start'] }} · Modal Kas: {{ $currentShift['modal'] }}</p>
        </div>
        <div class="text-right">
            <p class="text-sm opacity-80">Total Penjualan</p>
            <p class="text-2xl font-bold">{{ $currentShift['total'] }}</p>
            <p class="text-sm opacity-80">{{ $currentShift['trx'] }} transaksi</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
    {{-- Tabel Shift --}}
    <div class="xl:col-span-2">
        <x-table :headers="['ID Shift','Kasir','Tanggal','Mulai','Selesai','Modal','Total','Trx','Status']">
            <x-slot name="caption">
                <p class="text-sm font-bold text-gray-800">Riwayat Shift</p>
            </x-slot>
            @foreach($shifts as $s)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-3 font-mono text-xs font-semibold text-blue-600">{{ $s['id'] }}</td>
                <td class="px-5 py-3 font-semibold text-gray-800">{{ $s['kasir'] }}</td>
                <td class="px-5 py-3 text-gray-500 text-xs">{{ $s['date'] }}</td>
                <td class="px-5 py-3 text-gray-600">{{ $s['start'] }}</td>
                <td class="px-5 py-3 text-gray-600">{{ $s['end'] }}</td>
                <td class="px-5 py-3 text-gray-600">{{ $s['modal'] }}</td>
                <td class="px-5 py-3 font-semibold text-gray-800">{{ $s['total'] }}</td>
                <td class="px-5 py-3 text-gray-600">{{ $s['trx'] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $s['status']==='Aktif'?'bg-green-100 text-green-700':'bg-gray-100 text-gray-500' }}">{{ $s['status'] }}</span>
                </td>
            </tr>
            @endforeach
        </x-table>
    </div>

    {{-- Setoran Kas --}}
    <div class="space-y-4">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm font-bold text-gray-800">Setoran Kas</p>
                <button x-data @click="$dispatch('open-modal',{name:'setoran'})"
                        class="text-xs px-3 py-1.5 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">+ Setoran</button>
            </div>
            <div class="space-y-3">
                @foreach($setoran as $s)
                <div class="flex items-start gap-3 pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                    <div class="mt-1.5 w-2 h-2 rounded-full bg-green-500 shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-800">{{ $s['amount'] }}</p>
                            <span class="text-xs text-gray-400">{{ $s['time'] }}</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $s['kasir'] }} · {{ $s['note'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <p class="text-xs text-gray-400">Total Setoran Hari Ini</p>
                    <p class="text-sm font-bold text-gray-800">Rp 1.650.000</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
            <p class="text-sm font-bold text-gray-800 mb-3">Ringkasan Kas</p>
            <div class="space-y-2.5">
                @foreach([['label'=>'Modal Awal','value'=>'Rp 500.000','color'=>'text-gray-800'],['label'=>'Total Penjualan','value'=>'Rp 1.840.000','color'=>'text-green-600'],['label'=>'Total Setoran','value'=>'Rp 1.650.000','color'=>'text-blue-600'],['label'=>'Sisa di Laci','value'=>'Rp 690.000','color'=>'text-amber-600']] as $k)
                <div class="flex items-center justify-between">
                    <p class="text-xs text-gray-500">{{ $k['label'] }}</p>
                    <p class="text-sm font-semibold {{ $k['color'] }}">{{ $k['value'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Modals --}}
@push('modals')
<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='bukaShift'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Buka Shift</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kasir</label>
                <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Budi Santoso</option>
                    <option>Sari Dewi</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Modal Kas Awal</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400">Rp</span>
                    <input type="number" placeholder="500000" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button @click="show=false" class="flex-1 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                <button class="flex-1 py-2.5 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">Buka Shift</button>
            </div>
        </div>
    </div>
</div>

<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='setoran'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Setoran Kas</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Jumlah Setoran</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400">Rp</span>
                    <input type="number" placeholder="0" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Catatan</label>
                <input type="text" placeholder="Catatan setoran..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex gap-3 pt-2">
                <button @click="show=false" class="flex-1 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                <button class="flex-1 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endpush
@endsection
