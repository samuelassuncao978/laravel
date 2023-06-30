<a href="{{ $href ?? '' }}"
    class=" md:h-10 w-full flex-col p-6 md:p-2.5  md:m-0 relative rounded-md flex items-center justify-center md:hover:text-blue-500 {{ $active ? ' text-blue-500' : '' }}">
    <span
        class="absolute top-0 bottom-0 left-0 bg-blue-500 rounded-r-full w-1 transform transition transition-all ease  {{ $active ? 'translate-x-0' : '-translate-x-2' }}"></span>
    {{ $slot ?? '' }}
</a>
