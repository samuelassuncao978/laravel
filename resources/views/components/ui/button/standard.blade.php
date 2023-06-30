@php
$class = isset($bold) ? 'bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white' : 'bg-gray-100 hover:bg-gray-200 focus:ring-gray-50 text-gray-500';

$class .= ' flex justify-center items-center flex-grow uppercase focus:outline-none text-xs focus:ring-4 relative overflow-hidden';
$class .= isset($grouped) ? '' : ' rounded';
$class .= isset($compact) ? ' py-2' : ' py-3';
$class .= isset($grouped) ? ' px-4' : ' px-8';
$class .= isset($flat) ? '' : ' shadow';

@endphp
@if (isset($href))
    <a href="{{ $href }}" class="{{ $class }}">
        <x-ui.loading-indicator :loading="$loading ?? false" />
        {{ $slot ?? '' }}
    </a>
@else
    <button type="{{ $type ?? 'button' }}" {!! isSet($id) ? 'id="'.$id.'"' : "" !!} class="{{ $class }}"
        {{ $attributes->whereStartsWith('wire:click') }}>
        @if(($attributes->has('wire:click') || (($type ?? '') ==='submit') || $attributes->has('wire:click.stop')) ||
        (isSet($loading) && $loading))
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="{!! $attributes->get('wire:click') ?? ($attributes->get('wire:click.stop') ?? ($type === 'submit' ? 'save' : '')) !!}">
            <x-ui.loading-indicator :loading="true" />
        </div>
@endif
{{ $slot ?? '' }}
</button>
@endif
