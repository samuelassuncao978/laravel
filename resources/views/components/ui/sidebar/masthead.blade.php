<div class="flex items-center p-5 pb-0 h-12">
    <div class="text-xs text-gray-400 tracking-wider flex-grow uppercase">{{ $text ?? '' }}</div>
    <div class="items-center">
        @if (isset($actions))
            {{ $actions ?? '' }}
        @endif
    </div>
</div>
