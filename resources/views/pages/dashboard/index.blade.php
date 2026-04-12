@extends('layouts.app')
@section('title','Dashboard')
@section('header','Dashboard')
@section('subheader','Selamat datang kembali, Admin! Ringkasan toko hari ini.')
@section('actions')
    <span class="text-xs text-gray-400">Jumat, 25 Juli 2025</span>
    <span class="text-xs px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg font-medium border border-blue-100">Shift Pagi · 08:00–16:00</span>
@endsection
@section('content')
@php
$stats=[
    ['label'=>'Omzet Hari Ini',  'value'=>'Rp 4.250.000','trend'=>'+12% dari kemarin','up'=>true, 'sub'=>'Target: Rp 5.000.000','color'=>'blue',  'icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['label'=>'Omzet Bulan Ini', 'value'=>'Rp 87.400.000','trend'=>'+8% dari bulan lalu','up'=>true,'sub'=>'Target: Rp 100.000.000','color'=>'purple','icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
    ['label'=>'Total Transaksi', 'value'=>'38',           'trend'=>'+5 dari kemarin', 'up'=>true, 'sub'=>'124 item terjual',      'color'=>'green', 'icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
    ['label'=>'Laba Estimasi',   'value'=>'Rp 1.062.500','trend'=>'-3% dari kemarin', 'up'=>false,'sub'=>'Margin ~25%',          'color'=>'amber', 'icon'=>'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
];
$bars=[['l'=>'Sen','h'=>55,'v'=>'3.2jt'],['l'=>'Sel','h'=>70,'v'=>'4.1jt'],['l'=>'Rab','h'=>45,'v'=>'2.6jt'],['l'=>'Kam','h'=>85,'v'=>'5.0jt'],['l'=>'Jum','h'=>65,'v'=>'3.8jt'],['l'=>'Sab','h'=>95,'v'=>'5.6jt'],['l'=>'Min','h'=>100,'v'=>'5.9jt']];
$hours=[['h'=>'08','p'=>20],['h'=>'09','p'=>45],['h'=>'10','p'=>60],['h'=>'11','p'=>80],['h'=>'12','p'=>100],['h'=>'13','p'=>90],['h'=>'14','p'=>55],['h'=>'15','p'=>40],['h'=>'16','p'=>30],['h'=>'17','p'=>65],['h'=>'18','p'=>85],['h'=>'19','p'=>70]];
$tops=[['n'=>'Indomie Goreng','q'=>142,'r'=>'Rp 497.000','p'=>100,'e'=>'🍜'],['n'=>'Aqua 600ml','q'=>118,'r'=>'Rp 472.000','p'=>83,'e'=>'💧'],['n'=>'Teh Botol Sosro','q'=>95,'r'=>'Rp 475.000','p'=>67,'e'=>'🍵'],['n'=>'Chitato','q'=>74,'r'=>'Rp 703.000','p'=>52,'e'=>'🥔'],['n'=>'Pocari Sweat','q'=>61,'r'=>'Rp 488.000','p'=>43,'e'=>'🥤']];
$activities=[['t'=>'10 mnt lalu','txt'=>'Transaksi INV-20250038 selesai','type'=>'success','by'=>'Kasir: Budi'],['t'=>'25 mnt lalu','txt'=>'Stok Indomie Goreng hampir habis','type'=>'warning','by'=>'Sistem'],['t'=>'1 jam lalu','txt'=>'Shift pagi dimulai oleh Budi','type'=>'info','by'=>'Kasir: Budi'],['t'=>'2 jam lalu','txt'=>'Produk "Aqua 600ml" ditambahkan','type'=>'info','by'=>'Admin'],['t'=>'3 jam lalu','txt'=>'Transaksi INV-20250021 dibatalkan','type'=>'danger','by'=>'Kasir: Sari']];
$notifs=[['txt'=>'5 produk stok di bawah minimum','type'=>'danger'],['txt'=>'Langganan Pro aktif hingga 31 Agustus','type'=>'info'],['txt'=>'Backup data terakhir: 3 hari lalu','type'=>'warning'],['txt'=>'2 kasir belum tutup shift kemarin','type'=>'warning']];
$tc=['success'=>'bg-green-500','warning'=>'bg-amber-500','danger'=>'bg-red-500','info'=>'bg-blue-500'];
$nb=['danger'=>'bg-red-50 border-red-100 text-red-600','info'=>'bg-blue-50 border-blue-100 text-blue-600','warning'=>'bg-amber-50 border-amber-100 text-amber-600'];
@endphp

{{-- Stats --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
    @foreach($stats as $s)
        <x-card :title="$s['label']" :value="$s['value']" :color="$s['color']" :icon="$s['icon']" :trend="$s['trend']" :trendUp="$s['up']" :sub="$s['sub']"/>
    @endforeach
</div>

{{-- Grafik + Top Produk --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
    <div class="xl:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-5">
            <div><p class="text-sm font-bold text-gray-800">Omzet Mingguan</p><p class="text-xs text-gray-400 mt-0.5">7 hari terakhir</p></div>
            <div class="flex gap-1">
                <button class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-semibold">Minggu</button>
                <button class="text-xs px-3 py-1.5 rounded-lg text-gray-400 hover:bg-gray-100">Bulan</button>
            </div>
        </div>
        <div class="flex items-end justify-between gap-2 h-36 px-1">
            @foreach($bars as $b)
            <div class="flex-1 flex flex-col items-center gap-1.5 group">
                <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity font-medium">{{ $b['v'] }}</span>
                <div class="w-full rounded-t-md {{ $loop->last?'bg-blue-600':'bg-blue-100 group-hover:bg-blue-300' }} transition-colors" style="height:{{ $b['h'] }}%"></div>
                <span class="text-[11px] text-gray-400 font-medium">{{ $b['l'] }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-3 gap-4 text-center">
            <div><p class="text-xs text-gray-400">Total Minggu</p><p class="text-sm font-bold text-gray-800 mt-0.5">Rp 30.200.000</p></div>
            <div><p class="text-xs text-gray-400">Hari Terbaik</p><p class="text-sm font-bold text-gray-800 mt-0.5">Minggu · 5.9jt</p></div>
            <div><p class="text-xs text-gray-400">Rata-rata/Hari</p><p class="text-sm font-bold text-gray-800 mt-0.5">Rp 4.314.000</p></div>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4"><p class="text-sm font-bold text-gray-800">Produk Terlaris</p><a href="/report" class="text-xs text-blue-600 hover:underline">Lihat semua</a></div>
        <div class="space-y-3.5">
            @foreach($tops as $p)
            <div>
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2 min-w-0">
                        <span class="text-xs font-bold text-gray-300 w-4 shrink-0">{{ $loop->iteration }}</span>
                        <span class="text-sm">{{ $p['e'] }}</span>
                        <span class="text-sm text-gray-700 font-medium truncate">{{ $p['n'] }}</span>
                    </div>
                    <span class="text-xs text-gray-400 shrink-0 ml-2">{{ $p['q'] }}x</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden"><div class="h-full bg-blue-500 rounded-full" style="width:{{ $p['p'] }}%"></div></div>
                    <span class="text-xs text-gray-400 w-20 text-right shrink-0">{{ $p['r'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Jam Ramai + Insight --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
    <div class="xl:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-5">
            <div><p class="text-sm font-bold text-gray-800">Jam Ramai Transaksi</p><p class="text-xs text-gray-400 mt-0.5">Distribusi per jam hari ini</p></div>
            <span class="text-xs px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg font-semibold border border-amber-100">Peak: 12:00</span>
        </div>
        <div class="flex items-end gap-1.5 h-24">
            @foreach($hours as $h)
            <div class="flex-1 flex flex-col items-center gap-1">
                <div class="w-full rounded-t {{ $h['p']>=90?'bg-amber-400':($h['p']>=60?'bg-amber-200':'bg-gray-100') }}" style="height:{{ $h['p'] }}%"></div>
                <span class="text-[9px] text-gray-400">{{ $h['h'] }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-3 flex items-center gap-4 text-xs text-gray-400">
            <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-amber-400 inline-block"></span>Sangat ramai</span>
            <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-amber-200 inline-block"></span>Ramai</span>
            <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-gray-100 inline-block"></span>Sepi</span>
        </div>
    </div>
    <div class="flex flex-col gap-3">
        @php $ins=[['l'=>'Rata-rata Pembelian','v'=>'Rp 111.842','s'=>'per transaksi','c'=>'blue'],['l'=>'Jam Paling Ramai','v'=>'12:00–13:00','s'=>'90 transaksi/jam','c'=>'amber'],['l'=>'Metode Terpopuler','v'=>'QRIS','s'=>'52% dari total','c'=>'green']]; @endphp
        @foreach($ins as $i)
        @php $ic=['blue'=>['ib'=>'bg-blue-50','it'=>'text-blue-600'],'amber'=>['ib'=>'bg-amber-50','it'=>'text-amber-600'],'green'=>['ib'=>'bg-green-50','it'=>'text-green-600']]; @endphp
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex items-center gap-3 flex-1">
            <div class="p-2 rounded-lg {{ $ic[$i['c']]['ib'] }} {{ $ic[$i['c']]['it'] }} shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">{{ $i['l'] }}</p>
                <p class="text-base font-bold text-gray-900 truncate">{{ $i['v'] }}</p>
                <p class="text-xs text-gray-400">{{ $i['s'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Aktivitas + Notifikasi --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4"><p class="text-sm font-bold text-gray-800">Aktivitas Toko</p><a href="#" class="text-xs text-blue-600 hover:underline">Lihat semua</a></div>
        <div class="space-y-3">
            @foreach($activities as $a)
            <div class="flex items-start gap-3">
                <div class="mt-1.5 w-2 h-2 rounded-full shrink-0 {{ $tc[$a['type']] }}"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-700">{{ $a['txt'] }}</p>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-xs text-gray-400">{{ $a['t'] }}</span>
                        <span class="text-xs px-1.5 py-0.5 rounded bg-gray-100 text-gray-500 font-medium">{{ $a['by'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-bold text-gray-800">Notifikasi Penting</p>
            <span class="text-xs px-2 py-0.5 bg-red-100 text-red-600 rounded-full font-semibold">{{ count($notifs) }} baru</span>
        </div>
        <div class="space-y-2.5">
            @foreach($notifs as $n)
            <div class="flex items-start gap-3 p-3 rounded-lg border {{ $nb[$n['type']] }}">
                <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <p class="text-sm leading-snug">{{ $n['txt'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
