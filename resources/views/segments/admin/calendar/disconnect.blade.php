<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-red-100 text-red-500 p-3 h-20 w-20">
                <x-icon.solid icon="eye-off" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Disconnect</div>
            <div class="text-gray-500">Are you sure you would like to disconnect this calendar?</div>
        </div>

        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex justify-end flex-grow">
                <span class="flex space-x-2">
                    <x-ui.button.negative bold type="submit">Disconnect</x-ui.button.negative>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
