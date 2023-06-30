<x-button.base {{ $attributes->merge(['class'=> 'bg-white border border-gray-200 hover:bg-gray-50 active:bg-gray-200 ring-gray-100 text-gray-500'])}}>
    {{ $slot ?? '' }}
</x-button.base>  