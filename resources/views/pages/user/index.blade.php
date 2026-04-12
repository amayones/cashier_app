@extends('layouts.app')
@section('title','User & Role')
@section('header','User & Role')
@section('subheader','Kelola pengguna dan hak akses sistem.')
@section('actions')
    <button x-data @click="$dispatch('open-modal',{name:'addUser'})"
            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah User
    </button>
@endsection
@section('content')
@php
$users=[
    ['name'=>'Admin Toko','email'=>'admin@mahora.id','role'=>'admin','status'=>'Aktif','last'=>'Hari ini, 10:30','avatar'=>'AD'],
    ['name'=>'Budi Santoso','email'=>'budi@mahora.id','role'=>'kasir','status'=>'Aktif','last'=>'Hari ini, 09:15','avatar'=>'BS'],
    ['name'=>'Sari Dewi','email'=>'sari@mahora.id','role'=>'kasir','status'=>'Aktif','last'=>'Kemarin, 18:00','avatar'=>'SD'],
    ['name'=>'Rudi Hartono','email'=>'rudi@mahora.id','role'=>'inventory','status'=>'Aktif','last'=>'3 hari lalu','avatar'=>'RH'],
    ['name'=>'Owner Toko','email'=>'owner@mahora.id','role'=>'owner','status'=>'Aktif','last'=>'1 minggu lalu','avatar'=>'OT'],
    ['name'=>'Kasir Lama','email'=>'lama@mahora.id','role'=>'kasir','status'=>'Nonaktif','last'=>'1 bulan lalu','avatar'=>'KL'],
];
$roles=[
    ['name'=>'owner','label'=>'Owner','color'=>'bg-purple-100 text-purple-700','desc'=>'Akses penuh + laporan keuangan'],
    ['name'=>'admin','label'=>'Admin','color'=>'bg-blue-100 text-blue-700','desc'=>'Kelola produk, stok, user'],
    ['name'=>'kasir','label'=>'Kasir','color'=>'bg-green-100 text-green-700','desc'=>'POS & shift saja'],
    ['name'=>'inventory','label'=>'Inventory','color'=>'bg-amber-100 text-amber-700','desc'=>'Produk & stok saja'],
    ['name'=>'sysadmin','label'=>'Sysadmin','color'=>'bg-red-100 text-red-700','desc'=>'Akses SaaS & tenant'],
];
$permissions=[
    ['module'=>'Dashboard','owner'=>true,'admin'=>true,'kasir'=>true,'inventory'=>true],
    ['module'=>'POS','owner'=>false,'admin'=>true,'kasir'=>true,'inventory'=>false],
    ['module'=>'Produk','owner'=>false,'admin'=>true,'kasir'=>false,'inventory'=>true],
    ['module'=>'Inventori','owner'=>false,'admin'=>true,'kasir'=>false,'inventory'=>true],
    ['module'=>'Laporan','owner'=>true,'admin'=>true,'kasir'=>false,'inventory'=>false],
    ['module'=>'User & Role','owner'=>false,'admin'=>true,'kasir'=>false,'inventory'=>false],
    ['module'=>'Pengaturan','owner'=>false,'admin'=>true,'kasir'=>false,'inventory'=>false],
    ['module'=>'Shift','owner'=>false,'admin'=>true,'kasir'=>true,'inventory'=>false],
    ['module'=>'Supplier','owner'=>false,'admin'=>true,'kasir'=>false,'inventory'=>true],
];
@endphp

<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
    {{-- Tabel User --}}
    <div class="xl:col-span-2">
        <x-table :headers="['User','Email','Role','Status','Login Terakhir','Aksi']">
            <x-slot name="caption">
                <p class="text-sm font-bold text-gray-800">Daftar User</p>
                <span class="text-xs text-gray-400">{{ count($users) }} user</span>
            </x-slot>
            @foreach($users as $u)
            @php $rc=['owner'=>'bg-purple-100 text-purple-700','admin'=>'bg-blue-100 text-blue-700','kasir'=>'bg-green-100 text-green-700','inventory'=>'bg-amber-100 text-amber-700','sysadmin'=>'bg-red-100 text-red-700']; @endphp
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white shrink-0">{{ $u['avatar'] }}</div>
                        <span class="font-semibold text-gray-800">{{ $u['name'] }}</span>
                    </div>
                </td>
                <td class="px-5 py-3 text-gray-500 text-xs">{{ $u['email'] }}</td>
                <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $rc[$u['role']] }}">{{ ucfirst($u['role']) }}</span></td>
                <td class="px-5 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $u['status']==='Aktif'?'bg-green-100 text-green-700':'bg-gray-100 text-gray-500' }}">{{ $u['status'] }}</span></td>
                <td class="px-5 py-3 text-xs text-gray-400">{{ $u['last'] }}</td>
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
    </div>

    {{-- Role Cards --}}
    <div class="space-y-3">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
            <p class="text-sm font-bold text-gray-800 mb-3">Daftar Role</p>
            <div class="space-y-2">
                @foreach($roles as $r)
                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $r['color'] }}">{{ $r['label'] }}</span>
                        <p class="text-xs text-gray-400 mt-1">{{ $r['desc'] }}</p>
                    </div>
                    <span class="text-xs text-gray-400">{{ collect($users)->where('role',$r['name'])->count() }} user</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Permission Matrix --}}
<div class="mt-5 bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-100">
        <p class="text-sm font-bold text-gray-800">Matrix Permission</p>
        <p class="text-xs text-gray-400 mt-0.5">Hak akses per modul per role</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Modul</th>
                    @foreach(['Owner','Admin','Kasir','Inventory'] as $r)
                    <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">{{ $r }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($permissions as $p)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-3 font-medium text-gray-700">{{ $p['module'] }}</td>
                    @foreach(['owner','admin','kasir','inventory'] as $role)
                    <td class="px-5 py-3 text-center">
                        @if($p[$role])
                            <svg class="w-4 h-4 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        @else
                            <svg class="w-4 h-4 text-gray-200 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah User --}}
@push('modals')
<div x-data="{show:false}" @open-modal.window="show=$event.detail.name==='addUser'" x-show="show" x-cloak
     @keydown.escape.window="show=false" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div @click="show=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">Tambah User</p>
            <button @click="show=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Lengkap</label>
                <input type="text" placeholder="Nama user" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email</label>
                <input type="email" placeholder="email@mahora.id" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Role</label>
                <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Pilih role...</option>
                    <option>admin</option>
                    <option>kasir</option>
                    <option>inventory</option>
                    <option>owner</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password</label>
                <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
