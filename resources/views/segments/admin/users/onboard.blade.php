<form wire:submit.prevent="save" class="hidden">
    <x-ui.modal.window class="w-full md:w-4/6 lg:w-3/6 xl:w-2/5 2xl:w-2/6">

        welcome
        <x-ui.modal.content neat class="">
            <div class=" relative px-10 overflow-hidden">
                <div class=" my-4 pb-4 grid grid-cols-2 text-xs border-b
                border-gray-100">
                    <x-ui.wizard.item icon="user-circle" label="Welcome" :complete="in_array('welcome',$this->steps()->completed)"
                    :active="in_array('welcome',$this->steps()->completed) || $this->steps()->current === 'welcome'" />

                    <x-ui.wizard.item last icon="user-circle" label="Profile" :complete="in_array('profile',$this->steps()->completed)"
                    :active="in_array('profile',$this->steps()->completed) || $this->steps()->current === 'profile'" />

    
                </div>


                @if ($this->steps()->current === 'welcome')
                <div>Welcome</div>

                @elseif($this->steps()->current === 'profile')
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 space-y-4">
                        <div class="flex space-x-4">
                            <div class="flex w-1/2">
                                <x-field type="text" name="first_name" label="First name" wire:model="user.first_name"
                                     />
                            </div>
                            <div class="flex w-1/2">
                                <x-field type="text" name="last_name" label="Last name" wire:model="user.last_name"
                                     />
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex w-1/2">
                                <x-field type="text" name="email" label="Email" wire:model="user.email" />
                            </div>
                            <div class="flex w-1/2">
                                <x-field type="phone" name="phone" label="Phone" wire:model="user.phone" />
                            </div>
                        </div>
                        <div class="flex">
                            <x-field type="address" name="address" label="Address" wire:model="user.address"  />
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex w-1/2">
                                <x-field type="select" name="gender" label="Gender" extendable :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'Male','id'=>'Male'],['text'=>'Female','id'=>'Female'],['text'=>'Intersex','id'=>'Intersex']]"
                                           wire:model="user.gender" />
                            </div>
                            <div class="flex w-1/2">
                                <!-- <x-field type="date-of-birth" name="date_of_birth" label="Date of Birth" wire:model="user.date_of_birth"  /> -->
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($this->steps()->current === 'plan')
                    @include('segments.admin.tenants.create.plan')
                @endif




            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>

            <span class="flex space-x-2">
                @if ($this->steps()->has_previous())
                    <x-button.secondary bold wire:click="prev()">Back
                    </x-button.secondary>
                @endif
                @if ($this->steps()->current === 'welcome')
                    <x-button.primary wire:click="next()">Next
                    </x-button.primary>
                @elseif ($this->steps()->current === 'profile')
                    <x-button.primary wire:click="validateNext()">Next
                    </x-button.primary>
                @else
                    <x-button.positive bold type="submit">Confirm</x-button.positive>
                @endif
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
