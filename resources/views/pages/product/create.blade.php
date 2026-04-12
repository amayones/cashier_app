@extends('layouts.app')
@section('title','Tambah Produk')
@section('header','Tambah Produk')
@section('subheader','Isi detail produk baru.')
@section('actions')
    <a href="/product" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
        ← Kembali
    </a>
@endsection
@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Form Utama --}}
    <div class="xl:col-span-2 space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Informasi Produk</p>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Contoh: Indomie Goreng" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">SKU</label>
                        <input type="text" placeholder="SKU-001" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Barcode</label>
                        <input type="text" placeholder="8991234567890" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kategori</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="">Pilih kategori...</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                        <option>Snack</option>
                        <option>Kebersihan</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Deskripsi</label>
                    <textarea rows="3" placeholder="Deskripsi singkat produk..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
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
                        <input type="number" placeholder="0" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Harga Modal</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400 font-medium">Rp</span>
                        <input type="number" placeholder="0" class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Stok Awal</label>
                    <input type="number" placeholder="0" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Stok Minimum</label>
                    <input type="number" placeholder="5" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Satuan</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option>pcs</option>
                        <option>kg</option>
                        <option>liter</option>
                        <option>dus</option>
                        <option>pack</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Supplier</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="">Pilih supplier...</option>
                        <option>PT Indofood</option>
                        <option>CV Maju Jaya</option>
                        <option>UD Berkah</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar: Gambar & Status --}}
    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Foto Produk</p>
            <div x-data="{preview:null}" class="space-y-3">
                <label class="block cursor-pointer">
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50 transition-colors"
                         x-show="!preview">
                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-sm text-gray-400">Klik untuk upload foto</p>
                        <p class="text-xs text-gray-300 mt-1">PNG, JPG max 2MB</p>
                    </div>
                    <img x-show="preview" :src="preview" x-cloak class="w-full h-48 object-cover rounded-xl">
                    <input type="file" accept="image/*" class="hidden"
                           @change="preview=URL.createObjectURL($event.target.files[0])">
                </label>
                <button x-show="preview" x-cloak @click="preview=null"
                        class="w-full text-xs text-red-500 hover:text-red-700 py-1">Hapus foto</button>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-4">Status Produk</p>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div x-data="{on:true}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform"
                              :class="on?'translate-x-5':''"></span>
                    </div>
                    <span class="text-sm text-gray-700">Produk Aktif</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <div x-data="{on:false}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform"
                              :class="on?'translate-x-5':''"></span>
                    </div>
                    <span class="text-sm text-gray-700">Tampil di POS</span>
                </label>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <button class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                Simpan Produk
            </button>
            <a href="/product" class="w-full py-2.5 text-center text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                Batal
            </a>
        </div>
    </div>
</div>
@endsection
