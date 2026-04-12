@extends('layouts.app')
@section('title','Profile')
@section('header','Profile Saya')
@section('subheader','Kelola informasi akun dan keamanan Anda.')
@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Kartu Profile --}}
    <div class="xl:col-span-1 space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 flex flex-col items-center text-center">
            <div class="relative mb-4">
                <div class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center text-white text-3xl font-bold">AD</div>
                <button class="absolute bottom-0 right-0 w-8 h-8 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-sm hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </button>
            </div>
            <p class="text-lg font-bold text-gray-900">Admin Toko</p>
            <p class="text-sm text-gray-400 mt-0.5">admin@mahora.id</p>
            <span class="mt-3 px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Admin</span>
            <div class="w-full mt-5 pt-5 border-t border-gray-100 space-y-2.5 text-left">
                @foreach([['Toko','Toko Mahora Jaya'],['Bergabung','1 Januari 2025'],['Login Terakhir','Hari ini, 10:30'],['Status','Aktif']] as [$k,$v])
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-400">{{ $k }}</span>
                    <span class="text-xs font-semibold text-gray-700">{{ $v }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
            <p class="text-sm font-bold text-gray-800 mb-3">Aktivitas Terakhir</p>
            <div class="space-y-3">
                @foreach([['Login dari Chrome · Windows','2 jam lalu','green'],['Ubah pengaturan toko','Kemarin','blue'],['Export laporan PDF','2 hari lalu','purple'],['Tambah produk baru','3 hari lalu','amber']] as [$txt,$time,$c])
                @php $cc=['green'=>'bg-green-500','blue'=>'bg-blue-500','purple'=>'bg-purple-500','amber'=>'bg-amber-500']; @endphp
                <div class="flex items-start gap-3">
                    <div class="mt-1.5 w-2 h-2 rounded-full shrink-0 {{ $cc[$c] }}"></div>
                    <div>
                        <p class="text-xs text-gray-700">{{ $txt }}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">{{ $time }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Form Edit --}}
    <div class="xl:col-span-2 space-y-5">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-5">Informasi Pribadi</p>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Lengkap</label>
                        <input type="text" value="Admin Toko" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Username</label>
                        <input type="text" value="admin_toko" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email</label>
                    <input type="email" value="admin@mahora.id" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">No. Telepon</label>
                    <input type="text" value="0812-3456-7890" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Role</label>
                    <input type="text" value="Admin" disabled class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 text-gray-400 cursor-not-allowed">
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan Perubahan</button>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-5">Ubah Password</p>
            <div class="space-y-4" x-data="{show1:false,show2:false,show3:false}">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password Lama</label>
                    <div class="relative">
                        <input :type="show1?'text':'password'" placeholder="••••••••" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
                        <button type="button" @click="show1=!show1" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password Baru</label>
                        <div class="relative">
                            <input :type="show2?'text':'password'" placeholder="Min. 8 karakter" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
                            <button type="button" @click="show2=!show2" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <input :type="show3?'text':'password'" placeholder="Ulangi password baru" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
                            <button type="button" @click="show3=!show3" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="px-5 py-2.5 bg-gray-800 text-white text-sm font-semibold rounded-lg hover:bg-gray-900 transition-colors">Update Password</button>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-800 mb-1">Sesi Aktif</p>
            <p class="text-xs text-gray-400 mb-4">Perangkat yang sedang login dengan akun ini.</p>
            <div class="space-y-3">
                @foreach([['Chrome · Windows 11','Jakarta, Indonesia','Aktif sekarang','green',true],['Safari · iPhone 14','Jakarta, Indonesia','2 jam lalu','gray',false],['Firefox · MacOS','Bandung, Indonesia','1 hari lalu','gray',false]] as [$dev,$loc,$time,$c,$cur])
                <div class="flex items-center justify-between p-3 rounded-lg {{ $cur?'bg-green-50 border border-green-100':'bg-gray-50' }}">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-800">{{ $dev }}</p>
                            <p class="text-[10px] text-gray-400">{{ $loc }} · {{ $time }}</p>
                        </div>
                    </div>
                    @if($cur)
                        <span class="text-[10px] font-bold text-green-600 bg-green-100 px-2 py-0.5 rounded-full">Ini perangkat Anda</span>
                    @else
                        <button class="text-xs text-red-500 hover:text-red-700 font-medium">Logout</button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
