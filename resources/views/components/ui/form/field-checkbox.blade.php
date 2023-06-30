<label data-input="checkbox" class="flex justify-start items-center text-gray-600 text-xs">
   <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:ring-2 focus-within:ring-blue-200 focus-within:border-blue-500">
                        <input type="checkbox" class="opacity-0 absolute" {{ $attributes->except('class','label') }}>
                        <span class="checked hidden w-4 h-4 text-blue-500 pointer-events-none p-px">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 333 333" fill-rule="evenodd" clip-rule="evenodd">
                                <g>
                                    <path class="fil0" d="M129 191c-13,-12 -34,-34 -48,-48 -14,-13 -23,-2 -40,16 -19,19 0,29 27,56l49 49c18,16 33,-8 57,-31l98 -99c31,-30 38,-30 13,-54 -22,-23 -21,-23 -56,13 -16,15 -95,95 -100,98z" />
                                </g>
                            </svg>
                        </span>
                    </div>
    @if(isSet($label))
    <div class="select-none">{{ $label }}</div>
    @endif
</label>
