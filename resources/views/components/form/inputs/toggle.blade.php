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

    <span data-input="toggle" class="flex justify-start items-center relative">
        @if(isSet($prepend)) {{ $prepend }} @endif
        <div class="relative flex-shrink-0 rounded-full w-7 h-4 transition duration-200 ease-linear">
            <input type="checkbox" class="opacity-0 absolute inset-0 w-full h-full z-40" id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}" {{ $attributes->except(['name','color','class','wire:loading','wire:target','loading','prepend','append']) }}>
            <span class="checked opacity-0 {{ isSet($color) ? $color : 'bg-green-400' }} absolute z-10 left-0 w-full h-full rounded-full transition duration-100 ease-linear"></span>
            <span class="bg-gray-400 absolute left-0 w-full h-full rounded-full"></span>
            <span class="checked-peg absolute z-20 left-0 bg-white w-3 h-3 m-0.5 rounded-full transition transform duration-100 ease-linear cursor-pointer translate-x-0"></span>
        </div>
        <div class="select-none flex flex-col pl-2">
            <x-form.label {{ $attributes }} />
        </div>
        @if(isSet($append)) {{ $append }} @endif
    </span>


    <x-form.inline-errors {{ $attributes }} />
    
</span>
