@extends('layouts.app')
@section('title','Tenant')
@section('header','Manajemen Tenant')
@section('subheader','Kelola semua toko yang terdaftar di platform MahoraPOS.')
@section('actions')
    <button x-data @click="$dispatch('open-modal',{name:'addTenant'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Tenant
    </button>
@endsection
@section('content')
@php
$tenants=[
    ['id'=>'T-001','name'=>'Toko Mahora Jaya','owner'=>'Budi Santoso','email'=>'budi@mahora.id','plan'=>'Pro','users'=>4,'products'=>124,'status'=>'Aktif','joined'=>'1 Jan 2025','lastActive'=>'Hari ini'],
    ['id'=>'T-002','name'=>'Warung Pak Joko','owner'=>'Joko Widodo','email'=>'joko@warung.id','plan'=>'Starter','users'=>2,'products'=>45,'status'=>'Aktif','joined'=>'15 Feb 2025','lastActive'=>'Kemarin'],
    ['id'=>'T-003','name'=>'Minimarket Sari','owner'=>'Sari Dewi','email'=>'sari@minimarket.id','plan'=>'Pro','users'=>6,'products'=>312,'status'=>'Aktif','joined'=>'3 Mar 2025','lastActive'=>'2 hari lalu'],
    ['id'=>'T-004','name'=>'Toko Berkah','owner'=>'Ahmad Fauzi','email'=>'ahmad@berkah.id','plan'=>'Starter','users'=>1,'products'=>28,'status'=>'Nonaktif','joined'=>'20 Mar 2025','lastActive'=>'1 minggu lalu'],
    ['id'=>'T-005','name'=>'Kios Maju','owner'=>'Rina Wati','email'=>'rina@kios.id','plan'=>'Enterprise','users'=>12,'products'=>580,'status'=>'Aktif','joined'=>'5 Apr 2025','lastActive'=>'Hari ini'],
    ['id'=>'T-006','name'=>'Toko Sejahtera','owner'=>'Dodi Prasetyo','email'=>'dodi@sejahtera.id','plan'=>'Starter','users'=>2,'products'=>67,'status'=>'Trial','joined'=>'20 Jul 2025','lastActive'=>'Hari ini'],
];
$stats=[
    ['label'=>'Total Tenant','value'=>count($tenants),'color'=>'blue','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
    ['label'=>'Tenant Aktif','value'=>collect($tenants)->where('status','Aktif')->count(),'color'=>'green','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['label'=>'Trial','value'=>collect($tenants)->where('status','Trial')->count(),'color'=>'amber','icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['label'=>'Nonaktif','value'=>collect($tenants)->where('status','Nonaktif')->count(),'color'=>'rose','icon'=>'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
];
@endphp

<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
    @foreach($stats as $s)
        <x-card :title="$s['label']" :value="(string)$s['value']" :color="$s['color']" :icon="$s['icon']"/>
    @endforeach
</div>

<div class="flex gap-3 mb-4">
    <div class="relative flex-1">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari tenant, owner..." class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
    </div>
    <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option>Semua Status</option>
        <option>Aktif</option>
        <option>Nonaktif</option>
        <option>Trial</option>
    </select>
    <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option>Semua Paket</option>
        <option>Starter</option>
        <option>Pro</option>
        <option>Enterprise</option>
    </select>
</div>

<x-table :headers="['ID','Nama Toko','Owner','Paket','User','Produk','Bergabung','Aktif Terakhir','Status','Aksi']">
    @foreach($tenants as $t)
    @php
    $pc=['Starter'=>'bg-gray-100 text-gray-600','Pro'=>'bg-blue-100 text-blue-700','Enterprise'=>'bg-purple-100 text-purple-700'];
    $sc=['Aktif'=>'bg-green-100 text-green-700','Nonaktif'=>'bg-gray-100 text-gray-500','Trial'=>'bg-amber-100 text-amber-700'];
    @endphp
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-5 py-3 font-mono text-xs text-gray-400">{{ $t['id'] }}</td>
        <td class="px-5 py-3">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-xs font-bold text-white shrink-0">{{ strtoupper(substr($t['name'],0,2)) }}</div>
                <div>
                    <p class="font-semibold text-gray-800 text-sm">{{ $t['name'] }}</p>
                    <p class="text-xs text-gray-400">{{ $t['email'] }}</p>
                </div>
            </div>
        </td>
        <td class="px-5 py-3 text-gray-600 text-sm">{{ $t['owner'] }}</td>
        <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $pc[$t['plan']] }}">{{ $t['plan'] }}</span></td>
        <td class="px-5 py-3 text-center text-gray-600">{{ $t['users'] }}</td>
        <td class="px-5 py-3 text-center text-gray-600">{{ $t['products'] }}</td>
        <td class="px-5 py-3 text-xs text-gray-400">{{ $t['joined'] }}</td>
        <td class="px-5 py-3 text-xs text-gray-400">{{ $t['lastActive'] }}</td>
        <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $sc[$t['status']] }}">{{ $t['status'] }}</span></td>
        <td class="px-5 py-3">
            <div class="flex items-center gap-1">
                <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Detail">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
                <button class="p-1.5 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Suspend">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
</x-table>

@push('modals')
<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='addTenant'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Tambah Tenant</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Toko</label>
                <input type="text" placeholder="Nama toko..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Owner</label>
                    <input type="text" placeholder="Nama lengkap" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email</label>
                    <input type="email" placeholder="email@toko.id" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Paket</label>
                <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Starter</option>
                    <option>Pro</option>
                    <option>Enterprise</option>
                </select>
            </div>
            <div class="flex gap-3 pt-2">
                <button @click="show=false" class="flex-1 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                <button class="flex-1 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Buat Tenant</button>
            </div>
        </div>
    </div>
</div>
@endpush
@endsection
