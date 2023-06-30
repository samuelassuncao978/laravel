<div class="h-full relative flex items-center justify-center hover:bg-gray-100 rounded-lg"
    x-data="{ active: false, open: false }" x-on:mouseover="active = true" x-on:mouseout="active = false">
    <button class="flex h-full focus:outline-none flex-col p-3 relative overflow-hidden rounded-lg"
        {{ $attributes->whereStartsWith('wire:click') }}>
        <div class="h-full flex-grow w-full relative">

            <div
                class="bg-white {{ $orientation === 'landscape' ? 'w-38' : 'w-24' }} bg-preview  mx-auto rounded-md shadow overflow-hidden inset-0 top-2 absolute flex items-center justify-center">


                @if (isset($preview) && $preview)
                    <div class="shadow-inner relative overflow-hidden rounded w-full h-full bg-cover bg-center"
                        style="filter: grayscale(100%); background-image:url({{ $preview }});"></div>
                @endif

                @if ($mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                    <div
                        class=" bg-blue-500 h-5 rounded-b absolute top-0 left-2 right-2 text-white text-opacity-25 shadow-inner text-xs flex items-center justify-center">
                        DOC</div>
                @elseif($mime === 'application/pdf')
                    <div
                        class=" bg-red-500 h-5 rounded-b absolute top-0 left-2 right-2 text-white text-opacity-25 shadow-inner text-xs flex items-center justify-center">
                        PDF</div>
                @elseif($mime === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    <div
                        class=" bg-green-500 h-5 rounded-b absolute top-0 left-2 right-2 text-white text-opacity-25 shadow-inner text-xs flex items-center justify-center">
                        EXCEL</div>
                @elseif($mime === 'txt')
                    <div
                        class=" bg-gray-500 h-5 rounded-b absolute top-0 left-2 right-2 text-white text-opacity-25 shadow-inner text-xs flex items-center justify-center">
                        TXT</div>

                @endif
                @if ($attributes->has('wire:click'))
                    <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                        wire:target="{!! $attributes->get('wire:click') !!}">
                        <x-ui.loading-indicator :loading="true" spinner="border-gray-500"
                            bg="bg-gray-300 bg-opacity-25" />
                    </div>
                @endif

            </div>




            @if (isset($shared) && $shared)
                <div class="h-4 w-4 p-0.5 absolute -top-2 -right-2 bg-blue-500 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
            @endif
        </div>
        @if ((isset($tag) && $tag) || (isset($name) && $name))
            <span
                class="text-xs rounded-full px-2 font-bold tracking-wide text-center text-gray-500 mt-4 truncate w-full flex justify-center items-center">
                @if (isset($tag) && $tag)
                    <div class="h-2 flex-shrink-0 w-2 {{ $tag->color }} rounded-full mr-2"></div>
                @endif
                @if (isset($name) && $name)
                    <div class="truncate" alt="{{ $name }}">{{ $name }}</div>
                @endif
            </span>
        @endif
        @if (isset($size))
            <span
                class="text-xs flex-shrink-0 font-light tracking-wide text-center text-gray-400 truncate w-full">{{ human_filesize($size ?? 0) }}</span>
        @endif
    </button>
    @if (isset($actions) && $actions)
        <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 z-30" x-show="active || open">
            <button type="button" @click="open = !open" :class="{ 'ring-2 ring-blue-500': open }"
                class="focus:outline-none ml-2 p-1 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-400 flex items-center justify-center">
                <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>
            </button>
            <div @click.away="open = false" x-cloak x-show="open"
                class="z-5 absolute left-1/2 transform -translate-x-1/2 mt-2 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30">
                {{ $actions }}
            </div>
        </div>
    @endif
</div>
