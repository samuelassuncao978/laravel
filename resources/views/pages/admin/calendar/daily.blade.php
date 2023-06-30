<div class="grid grid-cols-7 mt-4">
    <div class="pl-1 text-sm">Mon</div>
    <div class="pl-1 text-sm">Tue</div>
    <div class="pl-1 text-sm">Wed</div>
    <div class="pl-1 text-sm">Thu</div>
    <div class="pl-1 text-sm">Fri</div>
    <div class="pl-1 text-sm">Sat</div>
    <div class="pl-1 text-sm">Sun</div>
</div>




<div class="relative grid flex-grow w-full overflow-hidden h-auto grid-cols-7 grid-rows-12 gap-px pt-px mt-1 bg-gray-200">
<div class="w-full z-20 bg-blue-500 border border-white rounded-full shadow-sm absolute" style="height:4px; top:50%;">
     <span class="absolute z-20 p-0 px-2 rounded-sm border border-white bg-blue-500 shadow-md text-white left-2 transform top-1/2 -translate-y-1/2 text-xs" style="font-size:0.5rem;">
        16:44
    </span>
</div>

    @php
        $availability = auth()->guard('admin')->user()->availability();
        $week = $availability->week(now()->startOfWeek());
        $division = 4;
    @endphp

    @foreach($week as $day)
        <div class="relative flex flex-col bg-white ">
            <span class="mx-2 my-1 text-xs font-bold">DT</span>
            @if($day->working_hours === 0)
                <div class="bg-white flex-grow"
                    style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                </div>
            @else
                <div class="flex flex-col px-1 py-1 overflow-auto flex-grow">
                    <div class="flex items-center flex-shrink-0 px-1 text-xs border-b border-gray-100 relative"
                        style="height:{{ $day->percentage_before_you_start }}%;">
                        <div class="bg-white absolute inset-0 opacity-70"
                            style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">

                        </div>
                    </div>
                    <div class="flex-grow flex flex-col">
                        @for ($i = 0; $i < ($day->working_hours * $division); $i++)
                            <button
                                style="height:{{ 100 / ($day->working_hours * $division) }}%"
                                class="flex items-center group flex-shrink-0 px-1 text-xs  border-b border-gray-100 "
                                >
                                <!-- <span class="flex-shrink-0 w-2 h-2 border border-gray-500 rounded-full"></span>
                                <span class="ml-2 font-light leading-none">{{ ($day->start + $i) }}:00am</span> -->
                                <span class="hidden group-hover:flex  bg-gray-400 h-full w-full max-h-1 rounded-full"></span>
                                <span class="absolute z-20 hidden group-hover:flex p-1 px-2 rounded-sm bg-blue-500 shadow-md text-white left-1/2 transform -translate-x-1/2">
                                    {{ (($day->start + (($i)/ $division)) ) }}
                                </span>
                            </button>
                        @endfor
                    </div>
                    <div class="flex items-center flex-shrink-0 px-1 text-xs border-b border-gray-100 relative" style="height:{{ $day->percentage_after_you_finish }}%;">
                        <div class="bg-white absolute inset-0 opacity-70"
                            style="background-size: 10px 10px; background-image: repeating-linear-gradient(45deg, #eeeeee 0, #eeeeee 1px, #ffffff 0, #ffffff 50%);">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach






</div>
