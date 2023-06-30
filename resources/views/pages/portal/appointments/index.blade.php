
     <div class="bg-white m-4  flex-1  lg:m-8 flex flex-col">

    @if ($this->on('App\Http\Livewire\Portal\AppointmentResend'))
        @livewire('portal.appointments.resend', $this->parameters('App\Http\Livewire\Portal\AppointmentResend'))
    @endif

    @if ($this->on('App\Http\Livewire\Portal\AppointmentCancel'))
        @livewire('portal.appointments.cancel', $this->parameters('App\Http\Livewire\Portal\AppointmentCancel'))
    @endif


    <div class="my-5 text-2xl text-gray-600 font-semibold flex">Appointments</div>

    <div class="flex flex-wrap -mx-4">
        <div class="w-full xl:w-2/6 p-4">
            <div class="bg-blue-100 rounded-2xl h-72 p-5 relative overflow-hidden flex flex-col">
                <div class="font-bold text-lg relative z-10 text-gray-700 mb-3">Next appointment</div>
                <div class="h-32 w-32 absolute -bottom-5 right-0 text-white opacity-30">
                    <x-icon.solid icon="cursor-click" />
                </div>

                <div
                    class="relative flex-grow items-center justify-center overflow-hidden flex flex-col focus:outline-none border bg-white bg-opacity-20 border-blue-200 rounded-lg p-3">
                    @if ($next)
                        <div class="flex ">
                            <div class="flex">
                                <div class="block rounded-t overflow-hidden bg-white text-center w-24">
                                    <div class="bg-blue-500 text-white py-1">
                                        {{ $next->start_at->format('M') }}
                                    </div>
                                    <div class="pt-1 border-l border-r">
                                        <span class="text-4xl font-bold">{{ $next->start_at->format('d') }}</span>
                                    </div>
                                    <div class="pb-2 px-2 border-l border-r border-b rounded-b flex justify-between">
                                        <span class="text-xs font-bold">{{ $next->start_at->format('D') }}</span>
                                        <span class="text-xs font-bold">{{ $next->start_at->format('Y') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="flex-grow pl-8 flex flex-col justify-center">

                                <span class="flex items-center">
                                    <span class="flex flex-col items-center mr-3 w-8 h-8">
                                        <x-ui.avatar :name="$next->users()->first()->name" rounded="rounded-md"
                                            color="bg-gray-600" long />
                                    </span>
                                    <span class="font-bold">
                                        {{ optional($next->users()->first())->name }}
                                    </span>
                                </span>

                                <div class="flex space-x-8 mt-4">
                                    <span class="flex items-center uppercase text-xs text-gray-600">
                                        <span class="h-6 w-6 mr-2">
                                            <x-icon.solid icon="clock" />
                                        </span>
                                        {{ $next->start_at->format('g:i a') }}
                                    </span>
                                    <span class="flex items-center uppercase text-xs text-gray-600">
                                        <span class="h-6 w-6 mr-2">
                                            <x-icon.solid :icon="optional($next->method)->icon" />
                                        </span>
                                        {{ optional($next->method)->name }}
                                    </span>
                                </div>



                            </div>
                        </div>
                        <div class="flex space-x-4 mt-4 text-gray-700 border-t border-blue-200 pt-2">
                            @if (optional($next->method)->name === 'Video')
                                <button
                                    class="focus:outline-none flex flex-grow items-center justify-center rounded-sm p-1 px-5 group hover:bg-green-500 hover:text-white">
                                    <span class="h-4 w-4 mr-2 text-green-500 group-hover:text-white">
                                        <x-icon.solid icon="phone-outgoing" />
                                    </span>
                                    Attend
                                </button>
                            @endif
                            <button
                                class="focus:outline-none flex flex-grow items-center justify-center rounded-sm p-1 px-5 group hover:bg-red-500 hover:text-white"
                                wire:click="{{ $this->opens('App\Http\Livewire\Portal\AppointmentCancel') }}">
                                <span class="h-4 w-4 mr-2 text-red-500 group-hover:text-white">
                                    <x-icon.solid icon="ban" />
                                </span>
                                Cancel
                            </button>
                            <button
                                class="focus:outline-none flex flex-grow items-center justify-center rounded-sm p-1 px-5 group hover:bg-blue-500 hover:text-white"
                                wire:click="{{ $this->opens('App\Http\Livewire\Portal\AppointmentResend') }}">
                                <span class="h-4 w-4 mr-2 text-blue-500 group-hover:text-white">
                                    <x-icon.solid icon="mail" />
                                </span>
                                Resend
                            </button>
                        </div>
                    @else
                        <div class="flex flex-col flex-grow">
                            None
                        </div>
                    @endif
                </div>


            </div>
        </div>
        <div class="w-full xl:w-4/6 p-4">
            <div class="bg-gray-100 rounded-2xl p-5 h-72 relative overflow-hidden flex flex-col">
                <div class="font-bold text-lg relative z-10 text-gray-700 mb-3">Upcoming appointments</div>
                <div class="h-32 w-32 absolute top-2 right-0 text-blue-500 opacity-10">
                    <x-icon.outline icon="clipboard-check" />
                </div>

                <div class="z-10 relative flex-grow bg-gray-50 bg-opacity-50 rounded-lg p-3 border border-gray-200">
                    @include('pages.portal.chart')
                </div>

            </div>
        </div>
    </div>


    <div class="-mx-4 flex flex-wrap">


        <div class="bg-blue-50 bg-opacity-30 flex-col flex-grow flex overflow-hidden m-5 p-10 rounded-3xl">
            <div class="relative z-10  flex-grow scrollbar">
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
            <div class="flex">
                <div class="ml-auto">{{ $appointments->onEachSide(1)->links('components.ui.pagination') }}
                </div>
            </div>
        </div>

    </div>




</div>
