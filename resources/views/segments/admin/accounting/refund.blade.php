<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="credit-card" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Refund</div>
            <div class="text-gray-500">Would you like to refund this appointment?</div>

        </div>
        <x-ui.modal.content>

            <div class="text-center">
                <div class="text-gray-500 mt-5 text-3xl">${{ number_format($appointment->paid / 100, 2, '.', ' ') }}
                </div>
                <div class="text-gray-500 mb-5 text-xs mt-2 mx-auto w-48">Will be refunded to the card used for this
                    payment ending in <span class="font-bold">4454</span>.</div>
            </div>

        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2 justify-center flex-grow">
                <span class="flex-grow"></span>
                <span>
                    <x-button.primary bold type="submit">Refund card</x-button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
