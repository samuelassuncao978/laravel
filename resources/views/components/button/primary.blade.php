<x-button.base {{ $attributes->merge(['class'=> 'bg-blue-500 hover:bg-blue-600 focus:ring-blue-200 active:bg-blue-800'])}}>
    {{ $slot ?? '' }}
</x-button.base>  