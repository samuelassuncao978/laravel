<x-button.base {{ $attributes->merge(['class'=> 'bg-green-700 hover:bg-green-800 focus:ring-green-200 active:bg-green-900'])}}>
    {{ $slot ?? '' }}
</x-button.base>  