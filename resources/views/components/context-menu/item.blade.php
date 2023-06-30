<button {{ $attributes->whereStartsWith('wire:click') }}
    class="group flex w-full focus:outline-none relative overflow-hidden items-center px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
    
    
    
    
    @if (isset($icon) && $icon)
        <span class="block h-4 w-4 mr-2 text-sm text-blue-500 group-hover:text-white" wire:loading.class="opacity-0" wire:target="{!! $attributes->get('wire:click') !!}">
            {{ $icon }}
        </span>
    @endif


    {{ $label ?? $slot ?? ''}}


    @if ($attributes->has('wire:click') || (isset($loading) && $loading))
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="{!! $attributes->get('wire:click') !!}">
            <x-spinner :loading="true" left spinner="ml-3" />
        </div>
    @endif
</button>
