@extends('layouts.app')
@section('title','Produk')
@section('header','Produk')
@section('subheader','Kelola semua produk toko Anda.')
@section('actions')
    <a href="/product/create" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Produk
    </a>
@endsection
@section('content')
@php
$products=[
    ['id'=>1,'name'=>'Indomie Goreng','sku'=>'SKU-001','category'=>'Makanan','price'=>'Rp 3.500','stock'=>142,'status'=>'Aktif','img'=>null],
    ['id'=>2,'name'=>'Aqua 600ml','sku'=>'SKU-002','category'=>'Minuman','price'=>'Rp 4.000','stock'=>88,'status'=>'Aktif','img'=>null],
    ['id'=>3,'name'=>'Teh Botol Sosro','sku'=>'SKU-003','category'=>'Minuman','price'=>'Rp 5.000','stock'=>5,'status'=>'Aktif','img'=>null],
    ['id'=>4,'name'=>'Chitato Original','sku'=>'SKU-004','category'=>'Snack','price'=>'Rp 9.500','stock'=>0,'status'=>'Nonaktif','img'=>null],
    ['id'=>5,'name'=>'Pocari Sweat 350ml','sku'=>'SKU-005','category'=>'Minuman','price'=>'Rp 8.000','stock'=>34,'status'=>'Aktif','img'=>null],
    ['id'=>6,'name'=>'Mie Sedaap Soto','sku'=>'SKU-006','category'=>'Makanan','price'=>'Rp 3.200','stock'=>60,'status'=>'Aktif','img'=>null],
];
@endphp

{{-- Filter & Search --}}
<div class="flex flex-col sm:flex-row gap-3 mb-4">
    <div class="relative flex-1">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari produk, SKU..." class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
    </div>
    <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option>Semua Kategori</option>
        <option>Makanan</option>
        <option>Minuman</option>
        <option>Snack</option>
    </select>
    <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option>Semua Status</option>
        <option>Aktif</option>
        <option>Nonaktif</option>
    </select>
</div>

<x-table :headers="['','Nama Produk','SKU','Kategori','Harga','Stok','Status','Aksi']">
    <x-slot name="caption">
        <p class="text-sm font-bold text-gray-800">Daftar Produk</p>
        <span class="text-xs text-gray-400">{{ count($products) }} produk</span>
    </x-slot>
    @foreach($products as $p)
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-5 py-3">
            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-lg">🛍️</div>
        </td>
        <td class="px-5 py-3 font-semibold text-gray-800">{{ $p['name'] }}</td>
        <td class="px-5 py-3 text-gray-400 font-mono text-xs">{{ $p['sku'] }}</td>
        <td class="px-5 py-3"><span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">{{ $p['category'] }}</span></td>
        <td class="px-5 py-3 font-semibold text-gray-800">{{ $p['price'] }}</td>
        <td class="px-5 py-3">
            <span class="font-semibold {{ $p['stock']<=5?'text-red-500':($p['stock']<=20?'text-amber-500':'text-gray-800') }}">{{ $p['stock'] }}</span>
        </td>
        <td class="px-5 py-3">
            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $p['status']==='Aktif'?'bg-green-100 text-green-700':'bg-gray-100 text-gray-500' }}">{{ $p['status'] }}</span>
        </td>
        <td class="px-5 py-3">
            <div class="flex items-center gap-2">
                <a href="/product/{{ $p['id'] }}/edit" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
                <button class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
    <x-slot name="foot">
        <div class="flex items-center justify-between text-xs text-gray-400">
            <span>Menampilkan 1–{{ count($products) }} dari {{ count($products) }} produk</span>
            <div class="flex gap-1">
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100 disabled:opacity-40">‹ Prev</button>
                <button class="px-3 py-1.5 rounded-lg bg-blue-600 text-white font-semibold">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100">Next ›</button>
            </div>
        </div>
    </x-slot>
</x-table>
@endsection
