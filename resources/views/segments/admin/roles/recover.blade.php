<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-orange-100 text-orange-500 p-3 h-20 w-20">
                <x-icon.solid icon="save" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Recover</div>
            <div class="text-gray-500">Would you like to recover this deleted role?</div>
        </div>

        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.warning type="submit">Recover</x-button.warning>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
