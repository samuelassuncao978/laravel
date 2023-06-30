 <div class="fixed inset-0 bg-black bg-opacity-50 z-50">
     <div
         class="bg-white absolute flex flex-col top-20 rounded-t-3xl shadow-2xl bottom-0 left-1/2 transform -translate-x-1/2 w-5/6 z-20">



         <button type="button"
             class="absolute top-5 text-gray-700 right-5 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
             wire:click="$emitUp('cancel','edit-note')">
             <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                 <path
                     d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
             </svg>

         </button>



         <div class="flex flex-grow overflow-hidden divide-gray-100 divide-x-8">
             @include('pages.appointments.appointment.pane-client')
             @include('pages.appointments.appointment.pane-appointment')
             <div class="w-1/3 flex flex-col divide-gray-100 divide-y-8">
                 @include('pages.appointments.appointment.pane-notes')
                 @include('pages.appointments.appointment.pane-files')
             </div>
         </div>
         <div class="p-2 border-t border-gray-400 bg-gray-100 flex">
             <div class="flex items-center">

                 <div class="flex divide-x divide-gray-400">
                     @if (empty($appointment->arrived_at) && empty($appointment->cancelled_at))
                         <div class="px-2">
                             <x-button.destructive bold type="button"
                                 wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Cancel', ['appointment' => $appointment]) }}">
                                 <span class="h-4 w-4 mr-2">
                                     <x-icon.solid icon="ban" />
                                 </span>
                                 Cancel
                             </x-button.destructive>
                         </div>
                     @endif
                     @if (!empty($appointment->cancelled_at))

                         <div class="px-2">
                             <x-button.destructive bold type="button"
                                 wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Delete', ['appointment' => $appointment]) }}">
                                 <span class="h-4 w-4">
                                     <x-icon.solid icon="trash" />
                                 </span>
                             </x-button.destructive>
                         </div>
                         <div class="px-2">
                             <x-button.secondary bold type="button"
                                 wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Reinstate', ['appointment' => $appointment]) }}">
                                 Reinstate</x-button.secondary>
                         </div>



                     @endif
                     @if (empty($appointment->cancelled_at))
                         @if (empty($appointment->arrived_at))
                             <div class="px-2">
                                 <x-button.secondary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Arrive', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="clipboard-check" />
                                     </span>
                                     Arrived
                                 </x-button.secondary>
                             </div>
                         @endif
                         @if (!empty($appointment->arrived_at) && empty($appointment->seen_at))
                             <div class="px-2">
                                 <x-button.secondary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Unarrive', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="rewind" />
                                     </span>
                                     Cancel check-in
                                 </x-button.secondary>
                             </div>
                         @endif
                         @if (!empty($appointment->arrived_at) && empty($appointment->seen_at))
                             <div class="px-2">
                                 <x-ui.button.primary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Admit', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="clipboard-copy" />
                                     </span>
                                     Admit
                                 </x-ui.button.primary>
                             </div>
                         @endif
                         @if (!empty($appointment->arrived_at) && !empty($appointment->seen_at) && empty($appointment->discharged_at))
                             <div class="px-2">
                                 <x-button.secondary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\ReturnToWaiting', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="rewind" />
                                     </span>
                                     Return to waiting
                                 </x-button.secondary>
                             </div>
                         @endif
                         @if (!empty($appointment->arrived_at) && !empty($appointment->seen_at) && empty($appointment->discharged_at))
                             <div class="px-2">
                                 <x-ui.button.primary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Discharge', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="save" />
                                     </span>
                                     Discharge
                                 </x-ui.button.primary>
                             </div>
                         @endif
                         @if (!empty($appointment->arrived_at) && !empty($appointment->seen_at) && !empty($appointment->discharged_at))
                             <div class="px-2">
                                 <x-button.secondary bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Readmit', ['appointment' => $appointment]) }}">
                                     Readmit
                                 </x-button.secondary>
                             </div>
                         @endif
                     @endif
                     @if (optional($appointment->method)->name === 'Video')
                         <div class="px-2 flex">


                             <div class="rounded flex overflow-hidden">

                                 <x-button.secondary grouped bold type="button"
                                     href="javascript:window.open('/attend/{{ base64_encode(json_encode(['appointment' => $appointment->id, 'user' => auth()->guard('admin')->user()->id])) }}', 'Video', `toolbar=no, menubar=no, width=1200, height=800, top=${((screen.height - 800) / 4)}, left=${((screen.width - 1200) / 2)}`);">
                                     <span class="h-4 w-4 mr-2">
                                         <x-icon.solid icon="video-camera" />
                                     </span>
                                     Attend
                                 </x-button.secondary>
                                 <x-button.secondary grouped bold type="button"
                                     wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\AttendQR', ['appointment' => $appointment]) }}">
                                     <span class="h-4 w-4">
                                         <x-icon.solid icon="qrcode" />
                                     </span>
                                 </x-button.secondary>
                             </div>
                         </div>
                     @endif
                 </div>

             </div>

             <div class="flex items-center ml-auto">
                 <div class="flex divide-x divide-gray-400">
                     <div class="px-2">
                         <x-button.secondary bold type="button"
                             wire:click="{{ $this->opens('App\Http\Livewire\Admin\Appointments\Resend', ['appointment' => $appointment]) }}">
                             Resend confirmation
                         </x-button.secondary>
                     </div>

                     <div class="px-2">
                         <x-button.positive bold wire:click="save" type="button">Save changes</x-button.positive>
                     </div>
                 </div>

             </div>

         </div>




     </div>






     @if ($this->on('App\Http\Livewire\Admin\Accounting\Payment'))
         @livewire('admin.accounting.payment',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Accounting\Payment')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Accounting\Refund'))
         @livewire('admin.accounting.refund',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Accounting\Refund')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Accounting\Send'))
         @livewire('admin.accounting.send',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Accounting\Send')))
     @endif


     @if ($this->on('App\Http\Livewire\Admin\Appointments\Delete'))
         @livewire('admin.appointments.delete',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Delete')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Cancel'))
         @livewire('admin.appointments.cancel',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Cancel')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Reinstate'))
         @livewire('admin.appointments.reinstate',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Reinstate')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Arrive'))
         @livewire('admin.appointments.arrive',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Arrive')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Discharge'))
         @livewire('admin.appointments.discharge',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Discharge')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Admit'))
         @livewire('admin.appointments.admit',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Admit')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Readmit'))
         @livewire('admin.appointments.readmit',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Readmit')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Unarrive'))
         @livewire('admin.appointments.unarrive',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Unarrive')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\Resend'))
         @livewire('admin.appointments.resend',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\Resend')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\ReturnToWaiting'))
         @livewire('admin.appointments.return-to-waiting',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\ReturnToWaiting')))
     @endif

     @if ($this->on('App\Http\Livewire\Admin\Appointments\AttendQR'))
         @livewire('admin.appointments.attend-q-r',
         array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Appointments\AttendQR')))
     @endif

 </div>
