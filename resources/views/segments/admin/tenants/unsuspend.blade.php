<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-green-100 text-green-500 p-3 h-20 w-20">
                <x-icon.solid icon="shield-check" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Unsuspend</div>
            <div class="text-gray-500">Would you like to unsuspend this tenant?</div>
        </div>

        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.positive bold type="submit">Unsuspend</x-button.positive>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
