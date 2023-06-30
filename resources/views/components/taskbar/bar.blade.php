<div class="flex">
    <div class="py-3.5 px-2 flex-col items-center text-gray-400 space-y-4 w-12 relative hidden md:flex">
        {{ $slot }}


        <x-taskbar.notifications.menu />
        @if (false === false)
            <x-taskbar.switcher />
        @endif
        <x-taskbar.divider />
        <x-taskbar.user />

        <x-taskbar.divider />

        <button class="focus:outline-none w-6 h-6 p-1 hover:text-white rounded-full flex items-center justify-center">
            <x-icon.solid icon="academic-cap" />
        </button>

        <button class="focus:outline-none w-6 h-6 p-1 hover:text-white rounded-full flex items-center justify-center">
            <x-icon.solid icon="book-open" />
        </button>


        <div class="flex-grow"></div>

        @if (false === false)
            <x-taskbar.timer />
        @endif



        <div class="flex flex-col">
            <x-taskbar.help />
        </div>
    </div>




</div>
