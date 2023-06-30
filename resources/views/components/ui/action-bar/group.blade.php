<div class="pl-4 flex items-center">
    <span class="font-semibold mr-2">{{ $attributes->get('label') ?? 'Group:' }}</span>
    <span class="rounded-full px-2 py-1 divide-x divide-gray-300 text-gray-500 flex bg-gray-200 bg-opacity-50">
        {{ $slot ?? '' }}
    </span>
</div>
