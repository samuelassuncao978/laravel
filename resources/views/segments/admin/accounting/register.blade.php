<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-2/5">
        <x-modal.masthead title="Register">
            @slot('information')
                @if ($this->user)
                    <div>
                        User:
                        <span class="text-blue-500">{{ $this->user->name }}</span>
                    </div>
                @endif
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content class="">
            <div class=" my-4 pb-4 grid grid-cols-5 text-xs border-b
            border-gray-100">
            <x-ui.wizard.item icon="cursor-click" label="Begin" :complete="in_array('begin',$this->steps()->completed)"
                :active="in_array('begin',$this->steps()->completed) || $this->steps()->current === 'begin'" />

            <x-ui.wizard.item icon="user-circle" label="Details"
                :complete="in_array('details',$this->steps()->completed)"
                :active="in_array('details',$this->steps()->completed) || $this->steps()->current === 'details'" />
            <x-ui.wizard.item icon="identification" label="Identification"
                :complete="in_array('identification',$this->steps()->completed)"
                :active="in_array('identification',$this->steps()->completed) || $this->steps()->current === 'identification'" />

            <x-ui.wizard.item icon="library" label="Account" :complete="in_array('account',$this->steps()->completed)"
                :active="in_array('account',$this->steps()->completed) || $this->steps()->current === 'account'" />
            <x-ui.wizard.item last icon="badge-check" label="Confirm"
                :complete="in_array('confirm',$this->steps()->completed)"
                :active="in_array('confirm',$this->steps()->completed) || $this->steps()->current === 'confirm'" />
            </div>
            <div class="mb-8">
                @if ($this->steps()->current === 'begin')
                    <div class="px-10 my-4" wire:key="begin">
                        <div class="text-xs text-gray-700 pb-1.5">
                            In order to register your bank account details for payouts you will need to confirm your
                            identity and elligability.
                        </div>
                        <div class="text-xs text-gray-700 pb-5">
                            The following will be required to complete registration for payouts.
                        </div>
                        <div class="flex flex-col space-y-4 text-xs text-gray-600 mt-4 mx-8">
                            <div class="flex items-center">
                                <span class="h-5 w-5 mr-2 text-green-500">
                                    <x-icon.solid icon="check-circle" />
                                </span>
                                Bank account information (account number & BSB)
                            </div>
                            <div class="flex items-center">
                                <span class="h-5 w-5 mr-2 text-green-500">
                                    <x-icon.solid icon="check-circle" />
                                </span>
                                Drivers Licence or Government issued photo ID
                            </div>
                            <div class="flex items-center">
                                <span class="h-5 w-5 mr-2 text-green-500">
                                    <x-icon.solid icon="check-circle" />
                                </span>
                                Valid Australian Business Number (ABN)
                            </div>
                        </div>
                    </div>
                @elseif( $this->steps()->current === 'details' )
                    <div class="flex flex-col" wire:key="details">
                        <div class="flex">
                            <div class="flex w-1/2">
                                <x-ui.form.field type="text" name="user.first_name" label="First Name" required
                                    model="user.first_name" defer />
                            </div>
                            <div class="flex w-1/2">
                                <x-ui.form.field type="text" name="user.last_name" label="Last Name" required
                                    model="user.last_name" defer />
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex w-1/2">
                                <x-ui.form.field type="phone" name="user.phone" label="Phone" required
                                    model="user.phone" defer />
                            </div>
                            <div class="flex w-1/2">
                                <x-ui.form.field type="date" name="user.date_of_birth" label="Date of birth" required
                                    model="user.date_of_birth" defer />
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex w-full">
                                <x-ui.form.field type="address" name="user.address" label="Address" required
                                    model="user.address" />
                            </div>
                        </div>
                    </div>
                @elseif( $this->steps()->current === 'identification' )
                    <div class="flex flex-col" wire:key="identification">
                        <div class="flex">
                            <div class="flex w-1/2">
                                <x-ui.form.field type="file" name="user.idfront" label="ID Front" required
                                    model="user.idfront" />
                            </div>
                            <div class="flex w-1/2">
                                <x-ui.form.field type="file" name="user.idback" label="ID Back" required
                                    model="user.idback" />
                            </div>
                        </div>
                    </div>
                @elseif( $this->steps()->current === 'account' )
                    <div class="flex flex-col" wire:key="account">
                        <div class="flex w-full">
                            <x-ui.form.field type="text" name="user.abn" label="ABN" required model="user.abn" />
                        </div>
                        <div class="flex">
                            <div class="flex w-1/2">
                                <x-ui.form.field type="text" name="user.idfront" label="Account" required
                                    model="user.account" />
                            </div>
                            <div class="flex w-1/2">
                                <x-ui.form.field type="text" name="user.idback" label="BSB" required
                                    model="user.bsbs" />
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2">
                <div>
                    @if ($this->steps()->has_previous())
                        <x-button.secondary bold wire:key="back"
                            wire:click="{{ $this->steps()->loads('prev', []) }}">Back</x-button.secondary>
                    @endif
                </div>
                @if ($this->steps()->has_next())
                    <x-ui.button.primary bold wire:key="next" wire:click="saveAndNext">Next</x-ui.button.primary>
                @else
                    <x-button.positive bold wire:key="submit" type="submit">Confirm</x-button.positive>
                @endif
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
