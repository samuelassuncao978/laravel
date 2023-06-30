<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="user-circle" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Impersonate</div>
            <div class="text-gray-500">Please enter your password below to impersonate this user.</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 ">
                    <div class="flex">
                        <x-field type="password" name="password" wire:model="password" />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-ui.button.primary bold type="submit">Impersonate</x-ui.button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
