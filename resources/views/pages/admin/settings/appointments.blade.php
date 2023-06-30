<form wire:submit.prevent="save" class="flex flex-col overflow-hidden">
    <div class="bg-gray-50">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Appointments</h1>
            <p class="text-sm text-gray-500">Terms & privacy policy</p>
        </div>
    </div>
    <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="inline-block ml-auto">
            <x-button.positive compact bold type="submit">
                Save changes
            </x-button.positive>
        </div>
    </div>

     <div class="flex-grow scrollbar">
        <section class="p-10 space-y-4">
            @foreach ($appointment_types as $type)
         <div class="flex flex-col border border-gray-200 rounded shadow-sm">
                    <div class="w-full">
                        <div class="flex items-center px-4 p-2">
                            <span class="h-6 w-6 mr-2 text-blue-500">
                                <x-icon.solid :icon="$type->icon" />
                            </span>
                            <h3 class="text-gray-700 text-sm font-bold">{{ $type->name }}</h3>
                            <span class="ml-auto -mr-4"><x-ui.form.field type="toggle" name="user_appointment_types.{{ $type->id }}.enabled" model="user_appointment_types.{{ $type->id }}.enabled" inline /></span>
                        </div>
                    </div>
                    @if(optional($user_appointment_types[$type->id])['enabled'])
                    <div class="flex border-t border-gray-200 pb-2">

                         <div class="w-full flex flex-wrap">
                           <div class="flex w-full px-1">
                                <div class="w-1/2 flex"><x-ui.form.field type="text" name="user_appointment_types.{{ $type->id }}.duration" model="user_appointment_types.{{ $type->id }}.duration" label="duration" bold /></div>
                                <div class="w-1/2 flex"><x-ui.form.field type="currency" name="user_appointment_types.{{ $type->id }}.charge" model="user_appointment_types.{{ $type->id }}.charge" label="charge" bold /></div>
                            </div>
                            <div class="w-full px-4 p-2 pt-4 space-y-2">
                                <div class="flex items-cener uppercase tracking-wide text-gray-700 text-xs font-bold mr-4">Accepted methods:</div>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($type->appointment_methods as $method)
                                        <div class="flex items-center bg-gray-100 rounded p-3">
                                            <span class="h-4 w-4 mr-2 text-blue-500">
                                                <x-icon.solid :icon="$method->icon" />
                                            </span>
                                            <h3 class="text-gray-700 text-xs font-bold">{{ $method->name }}</h3>
                                            <span class="ml-auto -mr-4"><x-ui.form.field type="toggle" name="user_appointment_types.{{ $type->id }}.methods.{{ $method->id }}.enabled" model="user_appointment_types.{{ $type->id }}.methods.{{ $method->id }}.enabled" inline /></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach





        </section>
    </div>

</form>
