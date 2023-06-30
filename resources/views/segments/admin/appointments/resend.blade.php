<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="mail" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Resend Confirmation</div>
            <div class="text-gray-500">Would you like to resend the confirmation for this appointment?</div>
        </div>
        <x-ui.modal.content>
            <div class=" p-5 flex flex-col w-96">
                <div class="flex flex-col flex-1 pb-2 divide-y divide-gray-200">
                    <div class="flex py-2 items-center">
                        <x-field type="toggle" name="notify-counsellor" wire:model="notify_counsellor">
                            <x-slot name="label">
                                <div class="flex flex-col ml-2">
                                    <div class="font-semibold text-gray-700">Sent to counsellor</div>
                                    <div class="text-gray-400">{{ optional($this->appointment->users()->first())->email }}</div>
                                </div>
                            </x-slot>
                        </x-field>
                    </div>
                    <div class="flex py-2 items-center">
                        <x-field type="toggle" name="notify-client" wire:model="notify_client">
                            <x-slot name="label">
                                <div class="flex flex-col ml-2">
                                    <div class="font-semibold text-gray-700">Sent to client</div>
                                    <div class="text-gray-400">{{ optional($this->appointment->clients()->first())->email }}</div>
                                </div>
                            </x-slot>
                        </x-field>
                    </div>
                </div>
                <div class="text-xs text-gray-500 w-full py-2">A notification will be sent to the counsellor and client
                    that the appointment was reinstated.</div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.primary type="submit">Resend</x-button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
