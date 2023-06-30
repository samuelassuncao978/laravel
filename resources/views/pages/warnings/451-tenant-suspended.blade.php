<x-container>
    <div class="text-center flex flex-grow flex-col items-center justify-center h-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white text-opacity-75 mb-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </svg>
        <h1 class="text-white text-opacity-75 text-3xl mb-10">Tenant Suspended</h1>
        <p class="text-white text-opacity-75 max-w-sm">
            <?= optional(tenant())->suspended_reason ?? "This account has been suspended." ?></p>
    </div>
</x-container>
