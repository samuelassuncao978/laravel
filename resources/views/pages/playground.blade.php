<x-container>

    <div class="bg-white flex-grow">




        <x-stripe.intent amount="100">

            <x-stripe.card />
            <x-stripe.expiry />

            <x-stripe.cvc />

            <button x-on:click="intent(()=>$wire.submit())">Set Intent</button>


        </x-stripe.intent>
    </div>

    <div class="hidden">


        @php
            
            function calendar()
            {
                $year = '2021';
                $month = '1';
                $week_starts = 'monday';
                $selected = '';
            
                $date = \Carbon\Carbon::createFromDate($year, $month, 1);
                $calendar = [];
            
                switch ($week_starts) {
                    case 'monday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::MONDAY);
                        break;
                    case 'tuesday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::TUESDAY);
                        break;
                    case 'wednesday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::WEDNESDAY);
                        break;
                    case 'thursday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::THURSDAY);
                        break;
                    case 'friday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::FRIDAY);
                        break;
                    case 'saturday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::SATURDAY);
                        break;
                    case 'sunday':
                        $start_of_week = $date->startOfWeek(\Carbon\Carbon::SUNDAY);
                        break;
                }
            
                do {
                    //loops through each week
                    for ($i = 0; $i < 7; $i++) {
                        $calendar[] = [
                            'date' => new \Carbon\Carbon($date),
                            'unavailable' => $date->isSaturday() || $date->isSunday() ? true : false,
                            'has_events' => false,
                        ];
            
                        $date->addDay();
                    }
                } while ($date->month == $selected);
            
                while (count($calendar) < 42) {
                    $calendar[] = [
                        'date' => new \Carbon\Carbon($date),
                        'unavailable' => $date->isSaturday() || $date->isSunday() ? true : false,
                        'has_events' => false,
                    ];
                    $date->addDay();
                }
            
                return $calendar;
            }
            
        @endphp






        <div class="flex items-center justify-center flex-grow bg-white">

            <div>



                h-full w-full grid grid-cols-7 grid-rows-1 group relative

                @php
                    $weeks = false;
                    
                @endphp

                <div class="shadow-xl rounded flex flex-col w-96 h-96 border border-gray-200 overflow-hidden">
                    <div class="p-5 pb-3  flex items-center">
                        <span class="font-bold flex flex-col">
                            <span class="text-xs text-gray-400">2021</span>
                            <span>March</span>
                        </span>
                        <span class="ml-auto flex space-x-2">
                            <button
                                class="hover:bg-gray-200 rounded flex items-center justify-center px-4 p-2 focus:outline-none text-gray-500 hover:text-blue-500">
                                <span class="h-4 w-4">
                                    <x-icon.solid icon="view-grid" />
                                </span>
                            </button>
                            <div class="flex flex-col rounded bg-gray-50 text-xs text-gray-500 uppercase">
                                <button
                                    class="relative overflow-hidden flex-shrink-0 hover:bg-gray-300 flex justify-center items-center flex-grow focus:outline-none rounded py-0 px-1">
                                    <span class="h-5 w-5">
                                        <x-icon.solid icon="chevron-up" />
                                    </span>
                                </button>
                                <button
                                    class="relative overflow-hidden flex-shrink-0  hover:bg-gray-300 flex justify-center items-center flex-grow focus:outline-none  rounded py-0 px-1">
                                    <span class="h-5 w-5">
                                        <x-icon.solid icon="chevron-down" />
                                    </span>
                                </button>
                            </div>
                        </span>
                    </div>
                    <div class="flex flex-grow overflow-hidden h-64">
                        <div class=" flex flex-col flex-grow">
                            <div class="grid grid-cols-7 text-xs text-center font-bold">
                                <div class="pl-1">M</div>
                                <div class="pl-1">T</div>
                                <div class="pl-1">W</div>
                                <div class="pl-1">T</div>
                                <div class="pl-1">F</div>
                                <div class="pl-1">S</div>
                                <div class="pl-1">S</div>
                            </div>
                            <div
                                class="grid flex-grow w-full overflow-hidden {{ $weeks ? 'grid-cols-1 grid-rows-6' : 'grid-cols-7 grid-rows-6' }} pt-px gap-px text-xs mt-1 bg-gray-200">
                                @foreach (collect(calendar())->chunk(7) as $week)
                                    @if ($weeks)
                                        <div class="items-center grid bg-white p-1.5">
                                            <div
                                                class="h-full grid grid-cols-7 grid-rows-1 group overflow-hidden rounded ">
                                    @endif
                                    @foreach ($week->values() as $key => $day)
                                        @if (!$weeks)
                                            <div class="flex items-center justify-center bg-white p-1.5">
                                                <div class="flex w-full h-full overflow-hidden rounded">
                                        @endif
                                        <x-calendar.day :day="$day" />
                                        @if (!$weeks)
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if ($weeks)
                    </div>
                </div>

                @endif

                @endforeach
            </div>
        </div>








    </div>
    <!-- <div class="flex flex-grow overflow-hidden">
                    <div class="border-r border-gray-200 w-1/3 flex flex-col space-y-2 p-2 scrollbar">
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Year</button>
                    </div>
                    <div class="w-2/3 flex flex-col space-y-2 p-2 scrollbar">
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">January</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Febuary</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">March</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">April</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">May</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">January</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">Febuary</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">March</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">April</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">May</button>
                         <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">April</button>
                        <button class="hover:bg-gray-100 rounded p-2 px-5 focus:outline-none">May</button>
                    </div>
                </div> -->
    <!-- <div class="border-t border-gray-200 p-2">
                    <x-ui.button.primary compact bold type="button">
                        Select
                    </x-ui.button.primary>
                </div> -->
    </div>

    </div>


    <div class="hidden">


        <x-o-auth.authorize>
            @if (isset($_GET['start']))
                <div class="bg-white p-10 rounded">
                    <p class="my-4 text-center">
                        Do you authorise this app
                    </p>
                    <div class="flex space-x-4 items-center justify-center">
                        <button
                            class="bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8"
                            x-on:click="window.close()">No</button>
                        <button
                            class="bg-green-800 hover:bg-green-700 focus:ring-green-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8"
                            x-on:click=" window.location.assign('/ui/playground?end=true&access_token=1234')">Yes</button>
                    </div>
                </div>
            @elseif (isSet($_GET['end']))
                <span x-on:click="assert({ access_token: 'heelo' })">click to send back</span>
            @else
                <button x-on:click="invoke('/ui/playground?start=true')">Auth</button>
                <x-o-auth.debug />
                <x-o-auth.splash>
                    <div class="flex items-center justify-center bg-white rounded p-5">
                        <strong>Authorizing</strong>
                        <p>This message is shown when the authorisation modal is active</p>
                    </div>
                </x-o-auth.splash>
            @endif
        </x-o-auth.authorize>
    </div>
    </div>


    </div>
</x-container>
