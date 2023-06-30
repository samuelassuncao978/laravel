<div
    {{ $attributes->merge(['class' => 'flex flex-col bg-gray-50 border-t border-b border-gray-200 w-full ' . ($attributes->has('neat') ? '' : 'px-8')]) }}>
    {{ $slot ?? '' }}
</div>
