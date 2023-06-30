<div>
    <div class="bg-gray-50 border-b border-gray-300 py-3 px-5 flex items-center">
        @if ($this->conversation)
            <button wire:key="btn" type="button" class="mr-3 flex items-center" wire:click="close_conversation()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        @else
            <button wire:key="btn-x" type="button" class="mr-3 flex items-center" wire:click="close_conversation()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        @endif

        @if ($this->conversation)
            <div class="flex">
                <span class="relative">
                    <span class="flex">
                        @foreach ($this->conversation->users->filter(function ($u) {
        return $u->id !== auth()->user()->id;
    })
    as $user)
                            <span wire:key="header-user-icon-{{ $user->id }}" class="relative -ml-3">
                                <span
                                    class="overflow-hidden focus:outline-none w-6 h-6 text-xs text-gray-500 bg-gray-50 rounded-full flex items-center justify-center border border-gray-300 dark:border-gray-700">
                                    <x-ui.avatar :name="$user->name ?? ''" rounded="rounded-sm" />
                                </span>
                                <span
                                    class="w-2 h-2 border border-white bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                            </span>
                        @endforeach
                    </span>
                    <span
                        class="w-2 h-2 border border-white bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
                </span>
                <span
                    class="ml-2 flex-grow text-left">{{ implode(
    ', ',
    $this->conversation->users->filter(function ($u) {
            return $u->id !== auth()->user()->id;
        })->pluck('name')->toArray(),
) }}</span>
            </div>
        @endif
    </div>
    <x-messenger.chat>
        @if ($this->conversation)
            @foreach ($this->conversation->messages as $message)
                <x-messenger.message :message="$message" :received="$message->pivot->sender != auth()->user()->id" />
            @endforeach

        @endif
    </x-messenger.chat>
</div>
