@extends('layouts.app')
@section('title','Laporan')
@section('header','Laporan')
@section('subheader','Analisis penjualan dan performa toko.')
@section('actions')
    <button class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Export
    </button>
@endsection
@section('content')
@php
$transactions=[
    ['no'=>'INV-038','date'=>'25 Jul 2025','time'=>'14:32','items'=>5,'total'=>'Rp 47.500','method'=>'QRIS','kasir'=>'Budi','status'=>'Selesai'],
    ['no'=>'INV-037','date'=>'25 Jul 2025','time'=>'13:15','items'=>2,'total'=>'Rp 8.000','method'=>'Tunai','kasir'=>'Budi','status'=>'Selesai'],
    ['no'=>'INV-036','date'=>'25 Jul 2025','time'=>'12:50','items'=>8,'total'=>'Rp 112.000','method'=>'Transfer','kasir'=>'Sari','status'=>'Selesai'],
    ['no'=>'INV-035','date'=>'25 Jul 2025','time'=>'11:20','items'=>1,'total'=>'Rp 3.500','method'=>'Tunai','kasir'=>'Budi','status'=>'Batal'],
    ['no'=>'INV-034','date'=>'25 Jul 2025','time'=>'10:05','items'=>3,'total'=>'Rp 22.500','method'=>'QRIS','kasir'=>'Sari','status'=>'Selesai'],
];
$topProducts=[
    ['name'=>'Indomie Goreng','qty'=>142,'revenue'=>'Rp 497.000','pct'=>100],
    ['name'=>'Aqua 600ml','qty'=>118,'revenue'=>'Rp 472.000','pct'=>83],
    ['name'=>'Teh Botol Sosro','qty'=>95,'revenue'=>'Rp 475.000','pct'=>67],
    ['name'=>'Chitato Original','qty'=>74,'revenue'=>'Rp 703.000','pct'=>52],
    ['name'=>'Pocari Sweat','qty'=>61,'revenue'=>'Rp 488.000','pct'=>43],
];
$payments=[
    ['method'=>'Tunai','count'=>18,'total'=>'Rp 1.820.000','pct'=>43,'color'=>'bg-blue-500'],
    ['method'=>'QRIS','count'=>14,'total'=>'Rp 1.540.000','pct'=>36,'color'=>'bg-green-500'],
    ['method'=>'Transfer','count'=>6,'total'=>'Rp 890.000','pct'=>21,'color'=>'bg-purple-500'],
];
@endphp

{{-- Filter --}}
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-5">
    <div class="flex flex-wrap items-end gap-3">
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Dari Tanggal</label>
            <input type="date" value="2025-07-01" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Sampai Tanggal</label>
            <input type="date" value="2025-07-25" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kasir</label>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                <option>Semua Kasir</option>
                <option>Budi</option>
                <option>Sari</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Metode Bayar</label>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                <option>Semua Metode</option>
                <option>Tunai</option>
                <option>QRIS</option>
                <option>Transfer</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Filter</button>
            <button class="px-4 py-2 bg-gray-100 text-gray-600 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-colors">Reset</button>
        </div>
    </div>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
    <x-card title="Total Omzet" value="Rp 4.250.000" color="blue" icon="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    <x-card title="Total Transaksi" value="38" color="green" icon="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
    <x-card title="Rata-rata Transaksi" value="Rp 111.842" color="purple" icon="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
    <x-card title="Laba Estimasi" value="Rp 1.062.500" color="amber" icon="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-5">
    {{-- Produk Terlaris --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm font-bold text-gray-800 mb-4">Produk Terlaris</p>
        <div class="space-y-3.5">
            @foreach($topProducts as $p)
            <div>
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2 min-w-0">
                        <span class="text-xs font-bold text-gray-300 w-4 shrink-0">{{ $loop->iteration }}</span>
                        <span class="text-sm text-gray-700 font-medium truncate">{{ $p['name'] }}</span>
                    </div>
                    <span class="text-xs text-gray-400 shrink-0 ml-2">{{ $p['qty'] }}x</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full" style="width:{{ $p['pct'] }}%"></div>
                    </div>
                    <span class="text-xs text-gray-400 w-24 text-right shrink-0">{{ $p['revenue'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Metode Pembayaran --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm font-bold text-gray-800 mb-4">Metode Pembayaran</p>
        <div class="space-y-4">
            @foreach($payments as $pay)
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full {{ $pay['color'] }} inline-block"></span>
                        <span class="text-sm font-semibold text-gray-700">{{ $pay['method'] }}</span>
                    </div>
                    <span class="text-xs text-gray-400">{{ $pay['count'] }} transaksi</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full {{ $pay['color'] }} rounded-full" style="width:{{ $pay['pct'] }}%"></div>
                    </div>
                    <span class="text-xs font-semibold text-gray-600 w-24 text-right shrink-0">{{ $pay['total'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-3 gap-2 text-center">
            @foreach($payments as $pay)
            <div>
                <p class="text-lg font-bold text-gray-800">{{ $pay['pct'] }}%</p>
                <p class="text-xs text-gray-400">{{ $pay['method'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Ringkasan Shift --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm font-bold text-gray-800 mb-4">Ringkasan per Kasir</p>
        <div class="space-y-3">
            @foreach([['name'=>'Budi','trx'=>22,'total'=>'Rp 2.450.000'],['name'=>'Sari','trx'=>16,'total'=>'Rp 1.800.000']] as $k)
            <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50">
                <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white shrink-0">{{ strtoupper(substr($k['name'],0,2)) }}</div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800">{{ $k['name'] }}</p>
                    <p class="text-xs text-gray-400">{{ $k['trx'] }} transaksi</p>
                </div>
                <p class="text-sm font-bold text-gray-800">{{ $k['total'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Tabel Transaksi --}}
<x-table :headers="['No. Invoice','Tanggal','Waktu','Item','Total','Metode','Kasir','Status']">
    <x-slot name="caption">
        <p class="text-sm font-bold text-gray-800">Detail Transaksi</p>
        <span class="text-xs text-gray-400">{{ count($transactions) }} transaksi</span>
    </x-slot>
    @foreach($transactions as $t)
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-5 py-3 font-mono text-xs font-semibold text-blue-600">{{ $t['no'] }}</td>
        <td class="px-5 py-3 text-gray-600">{{ $t['date'] }}</td>
        <td class="px-5 py-3 text-gray-400">{{ $t['time'] }}</td>
        <td class="px-5 py-3 text-gray-600">{{ $t['items'] }} item</td>
        <td class="px-5 py-3 font-semibold text-gray-800">{{ $t['total'] }}</td>
        <td class="px-5 py-3"><span class="px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">{{ $t['method'] }}</span></td>
        <td class="px-5 py-3 text-gray-600">{{ $t['kasir'] }}</td>
        <td class="px-5 py-3">
            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $t['status']==='Selesai'?'bg-green-100 text-green-700':'bg-red-100 text-red-600' }}">{{ $t['status'] }}</span>
        </td>
    </tr>
    @endforeach
</x-table>
@endsection
