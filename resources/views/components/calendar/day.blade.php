<div class="bg-white flex flex-grow items-center cursor-pointer justify-center relative group">
    <div
        class="relative w-full flex items-center justify-center h-full group-hover:bg-blue-100 group-hover:text-blue-500">
        {{ $day['date']->format('j') }}
        <div class="absolute bottom-1 h-1 w-1 rounded-sm bg-blue-500"></div>
    </div>
</div>
