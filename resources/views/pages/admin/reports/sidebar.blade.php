<x-sidebar>

    <div class="flex flex-col h-full">
        <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
            <x-ui.sidebar.masthead text="Reports" />
        </div>
        <x-interface.sidebar.item-list>
            <div class="">


        <x-ui.sidebar.list-item label=" Users" wire:click="{!! $this->pge()->loads('account', []) !!}"
                :active="'account' === $this->pge()->loaded" />





    </div>

    </div>
    </x-interface.sidebar.item-list>



</x-sidebar>
