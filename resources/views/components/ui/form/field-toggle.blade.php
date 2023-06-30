<label data-input="toggle" class="flex justify-start items-center text-gray-600 text-xs">
   <div class="relative flex-shrink-0 rounded-full w-7 h-4 transition duration-200 ease-linear ">
        <input type="checkbox" class="opacity-0 absolute" {{ $attributes->except('class','label','description','color') }}>
        <span class="checked opacity-0 {{ isSet($color) ? $color : 'bg-green-400' }} absolute z-10 left-0 w-full h-full rounded-full transition duration-100 ease-linear"></span>
        <span class="bg-gray-400 absolute left-0 w-full h-full rounded-full"></span>
        <span class="checked-peg absolute z-20 left-0 bg-white w-3 h-3 m-0.5 rounded-full transition transform duration-100 ease-linear cursor-pointer translate-x-0"></span>
    </div>
    @if(isSet($label) || isSet($description) )
        <div class="select-none flex flex-col pl-2">
            {{ $label ?? '' }}
            @if(isSet($description))
            <span class="text-xs text-gray-400 font-light">{{ $description ?? '' }}</span>
            @endif
        </div>
    @endif
</label>
