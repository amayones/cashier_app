@extends('layouts.app')
@section('title','Dashboard')
@section('header','Dashboard')
@section('subheader','Ringkasan performa toko hari ini.')
@section('actions')
    <span class="text-xs text-gray-400">Jumat, 25 Juli 2025</span>
    <span class="text-xs px-3 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg font-medium border border-indigo-100">Shift Pagi · 08:00–16:00</span>
@endsection
@section('content')
@php
$stats=[
    ['label'=>'Omzet Hari Ini',  'value'=>'Rp 4.250.000', 'trend'=>'+12% dari kemarin',   'up'=>true,  'sub'=>'Target: Rp 5.000.000',   'color'=>'blue'],
    ['label'=>'Omzet Bulan Ini', 'value'=>'Rp 87.400.000','trend'=>'+8% dari bulan lalu', 'up'=>true,  'sub'=>'Target: Rp 100.000.000', 'color'=>'purple'],
    ['label'=>'Total Transaksi', 'value'=>'38',            'trend'=>'+5 dari kemarin',     'up'=>true,  'sub'=>'124 item terjual',        'color'=>'green'],
    ['label'=>'Laba Estimasi',   'value'=>'Rp 1.062.500', 'trend'=>'-3% dari kemarin',    'up'=>false, 'sub'=>'Margin ~25%',             'color'=>'amber'],
];
$bars=[['l'=>'Sen','h'=>55,'v'=>'3.2jt'],['l'=>'Sel','h'=>70,'v'=>'4.1jt'],['l'=>'Rab','h'=>45,'v'=>'2.6jt'],['l'=>'Kam','h'=>85,'v'=>'5.0jt'],['l'=>'Jum','h'=>65,'v'=>'3.8jt'],['l'=>'Sab','h'=>95,'v'=>'5.6jt'],['l'=>'Min','h'=>100,'v'=>'5.9jt']];
$hours=[['h'=>'08','p'=>20],['h'=>'09','p'=>45],['h'=>'10','p'=>60],['h'=>'11','p'=>80],['h'=>'12','p'=>100],['h'=>'13','p'=>90],['h'=>'14','p'=>55],['h'=>'15','p'=>40],['h'=>'16','p'=>30],['h'=>'17','p'=>65],['h'=>'18','p'=>85],['h'=>'19','p'=>70]];
$tops=[['n'=>'Indomie Goreng','q'=>142,'r'=>'Rp 497.000','p'=>100],['n'=>'Aqua 600ml','q'=>118,'r'=>'Rp 472.000','p'=>83],['n'=>'Teh Botol Sosro','q'=>95,'r'=>'Rp 475.000','p'=>67],['n'=>'Chitato','q'=>74,'r'=>'Rp 703.000','p'=>52],['n'=>'Pocari Sweat','q'=>61,'r'=>'Rp 488.000','p'=>43]];
$activities=[['t'=>'10 mnt lalu','txt'=>'Transaksi INV-20250038 selesai','type'=>'success','by'=>'Kasir: Budi'],['t'=>'25 mnt lalu','txt'=>'Stok Indomie Goreng hampir habis','type'=>'warning','by'=>'Sistem'],['t'=>'1 jam lalu','txt'=>'Shift pagi dimulai oleh Budi','type'=>'info','by'=>'Kasir: Budi'],['t'=>'2 jam lalu','txt'=>'Produk "Aqua 600ml" ditambahkan','type'=>'info','by'=>'Admin'],['t'=>'3 jam lalu','txt'=>'Transaksi INV-20250021 dibatalkan','type'=>'danger','by'=>'Kasir: Sari']];
$notifs=[['txt'=>'5 produk stok di bawah minimum','type'=>'danger'],['txt'=>'Langganan Pro aktif hingga 31 Agustus','type'=>'info'],['txt'=>'Backup data terakhir: 3 hari lalu','type'=>'warning'],['txt'=>'2 kasir belum tutup shift kemarin','type'=>'warning']];
$dot=['success'=>'bg-emerald-400','warning'=>'bg-amber-400','danger'=>'bg-red-400','info'=>'bg-blue-400'];
$nb=['danger'=>'border-l-red-400','info'=>'border-l-blue-400','warning'=>'border-l-amber-400'];
@endphp

