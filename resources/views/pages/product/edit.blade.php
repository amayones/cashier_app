@extends('layouts.app')
@section('title','Edit Produk')
@section('header','Edit Produk')
@section('subheader','Ubah detail produk yang sudah ada.')
@section('actions')
    <a href="/product" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
        ← Kembali
    </a>
@endsection
@section('content')
@php
$product=['id'=>$id??1,'name'=>'Indomie Goreng','sku'=>'SKU-001','barcode'=>'8991234567890','category'=>'Makanan','price'=>3500,'modal'=>2500,'stock'=>142,'min_stock'=>20,'unit'=>'pcs','supplier'=>'PT Indofood','status'=>true,'pos'=>true,'desc'=>'Mie instan goreng rasa ayam bawang.'];
@endphp
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <div class="xl:col-span-2 space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Informasi Produk</p>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" value="{{ $product['name'] }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">SKU</label>
                        <input type="text" value="{{ $product['sku'] }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Barcode</label>
                        <input type="text" value="{{ $product['barcode'] }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kategori</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        @foreach(['Makanan','Minuman','Snack','Kebersihan','Lainnya'] as $cat)
                        <option {{ $cat===$product['category']?'selected':'' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Deskripsi</label>
                    <textarea rows="3" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ $product['desc'] }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Harga & Stok</p>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Harga Jual <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400 font-medium">Rp</span>
                        <input type="number" value="{{ $product['price'] }}" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Harga Modal</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400 font-medium">Rp</span>
                        <input type="number" value="{{ $product['modal'] }}" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Stok Saat Ini</label>
                    <input type="number" value="{{ $product['stock'] }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Stok Minimum</label>
                    <input type="number" value="{{ $product['min_stock'] }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Satuan</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        @foreach(['pcs','kg','liter','dus','pack'] as $u)
                        <option {{ $u===$product['unit']?'selected':'' }}>{{ $u }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Supplier</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        @foreach(['PT Indofood','CV Maju Jaya','UD Berkah'] as $s)
                        <option {{ $s===$product['supplier']?'selected':'' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Foto Produk</p>
            <div x-data="{preview:null}" class="space-y-3">
                <label class="block cursor-pointer">
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50 transition-colors" x-show="!preview">
                        <div class="text-4xl mb-2">🍜</div>
                        <p class="text-sm text-gray-400">Klik untuk ganti foto</p>
                        <p class="text-xs text-gray-300 mt-1">PNG, JPG max 2MB</p>
                    </div>
                    <img x-show="preview" :src="preview" x-cloak class="w-full h-48 object-cover rounded-xl">
                    <input type="file" accept="image/*" class="hidden" @change="preview=URL.createObjectURL($event.target.files[0])">
                </label>
                <button x-show="preview" x-cloak @click="preview=null" class="w-full text-xs text-red-500 hover:text-red-700 py-1">Hapus foto</button>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Status Produk</p>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div x-data="{on:{{ $product['status']?'true':'false' }}}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-5':''"></span>
                    </div>
                    <span class="text-sm text-gray-700">Produk Aktif</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <div x-data="{on:{{ $product['pos']?'true':'false' }}}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-5':''"></span>
                    </div>
                    <span class="text-sm text-gray-700">Tampil di POS</span>
                </label>
            </div>
        </div>

        <div class="bg-amber-50 border border-amber-100 rounded-xl p-4">
            <p class="text-xs font-semibold text-amber-700 mb-1">Info Produk</p>
            <p class="text-xs text-amber-600">ID: #{{ $product['id'] }} · Dibuat 1 Jan 2025 · Diupdate hari ini</p>
        </div>

        <div class="flex flex-col gap-2">
            <button class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan Perubahan</button>
            <a href="/product" class="w-full py-2.5 text-center text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Batal</a>
            <button class="w-full py-2.5 text-sm font-semibold text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors">Hapus Produk</button>
        </div>
    </div>
</div>
@endsection
