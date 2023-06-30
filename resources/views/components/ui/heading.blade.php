<div class="w-full flex @if (isset($center)) justify-center @else justify-start @endif">
    <div class="inline-flex flex-col tracking-wide text-grey-darker text-sm font-bold mb-2">
        <span class="pr-4 @if (isset($center)) pl-4 @endif pb-1 uppercase text-gray-700">{{ $heading ?? '' }}</span>
        <div class="flex space-x-1">
            @if (isset($center))
                <div class="w-1 h-1 flex-shrink-0 rounded-full bg-gray-700"></div>
                <div class="w-2 h-1 flex-shrink-0 rounded-full bg-gray-700"></div>
            @endif
            <div class="w-full h-1 rounded-full bg-gray-700"></div>
            <div class="w-2 h-1 flex-shrink-0 rounded-full bg-gray-700"></div>
            <div class="w-1 h-1 flex-shrink-0 rounded-full bg-gray-700"></div>
        </div>
    </div>
</div>
