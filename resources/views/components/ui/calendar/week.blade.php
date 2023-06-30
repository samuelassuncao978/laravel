<div class="group relative">
    @if ($attributes->has('wire:click') && !empty($attributes->get('wire:click')))
        <div wire:loading wire:target="{{ $attributes->get('wire:click') }}"
            class="top-1/2 transform -translate-y-1/2 overflow-hidden absolute opacity-30 h-2/3 w-full rounded-full bg-black bg-opacity-60 z-10">
            <x-ui.loading-indicator :loading="true" />
        </div>
    @endif
    <div class="h-full w-full grid grid-cols-7 grid-rows-1 group relative" {{ $attributes->whereStartsWith('wire:') }}>
        {{ $slot ?? '' }}
    </div>
</div>
