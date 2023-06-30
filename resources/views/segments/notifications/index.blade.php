<div x-data="{ open: false }" x-init=" $wire.on('new-notification', (notification) => { 
    if(notification?.sound && true === $wire.settings['sounds'] ){
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
        class="focus:outline-none w-6 h-6 p-1 hover:text-white rounded-full flex items-center justify-center">
        <x-icon.solid icon="bell" />
    </button>







    @if ($unread > 0)
        <span
            class="animate-ping pointer-events-none absolute inline-flex h-2 w-2 top-0 right-0 rounded-full bg-red-400 opacity-75"></span>
        <span
            class="w-2 h-2 border pointer-events-none	 border-white bg-red-500 absolute top-0 right-0 rounded-full"></span>
    @endif

    <x-dropdown-menu onClickAway="$wire.set('show_settings',false)">
        @include('segments.notifications.options')

        @if ($show_settings)
            @include('segments.notifications.preferences')
        @else


            @includeWhen((count($notifications) < 1),'segments.notifications.empty-hud') @if ($total > 0)
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


        @endif



    </x-dropdown-menu>
</div>
