<div class="grid grid-cols-7 mt-4">
    <div class="pl-1 text-sm">Mon</div>
    <div class="pl-1 text-sm">Tue</div>
    <div class="pl-1 text-sm">Wed</div>
    <div class="pl-1 text-sm">Thu</div>
    <div class="pl-1 text-sm">Fri</div>
    <div class="pl-1 text-sm">Sat</div>
    <div class="pl-1 text-sm">Sun</div>
</div>
<div class="grid flex-grow w-full overflow-hidden h-auto grid-cols-7 grid-rows-12 gap-px pt-px mt-1 bg-gray-200">
    <div class="bg-white"
        style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
    </div>
    @php
        $one_day_is = 60 * 8;
        $slot_size = 60;
        $slots_a_day = $one_day_is / $slot_size;

        $h = 100 / $slots_a_day;
    @endphp


    <div class="relative flex flex-col bg-white group">
        <span class="mx-2 my-1 text-xs font-bold">29</span>
        <div class="flex flex-col px-1 py-1 overflow-auto">
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs hover:bg-gray-200 border-b border-gray-100">
                <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">8:30am</span>
            </button>
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs hover:bg-gray-200 border-b border-gray-100">
                <span class="flex-shrink-0 w-2 h-2 bg-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">2:15pm</span>

                <span class="ml-2 font-medium leading-none truncate">Brad Martin</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-3 w-3 ml-auto text-gray-500"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                </svg>
            </button>
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs hover:bg-gray-200 border-b border-gray-100">
                <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">8:30am</span>
            </button>
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs border-b border-gray-100 relative">
                <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">8:30am</span>
                <div class="bg-white absolute inset-0 opacity-70"
                    style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                </div>

            </button>
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs hover:bg-gray-200 border-b border-gray-100">
                <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">8:30am</span>
            </button>
            <button class="flex items-center flex-shrink-0 h-5 px-1 text-xs hover:bg-gray-200 border-b border-gray-100">
                <span class="flex-shrink-0 w-2 h-2 bg-gray-500 rounded-full"></span>
                <span class="ml-2 font-light leading-none">2:15pm</span>

                <span class="ml-2 font-medium leading-none truncate">Joel Anderson</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-3 w-3 ml-auto text-gray-500"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
            </button>

        </div>
        <button
            class="absolute bottom-0 right-0 flex items-center justify-center hidden w-6 h-6 mb-2 mr-2 text-white bg-gray-400 rounded group-hover:flex hover:bg-gray-500">
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 plus">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>



    @php

        $organization_day_starts = collect($this->team)->min('start');
        $organization_day_ends = collect($this->team)->max('end');
        $organization_day_length = $organization_day_ends - $organization_day_starts - 1;

    @endphp

    @foreach ($this->team as $team)

        @php

            $user_day_starts = $team['start'];
            $user_day_ends = $team['end'];
            $user_day_length = $user_day_ends - $user_day_starts;

            $first_block_offset_in_hours = $user_day_starts - $organization_day_starts;
            $last_block_offset_in_hours = $organization_day_ends - $user_day_ends;
            $extra_hours = $organization_day_length - $user_day_length;

            $first_percentage_height = $first_block_offset_in_hours * (100 / $organization_day_length);
            $last_percentage_height = $last_block_offset_in_hours * (100 / $organization_day_length);

            $user_blocks_in_day = floor((60 * $user_day_length) / $team['duration']);

            $offset = (100 - $first_percentage_height - $last_percentage_height) / ((60 * $user_day_length) / $team['duration']);
            $h = ($offset * $user_blocks_in_day) / $user_blocks_in_day;
            $remained = 100 - $first_percentage_height - $last_block_offset_in_hours - $h * $user_blocks_in_day;
        @endphp

        <div class="relative flex flex-col bg-white group">
            <span class="mx-2 my-1 text-xs font-bold">{{ $last_percentage_height }} </span>
            <div class="flex flex-col h-full px-1 py-1 overflow-auto">

                @if ($first_percentage_height > 0)
                    <button class="flex items-center flex-shrink-0 px-1 text-xs border-b border-gray-100 relative"
                        style="height:{{ $first_percentage_height }}%;">
                        <div class="bg-white absolute inset-0 opacity-70"
                            style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                        </div>
                    </button>
                @endif
                @for ($i = 0; $i < $user_blocks_in_day; $i++)
                    <button
                        class="flex items-center flex-shrink-0 px-1 text-xs hover:bg-gray-200 border-b border-gray-100"
                        style="height:{{ $h }}%;">
                        <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                        <span class="ml-2 font-light leading-none">{{ $i }}:00am</span>
                    </button>
                @endfor
                @if ($remained > 0)
                    <button class="flex items-center flex-shrink-0 px-1 text-xs border-b border-gray-100 relative"
                        style="height:{{ $remained }}%;">
                        <div class="bg-white absolute inset-0 opacity-70"
                            style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                        </div>
                    </button>
                @endif
                @if ($last_percentage_height > 0)
                    <button class="flex items-center flex-shrink-0 px-1 text-xs border-b border-gray-100 relative"
                        style="height:{{ $last_percentage_height }}%;">
                        <div class="bg-white absolute inset-0 opacity-70"
                            style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                        </div>
                    </button>
                @endif

            </div>
            <button
                class="absolute bottom-0 right-0 flex items-center justify-center hidden w-6 h-6 mb-2 mr-2 text-white bg-gray-400 rounded group-hover:flex hover:bg-gray-500">
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 plus">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

    @endforeach



</div>
