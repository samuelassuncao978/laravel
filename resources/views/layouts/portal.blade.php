<x-container>


<div class="flex min-h-full flex-col flex-grow bg-gray-100" style="" x-data="{open: false}" x-init="$watch('open',()=>{

    document.body.classList.toggle('overflow-hidden') 
        document.body.classList.toggle('scrollbar') 

})">

    <style>
        .bg {
            background-color: #3D81F6;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpath fill='%233a7cef' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%233778e7' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%233574df' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%233470d6' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%23336CCD' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%233066c3' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%232d61b9' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%232b5caf' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%232856a4' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%2326519A' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>




    <div class="bg pb-24">
        <div class="container mx-auto flex flex-col lg:space-y-5 px-5 md:my-5">
            <div class="flex items-center justify-between py-5 md:py-0 relative">
                <div> 
                    <a href="/"  :class="{'absolute':!open, 'fixed':open}" class="absolute h-8 transform -translate-y-1/2 md:transform md:relative z-40">
                        <img :class="{'filter invert brightness-0':!open, 'filter':open}" class="h-8 w-auto filter invert brightness-0" src="{{ asset('/images/logo.png') }}" alt="Foremind">
                    </a>
                </div>
                <div class="flex items-center space-x-4">

          
                    <!-- <a href="/system/users"
                                    class="lg:mx-2 text-xs rounded-md p-2 rounded-full flex flex-col lg:flex-row items-center text-white text-opacity-80 hover:bg-white hover:bg-opacity-10">
                                    <span class="h-6 w-6 xlg:h-4 xlg:w-4 lg:mr-2">
                                        <x-icon.outline icon="presentation-chart-line" />
                                    </span>
                                    <span class="hidden lg:flex">Manage</span>
                                </a>
                             
                                <a href="/admin"
                                    class="lg:mx-2 text-xs rounded-md p-2 rounded-full flex flex-col lg:flex-row items-center text-white text-opacity-80 hover:bg-white hover:bg-opacity-10">
                                    <span class="h-6 w-6 xlg:h-4 xlg:w-4 lg:mr-2">
                                        <x-icon.outline icon="arrow-circle-left" />
                                    </span>
                                    <span class="hidden lg:flex">Back home</span>
                                </a>
                               -->

                
                
                    <div x-data="{ contextMenu: false }" class="flex-shrink-0 relative hidden lg:block">
                        <button
                        :class="{ ' bg-white bg-opacity-20 text-white text-opacity-100': contextMenu, 'text-white text-opacity-80 hover:bg-white hover:bg-opacity-10':!contextMenu }"
                        @click="contextMenu = !contextMenu" class="flex items-center text-white hover:bg-white p-1 rounded-full hover:bg-opacity-10">
                            <span class="h-8 w-8 mr-2 overflow-hidden rounded-full">
                                <x-ui.avatar :name="optional(auth()->guard('client')->user())->name" />
                            </span>
                            <span class="text-xs">{{ optional(auth()->guard('client')->user())->name }}</span>
                            <span class="h-4 w-4 ml-1 text-white text-opacity-50">
                                <x-icon.solid icon="chevron-down"/>
                            </span>
                        </button>
                        <x-context-menu>
                            <x-context-menu.item label="Edit details"/>
                            <x-context-menu.item label="Logout"/>
                        </x-context-menu>
                    </div>
                 

            
                        <div @click.away="open = false;" class="z-40 flex-shrink-0 lg:hidden">
                            <button type="button"
                                x-on:click="open = !open"
                                class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-white hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
                                aria-expanded="false">
                                <span class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }">
                                    <x-icon.solid icon="menu" />
                                </span>
                                <span class="hidden h-6 w-6 text-blue-500" :class="{ 'block': open, 'hidden': !(open) }">
                                    <x-icon.solid icon="x" />
                                </span>
                            </button>
                        </div>
                    
                </div>
            </div>
            <div class="hidden lg:flex bg-white bg-opacity-50 h-px w-full"></div>
            <div class="flex">
                <div :class="{'opacity-100':open, 'opacity-0 pointer-events-none':!open}" class="inset-0 fixed opacity-0 z-30 bg-gray-700 bg-opacity-60 transition ease-in-out duration-500"></div>
                <div class="
                    opacity-0 lg:opacity-100 fixed lg:relative flex-1 lg:pointer-events-auto
                    mx-auto container top-2 left-0 right-0 lg:top-0
                
                flex z-30 transition ease-in-out duration-500 " :class="{'opacity-100': open, 'opacity-0 pointer-events-none': !open }">
                <div class="flex-1 mx-2 bg-white shadow-lg rounded-xl pt-16 lg:mx-0 lg:pt-0 lg:shadow-none lg:bg-transparent lg:flex">
                    <div class="flex flex-1 flex-col lg:flex-row justify-between border-t p-5 lg:p-0 border-gray-200 lg:border-t-0">
                        <nav class="flex flex-row flex-wrap justify-center lg:justify-start items-center flex-1 text-center">
                          
                         
                                <a href="/portal"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="home" />
                                    </span>
                                    Home
                                </a>
                                <a href="/portal/homework"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="book-open" />
                                    </span>
                                    Resources
                                </a>
                                <a href="/portal/appointments"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="calendar" />
                                    </span>
                                    My appointments
                                </a>
                          

                            <!-- <span class="bg-white bg-opacity-20 h-1/2 w-px hidden lg:flex mx-2"></span> -->
                            <!-- <a href="/admin/locations"
                                class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                    <x-icon.outline icon="office-building" />
                                </span>
                                Locations
                            </a> -->
                           
                            <!-- <a href="/admin/reports"
                                class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                    <x-icon.outline icon="document" />
                                </span>
                                Reports
                            </a> -->

