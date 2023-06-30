<button
    class="relative focus:outline-none px-2 {{ $active ?? false ? 'text-blue-500 cursor-default' : 'hover:text-gray-800 cursor-pointer' }}"
    {{ $attributes->whereStartsWith('wire') }}>
    {{ $slot ?? '' }}
    @if ($attributes->has('wire:click'))
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
            wire:target="{{ $attributes->get('wire:click') }}">
            <x-ui.loading-indicator small :loading="true" spinner="border-gray-500" bg="bg-gray-100 bg-opacity-80" />
        </div>
    @endif
</button>
