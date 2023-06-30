<div class="flex flex-col flex-grow">
    @foreach ($conversations as $conversation)
        <div wire:key="messenger-conversation-{{ $conversation->id }}"
            class="group flex cursor-pointer flex-grow items-center px-4 py-2 text-sm capitalize text-gray-500 hover:bg-blue-500 hover:text-white"
            wire:click="open_conversation('{{ $conversation->id }}')">
            <span class="flex">

                @php
                    $with = $conversation->users->filter(function ($u) {
                        return $u->id !== auth()->user()->id;
                    });
                @endphp
                @if (count($with) === 2)
                    <span class="flex relative h-6 w-6">
                        <span class="absolute bottom-0 left-0">
                            <span
                                class="overflow-hidden focus:outline-none w-4 h-4 text-xs text-gray-500 bg-gray-50 rounded-full flex items-center justify-center border border-gray-300 dark:border-gray-700">
                                <x-ui.avatar :name="$with->values()[0]->name" rounded="rounded-sm" />
                            </span>
                            <span class="w-1 h-1 bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                        </span>
                        <span class="absolute top-0 right-0">
                            <span
                                class="overflow-hidden focus:outline-none w-4 h-4 text-xs text-gray-500 bg-gray-50 rounded-full flex items-center justify-center border border-gray-300 dark:border-gray-700">
                                <x-ui.avatar :name="$with->values()[1]->name" rounded="rounded-sm" />
                            </span>
                            <span class="w-1 h-1 bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                        </span>
                    </span>
                @endif



            </span>
            <span class="ml-2 flex-grow text-left">
                {{ implode(
    ', ',
    $conversation->users->filter(function ($u) {
            return $u->id !== auth()->user()->id;
        })->pluck('name')->toArray(),
) }}
            </span>
            <span class="flex items-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    @endforeach
</div>
