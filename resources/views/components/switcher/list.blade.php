<div class="flex flex-col flex-grow">
    @foreach ($users as $user)
        <div wire:key="messenger-user-{{ $user->id }}"
            class="group flex cursor-pointer flex-grow items-center px-4 py-2 text-sm capitalize text-gray-500 hover:bg-blue-500 hover:text-white">
            <form action="/impersonate" method="post" class="flex items-center flex-shrink-0 mr-2">
                @csrf
                <input type="hidden" name="user" value="{{ $user->id ?? '' }}" />
                <button class="flex items-center text-gray-300 hover:bg-blue-500 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            <span class="flex">
                <span class="relative -ml-3">
                    <span
                        class="overflow-hidden focus:outline-none w-6 h-6 text-xs text-gray-500 bg-gray-50 rounded-full flex items-center justify-center border border-gray-300 dark:border-gray-700">
                        <x-ui.avatar :name="$user->name ?? ''"  rounded="rounded-sm" />
                    </span>
                    <span class="w-2 h-2 border border-white bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                </span>
            </span>
            <span class="ml-2 flex-grow text-left">
                {{ $user->name }}
            </span>
        </div>
    @endforeach
</div>
