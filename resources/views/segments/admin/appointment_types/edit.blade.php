<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Edit appointment type">
            @slot('information')
                <div>Edit appointment type</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96 space-y-4">
                <div class="flex">
                        <x-field type="text" name="name" label="Name" required wire:model="appointment_type.name" />
                    </div>
                     <div class="flex">
                        <x-field type="icon" name="icon" label="Icon" required wire:model="appointment_type.icon" />
                    </div>
                   <div class="flex space-x-4">
                        <div class="flex w-1/2">
                            <x-field type="text" name="duration" label="Duration" required wire:model="appointment_type.duration" />
                        </div>
                         <div class="flex w-1/2">
                            <x-field type="currency" name="charge" label="Charge" required wire:model="appointment_type.charge" />
                        </div>
                   </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive type="submit">Save changes</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
