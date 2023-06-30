<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-red-100 text-red-500 p-3 h-20 w-20">
                <x-icon.solid icon="x" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Delete</div>
            <div class="text-gray-500">Would you like to delete this employer?</div>
        </div>

        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-ui.button.negative bold type="submit">Delete</x-ui.button.negative>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
