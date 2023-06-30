<label data-input="radio" class="flex justify-start items-center text-gray-600 text-xs">
    <div class="bg-white border-2 rounded-full border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:ring-2 focus-within:ring-blue-200 focus-within:border-blue-500">
        <input type="radio" class="opacity-0 absolute" {{ $attributes->except('class','label') }}>
            <span class="checked hidden w-2 h-2 bg-blue-500 rounded-full pointer-events-none"></span>
    </div>
    @if(isSet($label))
    <div class="select-none">{{ $label }}</div>
    @endif
</label>
