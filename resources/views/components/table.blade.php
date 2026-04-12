@props(['headers'=>[]])
<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    @isset($caption)
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">{{ $caption }}</div>
    @endisset
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    @foreach($headers as $h)
                        <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide whitespace-nowrap">{{ $h }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-gray-700">{{ $slot }}</tbody>
        </table>
    </div>
    @isset($foot)
        <div class="px-5 py-3 border-t border-gray-100 bg-gray-50">{{ $foot }}</div>
    @endisset
</div>
