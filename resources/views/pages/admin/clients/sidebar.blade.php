<x-sidebar>
    <div class="flex flex-col h-full">
        <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
            <x-ui.sidebar.masthead text="Clients">
                @slot('actions')

                    <button wire:click="{{ $this->opens('App\Http\Livewire\Clients\Create') }}"
                        class="relative overflow-hidden focus:outline-none ml-auto text-xs flex items-center justify-center hover:bg-gray-600 hover:text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                            wire:target="invoke('create-client','')">
                            <x-ui.loading-indicator :loading="true" bg="bg-gray-600 bg-opacity-80"
                                spinner="border-gray-50" />
                        </div>
                    </button>

                @endslot
            </x-ui.sidebar.masthead>
            <x-interface.sidebar.search />

        </div>


        <x-interface.sidebar.groups
            :groups="[
                ['text'=>'all', 'action'=>'$set(\'group_by\',\'\')', 'active' => ($this->group_by === '') ],
                ['text'=>'upcoming appts.', 'action'=>'$set(\'group_by\',\'upcoming\')', 'active' => ($this->group_by === 'upcoming') ]]" />


        <x-interface.sidebar.item-list>
            @foreach ($clients as $client)
                <x-ui.sidebar.item wire:key="{{ $client->id }}" wire:click="{!! $this->pge()->loads($client->id, ['client' => $client]) !!}"
                    :active="$client->id === $this->pge()->loaded">
                    <x-interface.sidebar.item-header heading="{{ $client->name }}"
                        :preheading="$client->preferred_name ? $client->preferred_name : null"
                        :avatar="['name'=> $client->name, 'color' => 'auto' ]" />
                    <div class="flex space-x-4 text-xs divide-x divide-gray-300 text-gray-600">
                        <div class="flex items-center w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                            </svg>
                            {!! $client->age ? $client->age : '&mdash;' !!}
                        </div>
                        <div class="flex items-center pl-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            @php
                                $next = $client
                                    ->appointments()
                                    ->owned()
                                    ->next();
                            @endphp
                            @if (optional($next)->start_at)
                                <x-ui.timestamp :date="$next->start_at" local="m-d H:i" />
                            @else
                                &mdash;
                            @endif
                        </div>
                    </div>
                </x-ui.sidebar.item>
            @endforeach
        </x-interface.sidebar.item-list>
        {{ $clients->onEachSide(1)->links('components.ui.pagination-simple') }}
    </div>
</x-sidebar>
