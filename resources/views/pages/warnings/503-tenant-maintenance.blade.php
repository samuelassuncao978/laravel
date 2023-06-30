<x-container>
    <div class="text-center flex flex-grow flex-col items-center justify-center h-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white text-opacity-75 mb-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-white text-opacity-75 text-3xl mb-10">Maintenance</h1>
        <p class="text-white text-opacity-75 max-w-sm">
            @if (optional(tenant())->maintenance_reason)
                {{ optional(tenant())->maintenance_reason }}
            @else
                We’re performing some scheduled system maintenance at the moment and anticipate to be completed
                @if (optional(optional(optional(tenant())->maintenance_at)->add(20,'mins'))->isAfter(now()))
                <strong>{{ optional(optional(tenant())->maintenance_at)->add(20, 'mins')->diffForHumans() }}</strong>
            @else
                shortly.
            @endif
            @endif
        </p>
    </div>
</x-container>
