@if (isset($loading) && $loading !== false)

    <span
        class="absolute inset-0 flex items-center {{ isset($bg) ? $bg : 'bg-black bg-opacity-50' }} {{ isset($left) ? 'justify-start' : '' }} {{ isset($right) ? 'justify-end' : '' }} {{ !isset($right) && !isset($left) ? 'justify-center' : '' }}  cursor-wait">
        <span style="border-top-color:transparent; "
            class="block absolute border-solid animate-spin rounded-full {{ $attributes->has('small') ? 'border h-3 w-3 m-2' : 'border-2 h-5 w-5 m-2' }}  {{ isset($spinner) ? $spinner : 'border-white opacity-90' }}"></span>
    </span>
@endif
