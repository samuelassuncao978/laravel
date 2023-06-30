<div class="flex flex-grow">
    <x-sidebar>
        @include('pages.calendar.sidebar')
    </x-sidebar>
    <x-main :action="$action??null" :method="$method??null">

        @if ($this->action('time-off'))
            <livewire:modal view="pages.calendar.actions.time-off"
                controller="\App\Http\Controllers\AppointmentsController@arrived" action="time-off"
                parent="calendar.calendar" :set="$this->payload('time-off')" />
        @endif

        @if ($this->action('splash'))
            <livewire:modal view="pages.calendar.actions.calendar-splash"
                controller="\App\Http\Controllers\AppointmentsController@arrived" action="time-off"
                parent="calendar.calendar" :set="$this->payload('time-off')" />
        @endif

        


        <div class="text-gray-700 overflow-hidden flex flex-grow  p-8 relative">

            <div class="flex flex-grow overflow-hidden">

                <div class="flex flex-col flex-grow">
                    <div class="flex items-center mb-4 ">


                        <h2 class="ml-2 text-xl font-bold leading-none">{{ $this->selected->format('F') }},
                            {{ $this->selected->format('Y') }}</h2>
                        <div class="flex ml-auto space-x-4">


                            <button wire:click="invoke('time-off')"
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="clock" />
                                </span>
                                Time off
                            </button>

                            <button
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="cog" />
                                </span>
                                Configuration
                            </button>


                            <div class="flex justify-center items-center group cursor-pointer"
                                wire:click="$toggle('show_monthly')">
                                <span
                                    class="transition transition-all ease {{ !$this->show_monthly ? 'text-gray-800 group-hover:text-gray-700' : 'text-gray-400 group-hover:text-gray-500' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <div
                                    class="w-10 h-4 flex items-center bg-gray-300 rounded-full ransition transition-all ease mx-3 px-1 {{ $this->show_monthly ? 'bg-blue-500 group-hover:bg-blue-700' : 'bg-gray-500 group-hover:bg-gray-700' }}">
                                    <div
                                        class="bg-white w-2 h-2 rounded-full shadow-md transition transition-all ease transform {{ $this->show_monthly ? 'translate-x-6' : 'translate-x-none' }}">
                                    </div>
                                </div>
                                <span
                                    class="transition transition-all ease {{ $this->show_monthly ? 'text-gray-800 group-hover:text-gray-700' : 'text-gray-400 group-hover:text-gray-500' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </div>

                            <div class="flex justify-center items-center group cursor-pointer"
                                wire:click="$toggle('show_organization')">
                                <span
                                    class="transition transition-all ease {{ !$this->show_organization ? 'text-gray-800 group-hover:text-gray-500' : 'text-gray-400 group-hover:text-gray-700' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <div
                                    class="w-10 h-4 flex items-center bg-gray-300 rounded-full ransition transition-all ease mx-3 px-1 {{ $this->show_organization ? 'bg-blue-500 group-hover:bg-blue-700' : 'bg-gray-500 group-hover:bg-gray-700' }}">
                                    <div
                                        class="bg-white w-2 h-2 rounded-full shadow-md transition transition-all ease transform {{ $this->show_organization ? 'translate-x-6' : 'translate-x-none' }}">
                                    </div>
                                </div>
                                <span
                                    class="transition transition-all ease {{ $this->show_organization ? 'text-gray-800 group-hover:text-gray-500' : 'text-gray-400 group-hover:text-gray-700' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                            </div>
                        </div>


                        <div class="flex space-x-1 ml-4">
                            <button
                                class="prev flex-shrink-0 bg-gray-600 hover:bg-gray-800 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button
                                class="prev flex-shrink-0 bg-gray-600 hover:bg-gray-800 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 py-0.5 px-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>


                    </div>
                    @if ($this->show_organization)
                        @if ($this->show_monthly)
                            @include('pages.calendar.calendar-organization-monthly')
                        @else
                            @include('pages.calendar.calendar-organization-daily')
                        @endif
                    @else
                        @if ($this->show_monthly)
                            @include('pages.calendar.calendar-monthly')
                        @else
                            @include('pages.calendar.calendar-daily')
                        @endif
                    @endif



                </div>
            </div>
            <!-- Component End  -->

        </div>
    </x-main>
</div>
