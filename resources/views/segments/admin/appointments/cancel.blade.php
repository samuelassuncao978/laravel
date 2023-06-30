<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-red-100 text-red-500 p-3 h-20 w-20">
                <x-icon.solid icon="x" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Cancel</div>
            <div class="text-gray-500">Would you like to cancel this appointment?</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200 p-5 flex flex-col w-96">
                <div class="flex w-96">
                    <div class="flex w-1/2 space-x-3 items-center">
                        <x-field type="toggle" name="notify-counsellor" color="bg-red-500" label="Notify Counsellor" />
                    </div>
                    <div class="flex w-1/2 space-x-3 items-center">
                        <x-field type="toggle" name="notify-client" color="bg-red-500" label="Notify Client" />
                    </div>
                </div>
                <div class=" mt-4 py-2">
                    <x-field type="textarea" name="reason" label="Reason for cancellation" />
                </div>
                <div class="text-xs text-gray-500 w-full py-2">A notification will be sent to the counsellor and client
                    that the appointment was cancelled, Cancellation reason will not be included.
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                    <x-button.destructive type="submit">Cancel appointment</x-button.destructive>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
