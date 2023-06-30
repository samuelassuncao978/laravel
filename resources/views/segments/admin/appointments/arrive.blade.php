<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-green-100 text-green-500 p-3 h-20 w-20">
                <x-icon.solid icon="clipboard-check" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Arrival</div>
            <div class="text-gray-500">Would you like to mark the client as arrived?</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200 p-5">
                <x-field type="toggle" name="notify" label="Notify counsellor" wire:model="notify" />
                <div class="text-xs text-gray-500 max-w-xs mt-4 pt-2">A notification will be sent to the counsellor that
                    there appointment has arrived.</div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.positive type="submit">Check-in</x-button.positive>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
