<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-2/5">





        <x-modal.masthead title="Create appointment">
            @slot('information')
                @if ($this->client)
                    <div>
                        Client:
                        <span class="text-blue-500">{{ $this->client->name }}</span>
                    </div>
                @endif
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content class="">
<div>

       <div class=" my-4 pb-4 grid grid-cols-4 text-xs border-b
            border-gray-100">
            <x-ui.wizard.item icon="user-circle" label="Client" :complete="in_array('client',$this->steps()->completed)"
                :active="in_array('client',$this->steps()->completed) || $this->steps()->current === 'client'" />

            <x-ui.wizard.item icon="share" label="Type" :complete="in_array('type',$this->steps()->completed)"
                :active="in_array('type',$this->steps()->completed) || $this->steps()->current === 'type'" />
            <x-ui.wizard.item icon="clock" label="Times" :complete="in_array('times',$this->steps()->completed)"
                :active="in_array('times',$this->steps()->completed) || $this->steps()->current === 'times'" />

            <x-ui.wizard.item last icon="badge-check" label="Confirm"
                :complete="in_array('confirm',$this->steps()->completed)"
                :active="in_array('confirm',$this->steps()->completed) || $this->steps()->current === 'confirm'" />
            </div>

            @if ($this->steps()->current === 'client')


            @elseif( $this->steps()->current === 'type' )
                <div class="flex">

                </div>


                <div class="px-3">
                    <div class="flex mt-4 items-cener uppercase tracking-wide text-gray-700 text-xs font-bold mb-3">
                        Appointment type
                    </div>
                    <div
                        class="grid  gap-3 {{ count($types) === 1 ? 'grid-cols-3' : '' }} {{ count($types) === 2 ? 'grid-cols-2' : '' }} {{ count($types) === 3 ? 'grid-cols-3' : '' }} {{ count($types) > 4 ? 'grid-cols-3' : '' }} {{ count($types) === 4 ? 'grid-cols-4' : '' }} mb-8">
                        @foreach ($types as $type)
                            <button type="button" wire:click="$set('appointment.type_id','{{ $type->id }}')"
                                class="relative overflow-hidden p-3 w-full flex  flex-col items-center rounded-md  shadow  border focus:outline-none bg-white border-white  focus:shadow-inner {{ $appointment->type_id === $type->id ? 'text-blue-500 ring-2 ring-blue-500' : 'text-gray-700 hover:border-gray-300' }}">
                                <span class="flex items-center justify-center h-5 w-5">
                                    <x-icon.solid :icon="$type->icon" />
                                </span>
                                <span class="text-sm mt-2 text-gray-700">{{ $type->name }}</span>
                                <span
                                    class="text-xs text-gray-400">${{ number_format($type->cost() / 100, 2, '.', ' ') }}</span>
                            </button>
                        @endforeach
                    </div>
                    <div class="flex mt-4 items-cener uppercase tracking-wide text-gray-700 text-xs font-bold mb-3">
                        Appointment method
                    </div>
                    <div
                        class="grid gap-3 mb-8 {{ count($methods) === 1 ? 'grid-cols-3' : '' }} {{ count($methods) === 2 ? 'grid-cols-2' : '' }} {{ count($methods) === 3 ? 'grid-cols-3' : '' }} {{ count($methods) > 4 ? 'grid-cols-3' : '' }} {{ count($methods) === 4 ? 'grid-cols-4' : '' }}">
                        @foreach ($methods as $method)
                            <button type="button" wire:click="$set('appointment.method_id','{{ $method->id }}')"
                                class="relative overflow-hidden p-3 w-full flex  flex-col items-center rounded-md  shadow  border focus:outline-none bg-white border-white  focus:shadow-inner {{ $appointment->method_id === $method->id ? 'text-blue-500 ring-2 ring-blue-500' : 'text-gray-700 hover:border-gray-300' }}">
                                <span class="flex items-center justify-center h-5 w-5">
                                    <x-icon.solid :icon="$method->icon" />
                                </span>
                                <span class="text-sm mt-2 text-gray-700">{{ $method->name }}</span>
                                <span
                                    class="text-xs text-gray-400">${{ number_format($method->pivot->amount / 100, 2, '.', ' ') }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>





            @elseif( $this->steps()->current === 'times' )
                <div class="flex mb-10 mx-10">
                   
                    <x-field type="date-range" required wire:model:from="appointment.start_at" wire:model:to="appointment.end_at">
                        <x-slot name="label">
                            <div class="flex font-semibold text-gray-600 text-sm leading-loose select-none  ">
                                <div class="w-1/2">Start</div>
                                <div class="w-1/2 pl-3 flex items-center justify-between">
                                    <span>
                                    End
                                    </span> 
                                    <button class="border-none text-xs bg-transparent text-blue-500 flex items-center">
                                        <span class="h-3 w-3 mr-1"><x-icon.solid icon="clock"/></span>
                                        Find time
                                    </button>
                                </div>
                            </div>
                        </x-slot>
                    </x-field>


                </div>
            @elseif( $this->steps()->current === 'confirm' )
                <div class="flex">
                    <x-ui.form.field type="toggle" name="notify_client" label="Notify client" model="notify_client" />
                </div>
                <div class="flex">
                    <x-ui.form.field type="toggle" name="notify_user" label="Notify counsellor" model="notify_user" />
                </div>
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
                    <x-ui.button.primary bold wire:click="{{ $this->steps()->loads('next', []) }}">Next
                    </x-ui.button.primary>
                @else
                    <x-button.positive bold type="submit">Confirm</x-button.positive>
                @endif
            </span>
        </x-ui.modal.actions>


    </x-ui.modal.window>
</form>
