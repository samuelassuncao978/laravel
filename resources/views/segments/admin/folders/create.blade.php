<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Create folder">
            @slot('information')
                <div>
                    @if ($this->parent)
                        Create new folder in:
                        <span class="text-blue-500">{{ $this->parent->name }}</span>
                    @else
                        Create a new folder
                    @endif
                </div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96 space-y-4">
                    <div class="flex">
                        <x-field type="text" name="name" label="Name" :autofocus="true" required
                            wire:model="folder.name" />
                    </div>
                    <div class="flex">
                        <x-field type="icon" name="icon" label="Icon" required wire:model="folder.icon" />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit" id="Create">Create</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
