<div class="flex flex-col h-full">
    <!-- <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
        <x-interface.sidebar.header text="users" create="/users/create" />
        <x-interface.sidebar.search />
    </div> -->

    <div class="flex text-xs items-center bg-gray-100 p-3">
        <div class="flex-grow flex flex-col">
            <strong class="font-bold text-lg uppercase">
                {{ $this->selected->format('F') }}
                <span class="text-xs text-gray-400">{{ $this->selected->format('Y') }}</span>
            </strong>
            <div class="flex items-center space-x-2">
                <div class="h-2 w-2 rounded-full bg-blue-500"></div>
                <div>88 appointments</div>
            </div>
        </div>
        <div class="flex flex-col space-y-1">
            <button wire:click="backward()"
                class="prev relative overflow-hidden flex-shrink-0 bg-gray-200 text-gray-600 hover:bg-gray-300 active:ring-gray-200 flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded active:ring-4 py-0 px-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                <div wire:loading wire:target="backward"
                    class="inset-0 overflow-hidden absolute opacity-30 rounded-full bg-black bg-opacity-60 z-10">
                    <x-ui.loading-indicator :loading="true" />
                </div>
            </button>
            <button wire:click="forward()"
                class="prev relative overflow-hidden flex-shrink-0 bg-gray-200 text-gray-600 hover:bg-gray-300 active:ring-gray-200 flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded active:ring-4 py-0 px-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <div wire:loading wire:target="forward"
                    class="inset-0 overflow-hidden absolute opacity-30 rounded-full bg-black bg-opacity-60 z-10">
                    <x-ui.loading-indicator :loading="true" />
                </div>
            </button>
        </div>
    </div>

    <div class="p-2 border-t border-b border-gray-200 bg-gray-50">



        <div class="grid grid-cols-7 mt-4 text-xs text-center font-bold">
            <div class="pl-1">M</div>
            <div class="pl-1">T</div>
            <div class="pl-1">W</div>
            <div class="pl-1">T</div>
            <div class="pl-1">F</div>
            <div class="pl-1">S</div>
            <div class="pl-1">S</div>
        </div>

        <div
            class="grid flex-grow w-full overflow-hidden h-60 grid-cols-1 grid-rows-6 pt-px gap-px text-xs mt-1 bg-gray-200">
            @foreach (collect($this->calendar())->chunk(7) as $week)



                <x-ui.calendar.week wire:key="{{ $week->first()['date']->format('Ymd') }}"
                    wire:click="{!! !$this->show_monthly ? '$set(\'selected_week\',\'' . $week->first()['date']->format('Ymd') . '-' . $week->last()['date']->format('Ymd') . '\')' : '' !!}">



                    @foreach ($week->values() as $key => $day)

                        <x-ui.calendar.date :events="1" :date="$day['date']"
                            :class="($key === 0 ? 'rounded-l-full' : ($key === 6 ? 'rounded-r-full' : ''))"
                            :selected="(!$this->show_monthly ? ($this->selected_week === $week->first()['date']->format('Ymd').'-'.$week->last()['date']->format('Ymd')) : $this->selected_week === $day['date']->format('Ymd'))"
                            wire:click="{!! $this->show_monthly ? '$set(\'selected_week\',\'' . $day['date']->format('Ymd') . '\')' : '' !!}" />

                    @endforeach
                </x-ui.calendar.week>

            @endforeach
        </div>



    </div>


    <div class="flex text-xs items-center px-4 border-b border-gray-200 text-gray-400 py-2">
        <span class="flex h-4 w-4 mr-1"><x-icon.solid icon="chevron-double-right"/></span>
        Fastforward
        <span class="flex space-x-1 ml-auto">
            <button class="rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
                2
            </button>
            <button class="rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">4</button>
            <button class="rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">6</button>
        </span>
        <span class="ml-2 uppercase" style="font-size:0.6rem;">Weeks</span>
    </div>

    <div class="flex-grow p-5">

    <div class="flex items-center">
        <span class="flex-grow font-semibold text-xs text-gray-700">Waitlist</span>
        <button class="rounded-sm h-5 w-5 bg-white border border-gray-200 p-0.5 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center text-xs">
            <x-icon.solid icon="plus"/>
        </button>
    </div>


    </div>




    <div class="p-5 mt-auto w-full">
        <div class="flex items-center w-full text-xs text-gray-700  bg-white bg-opacity-50 rounded shadow-sm p-2">
            @if(auth()->guard('admin')->user()->calendars()->first())
            <div class="flex w-full flex-col">

                @if($this->syncing)
                    <div class="mb-1 pb-1 border-b border-gray-100 flex items-center text-gray-400">
                        <div x-init="$wire.start_sync()" class="flex items-center flex-grow p-1 overflow-hidden relative text-blue-500 cursor-wait">
                            <span class="h-5 w-5 mr-2 flex-shrink-0 flex items-center justify-center">
                                <span style="border-top-color:transparent; " class="block border-solid animate-spin rounded-full border-2 h-4 w-4 border-blue-500 opacity-90"></span>
                            </span>
                            <span class="text-left" style="font-size:0.7rem;">Synchronizing your calendar...</span>
                        </div>
                    </div>
                @endif

                @if(!$this->syncing && !empty(auth()->guard('admin')->user()->calendars()->first()->failed_at))
                    <div class="mb-1 pb-1 border-b border-gray-100 flex items-center text-gray-400">
                        <button wire:click="{{ $this->opens('App\Http\Livewire\Admin\Calendar\FailureDetails',['calendar'=> auth()->guard('admin')->user()->calendars()->first()]) }}" class="flex items-center flex-grow p-1 overflow-hidden relative active:bg-gray-200 hover:bg-gray-100 rounded hover:text-blue-500">
                            <span class="h-5 w-5 mr-2 text-orange-300 flex-shrink-0">
                                <x-icon.solid icon="exclamation" />
                            </span>
                            <span class="text-left" style="font-size:0.7rem;">Synchronizing your calendar failed recently. See more information.</span>
                        </button>
                    </div>
                @endif

                <div class="flex flex-grow items-center">
                    <span class="flex flex-shrink-0 items-center mr-2  text-gray-500 p-1">
                        @if(auth()->guard('admin')->user()->calendars()->first()->type === 'gmail')
                            <span class="h-4 w-4">
                                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <polygon points="484.973,122.808 452.288,451.017 59.712,451.017 33.379,129.16 256,253.802  " style="fill:#F2F2F2;" />
                                        <polygon points="473.886,60.983 256,265.659 38.114,60.983 256,60.983  " style="fill:#F2F2F2;" />
                                    </g>
                                    <path d="M59.712,155.493v295.524H24.139C10.812,451.017,0,440.206,0,426.878V111.967l39,1.063L59.712,155.493  z" style="fill:#F14336;" />
                                    <path d="M512,111.967v314.912c0,13.327-10.812,24.139-24.152,24.139h-35.56V155.493l19.692-46.525  L512,111.967z" style="fill:#D32E2A;" />
                                    <path d="M512,85.122v26.845l-59.712,43.526L256,298.561L59.712,155.493L0,111.967V85.122  c0-13.327,10.812-24.139,24.139-24.139h13.975L256,219.792L473.886,60.983h13.962C501.188,60.983,512,71.794,512,85.122z" style="fill:#F14336;" />
                                    <polygon points="59.712,155.493 0,146.235 0,111.967 " style="fill:#D32E2A;" />
                                </svg>
                            </span>
                        @elseif(auth()->guard('admin')->user()->calendars()->first()->type === 'outlook')
                            <span class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                    <path style="fill:#1976D2;" d="M496,112.011H272c-8.832,0-16,7.168-16,16s7.168,16,16,16h177.376l-98.304,76.448l-70.496-44.832
                                    l-17.152,27.008l80,50.88c2.592,1.664,5.6,2.496,8.576,2.496c3.456,0,6.944-1.12,9.824-3.36L480,160.715v207.296H272
                                    c-8.832,0-16,7.168-16,16s7.168,16,16,16h224c8.832,0,16-7.168,16-16v-256C512,119.179,504.832,112.011,496,112.011z" />
                                    <path style="fill:#2196F3;" d="M282.208,19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48C5.472,65.707,0,72.299,0,80.011v352
                                    c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68
                                    c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.243,285.888,22.731,282.208,19.691z" />
                                    <path style="fill:#FAFAFA;" d="M144,368.011c-44.096,0-80-43.072-80-96s35.904-96,80-96s80,43.072,80,96
                                    S188.096,368.011,144,368.011z M144,208.011c-26.464,0-48,28.704-48,64s21.536,64,48,64s48-28.704,48-64
                                    S170.464,208.011,144,208.011z" />
                                </svg>
                            </span>
                        @endif
                    </span>
                    <span class="flex flex-col flex-grow overflow-hidden">
                        <span class="uppercase truncate text-gray-400 flex items-center" style="font-size:0.5rem;">
                            Last sync: {{ optional(auth()->guard('admin')->user()->calendars()->first()->last_sync)->diffForHumans() ?? 'never' }}
                        </span>
                        <span class="truncate">{{ auth()->guard('admin')->user()->calendars()->first()->external_id ?? '' }}</span>
                    </span>
                    <div x-data="{ open: false }" class="flex-shrink-0 relative ml-2" x-on:click="$event.stopPropagation()">
                        <button type="button" @click="open = !open" :class="{ 'ring-2 ring-blue-500': open }"
                            class="focus:outline-none h-5 w-5 p-1 rounded-full text-gray-400 text-opacity-80 bg-gray-100 hover:bg-gray-300 flex items-center justify-center">
                            <x-icon.solid icon="dots-vertical" />
                        </button>
                        <div @click.away="open = false" x-cloak x-show="open"
                            class="z-5 absolute bottom-0 right-0 mb-6 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30">
                            <x-ui.context-menu.item wire:click="$set('syncing',true)">
                                @slot('icon')
                                    <x-icon.outline icon="refresh" />
                                @endslot
                                Resync availability
                            </x-ui.context-menu.item>
                            <x-ui.context-menu.item  wire:click="{{ $this->opens('App\Http\Livewire\Admin\Calendar\Disconnect', ['calendar' => auth()->guard('admin')->user()->calendars()->first()]) }}">
                                @slot('icon')
                                    <span class="text-red-500 group-hover:text-white flex">
                                        <x-icon.outline icon="eye-off" />
                                    </span>
                                @endslot
                                Disconnect
                            </x-ui.context-menu.item>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <x-o-auth.authorize onComplete="$wire.set('syncing', true)">
                    <button class="flex items-center flex-grow overflow-hidden relative active:bg-gray-200 hover:bg-gray-100 rounded hover:text-blue-500" x-on:click="invoke('/admin/calendar/authorize')">
                        <span class="flex flex-shrink-0 items-center mr-2  text-gray-500 p-1.5">
                            <span class="h-6 w-6 bg-gray-50 shadow-sm rounded-full p-1.5">
                                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <polygon points="484.973,122.808 452.288,451.017 59.712,451.017 33.379,129.16 256,253.802  " style="fill:#F2F2F2;" />
                                        <polygon points="473.886,60.983 256,265.659 38.114,60.983 256,60.983  " style="fill:#F2F2F2;" />
                                    </g>
                                    <path d="M59.712,155.493v295.524H24.139C10.812,451.017,0,440.206,0,426.878V111.967l39,1.063L59.712,155.493  z" style="fill:#F14336;" />
                                    <path d="M512,111.967v314.912c0,13.327-10.812,24.139-24.152,24.139h-35.56V155.493l19.692-46.525  L512,111.967z" style="fill:#D32E2A;" />
                                    <path d="M512,85.122v26.845l-59.712,43.526L256,298.561L59.712,155.493L0,111.967V85.122  c0-13.327,10.812-24.139,24.139-24.139h13.975L256,219.792L473.886,60.983h13.962C501.188,60.983,512,71.794,512,85.122z" style="fill:#F14336;" />
                                    <polygon points="59.712,155.493 0,146.235 0,111.967 " style="fill:#D32E2A;" />
                                </svg>
                            </span>
                            <span class="h-6 w-6 bg-gray-50 shadow-sm rounded-full p-1.5 -ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                    <path style="fill:#1976D2;" d="M496,112.011H272c-8.832,0-16,7.168-16,16s7.168,16,16,16h177.376l-98.304,76.448l-70.496-44.832
                                    l-17.152,27.008l80,50.88c2.592,1.664,5.6,2.496,8.576,2.496c3.456,0,6.944-1.12,9.824-3.36L480,160.715v207.296H272
                                    c-8.832,0-16,7.168-16,16s7.168,16,16,16h224c8.832,0,16-7.168,16-16v-256C512,119.179,504.832,112.011,496,112.011z" />
                                    <path style="fill:#2196F3;" d="M282.208,19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48C5.472,65.707,0,72.299,0,80.011v352
                                    c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68
                                    c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.243,285.888,22.731,282.208,19.691z" />
                                    <path style="fill:#FAFAFA;" d="M144,368.011c-44.096,0-80-43.072-80-96s35.904-96,80-96s80,43.072,80,96
                                    S188.096,368.011,144,368.011z M144,208.011c-26.464,0-48,28.704-48,64s21.536,64,48,64s48-28.704,48-64
                                    S170.464,208.011,144,208.011z" />
                                </svg>
                            </span>
                        </span>
                        <span class="text-xs">Connect your calendar</span>
                        <x-o-auth.splash>
                            <x-ui.loading-indicator :loading="true" />
                        </x-o-auth.splash>
                    </button>
                </x-o-auth.authorize>
            @endif
        </div>
    </div>

    @if ($this->on('App\Http\Livewire\Admin\Calendar\Disconnect'))
        @livewire('admin.calendar.disconnect', $this->parameters('App\Http\Livewire\Admin\Calendar\Disconnect'))
    @endif
</div>
