@aware([
    'prepend',
    'append',
    'label',
    'loading'
])

@if($attributes->has('wire:loading') || $attributes->has('loading') || $attributes->get('type') === 'search' )    
    <span class="h-3 w-3 ml-4 inline-block text-blue-500 cursor-wait" {{ $attributes->merge(['wire:loading'=> ($attributes->get('type') === 'submit'),'wire:target'=>'save']) }}>
        <x-spinner />  
    </span>
@endif

<span data-input="checkbox" class="flex flex-col text-gray-600 focus-within:text-blue-500 focus-within:bg-gray-50 -ml-1 -mr-2 rounded p-1 pr-2 hover:text-blue-500 cursor-pointer text-xs group">
    <span class="flex justify-start items-center">
        @if(isSet($prepend)) {{ $prepend }} @endif
        <span class="bg-white border-2 rounded border-gray-400 group-hover:border-blue-500 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:ring-2 focus-within:ring-blue-200 focus-within:border-blue-500">
            <input id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}" {{ $attributes->except(['name','class','wire:loading','wire:target','loading','prepend','append']) }} class="opacity-0 absolute" />
            <span class="checked hidden w-4 h-4 text-blue-500 pointer-events-none p-px">
                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 333 333" fill-rule="evenodd" clip-rule="evenodd">
                    <g>
                        <path class="fil0" d="M129 191c-13,-12 -34,-34 -48,-48 -14,-13 -23,-2 -40,16 -19,19 0,29 27,56l49 49c18,16 33,-8 57,-31l98 -99c31,-30 38,-30 13,-54 -22,-23 -21,-23 -56,13 -16,15 -95,95 -100,98z" />
                    </g>
                </svg>
            </span>
        </span>
        @if(isSet($append)) {{ $append }} @endif
        <x-form.label {{ $attributes }} />
    </span>
    <x-form.inline-errors {{ $attributes }} />
    
</span>
