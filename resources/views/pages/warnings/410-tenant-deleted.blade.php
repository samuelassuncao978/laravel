<x-container>
    <div class="text-center flex flex-grow flex-col items-center justify-center h-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white text-opacity-75 mb-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </svg>
        <h1 class="text-white text-opacity-75 text-3xl mb-10">Tenant Deleted</h1>
        <p class="text-white text-opacity-75">This tenants data will be purged from the system at:</p>
        <div class="text-yellow-500 mt-2 text-xs">
            {{ tenant()->obsolete_at->format('l jS \\of F Y') }}
            <span>{{ tenant()->obsolete_at->format('h:i:s A T') }}</span>
        </div>

        @if (!app()->environment('production'))
            <form class="flex mt-10 flex-col items-center justify-center" method="POST"
                action="/tenants/{{ tenant()->id }}">
                @csrf
                @method('delete')
                <input type="hidden" name="immediately" value="true" />

                <button type="submit"
                    class="ml-auto inline-flex items-center focus:outline-none text-gray-700 py-2 px-5 text-xs rounded-md  bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-200 focus:ring-4">Purge
                    now</button>
            </form>
        @endif

    </div>
</x-container>
