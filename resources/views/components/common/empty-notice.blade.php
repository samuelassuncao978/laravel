<div class=" flex-grow text-center flex flex-col justify-center items-center">
    @if (isset($slot) && $slot !== '')
        <span
            class="mx-auto  text-gray-300 inline-block mb-4 {{ $attributes->has('large') ? 'h-20 w-20' : 'h-32 w-32' }}">
            {{ $slot }}
        </span>
    @endif
    <span class="text-small text-gray-500">{{ $title ?? 'Empty' }}</span>
</div>
