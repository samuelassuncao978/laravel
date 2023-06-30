<div class="flex flex-wrap" x-data="{ value: '{{ $value ?? '' }}' }">
    @php
        $colors = ['bg-pink-500', 'bg-blue-500', 'bg-purple-500', 'bg-red-500', 'bg-yellow-500', 'bg-green-500', 'bg-indigo-500', 'bg-orange-500', 'bg-amber-500', 'bg-lime-500', 'bg-teal-500', 'bg-cyan-500', 'bg-violet-500', 'bg-fuchsia-500', 'bg-rose-500', 'bg-emerald-500'];
        $rings = ['ring-pink-200', 'ring-blue-500', 'ring-purple-500', 'ring-red-500', 'ring-yellow-500', 'ring-green-500', 'ring-indigo-500', 'ring-orange-500', 'ring-amber-500', 'ring-lime-500', 'ring-teal-500', 'ring-cyan-500', 'ring-violet-500', 'ring-fuchsia-500', 'ring-rose-500', 'ring-emerald-500'];
    @endphp



    <div
        class="appearance-none outline-none focus:ring-2 focus:shadow-inner flex flex-wrap shadow-sm ring-gray-300 focus:border-gray-400  w-full bg-white text-gray-500 text-sm border border-gray-100 rounded py-3 px-4">
        @foreach ($colors as $key => $color)
            <label for="{{ $name ?? '' }}-{{ $color }}"
                class="m-1 flex-shrink-0 block rounded-full w-6 h-6 {{ $color }} focus:outline-none ring-2 ring-transparent border-2 border-white"
                x-data="{}" :class="{'{{ $rings[$key] }}': $refs.color.checked }">
                <input x-ref="color" type="radio" id="{{ $name ?? '' }}-{{ $color }}"
                    name="{{ $name ?? '' }}" value="{{ $color }}" class="opacity-0"
                    {{ $attributes->except(['class', 'label']) }} />
            </label>
        @endforeach
    </div>
</div>
