@props(['name','title'=>'','size'=>'md'])
@php $sizes=['sm'=>'max-w-sm','md'=>'max-w-md','lg'=>'max-w-lg','xl'=>'max-w-xl']; @endphp
<div x-show="{{ $name }}" x-cloak @keydown.escape.window="{{ $name }}=false"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div x-show="{{ $name }}"
         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         @click="{{ $name }}=false" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div x-show="{{ $name }}"
         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="relative bg-white rounded-2xl shadow-2xl w-full {{ $sizes[$size]??$sizes['md'] }} z-10">
        @if($title)
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <p class="text-base font-bold text-gray-900">{{ $title }}</p>
            <button @click="{{ $name }}=false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif
        {{ $slot }}
    </div>
</div>
