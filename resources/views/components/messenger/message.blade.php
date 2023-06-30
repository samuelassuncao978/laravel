<div wire:key="messenger-msg-{{ $message->id }}"
    class="flex items-end {{ isset($received) && $received ? '' : 'flex-row-reverse' }} p-2">
    <span
        class="overflow-hidden flex-shrink-0 focus:outline-none w-6 h-6 text-xs text-white bg-gray-50 rounded-full flex items-center justify-center border border-gray-300">
        <x-ui.avatar :name="optional($message->sender())->name" rounded="rounded-sm" />
    </span>
    <div class="bg-white rounded-sm shadow-md py-2 px-3 text-xs mx-2">{{ $message->message ?? '' }}</div>
</div>
