<div {{ $attributes->merge(['class' => 'relative']) }} x-data>
    <span class="uppercase text-xs text-gray-700 absolute h-full flex items-center left-4">AU $</span>
    <input type="text" class="bg-transparent w-full focus:outline-none flex-grow py-3 px-4 pl-12"
        {{ $attributes->except('class') }} />
</div>
