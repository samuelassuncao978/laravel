<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-full md:w-4/6 lg:w-3/6 xl:w-2/5 2xl:w-2/6">
        <x-modal.masthead title="Create Tenant">
            @slot('information')
                <div>Create a new tenant</div>
            @endslot
        </x-modal.masthead>

        <x-ui.modal.content neat class="">
            <div class=" relative px-10 overflow-hidden">
                <div class=" my-4 pb-4 grid grid-cols-4 text-xs border-b
                border-gray-100">
                    <x-ui.wizard.item icon="user-circle" label="Customer" :complete="in_array('customer',$this->steps()->completed)"
                    :active="in_array('customer',$this->steps()->completed) || $this->steps()->current === 'customer'" />

                    <x-ui.wizard.item icon="adjustments" label="Setup" :complete="in_array('setup',$this->steps()->completed)"
                    :active="in_array('setup',$this->steps()->completed) || $this->steps()->current === 'setup'" />

                    <x-ui.wizard.item icon="credit-card" label="Plan" :complete="in_array('plan',$this->steps()->completed)"
                    :active="in_array('plan',$this->steps()->completed) || $this->steps()->current === 'plan'" />

                    <x-ui.wizard.item last icon="badge-check" label="Confirm"
                    :complete="in_array('confirm',$this->steps()->completed)"
                    :active="in_array('confirm',$this->steps()->completed) || $this->steps()->current === 'confirm'" />
                </div>


                @if ($this->steps()->current === 'customer')
                    @include('segments.admin.tenants.create.customer')
                @elseif($this->steps()->current === 'setup')
                    @include('segments.admin.tenants.create.setup')
                @elseif($this->steps()->current === 'plan')
                    @include('segments.admin.tenants.create.plan')
                @endif




            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2">
                @if ($this->steps()->has_previous())
                    <x-button.secondary bold wire:click="{{ $this->steps()->loads('prev', []) }}">Back
                    </x-button.secondary>
                @endif
                @if ($this->steps()->has_next())
                    <x-ui.button.primary bold wire:click="next()">Next
                    </x-ui.button.primary>
                @else
                    <x-button.positive bold type="submit">Confirm</x-button.positive>
                @endif
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
