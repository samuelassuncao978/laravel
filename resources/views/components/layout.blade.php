<x-container>

    <div class="flex flex-1 overflow-hidden h-full">

        <livewire:admin.navigation />

        <div class="flex-grow overflow-x-hidden flex flex-col rounded-r-lg">

            <div class="flex-grow overflow-x-hidden flex">
                {{ $slot }}
            </div>
            <!-- <div class="p-3 bg-yellow-100 border-t border-yellow-300 text-yellow-400">
                notice
            </div> -->
        </div>
        <livewire:welcome />
        <livewire:version-upgrade />
        <livewire:admin.users.onboard />
        <x-taskbar.bar />
    </div>
</x-container>
