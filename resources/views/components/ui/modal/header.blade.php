<div class="justify-start w-full px-6 py-4">
    <x-ui.heading :heading="$heading" :center="$center ?? null" />
    @if (isset($caption))
        <p class="text-sm text-gray-500 font-normal leading-relaxed @if (isset($center)) text-center @endif">
            {{ $caption ?? '' }}
        </p>
    @endif
</div>
