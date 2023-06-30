<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-2/3">


        <x-modal.masthead title="Payment link">
            @slot('information')
                <div>Amount due: <span
                        class="text-blue-500">${{ number_format($appointment->due / 100, 2, '.', ' ') }}</span></div>
                <div>Sending to: <span class="text-blue-500">{{ $client->name }} &middot; [ {{ $client->email }}
                        ]</span></div>
            @endslot
        </x-modal.masthead>

        <x-ui.modal.content neat>
            <div class="flex" style="height:60vh;">
                <div class="-mx-3 -my-3 flex flex-grow">
                    <x-ui.form.field type="editor" name="message" bold />
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2 justify-center flex-grow">

                <span class="flex-grow"></span>
                <span>
                    <x-button.primary bold type="submit">Send email</x-button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
