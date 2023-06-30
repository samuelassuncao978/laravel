<div
    class="flex xl:flex-row flex-col h-10 items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
    @if (isset($avatar))
        <span class="flex flex-col items-center mr-2 w-6 h-6 flex-shrink-0">
            <x-ui.avatar :name="$avatar['name'] ?? ''" rounded="rounded-sm" long
                :color="$avatar['color'] ?? 'bg-gray-600'" :image="optional($avatar)['image']" />

        </span>
    @endif
    <div class="truncate text-left">
        <span class="block text-xs text-gray-500 text-left">{{ $preheading ?? '' }}</span>
        {{ $heading ?? '' }}
        <span class="block text-xs text-gray-500 text-left">{{ $subheading ?? '' }}</span>
    </div>
</div>
