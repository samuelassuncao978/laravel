<div class="w-1/5 flex flex-col border-r border-solid border-gray-200">
    <div class="text-gray-500 flex flex-col text-sm overflow-hidden h-12">
        <strong class="font-bold text-black">{{ $date }}</strong>
        <span class="text-xs"> {{ $date }}</span>
    </div>
    <div class="space-y-1 my-4 pr-4">
        <div class="h-5 w-full bg-gray-100 rounded-full">
            @foreach (optional($day)['morning'] ?? [] as $appointment)
                <button
                    class="bg-blue-500 text-white h-full w-full rounded-full text-xs flex px-3 items-center relative hover:scale-105 transform scale-100">
                    {{ $appointment->start_at->format('H:i a') }}
                    <span class="ml-auto flex">
                        <span class="h-4 w-4">
                            <x-icon.solid :icon="optional($appointment->method)->icon" />
                        </span>
                    </span>
                </button>
            @endforeach
        </div>
        <div class="h-5 w-full bg-gray-100 rounded-full">
            @foreach (optional($day)['afternoon'] ?? [] as $appointment)
                <button
                    class="bg-blue-500 text-white h-full w-full rounded-full text-xs flex px-3 items-center relative hover:scale-105 transform scale-100">
                    {{ $appointment->start_at->format('H:i a') }}
                    <span class="ml-auto flex">
                        <span class="h-4 w-4">
                            <x-icon.solid :icon="optional($appointment->method)->icon" />
                        </span>
                    </span>
                </button>
            @endforeach
        </div>
        <div class="h-5 w-full bg-gray-100 rounded-full">
            @foreach (optional($day)['late afternoon'] ?? [] as $appointment)
                <button
                    class="bg-blue-500 text-white h-full w-full rounded-full text-xs flex px-3 items-center relative hover:scale-105 transform scale-100">
                    {{ $appointment->start_at->format('H:i a') }}
                    <span class="ml-auto flex">
                        <span class="h-4 w-4">
                            <x-icon.solid :icon="optional($appointment->method)->icon" />
                        </span>
                    </span>
                </button>
            @endforeach
        </div>
        <div class="h-5 w-full bg-gray-100 rounded-full">
            @foreach (optional($day)['evening'] ?? [] as $appointment)
                <button
                    class="bg-blue-500 text-white h-full w-full rounded-full text-xs flex px-3 items-center relative hover:scale-105 transform scale-100">
                    {{ $appointment->start_at->format('H:i a') }}
                    <span class="ml-auto flex">
                        <span class="h-4 w-4">
                            <x-icon.solid :icon="optional($appointment->method)->icon" />
                        </span>
                    </span>
                </button>
            @endforeach
        </div>
    </div>
</div>
