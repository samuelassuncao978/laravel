<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10 w-96">
            <div class="rounded-full bg-red-100 text-red-500 p-3 h-20 w-20">
                <x-icon.solid icon="ban" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Suspend</div>
            <div class="text-gray-500">Would you like to suspend this tenant?</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 ">
                    <div class="flex">
                        <x-field type="textarea" name="reason" label="Reason" wire:model="tenant.suspended_reason"
                            defer />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.destructive type="submit">Suspend</x-button.destructive>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
