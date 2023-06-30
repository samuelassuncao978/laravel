<div x-data="{ 
    open: false, 
    conversation: @entangle('conversation')
 }" x-init="


    $wire.on('new-message', () => { 
        console.log(conversation)
        if((!open || document.hidden)){

            $refs.received.play()
        }
    });


" wire:key="messenger" class="relative">





    <audio x-ref="received">
        <source src="{{ asset('audio/important.wav') }}" type="audio/mpeg" />
    </audio>
    <button @click="open = !open;" :class="{ 'ring-2 ring-gray-800 text-white bg-gray-700': open,  }"
        class="focus:outline-none w-6 h-6 p-1 hover:text-white rounded-full flex items-center justify-center">
        <x-icon.solid icon="annotation" />
    </button>

    @if ($unread > 0)
        <span
            class="animate-ping pointer-events-none absolute inline-flex h-2 w-2 top-0 right-0 rounded-full bg-red-400 opacity-75"></span>
        <span
            class="w-2 h-2 border pointer-events-none	 border-white bg-red-500 absolute top-0 right-0 rounded-full"></span>
    @endif

    <x-dropdown-menu>
        @include('segments.messenger.header')
        @includeWhen(($this->conversation === null && $this->create === false) &&
        !$this->show_settings,'segments.messenger.conversations')
        @includeWhen(($this->conversation !== null || $this->create) &&
        !$this->show_settings,'segments.messenger.conversation')
        @includeWhen(($this->show_settings),'segments.messenger.preferences')
    </x-dropdown-menu>
</div>
