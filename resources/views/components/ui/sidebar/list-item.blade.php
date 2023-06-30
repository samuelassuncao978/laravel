<div class="flex py-1">


    <div class="flex relative select-none focus:outline-none cursor-pointer flex-grow px-4 py-2  rounded {{ $active ? 'text-white bg-blue-500' : 'text-gray-600 hover:bg-gray-200 hover:text-blue-500' }}"
        {{ $attributes->whereStartsWith('wire') }}>
        @if (isset($icon))
            <div class="w-5 h-5 mr-3 flex items-center justify-center flex-shrink-0" wire:loading.class="opacity-0"
                wire:target="{!! $attributes->get('wire:click') !!}">
                @if (is_string($icon))
                    <x-icon.outline :icon="$icon" />
                @else
                    {{ $icon }}
                @endif
            </div>
        @endif
        <div class="flex flex-col flex-grow items-start text-left text-xs">
            <span class="font-bold leading-5">{{ $label ?? '' }}</span>
            @if (isset($description))
                <span
                    class="{{ $active ? 'text-white text-opacity-80' : 'text-gray-400 text-opacity-80 group-hover:text-blue-500' }}">{{ $description }}</span>
            @endif
        </div>
        @if (isset($actions))



            <div x-data="{ open: false }" class="flex-shrink-0 relative ml-2" x-on:click="$event.stopPropagation()">
                <button type="button" @click="open = !open" :class="{ 'ring-2 ring-blue-500': open }"
                    class="focus:outline-none h-5 w-5 p-1 rounded-full {{ $active ? 'text-white text-opacity-80 hover:bg-blue-400 ' : 'text-gray-400 text-opacity-80 hover:bg-gray-300' }} flex items-center justify-center">
                    <x-icon.solid icon="dots-vertical" />
                </button>
                <div @click.away="open = false" x-cloak x-show="open"
                    class="z-5 absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30">
                    {{ $actions }}
                </div>
            </div>
        @endif
        @if ($attributes->has('count'))
            <div
                class="flex-shrink-0 leading-5 text-xs ml-2 {{ $active ? 'text-white text-opacity-80' : 'text-gray-400 text-opacity-80 group-hover:text-blue-500' }}">
                {{ $count }}
            </div>
        @endif

        @if ($attributes->has('wire:click'))
            <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="{!! $attributes->get('wire:click') !!}">
                <x-ui.loading-indicator :loading="true" left
                    spinner="{{ $active ? 'border-white' : 'border-gray-500' }}"
                    bg="bg-gray-300 bg-opacity-25 pl-2" />
            </div>
        @endif

    </div>
</div>
