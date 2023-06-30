<div class="flex flex-col">

    @if ($this->on('App\Http\Livewire\Admin\Users\ChangePassword'))
        @livewire('admin.users.change-password', $this->parameters('App\Http\Livewire\Admin\Users\ChangePassword'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Users\Impersonate'))
        @livewire('admin.users.impersonate', $this->parameters('App\Http\Livewire\Admin\Users\Impersonate'))
    @endif



    <form wire:submit.prevent="save" class="flex flex-col overflow-hidden">
        <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
            <div class="space-x-4 flex">
                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Users\Impersonate', ['user' => $user]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="key" />
                    </span>
                    Impersonate
                </x-ui.button.standard>

                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Users\ChangePassword', ['user' => $user]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="finger-print" />
                    </span>
                    Change password
                </x-ui.button.standard>
            </div>

            <div class="inline-block ml-auto">
                <x-button.positive compact bold type="submit">
                    Save changes
                </x-button.positive>
            </div>
        </div>

        <div class=" flex-grow scrollbar">



            <section class="p-10">

                <div class="flex">
                    <div class="w-1/4">
                        <h3 class="text-gray-700 text-sm font-bold">Personal Details</h3>
                        <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                    </div>

                    <div class="w-1/4 mr-5">
                        <x-ui.form.field type="text" name="name" label="Name"
                            :value="old('name', optional($user??[])->name)" bold required />

                        <x-ui.form.field type="text" name="email" label="Email"
                            :value="old('email', optional($user??[])->email)" bold required />

                        <x-ui.form.field type="address" name="address" label="address"
                            :value="old('address', optional($user??[])->address)" bold required />
                    </div>

                    <div class="w-1/4">
                        <x-ui.form.field type="file" name="user.photo" label="Photo" model="user.photo" bold required />
                    </div>

                </div>

                <hr class="border border-gray-200 my-10">

                <div class="flex">
                    <div class="w-1/4">
                        <h3 class="text-gray-700 text-sm font-bold">Appointments</h3>
                        <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                    </div>

                    <div class="w-3/4">






                        <div class="sm:p-7 p-4">
                            <x-ui.table>
                                @slot('columns')
                                    <x-ui.table.column class="pt-5"></x-ui.table.column>
                                    <x-ui.table.column class="pt-5">Type</x-ui.table.column>
                                    <x-ui.table.column class="pt-5">Time</x-ui.table.column>
                                    <x-ui.table.column class="pt-5">Amount</x-ui.table.column>
                                @endslot
                                @slot('rows')
                                    @foreach ($appointment_types as $key => $type)
                                        <tr class="">
                                    <x-ui.table.cell collapse>
                                        <x-ui.form.field type="
                                            toggle" name="selected.{{ $type->id }}"
                                            model="selected.{{ $type->id }}" />
                                        {{ isset($this->selected[$type->id]) ? 'set' : 'unset' }}

                                        </x-ui.table.cell>
                                        <x-ui.table.cell>
                                            <span class="text-xs flex">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.solid :icon="$type->icon" />
                                                </span>
                                                {{ $type->name }}
                                            </span>
                                        </x-ui.table.cell>
                                        <x-ui.table.cell collapse>
                                            <span class="flex w-40 -mx-3">
                                                <x-ui.form.field type="text" name="amount" bold />
                                            </span>
                                        </x-ui.table.cell>
                                        <x-ui.table.cell collapse>
                                            <span class="flex w-40 -mx-3">
                                                <x-ui.form.field type="currency" name="curr"
                                                    model="user_appointment_types.{{ $type->id }}.pivot.amount" bold />
                                            </span>
                                        </x-ui.table.cell>
                                        </tr>
                                    @endforeach
                                @endslot
                            </x-ui.table>
                        </div>





                    </div>

                </div>

            </section>



        </div>




    </form>
</div>
