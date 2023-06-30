<div {{ $attributes->merge(['class' => 'relative']) }} x-data="{ value: null }">
    <input type="{{ $type ?? '' }}" class="w-full bg-transparent focus:outline-none py-3 px-4"
        {{ $attributes->except('class') }} />


    <!-- <div class="absolute w-full rounded z-10 top-full shadow bg-white">
            <x-ui.context-menu.item x-on:click="">Search Item</x-ui.context-menu.item>
            <x-ui.context-menu.item>Search Item</x-ui.context-menu.item>
            <x-ui.context-menu.item>Search Item</x-ui.context-menu.item>
            <x-ui.context-menu.item>Search Item</x-ui.context-menu.item>
        </div> -->

</div>
