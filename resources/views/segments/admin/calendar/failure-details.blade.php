<form wire:submit.prevent="save">
    <x-ui.modal.window>




        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-orange-100 text-orange-500 p-3 h-20 w-20">
                <x-icon.solid icon="exclamation" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Calendar failure</div>
            <div class="text-gray-500">Synchronizing your calendar recently failed.</div>
        </div>
        <x-ui.modal.content neat>
            <div class="px-10 py-4 text-gray-700 flex flex-col max-w-md">
                <div class="text-xs">This issue has been flagged with our support team who will reach out shortly to assist you.</div>
                <div class="text-xs text-gray-400 mt-4 mb-1">The failure reason from your calendar provider was:</div>
                <code class="border text-xs border-orange-100 p-2 rounded bg-orange-50 text-orange-500">
                    {{ $this->calendar->failed_reason ?? 'No response received from provider.'}}
                </code>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span><x-button.secondary type="button" wire:click="close">Close</x-button.secondary></span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
