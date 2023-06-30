<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Change password">
            @slot('information')
                <div>Change your password</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 space-y-4">

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-field type="password" name="new_password" label="New password"
                                autocomplete="new-password" required />
                        </div>
                        <div class="w-1/2">
                            <x-field type="password" name="new_password_confirmation" label="Confirm"
                                autocomplete="new-password" required />
                        </div>
                    </div>
                    <div class="flex">
                        <x-field type="password" name="current_password" label="Current password"
                            autocomplete="current-password" required />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Change</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
