<button {{ $attributes->whereStartsWith('wire') }}
    class=" relative overflow-hidden p-3 w-full flex flex-col rounded-md  shadow  border focus:outline-none border-white {{ isset($active) && $active ? 'ring-2 ring-blue-500 focus:outline-none bg-white' : 'hover:border-gray-300 bg-gray-50 focus:bg-gray-50 focus:shadow-inner' }}">
    {{ $slot ?? '' }}
    @if ($attributes->has('wire:click'))
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
            wire:target="{{ $attributes->get('wire:click') }}">
            <x-ui.loading-indicator :loading="true" spinner="border-gray-500" bg="bg-gray-300 bg-opacity-25" />
        </div>
    @endif
</button>
