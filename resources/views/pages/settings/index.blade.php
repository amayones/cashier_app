@extends('layouts.app')
@section('title','Pengaturan')
@section('header','Pengaturan')
@section('subheader','Konfigurasi toko dan sistem pembayaran.')
@section('content')
<div x-data="{tab:'toko'}" class="space-y-5">

    {{-- Tab Nav --}}
    <div class="flex gap-1 bg-white border border-gray-100 rounded-xl p-1 shadow-sm w-fit">
        @foreach([['id'=>'toko','label'=>'Toko'],['id'=>'pajak','label'=>'Pajak'],['id'=>'pembayaran','label'=>'Pembayaran'],['id'=>'qris','label'=>'QRIS'],['id'=>'notif','label'=>'Notifikasi']] as $t)
        <button @click="tab='{{ $t['id'] }}'"
                class="px-4 py-2 text-sm font-semibold rounded-lg transition-colors"
                :class="tab==='{{ $t['id'] }}'?'bg-blue-600 text-white':'text-gray-500 hover:text-gray-700 hover:bg-gray-50'">
            {{ $t['label'] }}
        </button>
        @endforeach
    </div>

    {{-- Tab: Toko --}}
    <div x-show="tab==='toko'" x-cloak>
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 space-y-4">
                <p class="text-sm font-bold text-gray-800">Informasi Toko</p>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Toko</label>
                    <input type="text" value="Toko Mahora Jaya" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Alamat</label>
                    <textarea rows="2" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">Jl. Merdeka No. 10, Jakarta Pusat</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">No. Telepon</label>
                        <input type="text" value="021-12345678" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email Toko</label>
                        <input type="email" value="toko@mahora.id" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Mata Uang</label>
                    <select class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option selected>IDR – Rupiah</option>
                        <option>USD – Dollar</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Footer Struk</label>
                    <textarea rows="2" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">Terima kasih telah berbelanja!</textarea>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan Perubahan</button>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                <p class="text-sm font-bold text-gray-800 mb-4">Logo Toko</p>
                <div class="flex flex-col items-center gap-4">
                    <div class="w-24 h-24 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-2xl">M</div>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center w-full hover:border-blue-400 hover:bg-blue-50 transition-colors cursor-pointer">
                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-sm text-gray-400">Upload logo baru</p>
                        <p class="text-xs text-gray-300 mt-1">PNG, JPG max 1MB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tab: Pajak --}}
    <div x-show="tab==='pajak'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 max-w-lg space-y-4">
            <p class="text-sm font-bold text-gray-800">Pengaturan Pajak</p>
            <label class="flex items-center gap-3 cursor-pointer">
                <div x-data="{on:true}" @click="on=!on"
                     class="relative w-10 h-5 rounded-full transition-colors cursor-pointer"
                     :class="on?'bg-blue-600':'bg-gray-200'">
                    <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-5':''"></span>
                </div>
                <span class="text-sm font-semibold text-gray-700">Aktifkan Pajak (PPN)</span>
            </label>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Persentase Pajak</label>
                <div class="relative w-40">
                    <input type="number" value="11" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-8">
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-gray-400">%</span>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Pajak di Struk</label>
                <input type="text" value="PPN 11%" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p class="text-xs text-blue-600">Pajak akan dihitung otomatis di setiap transaksi POS.</p>
            </div>
            <button class="px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
        </div>
    </div>

    {{-- Tab: Pembayaran --}}
    <div x-show="tab==='pembayaran'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 max-w-lg">
            <p class="text-sm font-bold text-gray-800 mb-4">Metode Pembayaran</p>
            <div class="space-y-3">
                @foreach([['label'=>'Tunai','desc'=>'Pembayaran uang tunai','on'=>true],['label'=>'QRIS','desc'=>'Scan QR code','on'=>true],['label'=>'Transfer Bank','desc'=>'Transfer via ATM/mobile banking','on'=>true],['label'=>'Kartu Debit/Kredit','desc'=>'EDC mesin','on'=>false],['label'=>'Dompet Digital','desc'=>'OVO, GoPay, Dana','on'=>false]] as $m)
                <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 bg-gray-50">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $m['label'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $m['desc'] }}</p>
                    </div>
                    <div x-data="{on:{{ $m['on']?'true':'false' }}}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer shrink-0"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-5':''"></span>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="mt-4 px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
        </div>
    </div>

    {{-- Tab: QRIS --}}
    <div x-show="tab==='qris'" x-cloak>
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 space-y-4">
                <p class="text-sm font-bold text-gray-800">Konfigurasi QRIS</p>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Merchant</label>
                    <input type="text" value="TOKO MAHORA JAYA" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Merchant ID</label>
                    <input type="text" value="ID1234567890" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">NMID</label>
                    <input type="text" placeholder="Nomor NMID dari bank" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Upload QR Code Statis</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-5 text-center hover:border-blue-400 hover:bg-blue-50 transition-colors cursor-pointer">
                        <p class="text-sm text-gray-400">Klik untuk upload QR</p>
                        <p class="text-xs text-gray-300 mt-1">PNG, JPG max 2MB</p>
                    </div>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 flex flex-col items-center justify-center gap-4">
                <p class="text-sm font-bold text-gray-800 self-start">Preview QR Code</p>
                <div class="w-48 h-48 bg-gray-100 rounded-2xl flex items-center justify-center">
                    <div class="grid grid-cols-5 gap-1 p-4 opacity-30">
                        @for($i=0;$i<25;$i++)
                        <div class="w-4 h-4 {{ rand(0,1)?'bg-gray-800':'bg-white' }} rounded-sm"></div>
                        @endfor
                    </div>
                </div>
                <p class="text-xs text-gray-400 text-center">QR Code akan tampil di layar POS saat checkout</p>
            </div>
        </div>
    </div>

    {{-- Tab: Notifikasi --}}
    <div x-show="tab==='notif'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 max-w-lg">
            <p class="text-sm font-bold text-gray-800 mb-4">Pengaturan Notifikasi</p>
            <div class="space-y-3">
                @foreach([['label'=>'Stok menipis','desc'=>'Notif saat stok di bawah minimum','on'=>true],['label'=>'Transaksi besar','desc'=>'Notif transaksi di atas Rp 500.000','on'=>true],['label'=>'Shift belum ditutup','desc'=>'Pengingat tutup shift','on'=>true],['label'=>'Laporan harian','desc'=>'Kirim ringkasan via email','on'=>false]] as $n)
                <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 bg-gray-50">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $n['label'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $n['desc'] }}</p>
                    </div>
                    <div x-data="{on:{{ $n['on']?'true':'false' }}}" @click="on=!on"
                         class="relative w-10 h-5 rounded-full transition-colors cursor-pointer shrink-0"
                         :class="on?'bg-blue-600':'bg-gray-200'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-5':''"></span>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="mt-4 px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
        </div>
    </div>

</div>
@endsection
