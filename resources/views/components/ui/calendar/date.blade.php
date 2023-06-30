@php
$selectable = $attributes->has('wire:click') && !empty($attributes->get('wire:click')) ? 'hover:bg-blue-100 hover:text-blue-500 rounded-full' : 'group-hover:bg-blue-100 group-hover:text-blue-500';
@endphp
<div class="bg-gray-50 flex items-center cursor-pointer justify-center relative overflow-hidden"
    {{ $attributes->whereStartsWith('wire:') }}>
    <div
        class="relative w-full flex items-center justify-center h-2/3 {{ (isset($selected) ? $selected : false) ? 'bg-blue-100 text-blue-500' : $selectable }} {{ $attributes->get('class') }}">
        {{ $date->day }}
        @if ($events > 0)
            <div class="absolute -bottom-0.5 h-1 w-1 rounded-full bg-blue-500"></div>
        @endif

    </div>
    @if ($attributes->has('wire:click') && !empty($attributes->get('wire:click')))
        <div wire:loading wire:target="{{ $attributes->get('wire:click') }}"
            class="top-1/2 transform -translate-y-1/2 overflow-hidden absolute opacity-30 h-2/3 w-full rounded-full bg-black bg-opacity-60 z-10">
            <x-ui.loading-indicator :loading="true" />
        </div>
    @endif
</div>
