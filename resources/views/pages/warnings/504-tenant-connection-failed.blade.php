<x-container>
    <div class="text-center flex flex-grow flex-col items-center justify-center h-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white text-opacity-75" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
        </svg>
        <h1 class="text-white text-opacity-75 text-3xl mb-10">Unable to connect</h1>
        <p class="text-white text-opacity-75">There has been an issue connecting to the database.</p>
        @if (!app()->environment('production'))

            <code
                class="text-xs mt-4 text-white text-opacity-75 bg-gray-900 whitespace-pre-wrap text-left border border-gray-400 rounded-md shadow-inner	 p-10 px-20">{{ json_encode(tenant()->database, JSON_PRETTY_PRINT) }}</code>
        @endif
    </div>
</x-container>
