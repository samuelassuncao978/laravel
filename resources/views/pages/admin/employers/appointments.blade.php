<div class="flex flex-col flex-grow overflow-hidden h-full">
    


    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="inline-block ml-auto">
          
        </div>
    </div>
    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($appointments ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Appointment</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Start</x-ui.table.column>
                            <x-ui.table.column class="pt-5">End</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Amount</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($appointments as $key => $appointment)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer">

                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            {{ $appointment->id }}
                                        </span>
                                    </x-ui.table.cell>
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
                                        <div class="flex text-xs">
                                            @if ($appointment->paid !== 0)
                                                <span
                                                    class="text-green-700">${{ number_format($appointment->due / 100, 2, '.', ' ') }}</span>&nbsp;/&nbsp;${{ number_format($appointment->amount / 100, 2, '.', ' ') }}
                                            @else
                                                ${{ number_format($appointment->due / 100, 2, '.', ' ') }}
                                            @endif
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                      
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
        </div>
        <div class="ml-auto"> {{ $appointments->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
