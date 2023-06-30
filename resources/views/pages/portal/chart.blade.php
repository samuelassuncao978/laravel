    @php
        
        $latest = collect([]);
        $by_day = $latest->groupBy(function ($appointment) {
            return $appointment->start_at->format('d.m');
        });
        
        $upcoming_day = $upcoming->groupBy(function ($appointment) {
            return $appointment->start_at->format('d.m');
        });
        
        $upcoming_day = $upcoming_day->map(function ($day) {
            return $day->groupBy(function ($appointment) {
                switch ($time = $appointment->start_at->format('H')) {
                    case $time > 0 && $time < 12:
                        return 'morning';
                        break;
                    case $time > 12 && $time < 15:
                        return 'afternoon';
                        break;
                    case $time > 15 && $time < 19:
                        return 'late afternoon';
                        break;
                    case $time > 19 && $time < 24:
                        return 'late afternoon';
                        break;
                    default:
                        return 'unknown';
                        break;
                }
            });
        });
        $latest = $upcoming_day;
        
    @endphp




    <div class="flex space-x-4">
        <div class="flex-grow ">
            <div class="text-gray-500 flex flex-col text-sm overflow-hidden h-12"></div>

            <div class="space-y-1 my-4 pr-4">
                <div class="h-5 overflow-hidden text-xs flex items-center justify-end ">
                    Morning
                </div>
                <div class="h-5 overflow-hidden text-xs flex items-center justify-end ">
                    Early Afternoon
                </div>
                <div class="h-5 overflow-hidden text-xs flex items-center justify-end ">
                    Late Afternoon
                </div>
                <div class="h-5 overflow-hidden text-xs flex items-center justify-end">
                    Evening
                </div>
            </div>

        </div>


        @if (isset($latest->keys()[2]))
            @include('pages.portal.chart-column', ['day'=> $latest->values()[2], 'date'=>$latest->keys()[2] ])
        @endif
        @if (isset($latest->keys()[1]))
            @include('pages.portal.chart-column', ['day'=> $latest->values()[1], 'date'=>$latest->keys()[1] ])
        @endif
        @if (isset($latest->keys()[0]))
            @include('pages.portal.chart-column', ['day'=> $latest->values()[0], 'date'=>$latest->keys()[0] ])
        @endif
        @if (count($latest->keys()) < 4)
            @for ($i = 0; $i < (4 - count($latest->keys())); $i++)
                <div
                    class="w-1/5 flex flex-col {{ $i !== 3 - count($latest->keys()) ? 'border-r border-solid border-gray-200' : '' }}">
                    <div class="text-gray-500 flex flex-col text-sm overflow-hidden h-12">
                        <strong class="h-3 mb-2 mt-2 bg-gray-300 w-1/2 rounded"></strong>
                        <span class="h-2 bg-gray-200 w-1/2 rounded"></span>
                    </div>
                    <div class="space-y-1 my-4 pr-4">
                        <div class="h-5 bg-gray-100 rounded-full"></div>
                        <div class="h-5 bg-gray-100 rounded-full"></div>
                        <div class="h-5 bg-gray-100 rounded-full"></div>
                        <div class="h-5 bg-gray-100 rounded-full"></div>
                    </div>
                </div>
        @endfor
        @endif
    </div>
