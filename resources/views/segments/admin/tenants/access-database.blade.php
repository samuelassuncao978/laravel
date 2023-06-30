<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="terminal" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Access Database</div>
            <div class="text-gray-500">Please enter your password below to access database</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 ">
                    <div class="flex">
                        <x-field type="password" name="password" wire:model="password" defer />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-end flex-grow w-96">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.primary type="submit">Access</x-button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
