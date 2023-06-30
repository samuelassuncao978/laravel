<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Role users">
            @slot('information')
                @if ($this->role)
                    <div>
                        Role:
                        <span class="text-blue-500">{{ $this->role->name }}</span>
                    </div>
                @endif
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
        <div class="scrollbar" style="width:450px; max-height:500px;">
                <div class="p-10">
                    <x-field type="transfer" name="users" label="Users" required wire:model="selected" :options="$users->toArray()">
                        @slot('template')
                        <div class="flex items-center text-xs">
                            <!-- <span class="h-5 w-5 mr-2">
                                <x-ui.avatar x-text="`${item.first_name} ${item.last_name}`" />
                            </span> -->
                            <span x-text="`${item.first_name} ${item.last_name}`"></span>
                        </div>
                        @endslot
                    </x-field>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Save changes</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
