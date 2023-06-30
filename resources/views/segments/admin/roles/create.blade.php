<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Create role">
            @slot('information')
                <div>Create a new role</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex">
                        <x-field type="text" name="name" label="Name" required wire:model="role.name" />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive type="submit">Create</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
