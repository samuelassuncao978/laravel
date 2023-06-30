<div class="flex items-stretch divide-x divide-gray-300 text-gray-600 text-xs">
    <div class="flex items-center px-4">
        <div class="uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </div>
        <div class="relative ml-2">
            <select
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 pr-5"
                wire:model="rows" wire:loading.attr="disabled">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-3/5 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
            </svg>
        </div>

    </div>
    <div class="flex px-4 flex-grow text-xs uppercase items-center text-gray-500">
        <strong class="font-bold">{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }}</strong>
    </div>
    <ul class="px-4 flex-grow items-center flex flex-shrink-0 space-x-1">
        @foreach ($elements as $key => $element)
            @if (is_string($element))
                <li wire:key="paginator-element-{{ $key }}">
                    <span class="relative inline-flex items-center py-2 px-3 cursor-default leading-5">...</span>
                </li>
            @else
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="flex flex-shrink-0" wire:key="paginator-page-{{ $page }}">
                            @if ($page == $paginator->currentPage())
                                <span
                                    class=" bg-gray-500 text-white flex-shrink-0 flex justify-center items-center focus:outline-none rounded py-1 px-2">
                                    {{ $page }}
                                </span>
                            @else
                                <button wire:click="gotoPage({{ $page }})"
                                    class="bg-gray-100 hover:bg-gray-200 flex-shrink-0  flex justify-center items-center focus:outline-none rounded py-1 px-2"
                                    wire:loading.attr="disabled">
                                    {{ $page }}
                                </button>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endif
        @endforeach
    </ul>

    <div class="flex px-4 items-center space-x-2">
        <button {!! $paginator->onFirstPage() ? 'disabled' : '' !!}
            class="prev flex-shrink-0 {{ $paginator->onFirstPage() ? 'bg-gray-300' : 'bg-gray-600 hover:bg-gray-800 focus:ring-gray-200' }} text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1"
            wire:click="previousPage" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <button {!! !$paginator->hasMorePages() ? 'disabled' : '' !!}
            class="next flex-shrink-0 prev  {{ !$paginator->hasMorePages() ? 'bg-gray-300' : 'bg-gray-600 hover:bg-gray-800 focus:ring-gray-200' }} text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1"
            wire:click="nextPage" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>
