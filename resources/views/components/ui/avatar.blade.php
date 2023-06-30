@php
$name = empty($name) ? 'UU' : $name;

$colors = ['bg-pink-500', 'bg-blue-500', 'bg-purple-500', 'bg-red-500', 'bg-yellow-500', 'bg-green-500', 'bg-indigo-500', 'bg-orange-500', 'bg-amber-500', 'bg-lime-500', 'bg-teal-500', 'bg-cyan-500', 'bg-violet-500', 'bg-fuchsia-500', 'bg-rose-500', 'bg-emerald-500'];
$color = isset($color) && $color !== 'auto' ? $color : $colors[(ord(substr($name, 0, 1)) - 64) % 15];

$name = explode(' ', $name);

@endphp
<span class="relative h-full w-full">
    <span
        class="overflow-hidden h-full w-full text-xs text-white bg-gray-500 {{ $rounded ?? 'rounded-full' }} flex items-center justify-center">
        @if (isset($image) && !empty($image))
            <img src="{{ $image }}" alt="{{ implode(' ', $name) }}">
        @else
            <div class=" {{ $color }} flex items-center justify-center w-full h-full uppercase">
                <svg viewBox="0 0 21 21" class=" w-3/4 h-3/4">
                    <text x="50%" y="55%" class="text-white fill-current" dominant-baseline="middle"
                        text-anchor="middle">{{ substr(optional($name)[0] ?? '', 0, isset($long) ? 1 : 1) . substr(optional($name)[1] ?? '', 0, isset($long) ? 1 : 0) }}</text>
                </svg>
            </div>

        @endif
    </span>
    @if (isset($online))
        <svg viewBox="0 0 36 36" class="h-2 w-2 absolute bottom-0 right-0">
            <path class="shadow-inner {{ $online ? 'text-green-500' : 'text-gray-500' }} fill-current"
                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" stroke-width="2" />
            <path class="stroke-current" fill="none"
                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" stroke-width="2"
                stroke-dasharray="100, 100" />
        </svg>
    @endif
</span>
