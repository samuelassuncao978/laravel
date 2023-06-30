@php
$class = isset($bold) ? 'bg-blue-800 hover:bg-blue-700 focus:ring-blue-200 text-white' : 'bg-blue-100 hover:bg-blue-200 focus:ring-blue-50 text-blue-500';

$class .= ' flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden';
$class .= isset($compact) ? ' py-2 px-3' : ' py-3 px-8';
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
