<div class="flex flex-col h-full">
    <div class="flex flex-col border-b border-gray-200 mx-8 py-5">
        <div class=" text-3xl font-light text-gray-700">
            <div class="flex flex-col my-5">
                <div class="mb-1 text-blue-600 text-xs">
                    {{ implode(', ', [count($files) . ' Files', count($folders) . ' Folders']) }}
                </div>
                <div class="flex items-center uppercase text-base font-normal text-gray-500">
                    Searching for: <span class="text-gray-400 pl-2">{{ $this->search }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex relative flex-wrap m-5">
        @include('pages.files.parts.folders')
        @include('pages.files.parts.files')

        @if (empty($this->filter_tag) && empty($this->search))
            @include('pages.files.parts.add')
        @endif
    </div>
</div>
