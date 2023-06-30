<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="rounded-full bg-blue-100 text-blue-500 p-3 h-20 w-20">
                <x-icon.solid icon="credit-card" />
            </div>
            <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Pay</div>
            <div class="text-gray-500 mt-5 text-3xl">${{ number_format($appointment->due / 100, 2, '.', ' ') }}</div>
        </div>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200 p-5 w-96">




                <x-stripe.intent amount="100">





                    <!--
            <button type="button" x-on:click="intent(()=>$wire.submit())">Set Intent</button>
 -->


                    <div class="flex ">
                        <x-stripe.card />
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <x-stripe.expiry />
                        </div>
                        <div class="w-1/2">
                            <x-stripe.cvc />
                        </div>
                    </div>
                </x-stripe.intent>

            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2 justify-end flex-grow">
                <span><x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary></span>
                <span>
                    <x-button.primary bold type="submit">Charge card</x-button.primary>
                </span>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
