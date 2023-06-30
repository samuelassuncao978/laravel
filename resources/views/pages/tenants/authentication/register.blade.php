<form wire:submit.prevent="save" class="w-full min-h-full bg-white flex-grow flex">
<div class="container mx-auto max-w-2xl flex flex-col">


        <div class="relative overflow-hidden">
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
                @elseif($this->steps()->current === 'confirm')
                    <div class="relative h-56" x-data="{}" x-init="$wire.save()">
                         <div class="absolute inset-0 rounded overflow-hidden flex items-center justify-center">
                            <x-ui.loading-indicator :loading="true" bg="bg-white bg-opacity-50" spinner="border-gray-500" />
                            <span class="mt-14">Creating your account...</span>
                        </div>
                    </div>
                @elseif($this->steps()->current === 'complete')
                    <div class="flex flex-col items-center justify-center h-96">
                        <div class="h-24 w-24 flex text-blue-500 mb-4">
                            <x-icon.outline icon="check-circle"/>
                        </div>
                        <div class="font-bold">Your account has been created</div>
                        <div>Check your email to login</div>
                    </div>
                @endif




            </div>

    <div class="flex px-4">
        <span class="mr-auto"></span>
        <span class="flex space-x-2">
            @if ($this->steps()->has_previous() && $this->steps()->current !== 'confirm' && $this->steps()->current !== 'complete')
                <x-button.standard bold wire:click="{{ $this->steps()->loads('prev', []) }}">Back
                </x-button.standard>
            @endif
            @if($this->steps()->current !== 'plan' && $this->steps()->current !== 'confirm' && $this->steps()->current !== 'complete')
                @if ($this->steps()->has_next())
                    <x-button.primary bold wire:click="next()">Next
                    </x-button.primary>
                @else
                    <x-button.positive bold type="submit">Confirm</x-button.positive>
                @endif
            @endif
        </span>
    </div>
    </div>
</form>
