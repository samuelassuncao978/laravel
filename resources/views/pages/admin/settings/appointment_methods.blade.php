<div class="flex flex-col flex-grow overflow-hidden h-full">

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Create'))
        @livewire('admin.appointment-methods.create', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Delete'))
        @livewire('admin.appointment-methods.delete', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Recover'))
        @livewire('admin.appointment-methods.recover', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Recover'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Edit'))
        @livewire('admin.appointment-methods.edit', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Edit'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Users'))
        @livewire('admin.appointment-methods.users', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Users'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\AppointmentMethods\Types'))
        @livewire('admin.appointment-methods.types', $this->parameters('App\Http\Livewire\Admin\AppointmentMethods\Types'))
    @endif

    <div class="bg-gray-50 border-b border-gray-100">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Appointment methods</h1>
            <p class="text-sm text-gray-500">Configure &amp; manage system appointment methods</p>
        </div>
    </div>
    <div class="border-t border-white">
        <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
            <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
                <x-ui.action-bar.find label="Find:" />
                <span class="pl-3">
                    <livewire:common.scope-withheld />
                </span>
            </div>

            <div class="inline-block ml-auto">
                <x-ui.button.standard compact bold
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Create') }}">
                    Create
                </x-ui.button.standard>
            </div>
        </div>
    </div>

    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($appointment_methods ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Name</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Methods</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($appointment_methods as $key => $appointment_method)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $appointment_method->deleted_at ? 'opacity-25' :'' }}"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Edit', ['appointment_method' => $appointment_method]) }}">
                                    <x-ui.table.cell collapse>
                                        <div class="flex items-center w-52">
                                            <span class="h-4 w-4 mr-2 text-gray-500">
                                                <x-icon.solid :icon="$appointment_method->icon" />
                                            </span>
                                            <span class="text-xs">
                                                {{ $appointment_method->name }}
                                            </span>
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            {{ implode(', ',$appointment_method->appointment_types->pluck('name')->toArray()) }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex justify-end">
                                            <div class="flex space-x-1">
                                            <div class="flex w-40">
                                                <x-button.standard compact
                                                    wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Users', ['appointment_method' => $appointment_method]) }}">
                                                    Users <span class="ml-2 text-blue-500 font-semibold">{{ $appointment_method->users->count() }}</span>
                                                </x-button.standard>
</div>
<div class="flex w-40">
                                                <x-button.standard compact
                                                    wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Types', ['appointment_method' => $appointment_method]) }}">
                                                    Types <span class="ml-2 text-blue-500 font-semibold">{{ $appointment_method->appointment_types->count() }}</span>
                                                </x-button.standard>
</div>
                                                @if(empty($appointment_method->deleted_at))
                                                 <x-ui.button.clear compact
                                                        wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Delete', ['appointment_method' => $appointment_method]) }}">
                                                    <span class="h-4 w-4 text-red-600 group-hover:text-red-800">
                                                            <x-icon.solid icon="trash" />
                                                        </span>
                                                    </x-ui.button.clear>
                                                @else
                                                    <x-ui.button.clear compact
                                                        wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\AppointmentMethods\Recover', ['appointment_method' => $appointment_method]) }}">
                                                        <span class="h-4 w-4 text-orange-600 group-hover:text-orange-800">
                                                            <x-icon.solid icon="save" />
                                                        </span>
                                                    </x-ui.button.clear>
                                                @endif
                                            </div>
                                        </div>
                                    </x-ui.table.cell>
                                </tr>
                            @endforeach
                        @endslot
                    </x-ui.table>
                </div>
            @else
                <div class="h-full flex items-center justify-center">
                    @if (empty($this->search))
                        <x-common.empty-notice title="No appointment methods">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No appointment methods found">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $appointment_methods->total() }} Appointment methods</div>
        </div>
        <div class="ml-auto"> {{ $appointment_methods->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
