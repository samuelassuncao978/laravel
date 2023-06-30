@if($attributes->has('wire:loading') || $attributes->has('loading') || $attributes->get('type') === 'search' )  
    @if($attributes->get('type') === 'search')
        <span class="h-5 w-4 flex items-center justify-center ml-3">
            <span class="h-4 w-4 inline-block text-blue-500 cursor-wait" {{ $attributes->only(['wire:loading','wire:target'])->merge(['wire:loading'=> (!$attributes->has('loading')),'wire:target'=>'search']) }}>
                <x-spinner />
            </span>
            <span class="h-4 w-4 text-gray-500" {{ $attributes->only(['wire:loading','wire:target'])->merge(['wire:loading.remove'=> (!$attributes->has('loading')),'wire:target'=>'search']) }}>
            <span>
                <x-icon.outline icon="search" /></span>
            </span>
        </span>
    @else    
        <span class="h-4 w-4 ml-3 inline-block text-blue-500 cursor-wait" {{ $attributes->only(['wire:loading','wire:target'])->merge(['wire:loading'=> (!$attributes->has('loading')),'wire:target'=>'save']) }}>
            <x-spinner />
        </span>
    @endif
@endif