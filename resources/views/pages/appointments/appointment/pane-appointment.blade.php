<div class="w-1/3 flex overflow-hidden">
    <div class="flex flex-col flex-grow overflow-hidden">

        <x-modal.masthead title="Appointment">
            @slot('information')

                <div class="-ml-2">
                    <x-ui.status :text="$appointment->status" :value="$appointment->status"
                        :options="['bg-teal-500' => 'confirmed','bg-yellow-500' => 'cancelled','bg-red-500' => 'unattended','bg-green-500' => 'attended','bg-purple-500' => 'in-waiting','bg-blue-500' => 'in-progress','bg-gray-500' => 'late']" />

                </div>
                <div>Next: <span class="text-blue-500">
                        @if ($next_appointment)
                            {{ optional($next_appointment->start_at)->format('H:i D jS M') }}
                        @else
                            Not scheduled
                        @endif
                    </span></div>
            @endslot
            @slot('actions')
                <div
                    class="relative text-xs pr-6 overflow-hidden rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center uppercase">
                    <span class="w-4 h-4 block mr-2">
                        <x-icon.solid icon="folder-open" />
                    </span>
                    {{ substr($appointment->id, 0, 8) }}
                    <select class=" absolute opacity-0 inset-0 appearance-none focus:outline-none"
                        wire:change="switch($event.target.value)">
                        @php
                            $appointments = $client
                                ->appointments()
                                ->owned()
                                ->get();
                        @endphp
                        @foreach ($appointments as $a)
                            <option wire:key="{{ $a->id }}" value="{{ $a->id }}" {!! $appointment->id === $a->id ? 'selected' : '' !!}>
                                {{ optional($a->start_at)->format('H:i d-m') }} &rArr; {{ optional($a->method)->name }} &bull;
                                {{ optional($a->type)->name }}
                            </option>
                        @endforeach
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4/6 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>

                    <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="switch">
                        <x-ui.loading-indicator :loading="true" spinner="border-gray-500" small
                            bg="bg-opacity-50 bg-white" />
                    </div>
                </div>
            @endslot
        </x-modal.masthead>


        <div
            class="flex space-y-4 flex-col overflow-auto flex-grow pt-5 bg-gray-50 border-t borrder-b border-gray-200 p-10 scrollbar scrollbar-thumb-gray-300">



      
            <div class="flex">
           
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



            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-field type="select" name="type_id" label="Type"
                        :options="$types->map(function($type){ return ['text'=>$type->name,'id'=>$type->id]; })->toArray()"
                        bold wire:model="appointment.type_id" />
                </div>
                <div class="w-1/2">
                    <x-field type="select" name="method_id" label="Method"
                        :options="$methods->map(function($type){ return ['text'=>$type->name,'id'=>$type->id]; })->toArray()"
                        wire:model="appointment.method_id" bold />
                </div>
            </div>



            <div class="text-md border-b border-gray-300 pb-2 pt-5 font-bold text-gray-700 tracking-wide">
                Billing
            </div>

            <div class="w-full divide-gray-200 divide-y">
                <div class="flex items-center mb-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-bold">Payee</div>
                    <x-field type="select" name="payee" bold inline wire:model="appointment.payee" default="client"
                        :options="[['text'=>'Client','id'=>'client'],['text'=>'Employer','id'=>'employer']]" />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-bold">Voucher</div>
                    <div class="flex flex-grow relative">
                        <x-field type="text" name="voucher" bold inline wire:model="voucher_id" />
                     
                        @if($this->appointment->vouchers()->first())
                        <button wire:click="removeVoucher" type="button"
                            class="absolute focus:outline-none flex items-center justify-center right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <span class="w-4 h-4">
                                <x-icon.solid icon="x" />
                            </span>
                        </button>
                        @else
                        <button wire:click="attachVoucher" type="button"
                            class="absolute focus:outline-none flex items-center justify-center right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <span class="w-4 h-4">
                                <x-icon.solid icon="arrow-circle-right" />
                            </span>
                        </button>
                        @endif

                    </div>
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 flex-shrink-0 uppercase tracking-wide text-gray-700 text-xs font-bold">Amount due</div>
                    <div class="flex flex-grow p-2 pl-4 bg-gray-200 items-center rounded">
                    
                        <div class=" text-sm text-gray-700 font-bold">

                            @if ($appointment->paid !== 0)
                                <span
                                    class="text-green-700">${{ number_format($appointment->due / 100, 2, '.', ' ') }}</span>
                                / ${{ number_format($appointment->amount / 100, 2, '.', ' ') }}
                            @else
                                ${{ number_format($appointment->due / 100, 2, '.', ' ') }}
                            @endif
                        </div>
                        <div class="ml-auto flex space-x-1 max-w-full overflow-hidden">

                        @if($appointment->payee !== 'client')
                            <div class="mr-4 flex flex-col text-xs flex-1 overflow-hidden ">
                                <div>Transfered to:</div>
                                @if($appointment->payee === 'employer')
                                    <div class="font-semibold truncate">{{ optional(App\Models\Employer::find($employer_id))->name; }}</div>
                                @elseif($appointment->payee === 'health-fund')
                                    <div>Health fund</div>  
                                @endif

                            </div>
                        @else

                            @if ($appointment->due > 0)
                                <button
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Accounting\Payment', ['appointment' => $appointment]) }}"
                                    class="shadow py-2 px-3 bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden">
                                    <span class="h-4 w-4 mr-2">
                                        <x-icon.solid icon="credit-card" />
                                    </span>
                                    Pay
                                </button>
                                <button
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Accounting\Send', ['appointment' => $appointment]) }}"
                                    class="shadow py-2 px-3 bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden">
                                    <span class="h-4 w-4">
                                        <x-icon.solid icon="link" />
                                    </span>
                                </button>
                            @elseif($appointment->paid > 0)
                                <button
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Accounting\Refund', ['appointment' => $appointment]) }}"
                                    class="shadow py-2 px-3 bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden">
                                    <span class="h-4 w-4 mr-2">
                                        <x-icon.solid icon="credit-card" />
                                    </span>
                                    Refund
                                </button>
                            @endif

                        @endif

                        </div>
                      
                    </div>
                </div>
            </div>



            <div class="text-md border-b border-gray-300 pb-2 font-bold text-gray-700 tracking-wide pt-5">
                Case details
            </div>
            <div class="flex ">
                <x-field type="textarea" name="details" label="Details" model defer bold :private="$this->is_owned" />
            </div>

            <div class="flex">
                <x-field type="select" name="details" label="Previous therapy experience" model defer bold />
            </div>




        </div>


    </div>
</div>
