<div {{ $attributes->merge(['class' => 'relative']) }} x-data>
    <span class="uppercase text-xs text-gray-700 absolute h-full flex items-center right-4">%</span>
    <input type="text" class="bg-transparent w-full focus:outline-none flex-grow py-3 px-4 pr-12 text-right"
        {{ $attributes->except('class') }} />
</div>
