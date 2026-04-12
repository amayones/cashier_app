@extends('layouts.app')
@section('title','Subscription')
@section('header','Subscription')
@section('subheader','Monitor paket langganan dan pendapatan platform.')
@section('content')
@php
$plans=[
    ['name'=>'Starter','price'=>'Rp 99.000','period'=>'/bulan','features'=>['1 kasir','100 produk','Laporan dasar','Support email'],'color'=>'gray','tenants'=>3,'active'=>2],
    ['name'=>'Pro','price'=>'Rp 299.000','period'=>'/bulan','features'=>['5 kasir','Unlimited produk','Laporan lengkap','QRIS terintegrasi','Support prioritas'],'color'=>'blue','tenants'=>2,'active'=>2,'popular'=>true],
    ['name'=>'Enterprise','price'=>'Rp 799.000','period'=>'/bulan','features'=>['Unlimited kasir','Unlimited produk','Multi-outlet','API access','Dedicated support','Custom domain'],'color'=>'purple','tenants'=>1,'active'=>1],
];
$subscriptions=[
    ['tenant'=>'Toko Mahora Jaya','owner'=>'Budi Santoso','plan'=>'Pro','start'=>'1 Jan 2025','end'=>'31 Agt 2025','amount'=>'Rp 299.000','status'=>'Aktif','daysLeft'=>37],
    ['tenant'=>'Warung Pak Joko','owner'=>'Joko Widodo','plan'=>'Starter','start'=>'15 Feb 2025','end'=>'14 Agt 2025','amount'=>'Rp 99.000','status'=>'Aktif','daysLeft'=>20],
    ['tenant'=>'Minimarket Sari','owner'=>'Sari Dewi','plan'=>'Pro','start'=>'3 Mar 2025','end'=>'2 Sep 2025','amount'=>'Rp 299.000','status'=>'Aktif','daysLeft'=>39],
    ['tenant'=>'Toko Berkah','owner'=>'Ahmad Fauzi','plan'=>'Starter','start'=>'20 Mar 2025','end'=>'19 Jul 2025','amount'=>'Rp 99.000','status'=>'Expired','daysLeft'=>0],
    ['tenant'=>'Kios Maju','owner'=>'Rina Wati','plan'=>'Enterprise','start'=>'5 Apr 2025','end'=>'4 Okt 2025','amount'=>'Rp 799.000','status'=>'Aktif','daysLeft'=>71],
    ['tenant'=>'Toko Sejahtera','owner'=>'Dodi Prasetyo','plan'=>'Starter','start'=>'20 Jul 2025','end'=>'19 Agt 2025','amount'=>'Rp 0','status'=>'Trial','daysLeft'=>25],
];
@endphp

{{-- Stats --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
    <x-card title="MRR" value="Rp 1.595.000" color="green" icon="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    <x-card title="Aktif" value="{{ collect($subscriptions)->where('status','Aktif')->count() }}" color="blue" icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    <x-card title="Trial" value="{{ collect($subscriptions)->where('status','Trial')->count() }}" color="amber" icon="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
    <x-card title="Expired" value="{{ collect($subscriptions)->where('status','Expired')->count() }}" color="rose" icon="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</div>

{{-- Paket --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @foreach($plans as $p)
    @php
    $colors=['gray'=>['border'=>'border-gray-200','btn'=>'bg-gray-800 hover:bg-gray-900','badge'=>'bg-gray-100 text-gray-600'],
             'blue'=>['border'=>'border-blue-300','btn'=>'bg-blue-600 hover:bg-blue-700','badge'=>'bg-blue-100 text-blue-700'],
             'purple'=>['border'=>'border-purple-300','btn'=>'bg-purple-600 hover:bg-purple-700','badge'=>'bg-purple-100 text-purple-700']];
    $c=$colors[$p['color']];
    @endphp
    <div class="bg-white rounded-xl border-2 {{ $c['border'] }} shadow-sm p-6 relative">
        @if(isset($p['popular']))
        <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Terpopuler</span>
        @endif
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-base font-bold text-gray-900">{{ $p['name'] }}</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-2xl font-bold text-gray-900">{{ $p['price'] }}</span>
                    <span class="text-xs text-gray-400">{{ $p['period'] }}</span>
                </div>
            </div>
            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $c['badge'] }}">{{ $p['tenants'] }} tenant</span>
        </div>
        <ul class="space-y-2 mb-5">
            @foreach($p['features'] as $f)
            <li class="flex items-center gap-2 text-sm text-gray-600">
                <svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                {{ $f }}
            </li>
            @endforeach
        </ul>
        <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
            <span>{{ $p['active'] }} aktif</span>
            <button class="text-blue-600 hover:underline font-semibold">Edit Paket</button>
        </div>
    </div>
    @endforeach
</div>

{{-- Tabel Subscription --}}
<x-table :headers="['Tenant','Owner','Paket','Mulai','Berakhir','Tagihan','Sisa Hari','Status','Aksi']">
    <x-slot name="caption">
        <p class="text-sm font-bold text-gray-800">Daftar Langganan</p>
        <span class="text-xs text-gray-400">{{ count($subscriptions) }} langganan</span>
    </x-slot>
    @foreach($subscriptions as $s)
    @php
    $sc=['Aktif'=>'bg-green-100 text-green-700','Expired'=>'bg-red-100 text-red-600','Trial'=>'bg-amber-100 text-amber-700'];
    $pc=['Starter'=>'bg-gray-100 text-gray-600','Pro'=>'bg-blue-100 text-blue-700','Enterprise'=>'bg-purple-100 text-purple-700'];
    $dayColor=$s['daysLeft']<=7?'text-red-500':($s['daysLeft']<=30?'text-amber-500':'text-gray-800');
    @endphp
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-5 py-3 font-semibold text-gray-800">{{ $s['tenant'] }}</td>
        <td class="px-5 py-3 text-gray-500 text-sm">{{ $s['owner'] }}</td>
        <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $pc[$s['plan']] }}">{{ $s['plan'] }}</span></td>
        <td class="px-5 py-3 text-xs text-gray-400">{{ $s['start'] }}</td>
        <td class="px-5 py-3 text-xs text-gray-400">{{ $s['end'] }}</td>
        <td class="px-5 py-3 font-semibold text-gray-800">{{ $s['amount'] }}</td>
        <td class="px-5 py-3 font-bold {{ $dayColor }}">{{ $s['daysLeft'] > 0 ? $s['daysLeft'].' hari' : '-' }}</td>
        <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $sc[$s['status']] }}">{{ $s['status'] }}</span></td>
        <td class="px-5 py-3">
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1 text-xs font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">Perpanjang</button>
                @if($s['status']==='Trial')
                <button class="px-2.5 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">Upgrade</button>
                @endif
            </div>
        </td>
    </tr>
    @endforeach
</x-table>
@endsection
