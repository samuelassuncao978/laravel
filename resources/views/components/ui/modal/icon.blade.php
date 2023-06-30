<div class="justify-start w-full px-6 py-4">
    @if (isset($icon))
        <div class="flex justify-center">
            <i
                class="w-14 h-14 {{ $color ?? 'text-gray-600' }} rounded-full border border-gray-300 my-5 p-2">{{ $icon ?? '' }}</i>
        </div>
    @endif
</div>
