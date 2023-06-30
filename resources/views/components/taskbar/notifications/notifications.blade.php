<div x-data="{ open: false }" x-init=" $wire.on('new-notification', (notification) => {
    if(notification?.sound){
        $refs[notification?.sound].play()
    }
})" class="relative">

    <audio x-ref="check-in">
        <source src="{{ asset('audio/check-in.wav') }}" type="audio/mpeg" />
    </audio>
    <audio x-ref="important">
        <source src="{{ asset('audio/important.wav') }}" type="audio/mpeg" />
    </audio>


    <button @click="open = !open" :class="{ 'ring-2 ring-gray-800 text-white bg-gray-700': open }"
        class="focus:outline-none w-6 h-6 hover:text-white rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>







    @if ($unread > 0)
        <span
            class="animate-ping pointer-events-none absolute inline-flex h-2 w-2 top-0 right-0 rounded-full bg-red-400 opacity-75"></span>
        <span
            class="w-2 h-2 border pointer-events-none	 border-white bg-red-500 absolute top-0 right-0 rounded-full"></span>
    @endif
    <div @click.away="open = false" x-cloak x-show="open"
        class="absolute right-0 mt-2 py-2 w-96 bg-white rounded-md shadow-xl z-30">


        <div class="flex w-full p-2 text-xs space-x-1 justify-end">
            @if ($unread > 1)
                <button
                    class="rounded-full p-1 focus:outline-none hover:text-blue-500 text-gray-400 flex flex-shrink-0 px-2 pr-4 items-center">
                    mark all read
                </button>
            @endif
            <button
                class="rounded-full p-1 bg-gray-200 hover:bg-gray-500 focus:outline-none hover:text-white text-gray-400 flex-shrink-0">
                <span class="h-4 w-4 flex-shrink-0 flex">
                    <x-icon.solid icon="cog" />
                </span>
            </button>
        </div>

        @if (count($notifications) < 1)
            <div class="text-gray-500 text-sm flex flex-col items-center py-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                No new notifications
            </div>
        @endif
        @if ($total > 0)
            <div class="flex flex-col">


                <div class="scroll-shadow relative overflow-hidden flex" style="max-height:50vh; "
                    x-data="scroll_shadow()" x-init="init()">
                    <div class="overflow-y-scroll flex flex-col scrollbar scrollbar-thumb-gray-500 flex-grow"
                        x-ref="content">

                        @foreach ($notifications as $notification)
                            <button wire:click="read('{{ $notification->id }}')"
                                class="flex group items-center px-4 py-3 border-b  {{ $notification->read_at ? 'opacity-80 bg-gray-50' : '' }} text-gray-600 hover:bg-blue-500 hover:text-white">
                                <span
                                    class="h-8 w-8 flex flex-shrink-0 rounded-full
                        {{ $notification->read_at ? 'group-hover:bg-blue-400 group-hover:text-white bg-gray-100 text-gray-500' : 'group-hover:bg-blue-400 group-hover:text-white bg-blue-100 text-blue-500' }}

                        overflow-hidden object-cover mx-1">
                                    @if (optional($notification->data)['icon'])
                                        <span class="h-8 w-8 p-1">
                                            <x-icon.solid :icon="optional($notification->data)['icon']" />
                                        </span>
                                    @else
                                        <x-ui.avatar :online="true"
                                            :name="optional(auth()->user())->name ?? 'Unauthenticated user'" />
                                    @endif
                                </span>
                                <p class="flex flex-col text-sm mx-2 flex-grow text-left overflow-hidden">
                                    <span class="flex items-center overflow-hidden">
                                        <span
                                            class="flex-grow truncate">{{ optional($notification->data)['title'] ?? $notification->type }}</span>
                                        <span
                                            class="text-xs flex-shrink-0 ml-auto">{{ $notification->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span
                                        class="text-xs ">{{ optional($notification->data)['description'] ?? '' }}</span>
                                </p>
                            </button>
                        @endforeach

                    </div>
                </div>

                <button wire:click="toggle"
                    class="block hover:text-white focus:outline-none hover:bg-blue-500 text-blue-500 text-center py-2 mt-2 text-sm">
                    @if ($type === 'unreadNotifications')
                        See previous notifications
                    @else
                        Hide previous notifications
                    @endif
                </button>
            </div>

        @endif
    </div>
</div>
