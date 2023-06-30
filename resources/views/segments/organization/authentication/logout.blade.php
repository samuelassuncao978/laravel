<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10 w-96">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="key" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Logout</div>
            <div class="text-gray-500">Are you sure you want to logout?</div>
        </div>

        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-ui.button.primary bold type="submit">Logout</x-ui.button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
