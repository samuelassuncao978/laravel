<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Edit leave">
            @slot('information')
                <div>Edit leave</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                  <div class="flex">
                        <x-ui.form.field type="text" name="description" label="Description" required model="leave.description" />
                    </div>
                    <div class="flex">
                        <div class="flex w-1/2">
                            <x-ui.form.field type="date" name="starts" label="Starts" required model="leave.start_at" />
                        </div>
                        <div class="flex w-1/2">
                            <x-ui.form.field type="date" name="ends" label="Ends" required model="leave.end_at" />
                        </div>
                    </div>
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
