<div class="flex bg-gray-50 border-b border-gray-200 p-2">



    @if ($this->conversation)
        <button wire:key="btn" type="button" class="mr-3 flex items-center" wire:click="close_conversation()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <div class="flex flex-grow">
            <span class="relative">
                <span class="flex">
                    @foreach ($this->conversation->users->filter(function ($u) {
        return $u->id !== auth()->user()->id;
    })
    as $user)
                        <span wire:key="header-user-icon-{{ $user->id }}" class="relative -ml-3">
                            <span
                                class="overflow-hidden focus:outline-none w-6 h-6 text-xs text-gray-500 bg-gray-50 rounded-full flex items-center justify-center border border-gray-300 dark:border-gray-700">
                                <x-ui.avatar :name="$user->name ?? ''" :image="optional(optional(auth()->user())->photo)->uri(true)" rounded="rounded-sm" />
                            </span>
                            <span
                                class="w-2 h-2 border border-white bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                        </span>
                    @endforeach
                </span>
                <span class="w-2 h-2 border border-white bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
            </span>
            <span
                class="ml-2 flex-grow text-left">{{ implode(
    ', ',
    $this->conversation->users->filter(function ($u) {
            return $u->id !== auth()->user()->id;
        })->pluck('name')->toArray(),
) }}</span>
        </div>
    @else
        <button
            class="rounded-full p-1 bg-gray-200 hover:bg-gray-500 focus:outline-none hover:text-white text-gray-400 flex-shrink-0"
            wire:click="start_new_conversation()">
            <span class="h-4 w-4 flex-shrink-0 flex">
                <x-icon.solid icon="pencil" />
            </span>
        </button>
        <span class="flex flex-grow">
            <div class="-mx-2">
                <x-ui.action-bar.find />
            </div>
        </span>
    @endif




    <button
        class="rounded-full p-1 bg-gray-200 hover:bg-gray-500 focus:outline-none hover:text-white text-gray-400 flex-shrink-0"
        wire:click="$set('show_settings',{!! $show_settings ? 'false' : 'true' !!})">
        <span class="h-4 w-4 flex-shrink-0 flex">
            <x-icon.solid icon="cog" />
        </span>
    </button>



</div>
