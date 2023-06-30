<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="User">
            @slot('information')
                <div>Create a new user</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 space-y-4">
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-field type="text" name="first_name" label="First name" wire:model="user.first_name"
                                defer />
                        </div>
                        <div class="w-1/2">
                            <x-field type="text" name="last_name" label="Last name" wire:model="user.last_name"
                                defer />
                        </div>
                    </div>
                    <div class="flex">
                        <x-field type="text" name="email" label="Email" wire:model="user.email" />
                    </div>
                    <div class="flex">
                        <x-field type="phone" name="phone" label="Phone" wire:model="user.phone" />
                    </div>
                    <div class="flex">
                        <x-field type="address" name="address" label="Address" wire:model="user.address" />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Create</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
