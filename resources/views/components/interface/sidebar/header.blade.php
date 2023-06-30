<div class="flex items-center p-5 pb-0">
    <div class="text-xs text-gray-400 tracking-wider flex-grow uppercase">{{ $text ?? '' }}</div>
    <div class="items-center">
        @if (isset($create))
            <a href="{{ $create ?? '' }}"
                class="flex items-center  text-xs {{ request()->is(($create ?? '') . '*') ? 'text-gray-300 pointer-events-none' : 'text-blue-500 hover:text-blue-700 ' }}">
                <span class="w-4 h-4 mr-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                Create
            </a>
        @endif
    </div>
</div>
