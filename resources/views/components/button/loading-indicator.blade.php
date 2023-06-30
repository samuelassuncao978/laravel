<div>
@if($attributes->has('wire:loading') || $attributes->has('loading') || $attributes->get('type') === 'submit' || (!$attributes->has('wire:loading') && $attributes->has('wire:click')) )    
    <div class="absolute inset-0 rounded overflow-hidden" {{ $attributes->merge(['wire:loading'=> ($attributes->get('type') === 'submit' || (!$attributes->has('wire:loading') && $attributes->has('wire:click')) ),'wire:target'=>($attributes->get('type') === 'submit' ? 'save' : (!$attributes->has('wire:loading') && $attributes->has('wire:click') ? 'wire-click' : false) ) ]) }} >
        <span class="absolute inset-0 flex items-center bg-black bg-opacity-50 justify-center cursor-wait">    
            <span class="h-5 w-5 inline-block">
                <x-spinner />
            </span>
        </span>
    </div>
@endif

</div>
