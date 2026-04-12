@extends('layouts.app')
@section('title','Supplier')
@section('header','Supplier')
@section('subheader','Kelola data supplier dan pemasok produk.')
@section('actions')
    <button x-data @click="$dispatch('open-modal',{name:'addSupplier'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Supplier
    </button>
@endsection
@section('content')
@php
$suppliers=[
    ['id'=>1,'name'=>'PT Indofood Sukses Makmur','contact'=>'Pak Hendra','phone'=>'021-5551234','email'=>'hendra@indofood.co.id','address'=>'Jakarta Barat','products'=>12,'lastOrder'=>'20 Jul 2025','status'=>'Aktif'],
    ['id'=>2,'name'=>'CV Maju Jaya Distribusi','contact'=>'Bu Rina','phone'=>'0812-3456789','email'=>'rina@majujaya.com','address'=>'Tangerang','products'=>8,'lastOrder'=>'18 Jul 2025','status'=>'Aktif'],
    ['id'=>3,'name'=>'UD Berkah Sejahtera','contact'=>'Pak Dodi','phone'=>'0856-7890123','email'=>'dodi@berkah.id','address'=>'Bekasi','products'=>5,'lastOrder'=>'15 Jul 2025','status'=>'Aktif'],
    ['id'=>4,'name'=>'PT Aqua Golden Mississippi','contact'=>'Bu Sinta','phone'=>'021-7778888','email'=>'sinta@aqua.co.id','address'=>'Bogor','products'=>3,'lastOrder'=>'10 Jul 2025','status'=>'Aktif'],
    ['id'=>5,'name'=>'CV Snack Nusantara','contact'=>'Pak Bowo','phone'=>'0878-1234567','email'=>'bowo@snacknusa.com','address'=>'Surabaya','products'=>15,'lastOrder'=>'1 Jul 2025','status'=>'Nonaktif'],
];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-5">
    <x-card title="Total Supplier" value="{{ count($suppliers) }}" color="blue" icon="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
    <x-card title="Supplier Aktif" value="{{ collect($suppliers)->where('status','Aktif')->count() }}" color="green" icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    <x-card title="Total Produk Dipasok" value="{{ collect($suppliers)->sum('products') }}" color="purple" icon="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
</div>

<div class="flex gap-3 mb-4">
    <div class="relative flex-1">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari supplier..." class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
    </div>
    <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option>Semua Status</option>
        <option>Aktif</option>
        <option>Nonaktif</option>
    </select>
</div>

<x-table :headers="['Supplier','Kontak','Telepon','Email','Kota','Produk','Order Terakhir','Status','Aksi']">
    @foreach($suppliers as $s)
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-5 py-3">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm shrink-0">{{ strtoupper(substr($s['name'],0,2)) }}</div>
                <span class="font-semibold text-gray-800 text-sm">{{ $s['name'] }}</span>
            </div>
        </td>
        <td class="px-5 py-3 text-gray-600 text-sm">{{ $s['contact'] }}</td>
        <td class="px-5 py-3 text-gray-500 text-xs">{{ $s['phone'] }}</td>
        <td class="px-5 py-3 text-gray-500 text-xs">{{ $s['email'] }}</td>
        <td class="px-5 py-3 text-gray-500 text-sm">{{ $s['address'] }}</td>
        <td class="px-5 py-3 text-center font-semibold text-gray-800">{{ $s['products'] }}</td>
        <td class="px-5 py-3 text-xs text-gray-400">{{ $s['lastOrder'] }}</td>
        <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $s['status']==='Aktif'?'bg-green-100 text-green-700':'bg-gray-100 text-gray-500' }}">{{ $s['status'] }}</span></td>
        <td class="px-5 py-3">
            <div class="flex items-center gap-1">
                <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </button>
                <button class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
</x-table>

@push('modals')
<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='addSupplier'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Tambah Supplier</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Perusahaan</label>
                <input type="text" placeholder="PT / CV / UD ..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Kontak</label>
                    <input type="text" placeholder="Nama PIC" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">No. Telepon</label>
                    <input type="text" placeholder="08xx-xxxx-xxxx" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email</label>
                <input type="email" placeholder="email@supplier.com" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Alamat</label>
                <textarea rows="2" placeholder="Alamat lengkap..." class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
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
