@if ($paginator->firstItem() && $paginator->total() > $this->rows)
    <div class="flex flex-col sticky bottom-0 bg-gray-100">
        <div class="flex flex-col flex-grow md:flex-row py-3 px-5 rounded-md border-t border-gray-200">
            <div class="flex items-center space-x-2">
                <button {!! $paginator->onFirstPage() ? 'disabled' : '' !!}
                    class="prev flex-shrink-0 {{ $paginator->onFirstPage() ? 'bg-gray-300' : 'bg-gray-600 hover:bg-gray-800 focus:ring-gray-200' }} text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1"
                    wire:click="previousPage" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <button {!! !$paginator->hasMorePages() ? 'disabled' : '' !!}
                    class="next flex-shrink-0 prev  {{ !$paginator->hasMorePages() ? 'bg-gray-300' : 'bg-gray-600 hover:bg-gray-800 focus:ring-gray-200' }} text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1"
                    wire:click="nextPage" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="flex md:ml-5 ml-0 flex-grow text-xs uppercase items-center text-gray-500">
                <strong class="font-bold">{{ $paginator->firstItem() }} -
                    {{ $paginator->lastItem() }}</strong>&nbsp;of&nbsp;<strong
                    class="font-bold">{{ $paginator->total() }}</strong>
            </div>
        </div>
    </div>
@endif
