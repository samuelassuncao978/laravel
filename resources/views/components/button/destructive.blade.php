<x-button.base {{ $attributes->merge(['class'=> 'bg-red-500 hover:bg-red-600 focus:ring-red-200 active:bg-red-800'])}}>
    {{ $slot ?? '' }}
</x-button.base>  