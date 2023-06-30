<div class="flex flex-wrap" x-data="{ value: '{{ $value ?? '' }}' }">
    @php
        $type = $attributes->has('outline') ? 'outline' : ($attributes->has('custom') ? 'custom' : 'solid');
        
        $icons = array_diff(scandir(resource_path('icons/' . $type)), array_merge(['..', '.'], $allowed ?? []));
    @endphp



    <div
        class="appearance-none max-h-48 items-center overflow-y-scroll outline-none focus:ring-2 focus:shadow-inner flex flex-wrap shadow-sm ring-gray-300 focus:border-gray-400 w-full bg-white text-gray-500 text-sm border border-gray-100 rounded py-3 px-4">
        <div class="w-1/6 flex items-center justify-center ">
            <label for="{{ $name ?? '' }}-blank"
                class="m-1 p-2 flex-shrink-0 flex items-center justify-center bg-gray-100 rounded-full w-10 h-10 focus:outline-none ring-2 ring-transparent border-2 border-white"
                x-data="{}" :class="{'ring-blue-500 text-blue-500': $refs.icon.checked }">
                <input x-ref="icon" type="radio" id="{{ $name ?? '' }}-blank" name="{{ $name ?? '' }}" value=""
                    checked class="opacity-0 absolute" {{ $attributes->except(['class', 'label']) }} />
            </label>
        </div>
        @foreach ($icons as $key => $icon)
            <div wire:key="{{ $key }}" class="w-1/6 flex items-center justify-center ">
                <label for="{{ $name ?? '' }}-{{ str_replace('.svg', '', $icon) }}"
                    class="m-1 p-2 flex-shrink-0 flex items-center justify-center bg-gray-100 rounded-full w-10 h-10 focus:outline-none ring-2 ring-transparent border-2 border-white"
                    x-data="{}" :class="{'ring-blue-500 text-blue-500': $refs.icon.checked }">
                    <input x-ref="icon" type="radio" id="{{ $name ?? '' }}-{{ str_replace('.svg', '', $icon) }}"
                        name="{{ $name ?? '' }}" value="{{ str_replace('.svg', '', $icon) }}"
                        class="opacity-0 absolute" {{ $attributes->except(['class', 'label']) }} />
                    @if ($type === 'outline')
                        <x-icon.outline :icon="str_replace('.svg','',$icon)" />
                    @elseif ($type === 'custom')
                        <x-icon.custom :icon="str_replace('.svg','',$icon)" />
                    @else
                        <x-icon.solid :icon="str_replace('.svg','',$icon)" />
                    @endif
                </label>
            </div>
        @endforeach
    </div>
</div>
