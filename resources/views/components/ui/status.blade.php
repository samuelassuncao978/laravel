<div class="text-xs py-0 px-2 leading-none rounded-md flex items-center">
    @foreach ($options as $option => $key)
        @if ($value === $key)
            <span class="block h-3 w-3 mr-2 flex-shrink-0 {{ $option }} rounded-md"></span>
        @endif
    @endforeach
    <span class="block flex-grow truncate text-xs">{{ $text ?? '' }}</span>
</div>