<!--                             
                                <span class="bg-white bg-opacity-20 h-1/2 w-px hidden lg:flex mx-2"></span>
                                <a href="/system/users"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="user" />
                                    </span>
                                    Users
                                </a>
                                <a href="/system/organisations"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="share" />
                                    </span>
                                    Organisations
                                </a>
                                <a href="/system/content"
                                    class="text-blue-500 lg:mx-2 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center">
                                    <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                        <x-icon.outline icon="document" />
                                    </span>
                                    Content
                                </a> -->
                           
                            
                                         

                           
                            
                            <a href="https://foremind.sihq.com.au/sso?token={{ base64_encode(json_encode(auth()->guard()->user()->only(['first_name','last_name','email']))) }}"
                                        class="lg:ml-auto lg:mx-2 text-blue-500 w-1/2 lg:w-auto lg:text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-5 lg:py-2 hover:bg-opacity-10 flex flex-col lg:flex-row items-center justify-center">
                                <span class="h-8 w-8 mb-2 lg:h-4 lg:w-4 lg:mb-0 lg:mr-2">
                                    <x-icon.outline icon="cursor-click" />
                                </span>
                                Book a counsellor
                            </a>

                            <!-- mobile -->
                            <div class="flex w-full border-t border-gray-200 pt-3 mt-5 space-x-2 lg:hidden">
                                <a href="/organization/sites"
                                    class="w-1/2 bg-blue-50 text-blue-500 lg:text-white text-sm font-medium rounded-md px-3 py-2 flex items-center justify-center">
                                    <span class="h-4 w-4 mr-2">
                                        <x-icon.outline icon="user" />
                                    </span>
                                    My Account
                                </a>
                                <a href="/logout"
                                    class="w-1/2 bg-blue-50 text-blue-500 lg:text-white text-sm font-medium rounded-md px-3 py-2 flex items-center justify-center">
                                    <span class="h-4 w-4 mr-2">
                                        <x-icon.outline icon="logout" />
                                    </span>
                                    Logout
                                </a>
                            </div>
                               

                        </nav>
                        <nav class="flex flex-col lg:flex-row lg:space-x-4">
                                   
                     
                            
                                
                                    <div
                                        class="hidden relative text-xs pr-6 overflow-hidden rounded-sm bg-white bg-opacity-5 border cursor-pointer border-white border-opacity-10 p-1 px-2 focus:outline-none  hover:text-white hover:text-opacity-50 shadow-sm text-white flex flex-shrink-0 items-center uppercase">
                                        <span class="w-4 h-4 block mr-2">
                                            <x-icon.solid icon="office-building" />
                                        </span>
                                        Locations overview
                                        <select
                                            class="absolute w-full opacity-0 inset-0 appearance-none focus:outline-none"
                                            wire:change="switch($event.target.value)">
                                          
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4/6 text-white top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>

                                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                                            wire:target="switch">
                                           
                                        </div>
                                    </div>

                       
                        </nav>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-1">

        <div class="container mx-auto -mt-24 bg-white rounded-xl shadow-sm overflow-hidden min-h-full flex border border-gray-200">
            @yield('slot')
            {{ $slot ?? ''}}
        </div>
    </div>

    <div class="container mx-auto p-5 relative text-xs flex w-full text-gray-400">
           <div class="mr-auto">&copy; 2021 SIHQ</div>
           <div class="space-x-3 flex items-center">
                <x-link.basic href="/support">
                    Support
                </x-link.basic>
                <span class="h-1 w-1 block bg-gray-300 rounded-full"></span>
                <x-link.basic href="/terms-of-service">
                    Terms of service
                </x-link.basic>
           </div>
       </div>


</div>
    </x-container>
