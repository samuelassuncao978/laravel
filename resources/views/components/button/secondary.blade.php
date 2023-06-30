<x-button.base {{ $attributes->merge(['class'=> 'bg-gray-700 hover:bg-gray-800 focus:ring-gray-200 active:bg-gray-900'])}}>
    {{ $slot ?? '' }}
</x-button.base>  