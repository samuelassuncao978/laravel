<div class="flex flex-grow">
    <x-sidebar>
        @include('pages.admin.calendar.sidebar')
    </x-sidebar>
    <x-main :action="$action??null" :method="$method??null">

        @if ($this->on('App\Http\Livewire\Admin\Calendar\Availability'))
            @livewire('admin.calendar.availability', $this->parameters('App\Http\Livewire\Admin\Calendar\Availability'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Calendar\FailureDetails'))
            @livewire('admin.calendar.failure-details', $this->parameters('App\Http\Livewire\Admin\Calendar\FailureDetails'))
        @endif

        @livewire('admin.calendar.promotion', [])



        @if($this->testing)
            <livewire:admin.calendar.testing />

        @else
    
        <div class="text-gray-700 overflow-hidden flex flex-grow  p-8 relative">

            <div class="flex flex-grow overflow-hidden">

                <div class="flex flex-col flex-grow">
                    <div class="flex items-center mb-4 ">


                        <h2 class="ml-2 text-xl font-bold leading-none">{{ $this->selected->format('F') }},
                            {{ $this->selected->format('Y') }}</h2>
                        <div class="flex ml-auto space-x-4">

                          <button wire:click="sync(true)"
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="cloud-upload" />
                                </span>
                                Sync (Force)
                            </button>

                          <button wire:click="sync"
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="cloud-upload" />
                                </span>
                                Sync
                            </button>

                            <button wire:click="{{ $this->opens('App\Http\Livewire\Admin\Calendar\Availability') }}"
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="clock" />
                                </span>
                                Availability
                            </button>

                            <button
                                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
                                <span class="h-4 w-4 mr-1">
                                    <x-icon.solid icon="cog" />
                                </span>
                                Configuration
                            </button>


                            <div class="flex space-x-1 items-center text-gray-300">
                                <span class="h-3 w-3 {{ $show_monthly ? '' : 'text-gray-600' }}"><x-icon.solid icon="clock"/></span>
                                <x-ui.form.field type="toggle" name="show_monthly" color="bg-blue-400" model="show_monthly" inline />
                                <span class="h-3 w-3 {{ $show_monthly ? 'text-blue-500' : '' }}"><x-icon.solid icon="calendar"/></span>
                            </div>


                            <div class="flex space-x-1 items-center text-gray-300">
                                <span class="h-3 w-3 {{ $show_organization ? '' : 'text-gray-600' }}"><x-icon.solid icon="user"/></span>
                                <x-ui.form.field type="toggle" name="show_organization" color="bg-blue-400" model="show_organization" inline />
                                <span class="h-3 w-3 {{ $show_organization ? 'text-blue-500' : '' }}"><x-icon.solid icon="users"/></span>
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
                      @include('pages.admin.calendar.daily')



                </div>
            </div>
            

        </div>
        @endif



    </x-main>
</div>
