<div class="pl-4 flex items-center">
    @if ($attributes->has('label'))
        <span class="font-semibold mr-2">{{ $attributes->get('label') }}</span>
    @endif
    <div class="relative">
        <input wire:model="search" type="text"
            class="
        
        rounded-full px-4 py-1 text-gray-500 flex space-x-2 bg-gray-200 bg-opacity-50
        text-xs
        pl-8 bg-transparent
        appearance-none outline-none focus:ring-2  focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 w-full focus:bg-white border border-gray-100
        "
            placeholder="Find" />


        <span wire:loading.remove wire:target="search"
            class="h-4 w-4 flex-shrink-0 flex absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2">
            <x-icon.solid icon="search" />
        </span>

        <div class="absolute left-2 bottom-1/2 transform translate-y-1/2 translate-x-1" wire:loading
            wire:target="search">
            <div style="border-top-color:transparent"
                class="border-solid animate-spin  rounded-full border-gray-400 border h-3 w-3"></div>
        </div>
    </div>
</div>
