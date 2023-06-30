<x-button.base {{ $attributes->merge(['class'=> 'bg-orange-700 hover:bg-orange-800 focus:ring-orange-200 active:bg-orange-900'])}}>
    {{ $slot ?? '' }}
</x-button.base>  