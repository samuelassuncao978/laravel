<div class="flex flex-col flex-grow overflow-hidden h-full">


    <div>
        @if ($this->on('App\Http\Livewire\Admin\Appointments\Create'))
            @livewire('admin.appointments.create', $this->parameters('App\Http\Livewire\Admin\Appointments\Create'))
        @endif
        </div>
        <div>
        @if ($this->on('App\Http\Livewire\Admin\Appointments\Appointment'))
            @livewire('admin.appointments.appointment',
            $this->parameters('App\Http\Livewire\Admin\Appointments\Appointment'))
        @endif
        </div>

    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <x-ui.action-bar.find label="Find:" />
            <x-ui.action-bar.group>
                <x-ui.action-bar.group-option :active="$this->group_by===''" wire:click="$set('group_by','')">None
                </x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='month'" wire:click="$set('group_by','month')">
                    Month</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='type'" wire:click="$set('group_by','type')">
                    Type</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='method'"
                    wire:click="$set('group_by','method')">Method</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='status'"
                    wire:click="$set('group_by','status')">Status</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
            <span class="pl-3">
                    <livewire:common.scope-withheld />
                </span>
        </div>

        <div class="inline-block ml-auto">
            <x-ui.button.standard compact bold
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Create', ['client' => $client]) }}">
                Create appointment
            </x-ui.button.standard>
        </div>
    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">


            @if (count($appointments ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Start</x-ui.table.column>
                            <x-ui.table.column class="pt-5">End</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Duration</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Waiting time</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Rate</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Payee</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Method</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Type</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Status</x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($appointments as $key => $appointment)
                                <tr   class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $appointment->deleted_at ? 'opacity-25' :'' }}"
                               
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Appointment', ['appointment' => $appointment]) }}">
                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            <x-ui.timestamp :date="$appointment->start_at" local="Y-m-d H:i" />
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            <x-ui.timestamp :date="$appointment->end_at" local="Y-m-d H:i" />
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex items-center">
                                            <span class="text-xs">
                                                {{ $appointment->duration }}
                                            </span>
                                            @if ($appointment->status === 'attended')
                                                <span
                                                    class="text-gray-400 text-xs">&nbsp;/&nbsp;{{ $appointment->actual_duration }}</span>
                                            @endif
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex text-xs">
                                            {{ $appointment->waiting_time }}
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex text-xs">
                                            @if ($appointment->paid !== 0)
                                                <span
                                                    class="text-green-700">${{ number_format($appointment->due / 100, 2, '.', ' ') }}</span>&nbsp;/&nbsp;${{ number_format($appointment->amount / 100, 2, '.', ' ') }}
                                            @else
                                                ${{ number_format($appointment->due / 100, 2, '.', ' ') }}
                                            @endif
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex text-xs">
                                            Client
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        @if ($appointment->method)
                                            <div class="flex text-xs">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.solid :icon="$appointment->method->icon" />
                                                </span>
                                                {{ $appointment->method->name }}
                                            </div>
                                        @endif
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        @if ($appointment->type)
                                            <div class="flex text-xs">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.solid :icon="$appointment->type->icon" />
                                                </span>
                                                {{ $appointment->type->name }}
                                            </div>
                                        @endif
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <x-ui.status :text="$appointment->status" :value="$appointment->status"
                                            :options="['bg-teal-500' => 'confirmed','bg-yellow-500' => 'cancelled','bg-red-500' => 'unattended','bg-green-500' => 'attended','bg-purple-500' => 'in-waiting','bg-blue-500' => 'in-progress','bg-gray-500' => 'late']" />


                                    </x-ui.table.cell>
                                </tr>
                            @endforeach
                        @endslot
                    </x-ui.table>
                </div>
            @else
                <div class="h-full flex items-center justify-center">

                    @if (empty($this->search))
                        <x-common.empty-notice title="No appointments">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No appointments found">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $appointments->total() }} Appointments</div>

            <div class="pl-4">
                <x-ui.status text="0 Confirmed" value="true" :options="['bg-teal-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Attended" value="true" :options="['bg-green-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Cancelled" value="true" :options="['bg-yellow-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Unattented" value="true" :options="['bg-red-500' => 'true']" />
            </div>

        </div>
        <div class="ml-auto"> {{ $appointments->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
