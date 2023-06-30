<div x-data="{ open: false }" class="relative z-30">
    <button @click="open = !open" :class="{ 'ring-2 ring-blue-500': open }"
        class="focus:outline-none w-8 h-8 ml-4 text-gray-400 shadow rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
        <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle>
            <circle cx="5" cy="12" r="1"></circle>
        </svg>
    </button>
    <div @click.away="open = false" x-cloak x-show="open"
        class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-30">
        {{ $slot ?? '' }}
    </div>
</div>
