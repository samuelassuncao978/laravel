

    <div class="flex flex-col flex-grow " style="" x-data="{open: false}">

        <style>
            .bg {
                background-color: #3D81F6;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpath fill='%233a7cef' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%233778e7' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%233574df' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%233470d6' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%23336CCD' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%233066c3' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%232d61b9' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%232b5caf' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%232856a4' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%2326519A' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
        @if ($this->on('App\Http\Livewire\Portal\Authentication\Logout'))
            @livewire('portal.authentication.logout', $this->parameters('App\Http\Livewire\Portal\Authentication\Logout'))
        @endif
        <div>

            <div class="min-h-screen bg-gray-100">
                <header class="pb-24 bg-blue-500 bg">
                    <div class="mx-auto px-4 sm:px-6 container lg:px-8">
                        <div class="relative py-5 flex items-center justify-center lg:justify-between">
                            <!-- Logo -->
                            <div class="static left-0 flex-shrink-0 lg:static">
                                <a href="#">
                                    <span class="sr-only">Workflow</span>
                                    <img class="h-8 w-auto filter invert brightness-0	"
                                        src="{{ asset('images/logo.png') }}" alt="Workflow">
                                </a>
                            </div>
                            <!-- Right section on desktop -->
                            <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
                                <div x-data="{ open: false }" class="flex-shrink-0 relative ml-2"
                                    x-on:click="$event.stopPropagation()">
                                    <button type="button" @click="open = !open"
                                        :class="{ ' bg-white bg-opacity-20 text-white text-opacity-100': open, 'text-white text-opacity-80 hover:bg-white hover:bg-opacity-10':!open }"
                                        class="focus:outline-none h-10 w-10 p-2 rounded-full  flex items-center justify-center">
                                        <x-icon.outline icon="bell" />
                                    </button>
                                    <div @click.away="open = false" x-cloak x-show="open"
                                        class="z-5 absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30">
                                        <x-ui.context-menu.item>
                                            @slot('icon')
                                                <x-icon.solid icon="dots-vertical" />
                                            @endslot
                                            Edit
                                        </x-ui.context-menu.item>
                                    </div>
                                </div>



                                <div x-data="{ open: false }" class="flex-shrink-0 relative ml-2"
                                    x-on:click="$event.stopPropagation()">
                                    <button type="button" @click="open = !open"
                                        :class="{ ' bg-white bg-opacity-20 text-white text-opacity-100': open, 'text-white text-opacity-80 hover:bg-white hover:bg-opacity-10':!open }"
                                        class="focus:outline-none h-10 w-10 p-1 rounded-full  flex items-center justify-center">
                                        <x-ui.avatar :name="optional(auth()->guard('client')->user())->name" />
                                    </button>
                                    <div @click.away="open = false" x-cloak x-show="open"
                                        class="z-5 absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30">
                                        <x-ui.context-menu.item>
                                            @slot('icon')
                                                <x-icon.solid icon="clipboard-list" />
                                            @endslot
                                            Edit details
                                        </x-ui.context-menu.item>
                                        <x-ui.context-menu.item wire:click="{{ $this->opens('App\Http\Livewire\Portal\Authentication\Logout') }}">
                                            @slot('icon')
                                                <x-icon.solid icon="login" />
                                            @endslot
                                            Logout
                                        </x-ui.context-menu.item>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu button -->
                            <div @click.away="open = false;" class="absolute right-0 z-40 flex-shrink-0 lg:hidden">
                                <!-- Mobile menu button -->
                                <button type="button"
                                    x-on:click="open = !open"
                                    class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-indigo-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
                                    aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <svg class="block h-6 w-6"
                                        :class="{ 'hidden': open, 'block': !(open) }"
                                        x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    <svg class="hidden h-6 w-6"
                                        :class="{ 'block': open, 'hidden': !(open) }"
                                        x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <!-- Prev: hidden  -->
                        <div  :class="{'fixed':open, 'hidden':!open}" class="inset-0 hidden z-30 bg-gray-700 bg-opacity-60"></div>
                        <div :class="{'bg-white shadow-lg rounded-xl fixed top-2 left-2 right-2': open, 'hidden': !open }" class=" z-40 lg:block border-t border-white border-opacity-20 py-5">
                                <div class="flex flex-col lg:flex-row justify-between">



                                        @if (in_array(get_class($this),['App\Http\Livewire\Portal\Index','App\Http\Livewire\Portal\Homework\Index','App\Http\Livewire\Portal\Appointments\Index']))
                                            <nav class="flex flex-col lg:flex-row lg:space-x-4 ">
                                                <a href="/portal"
                                                    class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                    <span class="h-4 w-4 mr-2">
                                                        <x-icon.outline icon="home" />
                                                    </span>
                                                    Home
                                                </a>
                                                <a href="/portal/homework"
                                                    class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                    <span class="h-4 w-4 mr-2">
                                                        <x-icon.outline icon="book-open" />
                                                    </span>
                                                    Resources
                                                </a>
                                                <a href="/portal/appointments"
                                                    class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                    <span class="h-4 w-4 mr-2">
                                                        <x-icon.outline icon="calendar" />
                                                    </span>
                                                    Your appointments
                                                </a>
                                            </nav>
                                        @endif
                                        @if (in_array(get_class($this),['App\Http\Livewire\Organization\Index']))
                                          <nav class="flex flex-col lg:flex-row lg:space-x-4 ">
                                            <a href="/organization"
                                                class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.outline icon="home" />
                                                </span>
                                                Home
                                            </a>
                                            <a href="/organization/sites"
                                                class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.outline icon="office-building" />
                                                </span>
                                                Locations
                                            </a>
                                               </nav>
                                        @endif

                                    <nav class="flex flex-col lg:flex-row lg:space-x-4">
                                        @if (in_array(get_class($this),['App\Http\Livewire\Portal\Index','App\Http\Livewire\Portal\Homework\Index','App\Http\Livewire\Portal\Appointments\Index']))
                                            <a href="https://foremind.sihq.com.au/sso?token={{ base64_encode(json_encode(auth()->guard()->user()->only(['first_name','last_name','email']))) }}"
                                                class="text-blue-500 lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.outline icon="cursor-click" />
                                                </span>

                                                Book a counsellor
                                            </a>
                                        @endif
                                        @if (in_array(get_class($this),['App\Http\Livewire\Organization\Index']))
                                            <a href="/organization/sites"
                                                class="text-white mr-4 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 flex items-center">
                                                <span class="h-4 w-4 mr-2">
                                                    <x-icon.outline icon="ticket" />
                                                </span>
                                                Purchase more sessions
                                            </a>
                                            <div
                                                class="relative text-xs pr-6 overflow-hidden rounded-sm bg-white bg-opacity-5 border cursor-pointer border-white border-opacity-10 p-1 px-2 focus:outline-none  hover:text-white hover:text-opacity-50 shadow-sm text-white flex flex-shrink-0 items-center uppercase">
                                                <span class="w-4 h-4 block mr-2">
                                                    <x-icon.solid icon="office-building" />
                                                </span>
                                                Locations overview
                                                <select
                                                    class="absolute w-full opacity-0 inset-0 appearance-none focus:outline-none"
                                                    wire:change="switch($event.target.value)">
                                                    @php
                                                        $locations = App\Models\Employer::first()->locations;
                                                    @endphp
                                                    @foreach ($locations as $a)
                                                        <option wire:key="{{ $a->id }}"
                                                            value="{{ $a->id }}">
                                                            {{ optional($a)->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4/6 text-white top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                                </svg>

                                                <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                                                    wire:target="switch">
                                                    <x-ui.loading-indicator :loading="true" spinner="border-gray-500"
                                                        small bg="bg-opacity-50 bg-white" />
                                                </div>
                                            </div>
                                        @endif
                                    </nav>
                                </div>

                        </div>
                    </div>
                </header>
                <main class="-mt-24 pb-8">
                    <div class="container mx-auto px-2 md:px-4 sm:px-6 lg:px-8">
                        <div class="rounded-lg bg-white shadow overflow-hidden ">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
                <footer>
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                        <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left"><span
                                class="block sm:inline">SIHQ © 2021</span></div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
