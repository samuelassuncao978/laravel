<div class="flex flex-col h-96" wire:key="conversation-{{ $this->conversation->id }}">
    <x-messenger.chat>
        @foreach ($this->messages as $message)

            <x-messenger.message :message="$message" :received="$message->pivot->sender != auth()->user()->id" />
        @endforeach
    </x-messenger.chat>
    <x-messenger.chat-input />
</div>
