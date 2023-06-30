@php
$class = isset($bold) ? 'bg-yellow-800 hover:bg-yellow-700 focus:ring-yellow-200 text-white' : 'bg-yellow-100 hover:bg-yellow-200 focus:ring-yellow-50 text-yellow-500';

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
        @if ($attributes->has('wire:click') || $type === 'submit' || $attributes->has('wire:click.stop') || (isset($loading) && $loading))
            <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="{!! $attributes->get('wire:click') ?? ($attributes->get('wire:click.stop') ?? ($type === 'submit' ? 'save' : '')) !!}">
                <x-ui.loading-indicator :loading="true" />
            </div>
        @endif
        {{ $slot ?? '' }}
    </button>
@endif
