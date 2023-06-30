<div class="flex flex-row items-center rounded-xl bg-white w-full px-4 py-4">
    <div>
        <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                </path>
            </svg>
        </button>
    </div>
    <div class="flex-grow ml-4">
        <div class="relative w-full">



            <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="send">
                <x-ui.loading-indicator :loading="true" spinner="border-gray-500 mr-4" right
                    bg="bg-gray-300 bg-opacity-25" />
            </div>

            <div x-ref="message"
                class="block w-full border rounded-md focus:outline-none focus:border-blue-300 pl-4 p-2 scrollbar overflow-auto"
                style="max-height:100px;"
                @keydown.shift.enter="$event.preventDefault(); $wire.send($refs.message.innerText)" contenteditable>
            </div>

            <button wire:loading.remove wire:target="send" x-on:click="$wire.send($refs.message.innerText)"
                class="absolute focus:outline-none flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4 transform rotate-45 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
