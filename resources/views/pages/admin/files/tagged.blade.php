<div class="flex flex-col h-full">
    <div class="flex flex-col border-b border-gray-200 mx-8 py-5">
        <div class=" text-3xl font-light text-gray-700">
            <div class="flex flex-col my-5">
                <div class="mb-1 text-blue-600 text-xs">
                    {{ implode(', ', [count($files) . ' Files', count($folders) . ' Folders']) }}
                </div>
                <div class="flex items-center uppercase text-base font-normal text-gray-500">
                    <div class="h-4 w-4 mr-2 rounded-full {{ optional($tag)->color }}"></div>
                    {{ optional($tag)->name }}
                </div>
            </div>
        </div>
    </div>
    @if (count($files) + count($folders) < 1)
        <div class="flex flex-grow">
            <x-common.empty-notice title="No tagged files or folders, ">
                <x-icon.outline icon="tag" />
            </x-common.empty-notice>
        </div>
    @else
        <div class="flex relative flex-wrap m-5">
            @include('pages.files.parts.folders')
            @include('pages.files.parts.files')
        </div>
    @endif

</div>
