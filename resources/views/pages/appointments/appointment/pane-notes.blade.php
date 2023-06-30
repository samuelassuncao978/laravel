<div class="h-1/2 overflow-hidden flex flex-col">
    <x-modal.masthead title="Notes">
        @slot('information')
            <div>Notes: <span class="text-blue-500">8</span></div>
        @endslot
        @slot('actions')
            <button
                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center">
                <span class="h-4 w-4 mr-1">
                    <x-icon.solid icon="pencil" />
                </span>
                New note
            </button>
        @endslot
    </x-modal.masthead>
    <div
        class="flex flex-wrap overflow-auto flex-grow pt-5 bg-gray-50 border-t borrder-b border-gray-200 p-10 scrollbar">
        <x-common.empty-notice title="No notes" large>
            <x-icon.outline icon="pencil-alt" />
        </x-common.empty-notice>
    </div>
</div>