{{-- Stats --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
    @foreach($stats as $s)
        <x-card :title="$s['label']" :value="$s['value']" :color="$s['color']" :trend="$s['trend']" :trendUp="$s['up']" :sub="$s['sub']"/>
    @endforeach
</div>

{{-- Chart + Top Produk --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">

    {{-- Bar Chart --}}
    <div class="xl:col-span-2 bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="text-sm font-semibold text-gray-800">Omzet Mingguan</p>
                <p class="text-xs text-gray-400 mt-0.5">7 hari terakhir</p>
            </div>
            <div class="flex bg-gray-100 rounded-lg p-0.5 gap-0.5">
                <button class="text-xs px-3 py-1 rounded-md bg-white text-gray-700 font-medium shadow-sm">Minggu</button>
                <button class="text-xs px-3 py-1 rounded-md text-gray-400 hover:text-gray-600">Bulan</button>
            </div>
        </div>
        <div class="flex items-end justify-between gap-2 h-32">
            @foreach($bars as $b)
            <div class="flex-1 flex flex-col items-center gap-1.5 group">
                <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity">{{ $b['v'] }}</span>
                <div class="w-full rounded-md {{ $loop->last ? 'bg-indigo-600' : 'bg-indigo-100 group-hover:bg-indigo-300' }} transition-colors" style="height:{{ $b['h'] }}%"></div>
                <span class="text-[11px] text-gray-400">{{ $b['l'] }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-5 pt-4 border-t border-gray-100 grid grid-cols-3 gap-4 text-center">
            <div>
                <p class="text-xs text-gray-400">Total Minggu</p>
                <p class="text-sm font-semibold text-gray-800 mt-1">Rp 30.200.000</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">Hari Terbaik</p>
                <p class="text-sm font-semibold text-gray-800 mt-1">Minggu · 5.9jt</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">Rata-rata/Hari</p>
                <p class="text-sm font-semibold text-gray-800 mt-1">Rp 4.314.000</p>
            </div>
        </div>
    </div>

    {{-- Top Produk --}}
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-5">
            <p class="text-sm font-semibold text-gray-800">Produk Terlaris</p>
            <a href="/report" class="text-xs text-indigo-600 hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-4">
            @foreach($tops as $p)
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <div class="flex items-center gap-2 min-w-0">
                        <span class="text-xs text-gray-300 w-4 shrink-0">{{ $loop->iteration }}</span>
                        <span class="text-sm text-gray-700 font-medium truncate">{{ $p['n'] }}</span>
                    </div>
                    <span class="text-xs text-gray-400 shrink-0 ml-2">{{ $p['q'] }}x</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex-1 h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-500 rounded-full" style="width:{{ $p['p'] }}%"></div>
                    </div>
                    <span class="text-xs text-gray-400 w-20 text-right shrink-0">{{ $p['r'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Jam Ramai + Insight --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">

    {{-- Heatmap Jam --}}
    <div class="xl:col-span-2 bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-5">
            <div>
                <p class="text-sm font-semibold text-gray-800">Jam Ramai Transaksi</p>
                <p class="text-xs text-gray-400 mt-0.5">Distribusi per jam hari ini</p>
            </div>
            <span class="text-xs px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg font-medium border border-amber-100">Peak: 12:00</span>
        </div>
        <div class="flex items-end gap-1.5 h-20">
            @foreach($hours as $h)
            <div class="flex-1 flex flex-col items-center gap-1">
                <div class="w-full rounded-sm {{ $h['p']>=90 ? 'bg-indigo-600' : ($h['p']>=60 ? 'bg-indigo-300' : 'bg-indigo-100') }}" style="height:{{ $h['p'] }}%"></div>
                <span class="text-[9px] text-gray-400">{{ $h['h'] }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-3 flex items-center gap-4 text-xs text-gray-400">
            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-sm bg-indigo-600 inline-block"></span>Sangat ramai</span>
            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-sm bg-indigo-300 inline-block"></span>Ramai</span>
            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-sm bg-indigo-100 inline-block"></span>Sepi</span>
        </div>
    </div>

    {{-- Insight Cards --}}
    <div class="flex flex-col gap-3">
        @php
        $ins=[
            ['l'=>'Rata-rata Pembelian','v'=>'Rp 111.842','s'=>'per transaksi'],
            ['l'=>'Jam Paling Ramai',   'v'=>'12:00–13:00','s'=>'90 transaksi/jam'],
            ['l'=>'Metode Terpopuler',  'v'=>'QRIS',       's'=>'52% dari total'],
        ];
        @endphp
        @foreach($ins as $i)
        <div class="bg-white rounded-xl border border-gray-100 p-4 flex-1">
            <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">{{ $i['l'] }}</p>
            <p class="text-base font-semibold text-gray-900 mt-1.5 truncate">{{ $i['v'] }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $i['s'] }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Aktivitas + Notifikasi --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

    {{-- Aktivitas --}}
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-semibold text-gray-800">Aktivitas Toko</p>
            <a href="#" class="text-xs text-indigo-600 hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-4">
            @foreach($activities as $a)
            <div class="flex items-start gap-3">
                <div class="mt-1.5 w-1.5 h-1.5 rounded-full shrink-0 {{ $dot[$a['type']] }}"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-700">{{ $a['txt'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $a['t'] }} · {{ $a['by'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Notifikasi --}}
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-semibold text-gray-800">Notifikasi</p>
            <span class="text-xs px-2 py-0.5 bg-red-50 text-red-500 rounded-full font-medium">{{ count($notifs) }} baru</span>
        </div>
        <div class="space-y-2">
            @foreach($notifs as $n)
            <div class="flex items-start gap-3 px-3 py-2.5 rounded-lg bg-gray-50 border-l-2 {{ $nb[$n['type']] }}">
                <p class="text-sm text-gray-600 leading-snug">{{ $n['txt'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
