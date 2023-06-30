<a href="{{ $href ?? '' }}"
    class="bg-white p-3 w-full flex flex-col rounded-md focus:bg-gray-50 focus:shadow-inner shadow  hover:border-gray-300 border border-white {{ request()->is((ltrim($href, '/') ?? '') . '*') ? 'ring-2 ring-blue-500 focus:outline-none' : '' }}">
    {{ $slot ?? '' }}
</a>
