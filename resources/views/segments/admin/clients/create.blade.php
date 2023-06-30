<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Create client">
            @slot('information')
                <div>Create a new client</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content neat>
            @if ($this->suggested)
                <div wire:key="client-suggestions" class="p-4 bg-blue-50 border-b border-blue-200 text-xs text-blue-600">
                    <span class="max-w-sm mx-auto flex items-center">
                        <span class="h-6 w-6 mr-2">
                            <x-icon.solid icon="user-circle" />
                        </span>
                        <div class="flex flex-col flex-grow">
                            <span class="font-bold">We found {{ $this->suggested->name }}</span>
                            The client you are adding might already exist.
                        </div>
                        <div class="flex items-center justify-center ml-2">
                            <x-ui.button.primary bold compact type="button" wire:click="use">Use</x-ui.button.primary>
                        </div>
                    </span>
                </div>
            @endif
            <div wire:key="client-details" class="divide-y divide-gray-200 px-10">
                <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex">
                        <x-field type="phone" name="phone" label="Mobile" required wire:model="client.phone"
                            autofocus />
                          
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex w-1/2">
                            <x-field type="text" name="first_name" label="First name" required
                            wire:model.debounce.500ms="client.first_name" />
                        </div>
                        <div class="flex w-1/2">
                            <x-field type="text" name="last_name" label="Last name" required
                            wire:model.debounce.500ms="client.last_name" />
                        </div>
                    </div>
                    <div class="flex">
                        <x-field type="text" name="email" label="Email" required wire:model.debounce.500ms="client.email" />
                    </div>
                 
                </div>
            </div>


        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2">
                <x-button.positive bold type="submit">Create</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
