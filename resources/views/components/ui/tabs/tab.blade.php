<button {{ $attributes->whereStartsWith('wire:click') }}
    class="px-3 relative overflow-hidden focus:outline-none border-b-2 pb-1.5 {{ isset($active) && $active ? 'border-blue-500 text-blue-500' : 'text-gray-600 border-transparent' }}">
    {{ $slot ?? '' }}
    @if ($attributes->has('wire:click') || (isset($loading) && $loading))
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="{!! $attributes->get('wire:click') !!}">
            <x-ui.loading-indicator :loading="true" bg="bg-white opacity-80" spinner="border-gray-500" />
        </div>
    @endif
</button>
